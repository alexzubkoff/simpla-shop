<?php
    session_start();
	chdir('..');
	require_once('api/Simpla.php');
	$simpla = new Simpla();

	if(!empty($_POST['email'])){
        $request = new StdClass;
        $request->email = $simpla->request->post('email');
        $request->password = $simpla->request->post('password');
		$request->url = null;
        $request->action =$simpla->request->post('action');

		if($user_id = $simpla->users->check_password($request->email, $request->password))
		{
			$user = $simpla->users->get_user($request->email);
			if($user->enabled)
			{
				$_SESSION['user_id'] = $user_id;
				$simpla->users->update_user($user_id, array('last_ip'=>$_SERVER['REMOTE_ADDR']));
				
				// Перенаправляем пользователя на прошлую страницу, если она известна
				$request->url = $_SERVER['HTTP_REFERER'];

			}
			else
			{
				$request->url = false;
			}

		}


	}

    if ($request->action =='password_remind'){
        $simpla->design->assign('email', $request->email);

        // Выбираем пользователя из базы
        $user = $simpla->users->get_user($request->email);
        if(!empty($user))
        {
        // Генерируем секретный код и сохраняем в сессии
        $code = md5(uniqid($simpla->config->salt, true));
        $_SESSION['password_remind_code'] = $code;
        $_SESSION['password_remind_user_id'] = $user->id;

        // Отправляем письмо пользователю для восстановления пароля
        $simpla->notify->email_password_remind($user->id, $code);
        $simpla->design->assign('email_sent', true);
        // Перенаправляем пользователя на прошлую страницу, если она известна
        $request->url = $_SERVER['HTTP_REFERER'];
        }
        else{
        $simpla->design->assign('error', 'user_not_found');
    }
}

    if($simpla->request->get('code')){
        // Проверяем существование сессии
        if(!isset($_SESSION['password_remind_code']) || !isset($_SESSION['password_remind_user_id']))
        return false;

        // Проверяем совпадение кода в сессии и в ссылке
        if($simpla->request->get('code') != $_SESSION['password_remind_code'])
        return false;

        // Выбераем пользователя из базы
        $user = $simpla->users->get_user(intval($_SESSION['password_remind_user_id']));
        if(empty($user))
         return false;

        // Залогиниваемся под пользователем и переходим в кабинет для изменения пароля
        $_SESSION['user_id'] = $user->id;
        header('Location: '.$simpla->config->root_url.'/user');
    }

	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		  
	print json_encode($request);