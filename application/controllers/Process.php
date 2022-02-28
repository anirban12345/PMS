
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends Admin_Controller 
{
    //var $filepath;
	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');	
        $this->load->model('Processmodel');
        
        //$this->filepath=base_url().'uploads/processscan';
        //realpath('D:/uploads/processscan');
    }

    public function index()
	{
        //$this->data['user']=$this->Globalmodel->getdata('*','users','u_id','asc');
        $this->render_template('process/index', $this->data);
    }

    public function create()
	{
        //$this->data['user_group']=$this->Globalmodel->getdata('*','user_group','ug_id', 'asc');
        $this->render_template('process/create', $this->data);
    }

    public function edit()
	{
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));	
        $this->data['process']=$this->Processmodel->get_process(array('p_id'=>$p_id));        
        $this->render_template('process/edit', $this->data);
    }
    
    public function uploadDocument() //from save code
	{
        $p_data=$this->Globalmodel->getlastid('process','p_id');
        $p_id=$p_data[0]->p_id;
        $this->data['pdata']=$this->Processmodel->get_process(array('p_id'=>$p_id));  
        $this->data['sdata']=$this->Processmodel->get_process_images(array('pi_pid'=>$p_id)); 
        
        $dir='./uploads/processscan/'.$this->data['pdata'][0]->p_orn;       

        if ( !is_dir( $dir ) ) {
            mkdir( $dir );       
        }
        //echo $dir;
        
        $this->render_template('process/uploadscan', $this->data);        
    }


    public function uploadScan() //from all process list code
	{
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['pdata']=$this->Processmodel->get_process(array('p_id'=>$p_id));
        $this->data['sdata']=$this->Processmodel->get_process_images(array('pi_pid'=>$p_id));	     
        
        $dir='./uploads/processscan/'.$this->data['pdata'][0]->p_orn;       

        if ( !is_dir( $dir ) ) {
            mkdir( $dir );       
        }
        //echo $dir;
        $this->render_template('process/uploadscan', $this->data);                
    }
   
    public function deleteScan()
    {
        $pi_id=rawurldecode($this->encrypt->decode($_GET['q']));	
        $filedtls=$this->Processmodel->get_process_images(array('pi_id'=>$pi_id));
        //echo '<pre>';
        //print_r($filedtls[0]->rf_rid);
        //echo $this->filepath.'/'.$filedtls[0]->p_orn.'/'.$filedtls[0]->pi_name;                
        $this->Globalmodel->deletedata('process_image','pi_id',$pi_id);
        unlink('./uploads/processscan/'.$filedtls[0]->p_orn.'/'.$filedtls[0]->pi_name);
        redirect('Process/uploadScan?q='.urlencode($this->encrypt->encode($filedtls[0]->pi_pid)));
    }

    public function upload2($p_id,$p_orn)
    {
        
		if (!empty($_FILES)) {		
            $userfile_name = $_FILES['file']['name'];
			$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
			
			$tempFile = $_FILES['file']['tmp_name'];		
			$fileName = time().'.'.$userfile_extn;
            $targetPath = getcwd() . '/uploads/processscan/'.$p_orn.'/';

            //$targetPath = $this->filepath.'/'.$p_orn.'/';

			$targetFile = $targetPath . $fileName ;
			move_uploaded_file($tempFile, $targetFile);
			
            $dtls=array(
                'pi_pid'=>$p_id,
                'pi_name'=>$fileName,
                'pi_datetime'=>date('Y-m-d H:i'), 
                'pi_flag'=>1,
                'pi_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
			$this->Globalmodel->savedata('process_image',$dtls);	
		
			$this->session->set_flashdata('successmsg', 'Image Successfully Added');
			redirect('Process');    
        }        
    }

    public function upload($p_id,$p_orn)
    { 
        if(!empty($_FILES)){ 
            // File upload configuration 
            $uploadPath = 'uploads/processscan/'.$p_orn.'/'; 
            $new_name = time().$_FILES["userfiles"]['name'];
            $config['file_name'] = $new_name;
            $config['upload_path'] = $uploadPath; 
            $config['allowed_types'] = '*'; 
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
             
            // Upload file to the server 
            if($this->upload->do_upload('file')){ 
                $fileData = $this->upload->data(); 
                //$uploadData['file_name'] = $fileData['file_name']; 
                //$uploadData['uploaded_on'] = date("Y-m-d H:i:s"); 
                 
                $dtls=array(
                    'pi_pid'=>$p_id,
                    'pi_name'=>$fileData['file_name'],
                    'pi_datetime'=>date('Y-m-d H:i'), 
                    'pi_flag'=>1,
                    'pi_userid'=>$this->session->userdata('userdtls')[0]->u_id
                );
                $this->Globalmodel->savedata('process_image',$dtls);	
            
                $this->session->set_flashdata('successmsg', 'Image Successfully Added');
                redirect('Process'); 
            } 
        } 
    } 
    
    public function saveProcess()
	{
        $this->form_validation->set_rules('p_type','Process Type','required');        
        $this->form_validation->set_rules('p_recievedate', 'Recieve Date', 'required');        
        $this->form_validation->set_rules('p_recievefrom', 'Recieve From', 'required');
        $this->form_validation->set_rules('p_memono', 'Memo No', 'required');
        $this->form_validation->set_rules('p_subject', 'Subject', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');
        
        //a:6:{i:0;s:7:"allcase";i:1;s:10:"createcase";i:2;s:10:"updatecase";i:3;s:8:"viewcase";i:4;s:11:"createusers";i:5;s:11:"updateusers";}

        if ($this->form_validation->run() == TRUE) 
		{

            $data=array(             
                'p_orn'=>date('si').rand (10,99),         
                'p_type'=>$this->input->post('p_type'),                             
                'p_recievedate'=>date('Y-m-d',strtotime($this->input->post('p_recievedate'))),                             
                'p_recievefrom'=>$this->input->post('p_recievefrom'), 
                'p_memono'=>$this->input->post('p_memono'), 
                'p_subject'=>$this->input->post('p_subject'), 
                'p_senddate'=>date('Y-m-d',strtotime($this->input->post('p_senddate'))), 
                'p_sendto'=>$this->input->post('p_sendto'), 
                'p_remarks'=>$this->input->post('p_remarks'), 
                'p_ocputup_date'=>date('Y-m-d',strtotime($this->input->post('p_ocputup_date'))), 
                'p_status'=>$this->input->post('p_status'), 
                'p_datetime'=>date('Y-m-d H:i'), 
                'p_flag'=>1,
                'p_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //echo '<pre>';
            //print_r($data);
            $this->Globalmodel->savedata('process',$data);
            $this->session->set_flashdata('successmsg','Process Successfully Created');	
            redirect('Process/uploadDocument');
        }
        else{
            $this->render_template('process/create', $this->data);
        }
    }
    public function updateProcess()
	{
        //`p_id`, `p_type`, `p_recievedate`, `p_recievefrom`, 
        //`p_memono`, `p_subject`, `p_senddate`, `p_sendto`, `p_remarks`,
        // `p_ocputup_date`, `p_status`, `p_datetime`, `p_flag`, `p_userid`
        $p_id=rawurldecode($this->encrypt->decode($_GET['q']));		        
        $data=array(                                
            'p_type'=>$this->input->post('p_type'),                             
            'p_recievedate'=>date('Y-m-d',strtotime($this->input->post('p_recievedate'))),                             
            'p_recievefrom'=>$this->input->post('p_recievefrom'), 
            'p_memono'=>$this->input->post('p_memono'), 
            'p_subject'=>$this->input->post('p_subject'), 
            'p_senddate'=>date('Y-m-d',strtotime($this->input->post('p_senddate'))), 
            'p_sendto'=>$this->input->post('p_sendto'), 
            'p_remarks'=>$this->input->post('p_remarks'), 
            'p_ocputup_date'=>date('Y-m-d',strtotime($this->input->post('p_ocputup_date'))), 
            'p_status'=>$this->input->post('p_status'),             
            'p_flag'=>1,            
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->updatedata('process','p_id',$p_id,$data);
        $this->session->set_flashdata('successmsg','Process Successfully Updated');	
        redirect('Process');
    } 

    public function getProcess()
	{
        $users=$this->Processmodel->get_process(array());
        $data = array();
        $i=1;
		foreach($users as $r)
		{
            $file=$this->Processmodel->get_process_images(array('pi_pid'=>$r->p_id));

            $sub_array = array();
            $sub_array[] = $i++;
            $sub_array[] = '<h6><span class="badge badge-primary">'.$r->p_orn.'</span></h6>';
            $sub_array[] = $r->p_type;
            $sub_array[] = date('d-M-Y',strtotime($r->p_recievedate));
            $sub_array[] = $r->p_recievefrom;            
            $sub_array[] = $r->p_memono;                                        
            $sub_array[] = date('d-M-Y',strtotime($r->p_senddate));
            $sub_array[] = $r->p_sendto;                        
            $sub_array[] = date('d-M-Y',strtotime($r->p_ocputup_date));            
            $sub_array[] = $r->p_subject;
           
            if(count($file)>0)
            {
                $sub_array[] ='<span class="badge badge-success">YES</span>';   
            }
            else
            {
                $sub_array[] = '<span class="badge badge-danger">NO</span>';   
            }

            $str='';
            foreach($file as $f)
            {
                //$image = file_get_contents($this->filepath.'/'.$r->p_orn.'/'.$f->pi_name);
                //$image_codes = base64_encode($image);
                //$str.='<a class="example-image-link" href="data:image/jpg;charset=utf-8;base64,'. $image_codes.'" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-thumbnail" width=100 src="data:image/jpg;charset=utf-8;base64,'.$image_codes.'" alt=""/></a>';

                $str.='<a class="example-image-link" href="'.base_url().'uploads/processscan/'.$r->p_orn.'/'.$f->pi_name.'" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-thumbnail" width=100 src="'.base_url().'uploads/processscan/'.$r->p_orn.'/'.$f->pi_name.'" alt=""/></a>';

            }
            $sub_array[] = $str;

            if(in_array('createusers',$this->permission)){
                $sub_array[] = $r->u_title;
                }

            $sub_array[] = date('d-M-Y H:i',strtotime($r->p_datetime));

            $str='';
            if(in_array('updateprocess',$this->permission))
            {
                $str.='<a role="button" href="'.base_url('Process/edit?q='.urlencode($this->encrypt->encode($r->p_id))).'" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>';
            }
            if(in_array('uploadscan',$this->permission))
            {
                $str.='<a role="button" href="'.base_url('Process/uploadScan?q='.urlencode($this->encrypt->encode($r->p_id))).'" class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-upload"></i> Upload</a>';
            }
            $sub_array[] = $str;                            
			$data[] = $sub_array;
		}

		$output = array(			
			"data"   =>  $data
		   );
		   
		echo json_encode($output);
    }


}   


