


<?php
//подключение выборки из БД(с пагинацией) + отображение на странице
  include "select_and_output_books.php";
?>



<div class="main-body">
    <div class="side_category">
      <p>Категории:</p>
      <a href="http://petprojectvlasov.com/index.php"><h3 id="Genre_side_All" class="current_categorie">Все категории</h3></a>
      <ul>
        <ul>Художественная литература:</ul>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=1"><li id="Genre_side_1">Детская</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=2"><li id="Genre_side_2">Фантастика</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=3"><li id="Genre_side_3">Роман</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=4"><li id="Genre_side_4">Ужасы</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=5"><li id="Genre_side_5">Литература</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=6"><li id="Genre_side_6">Юмор</li></a>
        <ul>Документальная литература:</ul>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=7"><li id="Genre_side_7">Кулинария</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=8"><li id="Genre_side_8">Компьютер</li></a>
          <a href="http://petprojectvlasov.com/index.php?GenreBook=9"><li id="Genre_side_9">Бизнес</li></a>
      </ul>
    </div><!--Боковая панель -->

<?php
if(isset($_GET['GenreBook'])) //Изменение выделения текущей позиции категории
      {?>

        <script>
          document.getElementById('Genre_side_<?php echo $_GET['GenreBook']; ?>').className = 'current_categorie';
          document.getElementById('Genre_side_All').className = 0;

        </script>


<?php } ?>


    <div id="body_content">
      <div id="tab_buttons">
        <form action="#"> 
          <input id="tab1" class="radio_tabs" type="radio" name="tab_button" value="Лучшее предложение" checked>
          <label for="tab1">Хиты продаж</label>
          <input id="tab2" class="radio_tabs" type="radio" name="tab_button" value="Новинки">
          <label for="tab2">Новинки</label>
          <input id="tab3" class="radio_tabs" type="radio" name="tab_button" value="Специальное предложение">
          <label for="tab3">Спецпредложения</label>
        </form>
      </div><!-- Категории сортировки-->




      <?php //Вывод книг + пагинация
      include "pagination/best_tab.php";
      include "pagination/new_tab.php";
      include "pagination/special_tab.php";
       ?>

      

      

      

    </div><!--Отображение книг -->
      
  </div><!--Основное тело -->

    <?php //Скрипт переключения вкладок + выбора при открытии страницы
   include "JS/tab_buttons.js";?>

