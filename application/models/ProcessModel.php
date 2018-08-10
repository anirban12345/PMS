<?php
class ProcessModel extends CI_Model {

    function __construct()
    {
        parent::__construct();			
	}
	public function addprocess($process)
	{	    
		$result=$this->db->insert('process', $process);
		return $this->db->insert_id();
	}	
	public function update_process($process,$id)
	{
		$this->db->select('*');
		$this->db->from('process');
		$this->db->where('id',$id);		
		$this->db->update('process', $process);		
	}
	public function add_process_status($process_status)
	{
		$this->db->insert('process_status', $process_status);
		return $this->db->insert_id();
	}
	public function process_stat_list_by_id($id)
	{
	    $this->db->select('*');
		$this->db->from('process_status');	
		$this->db->where('Process_Id',$id);		
		$this->query=$this->db->get();
		return $this->query->result();
	}	
	public function process_list()
	{
		$this->db->select('id,Type');
	    $this->db->select('DATE_FORMAT(Send_date, "%d-%b-%Y") AS Send_date',FALSE);
		$this->db->select('Req_From,Subject');
		$this->db->select('DATE_FORMAT(Recieve_date, "%d-%b-%Y") AS Recieve_date',FALSE);
		$this->db->select('Memo_no,Req_Sendto,Remarks');
		$this->db->select('DATE_FORMAT(Ocputup_Date, "%d-%b-%Y") AS Ocputup_Date',FALSE);
		$this->db->select('Status,Entry_Flag');
		
		//$this->db->select('*');
		$this->db->from('process');		
		$this->query=$this->db->get();
		return $this->query->result();
	}
	public function process_by_id($id)
	{
	   $this->db->select('*');
	   $this->db->from('process');	   
	   $this->db->where('id',$id);
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
	public function process_status_count()
	{
	   $this->db->select('status,count(status) countstatus');
	   $this->db->from('process');
	   $this->db->group_by("status");
	   $this->query=$this->db->get();
	   return $this->query->result();
	}
	function save_image($data){        
        $result= $this->db->insert('process_image',$data);
        return $result;
    }
}
?>