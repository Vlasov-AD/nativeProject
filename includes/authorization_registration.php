<?php 

if(isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true){
	
?>
<script>
	document.getElementById('enter_in_nav').style.display='none';
</script>
<?php
} else{

	if (isset($_POST['email_enter_form']) 
		and isset($_POST['password_enter_form'])) {
		$connection = mysqli_connect('localhost', 'mysql', 'mysql', 'project_db'); 
		$email = htmlspecialchars($_POST['email_enter_form']);
		$password = htmlspecialchars($_POST['password_enter_form']);
		$userData = mysqli_fetch_assoc(mysqli_query($connection,"SELECT * FROM user_properties WHERE Email_user = \"$email\""));

		if($userData['Password_user']==md5($password)){//если авторизовались
			
			$_SESSION['UserID'] = $userData['ID_user'];
			$_SESSION['EmailUser'] = $userData['Email_user'];
			$_SESSION['NickName'] = $userData['NickName_user'];
			$_SESSION['AvatarPath'] = $userData['AvatarPath_user'];
			$_SESSION['Privilege'] = $userData['Privilege_user'];
			$_SESSION['loggedin'] = true; 
		
?>
<script>
      window.location = window.location.href;

</script>

<?php

		} else{//если пароль не верный открываем окно входа?>

			<script>
				document.getElementById('pop_enter_wrong').style.display = 'inline-block';
				document.getElementById('pop_window_enter').style.display = 'block';
			</script>
<?php	}
	} 
}

//Регистрация пользователя

if(!empty($_POST['email_register_form']) 
	and !empty($_POST['password_register_form'])
	and !isset($_SESSION['loggedin']) 
	and $_SESSION['loggedin']==false){



	$email = htmlspecialchars($_POST['email_register_form']);
	$password = md5(htmlspecialchars($_POST['password_register_form']));
	$connection  = mysqli_connect('localhost', 'mysql', 'mysql', 'project_db'); 

	$is_exist_mail = mysqli_fetch_assoc(mysqli_query($connection, "SELECT COUNT(*) as numb FROM user_properties WHERE Email_user = '$email'"));
	
	if($is_exist_mail['numb'] == 0){

	mysqli_query($connection,"
		INSERT INTO user_properties (Email_user, Password_user, Privilege_user) 
		VALUES ('$email', '$password', 0)");
	$NickName = mysqli_fetch_assoc(mysqli_query($connection,"
		SELECT * FROM user_properties 
		WHERE Email_user = '$email'"));

	$Nick = "User".$NickName['ID_user'];
	mysqli_query($connection,"
		UPDATE user_properties 
		SET NickName_user = '$Nick' 
		WHERE Email_user = '$email' ");

	$_SESSION['UserID'] = $NickName['ID_user'];
	$_SESSION['EmailUser'] = $email;
	$_SESSION['NickName'] = $Nick;
	$_SESSION['AvatarPath'] = '';
	$_SESSION['Privilege'] = 0;
	$_SESSION['loggedin'] = true; 
?>

<script>
     window.location = window.location.href;
</script>

<?php
} else {?>
			<script>
				document.getElementById('pop_registration_wrong').style.display = 'inline-block';
				document.getElementById('pop_window_registration').style.display = 'block';
			</script>
<?php
}
}


?>