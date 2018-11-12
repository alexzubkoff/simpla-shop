<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 13:40:14
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:253595be9588e98a3a6-09734275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c4f1f40ad07c145d12885ea3e7b330d49e7b59f' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\login.tpl',
      1 => 1492708202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253595be9588e98a3a6-09734275',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be9588e9e92e6_13111928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be9588e9e92e6_13111928')) {function content_5be9588e9e92e6_13111928($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/login", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Вход", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
   
<h1>Вход</h1>

<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
<div class="message_error">
	<?php if ($_smarty_tpl->tpl_vars['error']->value=='login_incorrect') {?>Неверный логин или пароль
	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_disabled') {?>Ваш аккаунт еще не активирован.
	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
</div>
<?php }?>

<form class="form login_form" method="post">
	<label>Email</label>
	<input type="text" name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="255" />

    <label>Пароль (<a href="user/password_remind">напомнить</a>)</label>
    <input type="password" name="password" data-format=".+" data-notice="Введите пароль" value="" />

	<input type="submit" class="button" name="login" value="Войти">
</form><?php }} ?>
