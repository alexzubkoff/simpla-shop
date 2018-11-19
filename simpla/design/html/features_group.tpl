{* Вкладки *}
{capture name=tabs}
	{if in_array('products', $manager->permissions)}<li><a href="index.php?module=ProductsAdmin">Товары</a></li>{/if}
	{if in_array('categories', $manager->permissions)}<li><a href="index.php?module=CategoriesAdmin">Категории</a></li>{/if}
	{if in_array('brands', $manager->permissions)}<li><a href="index.php?module=BrandsAdmin">Бренды</a></li>{/if}
	<li><a href="index.php?module=FeaturesAdmin">Свойства</a></li>
    <li class="active"><a href="index.php?module=FeaturesGroupsAdmin">Группы свойств</a></li>
{/capture}

{if $features_group->id}
{$meta_title = $features_group->name scope=parent}
{else}
{$meta_title = 'Новая группа свойств' scope=parent}
{/if}

{if $message_success}
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text">{if $message_success=='added'}Группа свойств добавлено{elseif $message_success=='updated'}Группа свойств обновлена{else}{$message_success}{/if}</span>
	{if $smarty.get.return}
	<a class="button" href="{$smarty.get.return}">Вернуться</a>
	{/if}
</div>
<!-- Системное сообщение (The End)-->
{/if}

{if $message_error}
<!-- Системное сообщение -->
<div class="message message_error">
	<span>{$message_error}</span>
	<a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
{/if}

<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="{$smarty.session.id}">

	<div id="name">
		<input class="name" name=name type="text" value="{$features_group->name|escape}"/> 
		<input name=id type="hidden" value="{$features_group->id|escape}"/> 
	</div> 

	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Свойства -->	
		<div class="block">
			
         </div>
 
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<!-- Правая колонка свойств товара -->	
	<div id="column_right">
		
		<div class="block layer images">

			<h2>Изображение группы свойств</h2>
            <input class='upload_image' name=image type=file>			
			<input type=hidden name="delete_image" value="">
			{if $features_group->image}
			<ul class="features_groupe">
				<li>
					<a href='#' class="delete features_groupe"><img src='design/images/cross-circle-frame.png'></a>
					<img src="../{$config->features_images_dir}{$features_group->image}" alt="" />
				</li>
			</ul>
			{/if}

		</div>
        
    <input type=hidden name='session_id' value='{$smarty.session.id}'>

	<input class="button_green" type="submit" name="" value="Сохранить" />
	<!-- Правая колонка свойств товара (The End)--> 
		
	</div>

</form>
<!-- Основная форма (The End) -->

