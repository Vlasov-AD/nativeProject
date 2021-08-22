
<div id = "pop_window_registration" class = "pop_window_class">
	<div >
		<h1>Регистрация</h1>
		<form action="" method="POST" class=registration_enter_recovery_form>
		<h3>Введите почту:</h3>	
		<input type="email" name="email_register_form" id="email_register_form" placeholder="Введите почту"
		value="<?php if($_POST['email_register_form']) echo htmlspecialchars($_POST['email_register_form'])?>">
		<h3>Введите пароль:</h3>
		<input type="password" name="password_register_form" id="password_register_form" minlength="8" maxlength="16" size="16" placeholder="Введите пароль"
		value="<?php if($_POST['password_register_form']) echo htmlspecialchars($_POST['password_register_form'])?>">
		<h3 id="pop_registration_wrong">Вы ввели неверный логин/пароль!</h3>
		<input type="submit" id="submit_register_form">
		</form>
		<h2 onclick="" id="form_registration_to_enter">Уже зарегистрированы?</h2>
		<p onclick="">X</p>
		<span onclick="" class = "eye_icon"> <span></span> </span>

	</div>
</div><!--Всплывающее окно регистрации -->