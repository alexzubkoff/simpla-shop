{* Страница товара *}

{* Канонический адрес страницы *}
{$canonical="/products/{$product->url}" scope=parent}

<div class="container">
    <div class="row">
        <div class="col-">
            {* Categories trigger *}
            <div class="sidebar-trigger button button--default button--blue button--full-width" data-container="sidebar__inner" data-body="true" data-overlay="sidebar-overlay" data-bundle-outside="true">Открыть каталог</div>
            {* Categories trigger (END) *}
        </div>
        {* Sidebar *}
        {include file='sidebar.tpl'}
        {* Sidebar (END) *}
        <div class="col-md-8 col-lg-9">
            {* Breadcrumbs *}
            {include file='breadcrumbs.tpl'}
            {* Breadcrumbs (END) *}
            {* Product *}
            <article class="product js-product">
                <h1 class="title" data-product="{$product->id}">{$product->name|escape}</h1>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product__images">
                            <div class="product__main-image image">
                                <a class="image__inner js-image js-image--big{if $product->images|count < 2} fancy{/if}" href="{$product->image->filename|resize:800:600:w}" data-id="{$product->image->id}" data-fancybox-group="product-images">
                                    <img src="{$product->image->filename|resize:290:290}" alt="{$product->name|escape}" />
                                </a>
                            </div>
                            {if $product->images|count > 1}
                                <div class="product__gallery product-gallery">
                                    {foreach $product->images as $i}
                                        <div class="product-gallery__image image inline-block">
                                            <a class="image__inner fancy js-change-image" href="{$i->filename|resize:800:600:w}" data-id="{$i->id}" data-src="{$i->filename|resize:290:290}" data-fancybox-group="product-images">
                                                <img src="{$i->filename|resize:70:70}" alt="{$product->name|escape}" />
                                            </a>
                                        </div>
                                    {/foreach}
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product__info">
                            <div class="product__prices">
                                <span class="product__price product__price--old inline-block inline-block--middle js-price--old{if !$product->variant->compare_price} none{/if}">
                                    {$product->variant->compare_price|convert}
                                </span>
                                <span class="product__price product__price--current inline-block inline-block--middle js-price--current">
                                    {$product->variant->price|convert}
                                </span>
                                <span class="product__currency inline-block inline-block--middle">
                                    {$currency->sign}
                                </span>
                            </div>
                            <div class="clearfix">
                                <div class="product__availability left">
                                    <span class="product__availability-title">Наличие:</span>
                                    {if $product->variant->stock}
                                        <span class="product__availability-value text-green js-availability">В наличии</span>
                                    {else}
                                        <span class="product__availability-value text-red js-availability">Нет в наличии</span>
                                    {/if}
                                </div>
                                <div class="product__variant-sku left js-sku{if !$product->variant->sku} none{/if}">
                                    <span class="product__variant-sku-title">Артикул: </span>
                                    <span class="product__variant-sku-value js-sku__value">{$product->variant->sku}</span>
                                </div>
                            </div>
                            <form {if $product->variants|count > 1}id="product-variants"{/if} class="variants" action="cart" data-outside="true" data-otherdrops="true">
                                {if $product->variants|count > 1}
                                    <div class="product__variants product-variants dd-dropdown" data-level="1">
                                        <div class="product-variants__variant product-variants__variant--chosen js-variant--chosen">
                                            {$product->variant->name|escape|default:"Без названия"}
                                        </div>
                                        <div class="product-variants__arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
                                                <path d="M0-.75h24v24H0z" fill="none"/>
                                            </svg>
                                        </div>
                                        <div class="product-variants__list dd-drop">
                                            {foreach $product->variants as $v}
                                                <input id="product-variant-{$v->id}" class="input-hidden" type="radio" name="variant" value="{$v->id}" {if $v@first}checked="checked"{/if} />
                                                <label class="product-variants__variant js-change-variant{if $v@first} product-variants__variant--active js-change-variant--active{else} product-variants__variant--inactive{/if}" for="product-variant-{$v->id}" data-price="{$v->price|convert}" data-id="{$v->id}" {if $v->compare_price}data-price-old="{$v->compare_price|convert}"{/if} {if $v->sku}data-sku="{$v->sku}"{/if} {if $v->stock}data-stock="true"{/if}>
                                                    {$v->name|escape|default:"Без названия"}
                                                </label>
                                            {/foreach}
                                        </div>
                                    </div>
                                {else}
                                    <input class="input-hidden" type="radio" name="variant" value="{$product->variant->id}" checked="checked" />
                                {/if}
                                <div class="product__amount">
                                    <div class="spinner spinner--product">
                                        <input class="spinner__field sp-field js-amount" type="text" name="amounts[{$product->variant->id}]" value="1" data-step="1" data-from="1" data-to="50" />
                                        <span class="spinner__control spinner__control--plus sp-control sp-control--plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                                <path d="M0 0h24v24H0z" fill="none"/>
                                            </svg>
                                        </span>
                                        <span class="spinner__control spinner__control--minus sp-control sp-control--minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19 13H5v-2h14v2z"/>
                                                <path d="M0 0h24v24H0z" fill="none"/>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="product__buttons">
                                    <button class="button button--big button--full-width button--blue js-button{if !$product->variant->stock} none{/if}" data-result-text="Добавлено">В корзину<span class="circle"></span></button>
                                </div>
                                {if $product->annotation}
                                    <div class="product__annotation default-text">
                                        {$product->annotation}
                                    </div>
                                {/if}
                            </form>
                        </div>
                    </div>
                </div>
            </article>
            {* Product (END) *}
            {* Product tabs *}
            <div id="product-tabs" class="product-tabs">
                <ul class="product-tabs__nav">
                    {* features_groups *}
                    {if $product->grouped_features}
                        <li class="product-tabs__link product-tabs__link--outer t-tab-nav-item t-tab-nav-item--active_desctop" data-tab="4">Характеристики по группам</li>
                    {/if}
                    {* features_groups /*}
                    {if $product->features}
                        <li class="product-tabs__link product-tabs__link--outer t-tab-nav-item" data-tab="1">Характеристики</li>
                    {/if}
                    <li class="product-tabs__link product-tabs__link--outer t-tab-nav-item{if !$product->features} t-tab-nav-item--active_desctop{/if}" data-tab="2">Описание</li>
                    <li class="product-tabs__link product-tabs__link--outer t-tab-nav-item" data-tab="3">Комментарии {if $comments|count}({$comments|count}){/if}</li>
                </ul>
                <div class="product-tabs__content">
                    {* features_groups *}
                    {if $product->grouped_features}
                        <div class="product-tabs__link product-tabs__link--inner t-tab-content-nav-item" data-tab="1">Характеристики</div>
                        <div class="product-tabs__item t-tab-item t-tab-item--active_desctop" data-tab="1">
                            <div class="product-tabs__inner">
                                <table class="product-features">
                                    {foreach $product->grouped_features as $features_group}
                                        <tr class="product-features__item">
                                            <td class="product-features__feature-name"><strong>{$features_group->group->name|escape}</strong></td>
                                            <td class="product-features__feature-value">{if $features_group->group->image}<img src="../{$config->features_images_dir}{$features_group->group->image}" alt="{$features_group->group->name|escape}" />{/if}</td>
                                        </tr>
                                        {foreach $features_group->features as $f}
                                            <tr class="product-features__item">
                                                <td class="product-features__feature-name">{$f->name|escape|indent:10:"&nbsp;"}</td>
                                                <td class="product-features__feature-value">{$f->value|escape}</td>
                                            </tr>
                                        {/foreach}
                                    {/foreach}
                                </table>
                            </div>
                        </div>
                    {/if}
                    {* features_groups /*}
                    {if $product->features}
                        <div class="product-tabs__link product-tabs__link--inner t-tab-content-nav-item" data-tab="1">Характеристики</div>
                        <div class="product-tabs__item t-tab-item" data-tab="1">
                            <div class="product-tabs__inner">
                                <table class="product-features">
                                    {foreach $product->features as $f}
                                        <tr class="product-features__item">
                                            <td class="product-features__feature-name">{$f->name|escape}</td>
                                            <td class="product-features__feature-value">{$f->value|escape}</td>
                                        </tr>
                                    {/foreach}
                                </table>
                            </div>
                        </div>
                    {/if}
                    <div class="product-tabs__link product-tabs__link--inner t-tab-content-nav-item" data-tab="2">Описание</div>
                    <div class="product-tabs__item{if !$product->features} t-tab-item--active_desctop{/if} t-tab-item" data-tab="2">
                        <div class="product-tabs__inner">
                            <div class="default-text">
                                {if $product->body}
                                    {$product->body}
                                {else}
                                    Описание товара {$product->name|escape} готовится
                                {/if}
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs__link product-tabs__link--inner t-tab-content-nav-item" data-tab="3">Комментарии {if $comments|count}({$comments|count}){/if}</div>
                    <div class="product-tabs__item t-tab-item" data-tab="3">
                        <div class="product-tabs__inner">
                            {if $comments|count}
                                <div class="reviews">
                                    {foreach $comments as $comment}
                                        <div class="reviews__item review">
                                            <div class="review__header">
                                                <span class="review__author">{$comment->name|escape}</span>
                                                <time class="review__date" datetime="{$comment->date|date_format:'%Y-%m-%d'}">{$comment->date|date}</time>
                                            </div>
                                            <div class="review__body default-text">
                                                {$comment->text|escape|nl2br}
                                            </div>
                                        </div>
                                    {/foreach}
                                </div>
                            {/if}
                            <h2 class="subtitle">Оставить отзыв</h2>
                            <form method="POST">
                                <fieldset class="form form--margin_no">
                                    {if $error}
                                        <div class="error">
                                            {if $error=='captcha'}
                                                Неверно введена капча
                                            {elseif $error=='empty_name'}
                                                Введите имя
                                            {elseif $error=='empty_comment'}
                                                Введите комментарий
                                            {/if}
                                            <div class="error__close">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="currentColor">
                                                    <path d="M0 0h18v18H0zm0 0h18v18H0z" fill="none"/>
                                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    {/if}
                                    <div class="form-group">
                                        <label class="form-group__title" for="review-name">Имя <span class="form-group__required">*</span></label>
                                        <input id="review-name" class="form-field form-group__field" type="text" name="name" value="{$comment_name}" data-pattern=".+" data-notice="Введите имя" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-group__title" for="review-comment">Комментарий <span class="form-group__required">*</span></label>
                                        <textarea id="review-comment" class="form-field form-group__area" name="text" data-pattern=".+" data-notice="Введите комментарий">{$comment_text}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-group__title" for="review-captcha">Число с картинки <span class="form-group__required">*</span></label>
                                        <div class="form-captcha">
                                            <div class="table">
                                                <div class="form-captcha__image cell cell--middle">
                                                    <img src="captcha/image.php?{math equation='rand(10,10000)'}" alt="captcha" />
                                                </div>
                                                <div class="cell cell--middle">
                                                    <input id="review-captcha" class="form-field form-captcha__field" type="text" name="captcha_code" value="" data-pattern="\d\d\d\d\d" data-notice="Введите число с картинки" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="button button--default button--blue" type="submit">Отправить</button>
                                        <input type="hidden" name="comment" value="1" />
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {* Product tabs *}
            {* Back-forwards *}
            <div class="back-forwards">
                <h2 class="title">Соседние товары</h2>
                {if $prev_product}
                    <a class="back-forwards__link back-forwards__link--prev link link--underline" href="products/{$prev_product->url}">&lt; {$prev_product->name|escape}</a>
                {/if}
                {if $next_product}
                    <a class="back-forwards__link back-forwards__link--next link link--underline" href="products/{$next_product->url}">{$next_product->name|escape} &gt;</a>
                {/if}
            </div>
            {* Back-forwards (END) *}
            {* Related products *}
            {if $related_products}
                <div class="carousel block">
                    <h2 class="title">Связанные товары</h2>
                    <div id="products--related" class="row swiper-container">
                        <div class="products products--related swiper-wrapper">
                            {foreach $related_products as $product}
                                <div class="products__item product-preview col-mb-6 col-lg-4 swiper-slide js-product">
                                    <div class="product-preview__inner">
                                        <div class="product-preview__image image">
                                            <a class="image__inner js-image" href="products/{$product->url}">
                                                {if $product->image}
                                                    <img src="{$product->image->filename|resize:290:290}" alt="{$product->name|escape}" />
                                                {else}
                                                    <img src="design/{$settings->theme}/images/logo.png" alt="{$product->name|escape}" />
                                                {/if}
                                            </a>
                                        </div>
                                        <div class="product-preview__info">
                                            <h3 class="product-preview__name">
                                                <a class="product-preview__link link" href="products/{$product->url}">{$product->name|escape|strip_tags|truncate:34}</a>
                                            </h3>
                                            <div class="product-preview__prices">
                                                {if $product->variant->compare_price}
                                                    <span class="product-preview__price product-preview__price--old inline-block">{$product->variant->compare_price|convert}</span>
                                                {/if}
                                                <span class="product-preview__price product-preview__price--current inline-block">{$product->variant->price|convert}</span>
                                                <span class="product-preview__currency inline-block">{$currency->sign}</span>
                                            </div>
                                            {if $product->variant->stock}
                                                <form class="variants" action="cart">
                                                    <input class="input-hidden" type="radio" name="variant" value="{$product->variant->id}" checked="checked" />
                                                    <div class="text-center">
                                                        <input class="button button--default button--blue" type="submit" value="В корзину" data-result-text="Добавлено" />
                                                    </div>
                                                </form>
                                            {else}
                                                <div class="text-center">
                                                    <span class="button button--default button--disabled">Нет в наличии</span>
                                                </div>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                    {* Carousel controls *}
                    <div class="carousel__controls">
                        <span id="carousel-control-related--prev" class="carousel__control carousel__control--prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48" fill="currentColor">
                                <path d="M30.83 32.67l-9.17-9.17 9.17-9.17L28 11.5l-12 12 12 12z"/>
                                <path d="M0-.5h48v48H0z" fill="none"/>
                            </svg>
                        </span>
                        <span id="carousel-control-related--next" class="carousel__control carousel__control--next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 48 48" fill="currentColor">
                                <path d="M17.17 32.92l9.17-9.17-9.17-9.17L20 11.75l12 12-12 12z"/>
                                <path d="M0-.25h48v48H0z" fill="none"/>
                            </svg>
                        </span>
                    </div>
                    {* Carousel controls (END) *}
                </div>
            {/if}
            {* Related products (END) *}
        </div>
    </div>
</div>