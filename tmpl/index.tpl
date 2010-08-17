{foreach item=item from=$settings.scripts}
{if $item != ''}
	<script type='text/javascript' src='{$item}'></script>
{/if}
{/foreach}
{foreach item=item from=$settings.styles}
{if $item != ''}
	<link rel="stylesheet" href="{$item}" type="text/css"/>
{/if}
{/foreach}
{$body}