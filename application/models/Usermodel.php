<?php
class Usermodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_user_cases($array)
	{
		$this->db->select('*');
		$this->db->from('cases');
		$this->db->join('pstation','cases.c_case_initiated_by=pstation.ps_id');
		$this->db->join('case_status','cases.c_status_id=case_status.cs_id');		
		$this->db->join('users','users.u_emailid=pstation.ps_emailid');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_user($array)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('user_group','users.u_ugid=user_group.ug_id');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_userlog($array)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('users_log','users.u_id=users_log.ul_userid');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_user_process_entry_by_date($fromdate,$todate)
	{
		$this->db->select('u_title,count(p_id) as count');
		$this->db->from('users');
		$this->db->join('process','users.u_id=process.p_userid');		
		$this->db->where('p_datetime>=',$fromdate);									
		$this->db->where('p_datetime<=',$todate);									
		$this->db->group_by('u_id');
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_user_requisition_entry_by_date($fromdate,$todate)
	{
		$this->db->select('u_title,count(r_id) as count');
		$this->db->from('users');
		$this->db->join('requisition','users.u_id=requisition.r_userid');		
		$this->db->where('r_datetime>=',$fromdate);									
		$this->db->where('r_datetime<=',$todate);									
		$this->db->group_by('u_id');
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

}

?>