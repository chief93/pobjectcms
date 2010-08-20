<?php /* Smarty version 2.6.26, created on 2010-08-20 15:05:01
         compiled from modules/mod_menu/index.tpl */ ?>
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	<br><a href='<?php echo $this->_tpl_vars['item']['link']; ?>
'><?php echo $this->_tpl_vars['item']['name']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>