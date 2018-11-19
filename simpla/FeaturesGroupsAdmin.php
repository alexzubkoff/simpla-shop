<?PHP

require_once('api/Simpla.php');

class FeaturesGroupsAdmin extends Simpla{
	function fetch(){	
	
		if($this->request->method('post')){  	
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action')){
			    case 'delete':{
			    	foreach($ids as $id)	    		
			    			$this->features->delete_features_group($id); 
			        break;
			    }
			}		
	  	
			// Сортировка
			$positions = $this->request->post('positions');
	 		$ids = array_keys($positions);
			sort($positions);
			foreach($positions as $i=>$position)
				$this->features->update_features_group($ids[$i], array('position'=>$position)); 

		} 
		
		$filter = array();		
		$features_groups = $this->features->get_features_groups($filter);
		
		$this->design->assign('features_groups', $features_groups);
		return $this->body = $this->design->fetch('features_groups.tpl');
	}
}
