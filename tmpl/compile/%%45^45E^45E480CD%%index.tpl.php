<?php /* Smarty version 2.6.26, created on 2010-08-17 01:09:32
         compiled from index.tpl */ ?>
Hello <?php echo $this->_tpl_vars['name']; ?>
!
<?php $_from = $this->_tpl_vars['system']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	<br><?php echo $this->_tpl_vars['item']; ?>

<?php endforeach; endif; unset($_from); ?>