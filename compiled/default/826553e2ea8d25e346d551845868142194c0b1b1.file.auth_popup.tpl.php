<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 18:55:49
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\auth_popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115455be99ac7cb5d48-69276672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '826553e2ea8d25e346d551845868142194c0b1b1' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\auth_popup.tpl',
      1 => 1542038143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115455be99ac7cb5d48-69276672',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be99ac7cb8d88_86065954',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be99ac7cb8d88_86065954')) {function content_5be99ac7cb8d88_86065954($_smarty_tpl) {?><div id="auth" class="popup-tab" data-tab="login">
    <p class="popup-title">Вход в личный кабинет</p>
    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="message_error">
            <?php if ($_smarty_tpl->tpl_vars['error']->value=='login_incorrect') {?>Неверный логин или пароль
            <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_disabled') {?>Ваш аккаунт еще не активирован.
            <?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
        </div>
    <?php }?>
    <form action="user/login" method="post" id="auth-login" class="js-auth-form">
        <input type="hidden" name="action" value="login">
        <div class="form-row">
            <label class="form-label">Email</label>
            <input class="form-input" type="email" name="email" required="" maxlength="255">
        </div>
        <div class="form-row">
            <label class="form-label">Пароль</label>
            <input class="form-input" type="password" name="password" required="">
            <small class="long-link">
                <a href="#password_remind" rel="nofollow" class="modalbox" class="js-tab-toggle" data-target="password_remind">Забыли пароль?</a>
            </small>
        </div>
        <p class="alert alert-error hidden js-result"></p>
        <div class="row text-center">
            <div class="col-xs-6 col-xs-push-6 form-row text-right-xs">
                <input type="submit" class="button" name="login" value="Войти">
            </div>
            <div class="btn">
                <a href="#register" rel="nofollow" class="modalbox"  data-target="register">Зарегистрироваться</a>
            </div>
        </div>
        <div class="success"></div>
    </form>
</div><?php }} ?>
