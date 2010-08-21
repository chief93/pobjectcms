<?php /* Smarty version 2.6.26, created on 2010-08-21 16:25:45
         compiled from modules/mod_auth_login/index.tpl */ ?>
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="auth_click();return false;" id="mod_auth_login">
<div id="auth_error"><br></div>
Логин: <input id="login"><br> Пароль: <input id="password" type="password"> <br><input type="submit" class="submit" value="Войти">
</form>