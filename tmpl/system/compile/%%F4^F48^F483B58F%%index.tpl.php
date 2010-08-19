<?php /* Smarty version 2.6.26, created on 2010-08-20 02:48:24
         compiled from modules/mod_auth_register/index.tpl */ ?>
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="register_click();return false;"id="mod_auth_register">
<div id="register_error"><br></div>
<table>
<tr>
<td>Логин:</td>
<td><input id="login"></td>
</tr>
<tr>
<td>Пароль:</td>
<td><input id="password" type="password"></td>
</tr>
<tr>
<td>Проверка пароля:</td>
<td><input id="password2" type="password"></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input id="email"></td>
</tr>
<tr>
<td><input type="submit" value="Зарегистрироваться"></td>
</tr>
</table>
</form>