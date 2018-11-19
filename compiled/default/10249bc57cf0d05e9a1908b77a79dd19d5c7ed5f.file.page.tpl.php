<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 14:19:49
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7625be961d58632a4-27772520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10249bc57cf0d05e9a1908b77a79dd19d5c7ed5f' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\page.tpl',
      1 => 1492708202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7625be961d58632a4-27772520',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be961d58b0773_47163231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be961d58b0773_47163231')) {function content_5be961d58b0773_47163231($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<!-- Заголовок страницы -->
<h1 data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>

<!-- Тело страницы -->
<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>
<?php }} ?>
