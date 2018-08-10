<?php
class Blogmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function get_all_records()
	{
	  $this->db->select("sname,saddress");
	  $this->db->from("student");
	  $this->query = $this->db->get();
      return $this->query->result();
	}
	
}
?>