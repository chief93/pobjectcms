{foreach item=news from=$source}
{$text}
<b>{$news.title}</b>
<br>
{$news.f_text}
<br><br>
{/foreach}