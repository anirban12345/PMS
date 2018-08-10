<?php
class UserModel extends CI_Model {	
    function __construct()
    {
        parent::__construct();			
	}	
	public function register_user($user)
	{	    
		$this->db->insert('users', $user);
	}
	public function update_user($user,$email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);		
		$this->db->update('users', $user);		
	}
	public function login_user($email,$pass)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('email'=>$email,'uflag'=>1));
		$this->db->where('password',$pass); 
		if($query=$this->db->get())
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}	
	public function register_user_log($userlog)
	{	    
		$this->db->insert('users_log', $userlog);
	}
	public function email_check($email)
	{ 
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query=$this->db->get();		
		if($query->num_rows()>0)
		{
			return false;
		}
		else
		{
			return true;
		} 
	}
}
?>