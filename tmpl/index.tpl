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

<table>
<tr valign="top">
<td width="200">
{$left}
</td>
<td width="200">
{$center}
</td>
<td>
{$right}
</td>
<tr>
</table>

</body>
</html>
