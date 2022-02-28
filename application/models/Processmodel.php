<?php
class Processmodel extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
	
	public function get_process($array)
	{
		$this->db->select('*');
		$this->db->from('process');		
		$this->db->join('users','users.u_id=process.p_userid');			
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

	public function get_process_images($array)
	{
		$this->db->select('*');
		$this->db->from('process_image');		
		$this->db->join('process','process_image.pi_pid=process.p_id');		
		$this->db->where($array);									
		$this->query=$this->db->get();		
		return $this->query->result();  
	}

}

?>