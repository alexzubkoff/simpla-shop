{* Вкладки *}
{capture name=tabs}
	{if in_array('settings', $manager->permissions)}<li><a href="index.php?module=SettingsAdmin">Настройки</a></li>{/if}
	{if in_array('currency', $manager->permissions)}<li><a href="index.php?module=CurrencyAdmin">Валюты</a></li>{/if}
	{if in_array('delivery', $manager->permissions)}<li><a href="index.php?module=DeliveriesAdmin">Доставка</a></li>{/if}
	{if in_array('payment', $manager->permissions)}<li><a href="index.php?module=PaymentMethodsAdmin">Оплата</a></li>{/if}
	{if in_array('managers', $manager->permissions)}<li><a href="index.php?module=ManagersAdmin">Менеджеры</a></li>{/if}
    <li class="active"><a href="index.php?module=RedirectsAdmin">Короткие ссылки</a></li>
{/capture}

{if $redirect->id}
    {$meta_title = $redirect->name scope=parent}
{else}
    {$meta_title = 'Новая страница' scope=parent}
{/if}


{* On document load *}
{literal}
<script src="design/js/jquery/jquery.js"></script>
<script src="design/js/jquery/jquery-ui.min.js"></script>


<script>
$(function() {

	
});



</script>


{/literal}


{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">{if $message_success == 'added'}Ссылка добавлена{elseif $message_success == 'updated'}Ссылка обновлена{/if}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text">{if $message_error == 'url_exists'}Ссылка с таким адресом уже существует{/if}</span>
	<a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}



<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
	<input type=hidden name="session_id" value="{$smarty.session.id}">
	<div id="name">
		<input class="name" name=name type="text" value="{$redirect->name|escape}"/> 
		<input name=id type="hidden" value="{$redirect->id|escape}"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" {if $redirect->visible}checked{/if} placeholder="Название ссылки"/> <label for="active_checkbox">Активна</label>
		</div>
	</div> 
    
    <div id="name">
		{$config->root_url}/
        <input class="name" name=from_url type="text" value="{$redirect->from_url|escape}" placeholder="Короткая ссылка"/>
	</div>
    
    <div id="name">
		Относительная ссылка вида <strong>products/product-url</strong><br />
        или абсолютная ссылка на текущий или сторонний ресурс вида <strong>{$config->root_url}/products/product-url</strong>
        <input class="name" name=to_url type="text" value="{$redirect->to_url|escape}" placeholder="Конечная ссылка"/> 
	</div>
	
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->

