<?php /* Smarty version 2.6.26, created on 2010-08-17 20:40:40
         compiled from modules/Authorization/auth_form.tpl */ ?>
<div id="Authorization">
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="auth_click();return false;">
<div id="auth_error"><br></div>
<table>
<tr>
<td>Логин:</td>
<td><input id="auth_login"></td>
</tr>
<tr>
<td>Пароль:</td>
<td><input id="auth_password" type="password"></td>
</tr>
<tr>
<td><input type="submit" value="Войти"></td>
</tr>
</table>
</form>
</div>