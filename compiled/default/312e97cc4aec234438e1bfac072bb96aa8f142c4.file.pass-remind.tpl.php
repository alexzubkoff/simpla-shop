<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 18:26:33
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\pass-remind.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280715be99ba9bd7be5-90890385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '312e97cc4aec234438e1bfac072bb96aa8f142c4' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\pass-remind.tpl',
      1 => 1542036360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280715be99ba9bd7be5-90890385',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be99ba9bdaab6_99166148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be99ba9bdaab6_99166148')) {function content_5be99ba9bdaab6_99166148($_smarty_tpl) {?><div id="password_remind" class="popup-tab hidden" data-tab="password_remind">
    <p class="popup-title">Напомнить пароль</p>
    <form action="user/password_remind" method="post" id="auth-password-remind" class="js-auth-form">
        <input type="hidden" name="action" value="password_remind">
        <div class="form-row">
            <label class="form-label">Email</label>
            <input class="form-input" type="email" name="email" required="">
        </div>
        <p class="alert alert-error hidden js-result"></p>
        <div class="row text-center">
            <div class="col-xs-6 col-xs-push-6 form-row text-right-xs">
                <input type="submit" class="btn" value="Напомнить">
            </div>
            <div class="col-xs-6 col-xs-pull-6 form-row text-left-xs hidden">
                <span class="btn btn-light js-tab-toggle" data-target="login">Войти</span>
            </div>
        </div>
        <div class="success success-remind-pass"><span></span></div>
    </form>
</div><?php }} ?>
