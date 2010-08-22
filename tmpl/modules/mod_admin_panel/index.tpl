{foreach item=item from=$source}
<a href='/admin/{$item.link}/'>{$item.name}</a><br>
{/foreach}