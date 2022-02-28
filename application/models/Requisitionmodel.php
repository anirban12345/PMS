<?php
class Requisitionmodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_requisition($array)
	{
		$this->db->select('*');
		$this->db->from('requisition');		
		$this->db->join('users','users.u_id=requisition.r_userid');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}


	public function get_requisition_between_date($array,$date1,$date2)
	{
		$this->db->select('*');
		$this->db->from('requisition');		
		//$this->db->join('users','users.u_emailid=pstation.ps_emailid');		
		$this->db->where($array);
		$this->db->where('r_date >=', $date1);
		$this->db->where('r_date <=', $date2);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_requisition_images($array)
	{
		$this->db->select('*');
		$this->db->from('requisition_file');		
		$this->db->join('requisition','requisition.r_id=requisition_file.rf_rid');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_requisition_items($array)
	{
		$this->db->select('*');
		$this->db->from('requisition_items');		
		$this->db->join('items','requisition_items.ri_itemid=items.items_id');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}


}

?>