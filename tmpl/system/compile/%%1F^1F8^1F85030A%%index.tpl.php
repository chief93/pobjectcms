<?php /* Smarty version 2.6.26, created on 2010-08-20 15:05:01
         compiled from modules/mod_auth_login/index.tpl */ ?>
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="auth_click();return false;">
<div id="auth_error"><br></div>
Логин: <input id="auth_login"><br> Пароль: <input id="auth_password" type="password"> <br><input type="submit" class="submit" value="Войти">
</form>