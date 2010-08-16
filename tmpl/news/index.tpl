{foreach item=news from=$source}
<b>{$news.header}</b>
<br>
{$news.msg}<br><br>
{/foreach}