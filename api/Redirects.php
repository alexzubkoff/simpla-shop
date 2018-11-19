<?php

/**
 * Simpla CMS
 *
 * @copyright	2015 Vadym Bakchinov
 * @link		http://simplashop.com
 * @author		Vadym Bakchinov
 *
 */

require_once('Simpla.php');

class Redirects extends Simpla
{

	public function get_redirect($id)
	{
		if(gettype($id) == 'string')
			$where = $this->db->placehold(' WHERE from_url=? ', $id);
		else
			$where = $this->db->placehold(' WHERE id=? ', intval($id));
		
		$query = "SELECT * FROM __redirects $where LIMIT 1";

		$this->db->query($query);
		return $this->db->result();
	}
	
	public function get_redirects($filter = array())
	{	
        $limit = 1000;
		$page = 1;
        $id_filter = '';
		$visible_filter = '';
		$redirects = array();

		if(isset($filter['limit']))
			$limit = max(1, intval($filter['limit']));

		if(isset($filter['page']))
			$page = max(1, intval($filter['page']));
        
        if(!empty($filter['id']))
			$id_filter = $this->db->placehold('AND id in(?@)', (array)$filter['id']);
        
        if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));
		
        $sql_limit = $this->db->placehold(' LIMIT ?, ? ', ($page-1)*$limit, $limit);
        
		$query = "SELECT * FROM __redirects WHERE 1 $visible_filter ORDER BY position $sql_limit";
	
		$this->db->query($query);
		
		foreach($this->db->results() as $redirect)
			$redirects[$redirect->id] = $redirect;
			
		return $redirects;
	}
    
    public function count_redirects($filter = array())
	{	
		$id_filter = '';
		$visible_filter = '';
		
		if(!empty($filter['id']))
			$id_filter = $this->db->placehold('AND id in(?@)', (array)$filter['id']);
			
		if(isset($filter['visible']))
			$visible_filter = $this->db->placehold('AND visible = ?', intval($filter['visible']));		
		
		$query = "SELECT COUNT(distinct id) as count
		          FROM __redirects b WHERE 1 $id_filter $visible_filter";

		if($this->db->query($query))
			return $this->db->result('count');
		else
			return false;
	}
	
	public function add_redirect($redirect)
	{	
		$query = $this->db->placehold('INSERT INTO __redirects SET ?%', $redirect);
		if(!$this->db->query($query))
			return false;

		$id = $this->db->insert_id();
		$this->db->query("UPDATE __redirects SET position=id WHERE id=?", $id);	
		return $id;
	}
	
	public function update_redirect($id, $redirect)
	{	
		$query = $this->db->placehold('UPDATE __redirects SET ?% WHERE id in (?@)', $redirect, (array)$id);
		if(!$this->db->query($query))
			return false;
		return $id;
	}
	
	public function delete_redirect($id)
	{
		if(!empty($id))
		{
			$query = $this->db->placehold("DELETE FROM __redirects WHERE id=? LIMIT 1", intval($id));
			if($this->db->query($query))
				return true;
		}
		return false;
	}
	
}
