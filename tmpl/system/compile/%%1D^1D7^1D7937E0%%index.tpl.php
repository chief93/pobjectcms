<?php /* Smarty version 2.6.26, created on 2010-08-20 15:06:03
         compiled from modules/mod_news/index.tpl */ ?>

<?php $_from = $this->_tpl_vars['source']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
<?php echo $this->_tpl_vars['text']; ?>

<b><?php echo $this->_tpl_vars['news']['title']; ?>
</b>
<br>
<?php echo $this->_tpl_vars['news']['s_text']; ?>

<a href="/mod_news/<?php echo $this->_tpl_vars['news']['id']; ?>
"><?php echo $this->_tpl_vars['news']['next_text']; ?>
</a>
<br><br>
<?php endforeach; endif; unset($_from); ?>