<?php /* Smarty version 2.6.26, created on 2010-08-18 16:13:25
         compiled from modules/news/index.tpl */ ?>
<?php $_from = $this->_tpl_vars['source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
<b><?php echo $this->_tpl_vars['news']['header']; ?>
</b>
<br>
<?php echo $this->_tpl_vars['news']['msg']; ?>
<br><br>
<?php endforeach; endif; unset($_from); ?>