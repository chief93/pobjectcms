<?php /* Smarty version 2.6.26, created on 2010-08-17 22:47:47
         compiled from modules/Authorization/auth_form.tpl */ ?>
<div id="Authorization">
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="auth_click();return false;">
<div id="auth_error"><br></div>
Логин: <input id="auth_login"> Пароль: <input id="auth_password" type="password"> <input type="submit" class="submit" value="Войти">
</form>
</div>