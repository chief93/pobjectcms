{foreach item=news from=$source}
{$text}
<b>{$news.title}</b>
<br>
{$news.f_text}
<br><br>
{/foreach}

{foreach item=comment from=$comments}
{$text}
<b>{$comment.author}  {$comment.data}</b>
<br>
{$comment.text}
<br><br>
{/foreach}
