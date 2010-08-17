<?php /* Smarty version 2.6.26, created on 2010-08-17 18:02:44
         compiled from index.tpl */ ?>
<?php $_from = $this->_tpl_vars['settings']['scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item'] != ''): ?>
	<script type='text/javascript' src='<?php echo $this->_tpl_vars['item']; ?>
'></script>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php echo $this->_tpl_vars['body']; ?>