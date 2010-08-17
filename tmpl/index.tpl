{foreach item=item from=$settings.scripts}
{if $item != ''}
	<script type='text/javascript' src='{$item}'></script>
{/if}
{/foreach}
{$body}