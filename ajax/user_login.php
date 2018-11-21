<?php
session_start();
chdir('..');
require_once('api/Simpla.php');
$simpla = new Simpla();
$request = new StdClass;
$request->url = null;
$request->message = null;
$request->action = null;
$request->errors = null;

/* Action login */

if ($simpla->request->method('post') && $simpla->request->post('action') == 'login') {
    $request->action = $simpla->request->post('action');
    $request->email = $simpla->request->post('email');
    $request->password = $simpla->request->post('password');

    if ($simpla->users->check_password($request->email, $request->password)) {
        $user_id = $simpla->users->check_password($request->email, $request->password);
        $user = $simpla->users->get_user($request->email);
        if ($user->enabled) {
            $_SESSION['user_id'] = $user_id;
            $simpla->users->update_user($user_id, array('last_ip' => $_SERVER['REMOTE_ADDR']));

            // Перенаправляем пользователя на прошлую страницу, если она известна
            $request->url = $_SERVER['HTTP_REFERER'];
            $request->message = '<div class="message"><h2>Привет ' . $user->name . '!</h2><p>Авторизация прошла успешно. Добро пожаловать!</p></div>';
        }
    } else {
        $request->errors = 'Неверный логин или пароль!';
    }

}

/* Action login end */

/* Action password remind */

if ($simpla->request->method('post') && $simpla->request->post('action') == 'password_remind') {
    $request->action = $simpla->request->post('action');
    $request->email = $simpla->request->post('email');
    $simpla->design->assign('email', $request->email);

    // Выбираем пользователя из базы
    $user = $simpla->users->get_user($request->email);
    if (!empty($user)) {
        // Генерируем секретный код и сохраняем в сессии
        $code = md5(uniqid($simpla->config->salt, true));
        $_SESSION['password_remind_code'] = $code;
        $_SESSION['password_remind_user_id'] = $user->id;

        // Отправляем письмо пользователю для восстановления пароля
        $simpla->notify->email_password_remind($user->id, $code);
        $simpla->design->assign('email_sent', true);
        // Перенаправляем пользователя на прошлую страницу, если она известна
        $request->url = $_SERVER['HTTP_REFERER'];
        $request->message = '<div class="message"><h2>Привет!</h2><p>Ссылка для восстановления пароля была отправлена вам на почту!</p></div>';
    } else {
        $simpla->design->assign('error', 'user_not_found');
        $request->url = $_SERVER['HTTP_REFERER'];
        $request->message = '<div class="message"><h2>Упс!</h2><p>Пользователь с таким email не найден!</p></div>';

    }

}
/* Action password remind end */

/* Action register */

if ($simpla->request->method('post') && $simpla->request->post('action') == 'register') {
    $request->action = $simpla->request->post('action');
    $default_status = 1; // Активен ли пользователь сразу после регистрации (0 или 1)

    $name = $simpla->request->post('name');
    $email = $simpla->request->post('email');
    $password = $simpla->request->post('password');
    $captcha_code = $simpla->request->post('captcha_code');

    $simpla->design->assign('name', $name);
    $simpla->design->assign('email', $email);

    $simpla->db->query('SELECT count(*) as count FROM __users WHERE email=?', $email);
    $user_exists = $simpla->db->result('count');

    if ($user_exists) {
        $simpla->design->assign('error', 'user_exists');
    } elseif (empty($name)) {
        $simpla->design->assign('error', 'empty_name');
    } elseif (empty($email)) {
        $simpla->design->assign('error', 'empty_email');
    } elseif (empty($password)) {
        $simpla->design->assign('error', 'empty_password');
    } elseif (empty($_SESSION['captcha_code']) || $_SESSION['captcha_code'] != $captcha_code || empty($captcha_code)) {
        $simpla->design->assign('error', 'captcha');
    } elseif ($user_id = $simpla->users->add_user(array(
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'enabled' => $default_status,
        'last_ip' => $_SERVER['REMOTE_ADDR']
    ))
    ) {
        $_SESSION['user_id'] = $user_id;
        $request->url = $_SERVER['HTTP_REFERER'];
        $request->message = '<div class="message"><h2>Поздравляем!</h2><p>Вы успешно зарегистрировались!</p></div>';
    } else {
        $simpla->design->assign('error', 'unknown error');
        $request->url = $_SERVER['HTTP_REFERER'];
        $request->message = '<div class="message"><h2>Извиняемся!</h2><p>Регистрация пока невозможна! Повторите попытку позже!</p></div>';
    }
}
/* Action register end */

print json_encode($request);