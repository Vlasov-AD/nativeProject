  <nav>
    



    <?php include "PopUp/pop_window_registration.php" ?><!-- Форма регистрации-->

    <?php include "PopUp/pop_window_enter.php" ?> <!--Форма входа -->
    
    <?php include "PopUp/pop_window_recovery.php" ?> <!--Форма восстановления пароля -->

    <?php include "JS/PopUp.js" ?> <!--Включение и выключение элементов -->


    <div class="nav-header">
      <ul>
        <li><span onclick="" id="enter_in_nav">Войти</span></li>
        <?php if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){ ?>
        <li><a href=""><?php echo $_SESSION['NickName'] ?></a></li>
        <?php } ?>
        <li><a href="user_account.php">Моя учетная запись</a></li>
        <li><a href="help.php">Помощь</a></li>
        <li><a href="contact_page.php">Контакты</a></li>
      </ul>
    </div>
  </nav><!--Шапка с активными ссылками -->

    <script >
      //Вызов окна входа из кнопки войти в nav_header
        const enterInNav = document.getElementById('enter_in_nav');
        enterInNav.onclick = () =>{
          enterForm.style.display = 'block';
        }

    </script>


  <header>
    <div class="main-header">
      <div id = "logo-header">
        <a href="index.php"><img src="images/logo.png"></a>
      </div><!--Логотип -->

      <div>
        <form id = "search_form" action="#" method="GET">
          <input id = "search_bar" type="text" name="search_bar">
          <input id = "search_button" type="submit" name="search_button" value="Поиск">
        </form>
      </div><!--Поисковая строка -->
      
      <div class = "shop_cart_block">

        <div>
        <img src="images/cart_icon.png">
        <h3>В Вашем заказе: </h3>
        <h4 id = "itemInCart">0 книг</h4>
        </div>

       
        <form id = "cart_form" action="#" method="GET">
          <h2>$0</h2>
          <input id="cart_button" type="submit" name="cart_button" value = "Заказать">
        </form>

      </div><!--Тележка -->

    </div>
  </header> <!--Шапка -->

  <?php include "authorization_registration.php" ?>