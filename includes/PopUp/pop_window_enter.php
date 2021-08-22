
<div id = "pop_window_enter" class = "pop_window_class">
	<div>
		<h1>Вход</h1>

		<form action="" method="POST" class=registration_enter_recovery_form>
		<h3>Введите почту:</h3>	
		<input type="email" name="email_enter_form" id="email_enter_form" placeholder="Введите почту"
		value="<?php if(isset($_POST['email_enter_form'])) echo htmlspecialchars($_POST['email_enter_form']); ?>">
		<h3>Введите пароль:</h3>
		<input type="password" name="password_enter_form" id="password_enter_form" minlength="8" maxlength="16" size="16" placeholder="Введите пароль"
		value="<?php if(isset($_POST['password_enter_form'])) echo htmlspecialchars($_POST['password_enter_form']); ?>">
		<h3 id="pop_enter_wrong">Вы ввели неверный логин/пароль!</h3>
		<input type="submit" id="submit_enter_form">
		</form>

		<h2 onclick="" id="form_enter_to_recovery">Забыли пароль?</h2>
		<h2 onclick="" id="form_enter_to_registration">Зарегистрироваться</h2>

		<p onclick="">X</p>
		<span onclick="" class = "eye_icon"> <span></span> </span>

	</div>

</div><!--Всплывающее окно входа -->

