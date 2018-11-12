<?php /* Smarty version Smarty-3.1.18, created on 2018-11-12 18:45:00
         compiled from "C:\OSPanel\domains\localhost\okay-cms\design\default\html\register-popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287855be99b35980416-90120785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '375577d9fbb6ef64d6789581a41a52195e8cdca7' => 
    array (
      0 => 'C:\\OSPanel\\domains\\localhost\\okay-cms\\design\\default\\html\\register-popup.tpl',
      1 => 1542037309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287855be99b35980416-90120785',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5be99b3598bda2_91674761',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5be99b3598bda2_91674761')) {function content_5be99b3598bda2_91674761($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'C:\\OSPanel\\domains\\localhost\\okay-cms\\Smarty\\libs\\plugins\\function.math.php';
?><div id="register" class="popup-tab hidden" data-tab="register">
    <p class="popup-title">Регистрация</p>
    <form action="user/register" method="post" id="auth-register" class="js-auth-form">
        <input type="hidden" name="action" value="register">
        <div class="form-row">
            <label class="form-label">Имя</label>
            <input class="form-input" type="text" name="name" required="" maxlength="255">
        </div>
        <div class="form-row">
            <label class="form-label">Email</label>
            <input class="form-input" type="email" name="email" required="" maxlength="255">
        </div>
        <div class="form-row">
            <label class="form-label">Пароль</label>
            <input class="form-input" type="password" name="password" required="">
        </div>
        <div class="captcha"><img src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
"/></div>
        <input class="input_captcha" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу"/>

        <p class="alert alert-error hidden js-result"></p>
        <div class="row text-center">
            <div class="col-xs-6 col-xs-push-6 form-row text-right-xs">
                <input type="submit" class="button" name="register" value="Зарегистрироваться">
            </div>
            <div class="col-xs-6 col-xs-pull-6 form-row text-left-xs">
                <a href="#auth" rel="nofollow" class="modalbox">Уже зарегистрированы?</a>
            </div>
        </div>
        <div class="success"></div>
    </form>
</div><?php }} ?>
