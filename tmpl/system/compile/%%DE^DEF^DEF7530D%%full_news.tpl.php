<?php /* Smarty version 2.6.26, created on 2010-08-18 23:56:55
         compiled from modules/mod_news/full_news.tpl */ ?>
<?php $_from = $this->_tpl_vars['source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
<?php echo $this->_tpl_vars['text']; ?>

<b><?php echo $this->_tpl_vars['news']['title']; ?>
</b>
<br>
<?php echo $this->_tpl_vars['news']['f_text']; ?>

<br><br>
<?php endforeach; endif; unset($_from); ?>