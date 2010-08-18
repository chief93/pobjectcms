<?php /* Smarty version 2.6.26, created on 2010-08-18 14:47:34
         compiled from modules/auth_login/index.tpl */ ?>
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="auth_click();return false;">
<div id="auth_error"><br></div>
Логин: <input id="auth_login"> Пароль: <input id="auth_password" type="password"> <input type="submit" class="submit" value="Войти">
</form>