<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('AdminUserModel');
		$this->load->model('ProcessModel');
		$this->load->library('upload'); 
    }
	public function userhome()
	{
		$this->load->view('userheader');
		$data1['rec']=$this->AdminUserModel->count_process();
		$data1['rec1']=$this->ProcessModel->process_status_count();
		$data1['rec2']=$this->AdminUserModel->process_list_by_date();	
		$this->load->view('welcome',$data1);
		$this->load->view('welcomefooter',$data1);
	}
	public function index()
	{	
		$this->load->view("login");
	}	
	public function register()
	{
		$this->load->view("register");
	}
	public function register_user()
	{ 
	
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		$user=array(
		'firstname'=>$this->input->post('firstname'),
		'lastname'=>$this->input->post('lastname'),
		'address'=>$this->input->post('address'),
		'phone'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'levelid'=>2,		
		'udate'=>$now->format('Y-m-d'),
		'utime'=>$now->format('H:i:s'),
		'uflag'=>1,		
        );
        
		$email_check=$this->UserModel->email_check($user['email']);
 
		if($email_check)
		{
			$this->UserModel->register_user($user);
			$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
			redirect('user'); 
		}
		else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			redirect('user/register');
		}
	}
	
	function login_user()
	{
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		
		$user_login=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')));
		$data=$this->UserModel->login_user($user_login['email'],$user_login['password']);		
        if($data)
        {
			$this->session->set_userdata('id',$data['id']);
			$this->session->set_userdata('firstname',$data['Firstname']);        
			$this->session->set_userdata('lastname',$data['Lastname']);
			$this->session->set_userdata('address',$data['Address']);
			$this->session->set_userdata('phone',$data['Phone']);
			$this->session->set_userdata('email',$data['Email']);
			$this->session->set_userdata('levelid',$data['Levelid']);
			$this->session->set_userdata('image',$data['Image']);
			$this->user_level($this->session->userdata('levelid'));
			if($this->session->userdata('levelid')==1)
			{
				$data['rec']=$this->AdminUserModel->count_user();
				$data['rec1']=$this->AdminUserModel->count_process();
				$data2['rec']=$this->AdminUserModel->user_reg_by_date();	
				$data2['rec2']=$this->AdminUserModel->process_list_by_date();	
				$this->load->view('Admin/welcome',$data);
				$this->load->view('Admin/welcomefooter',$data2);
				
				$userlog=array(
						'User_Id'=>$data['id'],
						'Log_Date'=>$now->format('Y-m-d'),
						'Log_Time'=>$now->format('H:i:s'),
				);
				$this->UserModel->register_user_log($userlog);
			}
			else
			{
				$data1['rec']=$this->AdminUserModel->count_process();
				$data1['rec1']=$this->ProcessModel->process_status_count();
				$data1['rec2']=$this->AdminUserModel->process_list_by_date();
				//print_r($data1['rec2']);
				
				$userlog=array(
						'User_Id'=>$data['id'],
						'Log_Date'=>$now->format('Y-m-d'),
						'Log_Time'=>$now->format('H:i:s'),
				);
				$this->UserModel->register_user_log($userlog);				
				$this->load->view('welcome',$data1);
				$this->load->view('welcomefooter',$data1);
			}
		}
		else
		{
			$this->session->set_flashdata('error_msg', 'Wrong Email Id Or Password.');			
			redirect('user');
		}
	}
	
	public function user_level($levelid)
	{
	        if($levelid==1)
			{
				$this->load->view('Admin/adminheader');				
			}
			else if($levelid==2)
			{
			    $this->load->view('userheader');
			}
	}
	
	public function update()
	{
		$this->user_level($this->session->userdata('levelid'));
		$this->load->view('update_profile');
		$this->load->view('footer');
	}
	
	public function do_upload($time)
    {
			    $config['upload_path']     = './uploads/';
				$config['file_name']       = $time.'.jpg';				
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 0;
                $config['max_width']       = 1024;
                $config['max_height']      = 768;
				
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
				
                if ( ! $this->upload->do_upload('imagefile'))
                {
						echo "g";
                        $error = array('error' => $this->upload->display_errors());
						print_r($error);
                        //$this->load->view('upload_form', $error);
                }
                else
                {
						echo "h";
                        $data = array('upload_data' => $this->upload->data());
						print_R($data);
                        //$this->load->view('upload_success', $data);
                }
    }
	
	public function update_user()
	{
		$time=time();
	    $this->do_upload($time);
		
		$user=array(
		'firstname'=>$this->input->post('firstname'),
		'lastname'=>$this->input->post('lastname'),
		'address'=>$this->input->post('address'),
		'phone'=>$this->input->post('phone'),
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'image'=>$time.'.jpg',
        );
		
			$this->session->set_userdata('firstname',$user['firstname']);        
			$this->session->set_userdata('lastname',$user['lastname']);
			$this->session->set_userdata('address',$user['address']);
			$this->session->set_userdata('phone',$user['phone']);
			$this->session->set_userdata('email',$user['email']);			
			$this->session->set_userdata('image',$user['image']);
		
		$this->UserModel->update_user($user,$user['email']);
		$this->session->set_flashdata('upodate_success_msg', 'Your Profile Has been Updated Sucessfully');
		redirect('User/update');
	}
	
	public function user_logout()
	{
		$this->session->sess_destroy();
		redirect('user', 'refresh');
	}
}


