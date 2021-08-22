

<?php  //Перенаправление в случае некорректного ввода
function redirect(){?>
  <script >
      window.location.href = "http://petprojectvlasov.com/index.php"
  </script>
<?php }

//Формирование ссылки для элементов пагинации
function form_url_query($current_tab, $current_page){
    $url="http://petprojectvlasov.com/index.php?";

    if(!isset($_GET['GenreBook'])){

      if($current_tab==1){
        if(isset($_GET['PageNew'])){
          $url=$url."PageNew=".$_GET['PageNew']."&";
        }

        if(isset($_GET['PageSpecial'])){
          $url=$url."PageSpecial=".$_GET['PageSpecial']."&";
        }

        $url=$url."PageBest=".$current_page."&";

        $url=$url."CurrentTab=".$current_tab;
      }

      if($current_tab==2){
        if(isset($_GET['PageBest'])){
          $url=$url."PageBest=".$_GET['PageBest']."&";
        }

        if(isset($_GET['PageSpecial'])){
          $url=$url."PageSpecial=".$_GET['PageSpecial']."&";
        }

        $url=$url."PageNew=".$current_page."&";

        $url=$url."CurrentTab=".$current_tab;
      }

      if($current_tab==3){
        if(isset($_GET['PageBest'])){
          $url=$url."PageBest=".$_GET['PageBest']."&";
        }

        if(isset($_GET['PageNew'])){
          $url=$url."PageNew=".$_GET['PageNew']."&";
        }

        $url=$url."PageSpecial=".$current_page."&";

        $url=$url."CurrentTab=".$current_tab;
      }

    }elseif(intval($_GET['GenreBook']) >= 1 AND intval($_GET['GenreBook'])<=9){
      $url=$url."GenreBook=".($_GET['GenreBook'])."&";

      if($current_tab==1){
        if(isset($_GET['PageNew'])){
          $url=$url."PageNew=".$_GET['PageNew']."&";
        }

        if(isset($_GET['PageSpecial'])){
          $url=$url."PageSpecial=".$_GET['PageSpecial']."&";
        }

        $url=$url."PageBest=".$current_page."&";

        $url=$url."CurrentTab=".$current_tab;
      }

      if($current_tab==2){
        if(isset($_GET['PageBest'])){
          $url=$url."PageBest=".$_GET['PageBest']."&";
        }

        if(isset($_GET['PageSpecial'])){
          $url=$url."PageSpecial=".$_GET['PageSpecial']."&";
        }

        $url=$url."PageNew=".$current_page."&";

        $url=$url."CurrentTab=".$current_tab;
      }

      if($current_tab==3){
        if(isset($_GET['PageBest'])){
          $url=$url."PageBest=".$_GET['PageBest']."&";
        }

        if(isset($_GET['PageNew'])){
          $url=$url."PageNew=".$_GET['PageNew']."&";
        }

        $url=$url."PageSpecial=".$current_page."&";

        $url=$url."CurrentTab=".$current_tab;
      }

    }

    return $url;
}

