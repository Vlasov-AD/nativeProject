<?php 
session_start(); 

  

  $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'project_db');
  $IdBook = intval($_GET['IdBook']);
  //Делаем выборки из БД, если условия соблюдены
  if(isset($_GET['IdBook']) and 
    mysqli_num_rows(mysqli_query($connection, "SELECT * FROM book_main WHERE ID_book = $IdBook")) ){
   
   $book = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM book_main WHERE ID_book = $IdBook")) ;
 
   $genre = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM id_genres WHERE ID_genre = {$book['Genre_id']}"));
  
  mysqli_query($connection, "UPDATE book_main SET View_book = {$book['View_book']}+1 WHERE ID_book = {$book['ID_book']}");

  $suggestions = mysqli_query($connection, 
    "SELECT * FROM book_main 
    WHERE Genre_id = {$book['Genre_id']} AND ID_book != {$book['ID_book']} 
    ORDER BY View_book Desc");
 }
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php  if ($book['Name_book']) {
    echo $book['Name_book'];} else{
    echo "Ошибка";  
    } ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include "includes/header.php";
        include "includes/JS/readSetCookie.js";
  //Отрисовываем страницу, если условия соблюдены 
  if(isset($_GET['IdBook']) and 
    intval($_GET['IdBook']) and
    mysqli_num_rows(mysqli_query($connection, "SELECT * FROM book_main WHERE ID_book = $IdBook"))){  ?>

  <div class="product_body">

    <div id="content_ref">
      <a href="index.php">Главная</a>
      <span> >> </span>
      <a href="http://petprojectvlasov.com/index.php?GenreBook=<?php echo $genre['ID_genre']; ?>">
        <?php echo $genre['Genre_name']; ?></a>
      <span> >> </span>
      <span id="current_book"><?php echo $book['Name_book']; ?></span>
    </div><!--Строка с информацие о книге -->

    <div id="book_annotation">

      <div>
        <img id="image_product" src="<?php echo $book['Imagebook_path']; ?>">
      </div><!--Обложка -->

      <div id="annotation_buy">
        <h2><?php echo $book['Name_book']; ?></h2>
        <h3><?php echo $book['Annotation_book']; ?></h3>

        <div id="add_to_cart">

          <div id="price_button">

            <div> 
              <h1>Наша цена: 
                <span>
                  <?php 
                    echo $book['Price_book']*(1- $book['Discount_book']/100);
                  ?> 
                </span> 
              </h1> 
              <?php if($book['Discount_book'] != 0) { ?>
              <p>Цена была: <?php echo $book['Price_book']; ?>. 
                Экономьте <?php echo $book['Discount_book']."%"; ?></p>
              <?php } ?>
            </div>

            <input id="add_to_cart_button" type="button" value="Добавить в корзину">

          </div><!--Цена+кнопка -->

          <div id="block_payment">
            <p>&#128274; Безопасные платежи</p>
            <li><img src="images/visa.png"></li>
            <li><img src="images/mastercard.png"></li>
            <li><img src="images/mir.png"></li>
            <li><img src="images/qiwi.png"></li>
            <li><img src="images/webmoney.png"></li>
          </div><!--Системы платежей -->

        </div><!-- Блок добавления в корзину-->

      </div><!--Аннотация + покупка -->

    </div><!--Описание книги--> 

    <div id="info_suggestions_comments">
      <div id="info_comments">

        <div id="info_book">
          <h3>Информация о книге</h3>
          <div>
            <p>Автор: <?php echo $book['Author_book'] ?> </p>
            <p>Жанр: <?php echo $genre['Genre_name'] ?></p>
            <p>Издательство: <?php echo $book['Edition_book'] ?> </p>
            <p>Год издания: <?php echo $book['PublicationYear_book'] ?> г.</p>
            <p> Количество страниц: <?php echo $book['PageNumbers_book'] ?> </p>
            <p>ISBN: <?php echo $book['ISBN_book'] ?></p>
            <p>Размеры: <?php echo $book['Size_book'] ?>  </p>
            <p>Масса: <?php echo $book['Mass_book'] ?> г</p>
          </div>
        </div><!--Дополнительная информация о книге -->

    <?php include "includes/commentary.php" ?>    

      </div><!--Доп инфа о книге + Отзывы -->

      <div id="suggestions_book" class="view_books">
        <p>Вам также может понравиться:</p>
        <?php while ($sugg = mysqli_fetch_assoc($suggestions)){ ?>
        
          <div onclick="location.href='http://petprojectvlasov.com/productpage.php?IdBook=<?php echo $sugg['ID_book']; ?>'" 
          id="book_suggestion" class="book_body">

            <?php if($sugg['Discount_book'] != 0) {?>
            <span>-<?php echo $sugg['Discount_book'] ?>%</span>
            <?php } ?>

            <div class = "inside_book_body">

              <img src="<?php echo $sugg['Imagebook_path'] ?>">

              <h3><?php 
                if (mb_strlen($sugg['Name_book']) < 30) {
                  echo $sugg['Name_book'];
                 } else{
                  echo mb_substr($sugg['Name_book'], 0, 30)."...";
                 }
              ?></h3>

              <h2><?php echo $sugg['Price_book']*(1- $sugg['Discount_book']/100)."&#8381"; ?></h2>
              <h4>Узнать больше</h4>
            </div> <!--Блок без скидки -->
          </div><!--Блок книги -->  

        <?php  }?>
      </div><!--Предложения -->

    </div><!--Блок информации о книге, предложения, отзывы -->

  </div> <!--Блок продукта -->   
 
  <?php } else{ 
    echo "<h1 onclick=\"location.href = 'index.php'\" 
    style=\"
    text-align: center; 
    cursor: pointer;
    margin: 20px;
    \">При вводе страницы Вы удалили идентификатор книги или попытались ввести что-то не то. Для возвращения на главную страницу нажмите на эту запись!</h1>";  }  ?>
    

  <?php include "includes/footer.php"?>

<script > 
 
//Запись позиции на экране в куки
let evtFired = false;
let positionY = 0;

window.addEventListener("scroll", function(){
  if(evtFired === false){
    setCookie()
  }

});


</script>


</body>

</html>

<script>
  //Перевод на положение экрана из куки
  setTimeout(function(){
    if (readCookie('productPageScroll') !== null) {
   scrollTo({top: readCookie('productPageScroll'),
              behavior: "instant"});
}
}, 100)

</script>