<?php
class Blog extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function get_all_records()
	{
	
		$this->db->select('sname,saddress,bengali,english,hindi');
		$this->db->from('student');
		$this->db->join('marks','student.sid=marks.sid');
		$this->query=$this->db->get();
		return $this->query->result();
		


	    /*$this->db->select("sname,saddress");
	    $this->db->from("student");
	    $this->query = $this->db->get();
        return $this->query->result();*/
	}
}
?>