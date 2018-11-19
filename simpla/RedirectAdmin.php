<?PHP
require_once('api/Simpla.php');

class RedirectAdmin extends Simpla
{	
	public function fetch()
	{	
		$redirect = new stdClass;
		if($this->request->method('POST'))
		{
			$redirect->id = $this->request->post('id', 'integer');
			$redirect->name = $this->request->post('name');
			$redirect->from_url = $this->request->post('from_url');
            $redirect->to_url = $this->request->post('to_url');
			
			$redirect->visible = $this->request->post('visible', 'boolean');
	
			## Не допустить одинаковые URL разделов.
			if(($p = $this->redirects->get_redirect($redirect->from_url)) && $p->id!=$redirect->id)
			{			
				$this->design->assign('message_error', 'url_exists');
			}
			else
			{
				if(empty($redirect->id))
				{
	  				$redirect->id = $this->redirects->add_redirect($redirect);
	  				$redirect = $this->redirects->get_redirect($redirect->id);
	  				$this->design->assign('message_success', 'added');
  	    		}
  	    		else
  	    		{
  	    			$this->redirects->update_redirect($redirect->id, $redirect);
	  				$redirect = $this->redirects->get_redirect($redirect->id);
	  				$this->design->assign('message_success', 'updated');
   	    		}
			}
		}
		else
		{
			$id = $this->request->get('id', 'integer');
			if(!empty($id))
				$redirect = $this->redirects->get_redirect(intval($id));			
			else
			{
				$redirect->visible = 1;
			}
		}	

		$this->design->assign('redirect', $redirect);

 	  	return $this->design->fetch('redirect.tpl');
	}
	
}

