
{foreach item=news from=$source}
{$text}
<b>{$news.title}</b>
<br>
{$news.s_text}
<a href="/mod_news/{$news.id}">{$news.next_text}</a>
<br><br>
{/foreach}