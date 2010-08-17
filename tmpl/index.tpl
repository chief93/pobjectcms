<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>pObject CMS</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="icon" type="image/png" href="/tmpl/img/favicon.png">
{foreach item=item from=$settings.styles}
{if $item != ''}
	<link rel="stylesheet" href="{$item}" type="text/css"/>
{/if}
{/foreach}
{foreach item=item from=$settings.scripts}
{if $item != ''}
	<script type='text/javascript' src='{$item}'></script>
{/if}
{/foreach}
</head>
<body>
<div id="logo">
<img src="/tmpl/img/logo.jpg" style="width: 100%; height: 100%;">
</div>
<div id="page_dir">
<div class="inherit">
[Тут будет дерево пути до страницы]
</div>
</div>
<div id="login_form">
<div class="inherit">
{$auth_form}
</div>
</div>
<div id="page_body">
<div class="inherit">
{$module_body}
</div>
</div>
</body>
</html>
