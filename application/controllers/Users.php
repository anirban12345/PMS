
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller 
{
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');	
        $this->load->model('Usermodel');		
    }

    public function index()
	{
        //$this->data['user']=$this->Globalmodel->getdata('*','users','u_id','asc');
        $this->render_template('users/index', $this->data);
    }

    public function create()
	{
        $this->data['user_group']=$this->Globalmodel->getdata('*','user_group','ug_id', 'asc');
        $this->render_template('users/create', $this->data);
    }

    public function manage()
	{
        $u_id=rawurldecode($this->encrypt->decode($_GET['q']));	
        $this->data['users']=$this->Usermodel->get_user(array('u_id'=>$u_id));
        $this->data['user_group']=$this->Globalmodel->getdata('*','user_group','ug_id', 'asc');
        $this->render_template('users/manage', $this->data);
    }
    
    public function myProfile()
    {
        $u_id=$this->session->userdata('userdtls')[0]->u_id;
        $this->data['users']=$this->Usermodel->get_user(array('u_id'=>$u_id));
        $this->render_template('users/myprofile', $this->data);
    }

    public function userlog()
    {
        $u_id=$this->session->userdata('userdtls')[0]->u_id;
        $this->data['users']=$this->Usermodel->get_user(array('u_id'=>$u_id));
        $this->render_template('users_log/index', $this->data);
    }

    public function userProcessEntry()
    {
        $this->render_template('users/processentry', $this->data);
    }

    public function userRequisitionEntry()
    {
        $this->render_template('users/requisitionentry', $this->data);
    }


    public function saveUsers()
	{
        $this->form_validation->set_rules('u_title', 'Name', 'required');        
        $this->form_validation->set_rules('u_username', 'Name', 'required');
        $this->form_validation->set_rules('u_password1', 'Password', 'required');
        $this->form_validation->set_rules('u_password2', 'Confirm Password', 'required|matches[u_password1]');

        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');
        
        //a:6:{i:0;s:7:"allcase";i:1;s:10:"createcase";i:2;s:10:"updatecase";i:3;s:8:"viewcase";i:4;s:11:"createusers";i:5;s:11:"updateusers";}

        if ($this->form_validation->run() == TRUE) 
		{

            $data=array(  
                'u_ugid'=>$this->input->post('u_ugid'), 
                'u_title'=>$this->input->post('u_title'),                            
                'u_username'=>$this->input->post('u_username'),            
                'u_password'=>$this->encrypt->encode($this->input->post('u_password1')),                 
                'u_datetime'=>date('Y-m-d H:i'), 
                'u_flag'=>1,
                'u_userid'=>$this->session->userdata('userdtls')[0]->u_id,
                'u_ip'=>$this->input->ip_address()             
            );
            //echo '<pre>';
            //print_r($data);
            $this->Globalmodel->savedata('users',$data);
            $this->session->set_flashdata('successmsg','User Successfully Created');	
            redirect('Users');
        }
        else{
            $this->render_template('users/create', $this->data);
        }
    }
    public function updateUsers()
	{
        $u_id=rawurldecode($this->encrypt->decode($_GET['q']));		        
        $data=array( 
            'u_ugid'=>$this->input->post('u_ugid'), 
            'u_title'=>$this->input->post('u_title'),                             
            'u_datetime'=>date('Y-m-d H:i'), 
            'u_flag'=>1,
            'u_userid'=>$this->session->userdata('userdtls')[0]->u_id,
            'u_ip'=>$this->input->ip_address()             
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->updatedata('users','u_id',$u_id,$data);
        $this->session->set_flashdata('successmsg','Users Successfully Updated');	
        redirect('Users');
    } 

    public function updateMyprofile()
	{
        $u_id=rawurldecode($this->encrypt->decode($_GET['q']));	

        $this->form_validation->set_rules('u_title', 'Name', 'required');
        $this->form_validation->set_rules('u_password1', 'Password', 'required');
        $this->form_validation->set_rules('u_password2', 'Confirm Password', 'required|matches[u_password1]');

        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');
        
        if ($this->form_validation->run() == TRUE) 
		{

            $data=array(  
                'u_title'=>$this->input->post('u_title'),            
                'u_password'=>$this->encrypt->encode($this->input->post('u_password1')),                 
                'u_datetime'=>date('Y-m-d H:i'), 
                'u_flag'=>1,
                'u_userid'=>$this->session->userdata('userdtls')[0]->u_id,
                'u_ip'=>$this->input->ip_address()             
            );
            //echo '<pre>';
            //print_r($data);
            $this->Globalmodel->updatedata('users','u_id',$u_id,$data);
            $this->session->set_flashdata('successmsg','Profile Successfully Updated');	
            redirect('Dashboard');
        }
        else{
            $u_id=$this->session->userdata('userdtls')[0]->u_id;
            $this->data['users']=$this->Usermodel->get_user(array('u_id'=>$u_id));
            $this->render_template('users/myprofile', $this->data);
        }
    } 

    public function getUsers()
	{
        $users=$this->Usermodel->get_user(array());
        $data = array();
		foreach($users as $r)
		{
            $sub_array = array();
            $sub_array[] = $r->u_id;
            $sub_array[] = $r->ug_name;
            $sub_array[] = $r->u_title;            
            $sub_array[] = $r->u_username;                            
            $sub_array[] = $this->encrypt->decode($r->u_password);
            $sub_array[] = '<a role="button" href="'.base_url('Users/manage?q='.urlencode($this->encrypt->encode($r->u_id))).'" class="btn btn-info btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Manage</a>';                            
			$data[] = $sub_array;
		}

		$output = array(			
			"data"   =>  $data
		   );
		   
		echo json_encode($output);
    }

    public function getUsersLog()
	{
        $users=$this->Usermodel->get_userlog(array());
        $data = array();
        $i=1;
		foreach($users as $r)
		{
            $sub_array = array();            
            $sub_array[] = $i++;                            
            $sub_array[] = $r->u_title;                            
            $sub_array[] = date('d-M-Y h:i:s A',strtotime($r->ul_datetime));                            
            $sub_array[] = $r->ul_ipadd;                            
            $data[] = $sub_array;
		}

		$output = array(			
			"data"   =>  $data
		   );
		   
		echo json_encode($output);
    }

    public function searchProcessEntryByDate()
	{
        $fromdate=$this->input->post('from_date');
        $todate=$this->input->post('to_date');

        $this->data['fromdate']=$fromdate;
        $this->data['todate']=$todate;

        $fromdate=date('Y-m-d',strtotime($fromdate));
        $todate=date('Y-m-d',strtotime($todate));

       
        $this->data['entrydtls']=$this->Usermodel->get_user_process_entry_by_date($fromdate,$todate);
        
        $this->render_template('users/processentrydtls', $this->data);
    }

    public function searchRequisitionEntryByDate()
	{
        $fromdate=$this->input->post('from_date');
        $todate=$this->input->post('to_date');

        $this->data['fromdate']=$fromdate;
        $this->data['todate']=$todate;

        $fromdate=date('Y-m-d',strtotime($fromdate));
        $todate=date('Y-m-d',strtotime($todate));

        
        $this->data['entrydtls']=$this->Usermodel->get_user_requisition_entry_by_date($fromdate,$todate);
        $this->render_template('users/requisitionentrydtls', $this->data);
    }
}   


