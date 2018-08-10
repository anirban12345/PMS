<?php
class AdminUserModel extends CI_Model {

    function __construct()
    {
        parent::__construct();			
	}
	
	public function user_list()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('user_level','users.Levelid=user_level.id');
		$this->query=$this->db->get();
		return $this->query->result();
	}
	public function count_user()
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->query=$this->db->get();
	   return $this->query->num_rows();
	}
	public function count_process()
	{
	   $this->db->select('*');
	   $this->db->from('process');
	   $this->query=$this->db->get();
	   return $this->query->num_rows();
	}
	public function user_reg_by_date()
	{
	   $this->db->select('udate,count(udate) noofuser');
	   $this->db->from('users');
	   $this->db->group_by("udate");
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function user_by_id($id)  //from users table and user-level table
	{
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->join('user_level','users.Levelid=user_level.id');
	   $this->db->where('users.id',$id);
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function userflag_by_id($id) //from only users table
	{
	   $this->db->select('Uflag');
	   $this->db->from('users');	   
	   $this->db->where('users.id',$id);
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function user_activate($id,$data)
	{
	   //print_r($data);
	   $this->db->select('*');
	   $this->db->from('users');	   
	   $this->db->where('id',$id);
	   $this->db->update('users',$data);	   
	}
	public function user_level()
	{
	   $this->db->select('*');
	   $this->db->from('user_level');		
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function process_list()
	{
	   $this->db->select('*');
	   $this->db->from('process');	
	   //$this->db->join('users', 'process.User_Id = users.id');	   
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function process_by_id($id)
	{
	   $this->db->select('*');
	   $this->db->from('process');	   
	   $this->db->where('process.id',$id);
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function process_by_id_by_user($id)
	{
	   $this->db->select('*');
	   $this->db->from('process');	   
	   $this->db->join('users', 'process.User_Id = users.id');
	   $this->db->where('process.id',$id);
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	public function process_stat_list_by_id($id)
	{
	    $this->db->select('*');
		$this->db->from('process_status');	
		$this->db->where('Process_Id',$id);		
		$this->query=$this->db->get();
		return $this->query->result();
	}
	public function process_stat_list_by_id_by_user($id)
	{
	    $this->db->select('*');
		$this->db->from('process_status');	
		$this->db->join('users', 'process_status.User_Id = users.id');
		$this->db->where('Process_Id',$id);		
		$this->query=$this->db->get();
		return $this->query->result();
	}
	public function process_image_list()
	{
	    $this->db->select('*');
	    $this->db->from('process_image');		
	    $this->query=$this->db->get();
	    return $this->query->result();
	}
	public function process_image_list_by_id($id)
	{
	    $this->db->select('*');
		$this->db->from('process_image');	
		$this->db->where('Process_Id',$id);		
		$this->query=$this->db->get();
		return $this->query->result();
	}
	public function process_list_by_date()
	{
	   $this->db->select('Entry_Date,count(Entry_Date) noofprocess');
	   $this->db->from('process');
	   $this->db->group_by("Entry_Date");
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
}
?>