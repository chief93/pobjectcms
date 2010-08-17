<?php /* Smarty version 2.6.26, created on 2010-08-17 21:32:22
         compiled from index.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>pObject CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="icon" type="image/png" href="/tmpl/img/favicon.png">
<?php $_from = $this->_tpl_vars['settings']['styles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item'] != ''): ?>
	<link rel="stylesheet" href="<?php echo $this->_tpl_vars['item']; ?>
" type="text/css"/>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['settings']['scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item'] != ''): ?>
	<script type='text/javascript' src='<?php echo $this->_tpl_vars['item']; ?>
'></script>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</head>
<body style="background: url(/tmpl/img/bg.jpg);">

</body>
</html>