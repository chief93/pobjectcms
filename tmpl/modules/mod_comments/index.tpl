{foreach item=comments from=$source}
<b>{$comments.login}</b>
<br>
{$comments.msg}<br><br>
{/foreach}