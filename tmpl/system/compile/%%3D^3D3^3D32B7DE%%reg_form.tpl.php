<?php /* Smarty version 2.6.26, created on 2010-08-17 20:00:19
         compiled from modules/Authorization/reg_form.tpl */ ?>
<div id="Authorization">
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET">
<div id="auth_error"><br></div>
<table>
<tr>
<td>Логин:</td>
<td><input id="register_login"></td>
</tr>
<tr>
<td>Пароль:</td>
<td><input id="register_password" type="password"></td>
</tr>
<tr>
<td>Проверка пароля:</td>
<td><input id="register_password2" type="password"></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input id="register_email"></td>
</tr>
<tr>
<td><input type="submit" value="Зарегистрироваться" class="login_submit" id="register_append"></td>
</tr>
</table>
</form>
</div>