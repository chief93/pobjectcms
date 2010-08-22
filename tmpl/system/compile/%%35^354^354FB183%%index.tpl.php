<?php /* Smarty version 2.6.26, created on 2010-08-23 01:22:26
         compiled from modules/mod_admin_register/index.tpl */ ?>
﻿<form action="" method="GET" onSubmit="admin_register_click();return false;" id="mod_admin_register">
<table border=1><tr><td rowspan="2">№</td><td rowspan="2">Поле</td><td colspan="2">Проверка пустоты</td><td colspan="2">Проверка оригинальности</td>
<td colspan="2">Проверка соответствия</td><td colspan="2">Проверка регуляркой</td></tr>
<tr><td>?</td><td>Текст ошибки</td><td>?</td>
<td>Текст ошибки</td><td>Соответствие</td><td>Текст ошибки</td><td>Регулярка</td><td>Текст ошибки</td></tr>

<?php $_from = $this->_tpl_vars['source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['foo']['iteration']++;
?>
<tr><td><?php echo $this->_tpl_vars['item']['id']; ?>
</td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['field_name']; ?>
"/ id="text_<?php echo $this->_foreach['foo']['iteration']; ?>
"></td>
<td>
<?php if ($this->_tpl_vars['item']['empty_check'] == 1): ?>
<input type="checkbox" checked id="ch_empty_<?php echo $this->_foreach['foo']['iteration']; ?>
">
<?php else: ?>
<input type="checkbox" id="ch_empty_<?php echo $this->_foreach['foo']['iteration']; ?>
">
<?php endif; ?>
</td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['empty_check_error_text']; ?>
" id="empty_error_<?php echo $this->_foreach['foo']['iteration']; ?>
"/></td>
<td>
<?php if ($this->_tpl_vars['item']['unoriginal_check'] == 1): ?>
<input type="checkbox" checked id="ch_unor_<?php echo $this->_foreach['foo']['iteration']; ?>
">
<?php else: ?>
<input type="checkbox" id="ch_unor_<?php echo $this->_foreach['foo']['iteration']; ?>
">
<?php endif; ?>
</td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['unoriginal_check_error_text']; ?>
" id="unor_error_<?php echo $this->_foreach['foo']['iteration']; ?>
"/></td>
<td><input type="text" value="<?php echo $this->_tpl_vars['item']['equality_check']; ?>
" id="ch_equ_<?php echo $this->_foreach['foo']['iteration']; ?>
"></td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['equality_check_error_text']; ?>
" id="unor_equ_<?php echo $this->_foreach['foo']['iteration']; ?>
"/></td>
<td><input type="text" value="<?php echo $this->_tpl_vars['item']['regular_check']; ?>
" id="ch_reg_<?php echo $this->_foreach['foo']['iteration']; ?>
"></td><td><input type="text" value="<?php echo $this->_tpl_vars['item']['regular_check_error_text']; ?>
" id="unor_reg_<?php echo $this->_foreach['foo']['iteration']; ?>
"/></td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<input type="submit" class="submit" value="Сохранить">
</form>