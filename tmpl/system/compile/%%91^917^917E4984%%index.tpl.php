<?php /* Smarty version 2.6.26, created on 2010-08-22 20:52:06
         compiled from modules/mod_admin_panel/index.tpl */ ?>
<?php $_from = $this->_tpl_vars['source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<a href='/admin/<?php echo $this->_tpl_vars['item']['link']; ?>
/'><?php echo $this->_tpl_vars['item']['name']; ?>
</a><br>
<?php endforeach; endif; unset($_from); ?>