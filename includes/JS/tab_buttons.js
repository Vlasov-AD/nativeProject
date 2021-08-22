<script >
    //При выборе пользователя
    const best_tab = document.getElementById('tab1');
    const new_tab = document.getElementById('tab2');
    const special_tab = document.getElementById('tab3');

    document.addEventListener("click", (event) =>{
      if(event.target == best_tab) {
        document.getElementById('view_books_best').style.display = 'block';
        document.getElementById('view_books_new').style.display = 'none';
        document.getElementById('view_books_special').style.display = 'none';
      }

      if(event.target == new_tab) {
        document.getElementById('view_books_best').style.display = 'none';
        document.getElementById('view_books_new').style.display = 'block';
        document.getElementById('view_books_special').style.display = 'none';
      }


      if(event.target == special_tab) {
        document.getElementById('view_books_best').style.display = 'none';
        document.getElementById('view_books_new').style.display = 'none';
        document.getElementById('view_books_special').style.display = 'block';
      }
    })


    //При загрузке страницы
    <?php if(!isset($_GET['CurrentTab']) or 
      intval(htmlspecialchars($_GET['CurrentTab']))==1){ ?>
      document.getElementById('tab1').checked=true;
      document.getElementById('view_books_best').style.display = 'block';
      document.getElementById('view_books_new').style.display = 'none';
      document.getElementById('view_books_special').style.display = 'none';  

    <?php } elseif(intval(htmlspecialchars($_GET['CurrentTab']))==2){ ?>
      document.getElementById('tab2').checked=true;
      document.getElementById('view_books_best').style.display = 'none';
      document.getElementById('view_books_new').style.display = 'block';
      document.getElementById('view_books_special').style.display = 'none';

    <?php } elseif(intval(htmlspecialchars($_GET['CurrentTab']))==3){ ?>
      document.getElementById('tab3').checked=true;
      document.getElementById('view_books_best').style.display = 'none';
      document.getElementById('view_books_new').style.display = 'none';
      document.getElementById('view_books_special').style.display = 'block';

    <?php } else{ ?>
      window.location.href = "http://petprojectvlasov.com/index.php"
    <?php } ?>  
    
    
  </script>