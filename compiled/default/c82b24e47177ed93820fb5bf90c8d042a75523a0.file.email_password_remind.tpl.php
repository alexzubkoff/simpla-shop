<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 17:40:56
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\email_password_remind.tpl" */ ?>
<?php /*%%SmartyHeaderCode:236885be990f87cd853-83277336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c82b24e47177ed93820fb5bf90c8d042a75523a0' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\email_password_remind.tpl',
      1 => 1492708202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236885be990f87cd853-83277336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'config' => 0,
    'settings' => 0,
    'code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be990f8823563_71784516',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be990f8823563_71784516')) {function content_5be990f8823563_71784516($_smarty_tpl) {?>
	
<?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable('Новый пароль', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<html>
	<body>
		<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true);?>
, на сайте <a href='http://<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/'><?php echo $_smarty_tpl->tpl_vars['settings']->value->site_name;?>
</a> был сделан запрос на восстановление вашего пароля.</p>
		<p>Вы можете изменить пароль, перейдя по следующей ссылке:</p>
		<p><a href='<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/user/password_remind/<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
'>Изменить пароль</a></p>
		<p>Эта ссылка действует в течение нескольких минут.</p>
		<p>Если это письмо пришло вам по ошибке, проигнорируйте его.</p>
	</body>
</html>

<?php }} ?>
