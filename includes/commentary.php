<?php 

$connection = mysqli_connect('localhost', 'mysql', 'mysql', 'project_db');


if(!empty($_POST['text_comment'])
    and isset($_SESSION['loggedin']) 
    and $_SESSION['loggedin']==true ){
  $text_commentary = htmlspecialchars($_POST['text_comment']);
  mysqli_query($connection, "
                INSERT INTO commentary (Book_ID, User_id, Comment) 
                VALUES ({$book['ID_book']}, {$_SESSION['UserID']}, '$text_commentary')"
              );
?>
<script>
  window.location = window.location.href;
</script>
<?php
}

$raw_comments = mysqli_query($connection, "SELECT * FROM commentary WHERE Book_ID = {$book['ID_book']} ORDER BY Date_comment DESC");
 
 ?>


<div id="comment_section">
          
<?php 

if(mysqli_num_rows($raw_comments)!=0){
  ?>
    <h2>Отзывы</h2>
  <?php
}

while($comment = mysqli_fetch_assoc($raw_comments)){ 
  $user_to_comment = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM user_properties WHERE ID_user = {$comment['User_id']}"));
?>
          
          <div class="comment_elem">
            
            <div>
              <?php if($user_to_comment['AvatarPath_user'] == NULL){?><img src="../images/avatar_image.png">
              <?php } else{?> 
                <img src="<?php echo "../".$user_to_comment['AvatarPath_user'];?>"> 
              <?php } ?>

              <h3><?php echo $user_to_comment['NickName_user']; ?></h3>
            </div>

            <p><?php echo $comment['Comment']; ?></p>
            <h4><?php echo $comment['Date_comment']; ?></h4>

          </div><!--Комментарий -->
<?php } ?>
          <h2>Оставьте свой отзыв</h2>
          <div id="add_comment">
            <form action="" method="post">
              <span>Комментарий:</span><textarea id="text_comment" name="text_comment" placeholder="Добавьте Ваш комментарий"></textarea>
              <input id="button_comment" type="submit" >
            </form>
          </div>
</div><!--Отзывы -->

<script>//Проверка на авторизацию


const loggedIN = <?php 
if(isset($_SESSION['loggedin'])){ echo $_SESSION['loggedin'];
  } else {echo 0;}?>


window.addEventListener("click", (event)=>{
  if(event.target == document.getElementById('button_comment')){

    if(loggedIN === 0 && typeof loggedIN !=='undefined'){
      event.preventDefault();
      document.getElementById('pop_window_enter').style.display = 'block';
    }
  } 
} ) 

</script>
