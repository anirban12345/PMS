<?php 

class MY_Controller extends CI_Controller
{
	var $title='';
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');		
		$this->load->model('Globalmodel');	
		$this->title = " P M S";	
	}
}

class Admin_Controller extends MY_Controller 
{
	var $permission = array();
	public function __construct() 
	{
		parent::__construct();	
		$userdtls=$this->session->userdata('userdtls');
		if(!empty($userdtls))
		{
			if(!$userdtls[0]->logged_in) {			
				redirect('Login', 'refresh');
			}
			else{
				$this->data['user_permission'] = unserialize($userdtls[0]->ug_permission);
				$this->permission = unserialize($userdtls[0]->ug_permission);
				
			}
		}
		else{
			redirect('Login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{
		//`al_description`, `al_ip`, `al_flag`, `al_date_time`, `al_userid
		/*$acitvity=array('al_description'=>$page.' is opened', 
						'al_ip'=>$this->input->ip_address(),
						'al_flag'=>1,
						'al_date_time'=>date('Y-m-d H:i:s'),
						'al_userid'=>$this->session->userdata('userid')
						);
		$this->Globalmodel->savedata('activity_log',$acitvity);						
		*/
		$this->load->view('template/header',$data);		
		$this->load->view('template/sidemenu',$data);
		$this->load->view($page, $data);
		$this->load->view('template/footer',$data);
	}
	
	public function basic_table_data()
	{
		
	}
}

class User_Controller extends MY_Controller 
{
	var $permission = array();
	public function __construct() 
	{
		parent::__construct();	
		$userdtls=$this->session->userdata('userdtls');
		if(!empty($userdtls))
		{
			if(!$userdtls[0]->logged_in) {			
				redirect('Login', 'refresh');
			}
			else{
				$this->data['user_permission'] = unserialize($userdtls[0]->u_permission);
				$this->permission = unserialize($userdtls[0]->u_permission);
				
			}
		}
		else{
			redirect('Login', 'refresh');
		}
	}

	public function render_template($page = null, $data = array())
	{
		//`al_description`, `al_ip`, `al_flag`, `al_date_time`, `al_userid
		/*$acitvity=array('al_description'=>$page.' is opened', 
						'al_ip'=>$this->input->ip_address(),
						'al_flag'=>1,
						'al_date_time'=>date('Y-m-d H:i:s'),
						'al_userid'=>$this->session->userdata('userid')
						);
		$this->Globalmodel->savedata('activity_log',$acitvity);						
		*/
		$this->load->view('template/header',$data);		
		$this->load->view('template/sidemenu2',$data);
		$this->load->view($page, $data);
		$this->load->view('template/footer',$data);
	}
	
	public function basic_table_data()
	{
		
	}
}