//функция вывода одной книги
function output_book_body($this_books){?>

        <div 
          onclick="location.href='http://petprojectvlasov.com/productpage.php?IdBook=<?php echo $this_books['ID_book']; ?>'" 
          class="book_body">
            
            <?php if($this_books['Discount_book'] != 0) {?>
            <span>-<?php echo $this_books['Discount_book'] ?>%</span>
            <?php } ?>

            <div class = "inside_book_body">
              
              <img src="<?php echo $this_books['Imagebook_path'] ?>">
              
              <h3><?php //Ограничиваем кол-во букв в названии
                if (mb_strlen($this_books['Name_book']) < 30) {
                  echo $this_books['Name_book'];
                 } else{
                  echo mb_substr($this_books['Name_book'], 0, 30)."...";
                 }
              ?></h3>

              <h2><?php echo $this_books['Price_book']*(1- $this_books['Discount_book']/100)."&#8381"; ?></h2>

            </div> <!--Блок без скидки -->

        </div><!--Блок книги --> 

<?php }


  $number_of_books_output = 8;

  
  //получении массива для вывода
  
  $connection = mysqli_connect('localhost', 'mysql', 'mysql', 'project_db');
  if(!isset($_GET['GenreBook'])){
  //Для хитов___________________________________________________________________
  $result_best_numb = mysqli_fetch_assoc(mysqli_query($connection, "
    SELECT COUNT(*) as best_numb 
    FROM book_main 
    ORDER BY View_book Desc"));

  $numb_of_pages_best = ceil($result_best_numb['best_numb'] / $number_of_books_output);  
  
  if(!isset($_GET['PageBest'])){

    $current_page_best = 1;

  } elseif(intval($_GET['PageBest'])>=1 and 
           intval($_GET['PageBest'])<=$numb_of_pages_best){

    $current_page_best = $_GET['PageBest'];

  } else{
      redirect();
  }

  $start = ($current_page_best - 1) * $number_of_books_output;

  $result_best =mysqli_query($connection, "
    SELECT * FROM book_main 
    ORDER BY View_book Desc 
    LIMIT $start ,$number_of_books_output");
  
  //Для новинок___________________________________________________________________

  $result_new_numb = mysqli_fetch_assoc(mysqli_query($connection, "
    SELECT COUNT(*) as new_numb 
    FROM book_main 
    ORDER BY Date_book Desc"));

  $numb_of_pages_new = ceil($result_new_numb['new_numb'] / $number_of_books_output);  
  
  if(!isset($_GET['PageNew'])){

    $current_page_new = 1;

  } elseif(intval($_GET['PageNew'])>=1 and 
           intval($_GET['PageNew'])<=$numb_of_pages_new){

    $current_page_new = $_GET['PageNew'];

  } else{
 
      redirect();
  }

  $start = ($current_page_new - 1) * $number_of_books_output;

  $result_new =mysqli_query($connection, "
    SELECT * FROM book_main 
    ORDER BY Date_book Desc 
    LIMIT $start, $number_of_books_output");

  //Для спецпредложений_________________________________________________________________

  $result_special_numb = mysqli_fetch_assoc(mysqli_query($connection, "
    SELECT COUNT(*) as special_numb 
    FROM book_main 
    WHERE Discount_book!=0 
    ORDER BY View_book Desc"));

  $numb_of_pages_special = ceil($result_special_numb['special_numb'] / $number_of_books_output);  
  
  if(!isset($_GET['PageSpecial'])){

    $current_page_special = 1;

  } elseif(intval($_GET['PageSpecial'])>=1 and 
           intval($_GET['PageSpecial'])<=$numb_of_pages_special){

    $current_page_special = $_GET['PageSpecial'];

  } else{
   
      redirect();
  }

  $start = ($current_page_special - 1) * $number_of_books_output;

  $result_special =mysqli_query($connection, "
    SELECT * FROM book_main 
    WHERE Discount_book!=0 
    ORDER BY View_book Desc 
    LIMIT $start, $number_of_books_output");

  
  } elseif(intval($_GET['GenreBook']) >= 1 AND intval($_GET['GenreBook'])<=9){

    //Для хитов___________________________________________________________________

  $result_best_numb = mysqli_fetch_assoc(mysqli_query($connection, "
    SELECT COUNT(*) as best_numb 
    FROM book_main 
    WHERE Genre_id = {$_GET['GenreBook']} 
    ORDER BY View_book Desc"));

  $numb_of_pages_best = ceil($result_best_numb['best_numb'] / $number_of_books_output);  
  
  if(!isset($_GET['PageBest'])){

    $current_page_best = 1;

  } elseif(intval($_GET['PageBest'])>=1 and 
           intval($_GET['PageBest'])<=$numb_of_pages_best){

    $current_page_best = $_GET['PageBest'];

  } else{
      redirect();
  }

  $start = ($current_page_best - 1) * $number_of_books_output;


  $result_best =mysqli_query($connection, "
    SELECT * FROM book_main 
    WHERE Genre_id = {$_GET['GenreBook']} 
    ORDER BY View_book Desc 
    LIMIT $start, $number_of_books_output");

  //Для новинок___________________________________________________________________

  $result_new_numb = mysqli_fetch_assoc(mysqli_query($connection, "
    SELECT COUNT(*) as new_numb 
    FROM book_main 
    WHERE Genre_id = {$_GET['GenreBook']} 
    ORDER BY Date_book Desc"));

  $numb_of_pages_new = ceil($result_new_numb['new_numb'] / $number_of_books_output);  
  
  if(!isset($_GET['PageNew'])){

    $current_page_new = 1;

  } elseif(intval($_GET['PageNew'])>=1 and 
           intval($_GET['PageNew'])<=$numb_of_pages_new){

    $current_page_new = $_GET['PageNew'];

  } else{
 
      redirect();
  }

  $start = ($current_page_new - 1) * $number_of_books_output;

  $result_new =mysqli_query($connection, "
    SELECT * FROM book_main 
    WHERE Genre_id = {$_GET['GenreBook']} 
    ORDER BY Date_book Desc 
    LIMIT $start,  $number_of_books_output");
//Для спецпредложений_________________________________________________________________

  $result_special_numb = mysqli_fetch_assoc(mysqli_query($connection, "
    SELECT COUNT(*) as special_numb 
    FROM book_main 
    WHERE Genre_id = {$_GET['GenreBook']} AND Discount_book!=0 
    ORDER BY View_book Desc"));

  $numb_of_pages_special = ceil($result_special_numb['special_numb'] / $number_of_books_output);  
  
  if(!isset($_GET['PageSpecial'])){

    $current_page_special = 1;

  } elseif(intval($_GET['PageSpecial'])>=1 and 
           intval($_GET['PageSpecial'])<=$numb_of_pages_special){

    $current_page_special = $_GET['PageSpecial'];

  } else{
   
      redirect();
  }

  $start = ($current_page_special - 1) * $number_of_books_output;

  $result_special =mysqli_query($connection, "
    SELECT * FROM book_main 
    WHERE Genre_id = {$_GET['GenreBook']} AND Discount_book!=0 
    ORDER BY View_book Desc 
    LIMIT $start, $number_of_books_output");

  
  }

  if(!mysqli_num_rows($result_best) and !mysqli_num_rows($result_new) and !mysqli_num_rows($result_special)){ redirect(); }
?>