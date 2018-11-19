<?PHP 

require_once('api/Simpla.php');

########################################
class RedirectsAdmin extends Simpla
{

  public function fetch()
  {


   	// Обработка действий
  	if($this->request->method('post'))
  	{
		// Сортировка
		$positions = $this->request->post('positions'); 		
 		$ids = array_keys($positions);
		sort($positions);
		foreach($positions as $i=>$position)
			$this->redirects->update_redirect($ids[$i], array('position'=>$position)); 

		// Действия с выбранными
		$ids = $this->request->post('check');
		if(is_array($ids))
		switch($this->request->post('action'))
		{
		    case 'disable':
		    {
				$this->redirects->update_redirect($ids, array('visible'=>0));	      
				break;
		    }
		    case 'enable':
		    {
				$this->redirects->update_redirect($ids, array('visible'=>1));	      
		        break;
		    }
		    case 'delete':
		    {
			    foreach($ids as $id)
					$this->redirects->delete_redirect($id);    
		        break;
		    }
		}		
		
 	}
    
    $filter = array();
	$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
	$filter['limit'] = 30;	
	
	$redirects_count = $this->redirects->count_redirects($filter);
	// Показать все страницы сразу
	if($this->request->get('page') == 'all')
		$filter['limit'] = $redirects_count;	
	
	$redirects = $this->redirects->get_redirects($filter);
	$this->design->assign('posts_count', $redirects_count);
	
	$this->design->assign('pages_count', ceil($redirects_count/$filter['limit']));
	$this->design->assign('current_page', $filter['page']);
    
	// Отображение
  	//$redirects = $this->redirects->get_redirects();

 	$this->design->assign('redirects', $redirects);
	return $this->design->fetch('redirects.tpl');
  }
}


?>