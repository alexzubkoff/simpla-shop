<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 17:37:15
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148585be9901b5c7fb4-30065336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8438f806f0aa642e0606a5f121a7fdd6ecf67c50' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\user.tpl',
      1 => 1492708202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148585be9901b5c7fb4-30065336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'error' => 0,
    'name' => 0,
    'email' => 0,
    'orders' => 0,
    'order' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be9901b656fd7_73062101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be9901b656fd7_73062101')) {function content_5be9901b656fd7_73062101($_smarty_tpl) {?>

<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="message_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>Введите email
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_password') {?>Введите пароль
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_exists') {?>Пользователь с таким email уже зарегистрирован
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
</div>
<?php }?>

<form class="form" method="post">
	<label>Имя</label>
	<input data-format=".+" data-notice="Введите имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="name" maxlength="255" type="text"/>
 
	<label>Email</label>
	<input data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="email" maxlength="255" type="text"/>
	
	<label><a href='#' onclick="$('#password').show();return false;">Изменить пароль</a></label>
	<input id="password" value="" name="password" type="password" style="display:none;"/>
	<input type="submit" class="button" value="Сохранить">
</form>

<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
<p></p>
<h2>Ваши заказы</h2>
<ul id="orders_history">
<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
	<li>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 <a href='order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
'>Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>оплачен,<?php }?> 
	<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>ждет обработки<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?>
	</li>
<?php } ?>
</ul>
<?php }?><?php }} ?>
