<?php /* Smarty version 2.6.26, created on 2010-08-17 20:19:40
         compiled from modules/Authorization/reg_form.tpl */ ?>
<div id="Authorization">
<?php echo $this->_tpl_vars['text']; ?>

<form action="" method="GET" onSubmit="register_click();return false;">
<div id="register_error"><br></div>
<table>
<tr>
<td>�����:</td>
<td><input id="register_login"></td>
</tr>
<tr>
<td>������:</td>
<td><input id="register_password" type="password"></td>
</tr>
<tr>
<td>�������� ������:</td>
<td><input id="register_password2" type="password"></td>
</tr>
<tr>
<td>E-mail:</td>
<td><input id="register_email"></td>
</tr>
<tr>
<td><input type="submit" value="������������������"></td>
</tr>
</table>
</form>
</div>