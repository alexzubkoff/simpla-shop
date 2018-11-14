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

	header("Content-type: application/json; charset=UTF-8");
	header("Cache-Control: must-revalidate");
	header("Pragma: no-cache");
	header("Expires: -1");		  
	print json_encode($request);