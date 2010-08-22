<?php /* Smarty version 2.6.26, created on 2010-08-23 00:10:46
         compiled from modules/mod_admin_register/index.tpl */ ?>
﻿<form action="" method="GET" onSubmit="admin_register_click();return false;" id="mod_admin_register">
<table border=1><tr><td rowspan="2">№</td><td rowspan="2">field_name</td><td colspan="2">Проверка пустоты</td><td colspan="2">Проверка оригинальности</td>
<td colspan="2">Проверка соответствия</td><td colspan="2">Проверка регуляркой</td></tr>
<tr><td>?</td><td>Текст ошибки</td><td>?</td>
<td>Текст ошибки</td><td>Соответствие</td><td>Текст ошибки</td><td>Регулярка</td><td>Текст ошибки</td></tr>

<?php $_from = $this->_tpl_vars['source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<tr><td><?php echo $this->_tpl_vars['item']['id']; ?>
</td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['field_name']; ?>
"/ id="odin<?php echo $this->_tpl_vars['item']['id']; ?>
"></td>
<td>
<?php if ($this->_tpl_vars['item']['empty_check'] == 1): ?>
<input type="checkbox" checked>
<?php else: ?>
<input type="checkbox">
<?php endif; ?>
</td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['empty_check_error_text']; ?>
"/></td>
<td>
<?php if ($this->_tpl_vars['item']['unoriginal_check'] == 1): ?>
<input type="checkbox" checked>
<?php else: ?>
<input type="checkbox">
<?php endif; ?>
</td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['unoriginal_check_error_text']; ?>
"/></td>
<td><input type="text" value="<?php echo $this->_tpl_vars['item']['equality_check']; ?>
"></td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['equality_check_error_text']; ?>
"/></td>
<td><input type="text" value="<?php echo $this->_tpl_vars['item']['regular_check']; ?>
"></td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['regular_check_error_text']; ?>
"/></td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<input type="submit" class="submit" value="Сохранить">
</form>