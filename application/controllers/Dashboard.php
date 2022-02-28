<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
{
	public function __construct()
    {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');	
		$this->load->model('Requisitionmodel');		
    }
	
	public function index()
	{	
		$sessdata=$this->session->userdata('userdtls');	  
		//echo '<pre>';
		//print_r($this->data);
		//print_r($sessdata);		
		
		//print_r($this->data['user_permission']);
		$this->data['process']=$this->Globalmodel->countdata('process');
		$this->data['process_image']=$this->Globalmodel->countdata('process_image');

		$this->data['requisition']=$this->Globalmodel->countdata('requisition');
		$this->data['requisition_file']=$this->Globalmodel->countdata('requisition_file');
		$this->data['requisition_items']=$this->Globalmodel->countdata('requisition_items');
		
		$this->data['pending']=$this->Requisitionmodel->get_requisition(array('r_status'=>'PENDING'));
		$this->data['pending_rem']=$this->Requisitionmodel->get_requisition(array('r_status'=>'PENDING(Reminder)'));		
		$this->data['received']=$this->Requisitionmodel->get_requisition(array('r_status'=>'RECEIVED'));
		$this->data['partial']=$this->Requisitionmodel->get_requisition(array('r_status'=>'PARTLY RECEIVED'));		
		$this->data['rejected']=$this->Requisitionmodel->get_requisition(array('r_status'=>'REJECTED'));

		//pending recieved requisition in dashboard
		$this->data['requ18']=$this->Requisitionmodel->get_requisition_between_date(array(),'2018-01-01','2018-12-31');
		$this->data['pending18']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING'),'2018-01-01','2018-12-31');
		$this->data['pending_rem18']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING(Reminder)'),'2018-01-01','2018-12-31');
		$this->data['received18']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'RECEIVED'),'2018-01-01','2018-12-31');
		$this->data['partial18']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PARTLY RECEIVED'),'2018-01-01','2018-12-31');		
		$this->data['rejected18']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'REJECTED'),'2018-01-01','2018-12-31');

		$this->data['requ19']=$this->Requisitionmodel->get_requisition_between_date(array(),'2019-01-01','2019-12-31');
		$this->data['pending19']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING'),'2019-01-01','2019-12-31');
		$this->data['pending_rem19']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING(Reminder)'),'2019-01-01','2019-12-31');
		$this->data['received19']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'RECEIVED'),'2019-01-01','2019-12-31');
		$this->data['partial19']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PARTLY RECEIVED'),'2019-01-01','2019-12-31');		
		$this->data['rejected19']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'REJECTED'),'2019-01-01','2019-12-31');

		$this->data['requ20']=$this->Requisitionmodel->get_requisition_between_date(array(),'2020-01-01','2020-12-31');
		$this->data['pending20']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING'),'2020-01-01','2020-12-31');
		$this->data['pending_rem20']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING(Reminder)'),'2020-01-01','2020-12-31');
		$this->data['received20']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'RECEIVED'),'2020-01-01','2020-12-31');
		$this->data['partial20']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PARTLY RECEIVED'),'2020-01-01','2020-12-31');		
		$this->data['rejected20']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'REJECTED'),'2020-01-01','2020-12-31');

		$this->data['requ21']=$this->Requisitionmodel->get_requisition_between_date(array(),'2021-01-01','2021-12-31');
		$this->data['pending21']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING'),'2021-01-01','2021-12-31');
		$this->data['pending_rem21']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PENDING(Reminder)'),'2021-01-01','2021-12-31');
		$this->data['received21']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'RECEIVED'),'2021-01-01','2021-12-31');
		$this->data['partial21']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'PARTLY RECEIVED'),'2021-01-01','2021-12-31');		
		$this->data['rejected21']=$this->Requisitionmodel->get_requisition_between_date(array('r_status'=>'REJECTED'),'2021-01-01','2021-12-31');

		$this->data['items']=$this->Globalmodel->countdata('items');

		$this->data['user']=$this->Globalmodel->countdata('users');
		$this->data['group']=$this->Globalmodel->countdata('user_group');
		$this->render_template('dashboard/dashboard', $this->data);
	}

	public function backUpDatabase()
	{
		$this->load->library('zip');
		$this->load->helper('download');
		$this->load->dbutil();
		$db_format=array('format'=>'zip','filename'=>'pms.sql');
		$backup = $this->dbutil->backup($db_format);
		$dbname='backup_on_'.date('d-M-Y').'.zip';
		$save='uploads/db_backup/'.$dbname;
		write_file($save, $backup);
		force_download($dbname, $backup);
	}
}
