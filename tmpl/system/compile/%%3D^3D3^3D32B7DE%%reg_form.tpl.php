<?php /* Smarty version 2.6.26, created on 2010-08-17 14:42:37
         compiled from modules/Authorization/reg_form.tpl */ ?>
<div id="Authorization">
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="POST">
<table>
<tr>
<td>Логин:</td>
<td><input name="login" class="reg_field"></td>
</tr>
<tr>
<td>Пароль:</td>
<td><input name="password" type="password" class="reg_field"></td>
</tr>
<tr>
<td>Проверка пароля:</td>
<td><input name="password2" type="password" class="reg_field"></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input name="email" class="reg_field"></td>
</tr>
<tr>
<td><input type="submit" value="Зарегистрироваться" class="reg_submit"></td>
</tr>
</table>
</form>
</div>