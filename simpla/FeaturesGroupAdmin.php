<?PHP

require_once('api/Simpla.php');

class FeaturesGroupAdmin extends Simpla{

    private	$allowed_image_extentions = array('png', 'gif', 'jpg', 'jpeg', 'ico');

	function fetch(){
		if($this->request->method('post')){
			$features_group->id = $this->request->post('id', 'integer');
			$features_group->name = $this->request->post('name');			
						
			if(empty($features_group->id)){
  				$features_group->id = $this->features->add_features_group($features_group);
  				$feature = $this->features->get_features_group($features_group->id);
				$this->design->assign('message_success', 'added');
  			}else{
				$this->features->update_features_group($features_group->id, $features_group);
				$feature = $this->features->get_features_group($features_group->id);
				$this->design->assign('message_success', 'updated');
			}
			
			// Удаление изображения
    		if($this->request->post('delete_image'))
    			$this->features->delete_image($features_group->id);
    		// Загрузка изображения
    		$image = $this->request->files('image');

			
    		if(!empty($image['name']) && in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), $this->allowed_image_extentions)){
    			$this->features->delete_image($features_group->id);
    			move_uploaded_file($image['tmp_name'], $this->root_dir.$this->config->features_images_dir.$image['name']);
    			$this->features->update_features_group($features_group->id, array('image'=>$image['name']));
    		}
			
			$features_group = $this->features->get_features_group(intval($features_group->id));
		}else{	
			$features_group->id = $this->request->get('id', 'integer');
			$features_group = $this->features->get_features_group($features_group->id);
		}

		$this->design->assign('features_group', $features_group);
		return $this->body = $this->design->fetch('features_group.tpl');
	}
}