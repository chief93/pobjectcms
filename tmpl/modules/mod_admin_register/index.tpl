<form action="" method="GET" onSubmit="admin_register_click();return false;" id="mod_admin_register">
<table border=1><tr><td rowspan="2">№</td><td rowspan="2">Поле</td><td colspan="2">Проверка пустоты</td><td colspan="2">Проверка оригинальности</td>
<td colspan="2">Проверка соответствия</td><td colspan="2">Проверка регуляркой</td></tr>
<tr><td>?</td><td>Текст ошибки</td><td>?</td>
<td>Текст ошибки</td><td>Соответствие</td><td>Текст ошибки</td><td>Регулярка</td><td>Текст ошибки</td></tr>

{foreach item=item from=$source name=foo}
<tr><td>{$item.id}</td><td><input type="text" value="{$item.field_name}"/ id="text_{$smarty.foreach.foo.iteration}"></td>
<td>
{if $item.empty_check==1}
<input type="checkbox" checked id="ch_empty_{$smarty.foreach.foo.iteration}">
{else}
<input type="checkbox" id="ch_empty_{$smarty.foreach.foo.iteration}">
{/if}
</td><td><input type="text" value="{$item.empty_check_error_text}" id="empty_error_{$smarty.foreach.foo.iteration}"/></td>
<td>
{if $item.unoriginal_check==1}
<input type="checkbox" checked id="ch_unor_{$smarty.foreach.foo.iteration}">
{else}
<input type="checkbox" id="ch_unor_{$smarty.foreach.foo.iteration}">
{/if}
</td><td><input type="text" value="{$item.unoriginal_check_error_text}" id="unor_error_{$smarty.foreach.foo.iteration}"/></td>
<td><input type="text" value="{$item.equality_check}" id="ch_equ_{$smarty.foreach.foo.iteration}"></td><td><input type="text" value="{$item.equality_check_error_text}" id="unor_equ_{$smarty.foreach.foo.iteration}"/></td>
<td><input type="text" value="{$item.regular_check}" id="ch_reg_{$smarty.foreach.foo.iteration}"></td><td><input type="text" value="{$item.regular_check_error_text}" id="unor_reg_{$smarty.foreach.foo.iteration}"/></td></tr>
{/foreach}
</table>
<input type="submit" class="submit" value="Сохранить">
</form>