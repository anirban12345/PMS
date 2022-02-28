
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisition extends Admin_Controller 
{
    //var $filepath;
	public function __construct()
    {
        parent::__construct();
        //$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        //$this->output->set_header('Pragma: no-cache');
        //$this->output->set_header("Expires: Mon, 26 Jul 2197 05:00:00 GMT");
        date_default_timezone_set('Asia/Kolkata');	
        $this->load->model('Requisitionmodel');	
        //$this->filepath=base_url().'uploads/requisitionscan';
        //realpath('D:/uploads/requisitionscan/');	
    }

    public function index()
	{
        //$this->data['user']=$this->Globalmodel->getdata('*','users','u_id','asc');
        $this->render_template('requisition/index', $this->data);
    }

    public function create()
	{
        $this->data['items']=$this->Globalmodel->getdata('*','items','items_id', 'asc');
        $this->render_template('requisition/create', $this->data);

        //print_r($this->data['items']);

    }

    public function edit()
	{
        $r_id=rawurldecode($this->encrypt->decode($_GET['q']));	
        $this->data['requisition']=$this->Requisitionmodel->get_requisition(array('r_id'=>$r_id));
        $this->data['items']=$this->Globalmodel->getdata('*','items','items_id', 'asc');        
        $this->data['requ_items']=$this->Globalmodel->getdata_by_field_array('*','requisition_items',array('ri_rid'=>$r_id),'ri_id', 'asc');        
        $this->render_template('requisition/edit', $this->data);
    }
    
    public function search()
	{
        $this->render_template('requisition/search', $this->data);
    }

    public function searchRequisition()
	{   
		if($this->input->post('from_date')=="" && $this->input->post('to_date')=="")
		{
            $fromdate=$this->session->userdata('fromdate'); 
            $todate=$this->session->userdata('todate'); 
		}
		else
		{
            $fromdate=date('Y-m-d',strtotime($this->input->post('from_date')));
            $todate=date('Y-m-d',strtotime($this->input->post('to_date')));
            $this->session->set_userdata('fromdate',$fromdate); 
            $this->session->set_userdata('todate',$todate); 
            
        }

        $this->data['fromdate']=date('d-M-Y',strtotime($fromdate));      
        $this->data['todate']=date('d-M-Y',strtotime($todate));  

        $this->data['allrec']=$this->Requisitionmodel->get_requisition_between_date(array(),$fromdate,$todate);
        $this->render_template('requisition/searchdtls', $this->data);
    }

    public function uploadDocument() //from save code
	{
        $r_data=$this->Globalmodel->getlastid('requisition','r_id');
        $r_id=$r_data[0]->r_id;
        
        $this->data['rdata']=$this->Requisitionmodel->get_requisition(array('r_id'=>$r_id)); 
        $this->data['idata']=$this->Requisitionmodel->get_requisition_items(array('ri_rid'=>$r_id));	                      
        $this->data['sdata']=$this->Requisitionmodel->get_requisition_images(array('rf_rid'=>$r_id));	                      

        //echo '<pre>';
        //echo $r_id;
        //print_r($this->data['idata']);
        $dir= './uploads/requisitionscan/'.$this->data['rdata'][0]->r_orn;       

        if ( !is_dir( $dir ) ) {
            mkdir( $dir );       
        }

        $this->render_template('requisition/uploadscan', $this->data);        
    }


    public function uploadScan() //from all requisition list code
	{
        $r_id=rawurldecode($this->encrypt->decode($_GET['q']));	 
        
        $this->data['rdata']=$this->Requisitionmodel->get_requisition(array('r_id'=>$r_id));
        $this->data['idata']=$this->Requisitionmodel->get_requisition_items(array('ri_rid'=>$r_id));	                      
        $this->data['sdata']=$this->Requisitionmodel->get_requisition_images(array('rf_rid'=>$r_id));	               

        $dir= './uploads/requisitionscan/'.$this->data['rdata'][0]->r_orn;       

        if ( !is_dir( $dir ) ) {
            mkdir( $dir );       
        }

        $this->render_template('requisition/uploadscan', $this->data);        
    }
    public function deleteScan()
    {
        $rf_id=rawurldecode($this->encrypt->decode($_GET['q']));	
        $filedtls=$this->Requisitionmodel->get_requisition_images(array('rf_id'=>$rf_id));
        //echo '<pre>';
        //print_r($filedtls[0]->rf_rid);
        //echo base_url('uploads/requisitionscan/').$filedtls[0]->r_orn.'/'.$filedtls[0]->rf_filename;                
        $this->Globalmodel->deletedata('requisition_file','rf_id',$rf_id);
        unlink('./uploads/requisitionscan/'.$filedtls[0]->r_orn.'/'.$filedtls[0]->rf_filename);
        redirect('Requisition/uploadScan?q='.urlencode($this->encrypt->encode($filedtls[0]->rf_rid)));
    }
    public function upload2($r_id,$r_orn)
    {
		if (!empty($_FILES)) {		
			$userfile_name = $_FILES['file']['name'];
			$userfile_extn = substr($userfile_name, strrpos($userfile_name, '.')+1);
			
			$tempFile = $_FILES['file']['tmp_name'];		
			$fileName = time().'.'.$userfile_extn;
            $targetPath = getcwd() . '/uploads/requisitionscan/'.$r_orn.'/';

            //$targetPath =  $this->filepath.'/'.$r_orn.'/';
            
			$targetFile = $targetPath . $fileName ;
			move_uploaded_file($tempFile, $targetFile);
			
            $dtls=array(
                'rf_rid'=>$r_id,
                'rf_filename'=>$fileName,
                'rf_datetime'=>date('Y-m-d H:i'), 
                'rf_flag'=>1,
                'rf_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
			$this->Globalmodel->savedata('requisition_file',$dtls);	
		
			$this->session->set_flashdata('successmsg', 'Requisition Files Successfully Added');
			redirect('Requisition');    
		}
    }
    
    public function upload($r_id,$r_orn)
    { 
        if(!empty($_FILES)){ 
            // File upload configuration 
            $uploadPath = 'uploads/requisitionscan/'.$r_orn.'/'; 
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
                    'rf_rid'=>$r_id,
                    'rf_filename'=>$fileData['file_name'],
                    'rf_datetime'=>date('Y-m-d H:i'), 
                    'rf_flag'=>1,
                    'rf_userid'=>$this->session->userdata('userdtls')[0]->u_id
                );
                $this->Globalmodel->savedata('requisition_file',$dtls);		
            
                $this->session->set_flashdata('successmsg', 'Image Successfully Added');
                redirect('Requisition'); 
            } 
        } 
    } 

    public function saveRequisition()
	{
        $this->form_validation->set_rules('r_date','Requisition Date','required');        
        $this->form_validation->set_rules('r_sectionfor', 'Requisition For', 'required');        
        $this->form_validation->set_rules('r_sub', 'Requisition Subject', 'required');
        $this->form_validation->set_rules('r_towhom', 'Requisition To Whome', 'required');
        $this->form_validation->set_rules('r_forwardedto', 'Requisition Forworded To', 'required');

        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');
        
        if ($this->form_validation->run() == TRUE) 
		{

            $data=array(             
                'r_orn'=>date('si').rand (10,99),         
                'r_date'=>date('Y-m-d',strtotime($this->input->post('r_date'))),                   
                'r_sectionfor'=>$this->input->post('r_sectionfor'),                             
                'r_sub'=>$this->input->post('r_sub'), 
                'r_towhom'=>$this->input->post('r_towhom'), 
                'r_forwardedto'=>$this->input->post('r_forwardedto'), 
                'r_dealingsec'=>$this->input->post('r_dealingsec'), 
                'r_recievedate'=>date('Y-m-d',strtotime($this->input->post('r_recievedate'))), 
                'r_status'=>$this->input->post('r_status'), 
                'r_supplydate'=>date('Y-m-d',strtotime($this->input->post('r_supplydate'))), 
                'r_remarks'=>$this->input->post('r_remarks'), 
                'r_datetime'=>date('Y-m-d H:i'), 
                'r_flag'=>1,
                'r_userid'=>$this->session->userdata('userdtls')[0]->u_id
            );
            //echo '<pre>';
            //print_r($data);
            $this->Globalmodel->savedata('requisition',$data);

            $r_data=$this->Globalmodel->getlastid('requisition','r_id');
            $r_id=$r_data[0]->r_id;

            /*delete data from requisition items*/
            $this->Globalmodel->deletedata('requisition_items','ri_rid',$r_id);
            /*delete data from requisition items*/


            $itemid=$this->input->post('itemid');
            $qty=$this->input->post('qty');
            for($i=0;$i<count($itemid);$i++)
            {
                $data=array(
                    'ri_rid'=>$r_id,
                    'ri_itemid'=>$itemid[$i],
                    'ri_qty'=>$qty[$i], 
                    'ri_datetime'=>date('Y-m-d H:i'), 
                    'ri_flag'=>1,
                    'ri_userid'=>$this->session->userdata('userdtls')[0]->u_id
                );
                $this->Globalmodel->savedata('requisition_items',$data);
            }

            $this->session->set_flashdata('successmsg','Requisition Successfully Created');	
            redirect('Requisition/uploadDocument');
        }
        else{
            $this->render_template('requisition/create', $this->data);
        }
        
        //print_r($itemid);
        //print_r($qty);

        /* creating orn for all data */
        /*
        $this->data['req']=$this->Globalmodel->getdata('*','requisition','r_id', 'asc');
        foreach($this->data['req'] as $r)
        {
            $data=array(             
                'r_orn'=>date('si').rand (10,99),     
            );
            $this->Globalmodel->updatedata('requisition','r_id',$r->r_id,$data);
        }
        */
        /* creating orn for all data */
    }

    public function updateRequisition()
	{
        $r_id=rawurldecode($this->encrypt->decode($_GET['q']));		        
        $data=array(                              
            'r_date'=>date('Y-m-d',strtotime($this->input->post('r_date'))),                   
            'r_sectionfor'=>$this->input->post('r_sectionfor'),                             
            'r_sub'=>$this->input->post('r_sub'), 
            'r_towhom'=>$this->input->post('r_towhom'), 
            'r_forwardedto'=>$this->input->post('r_forwardedto'), 
            'r_dealingsec'=>$this->input->post('r_dealingsec'), 
            'r_recievedate'=>date('Y-m-d',strtotime($this->input->post('r_recievedate'))), 
            'r_status'=>$this->input->post('r_status'), 
            'r_supplydate'=>date('Y-m-d',strtotime($this->input->post('r_supplydate'))), 
            'r_remarks'=>$this->input->post('r_remarks'), 
            'r_datetime'=>date('Y-m-d H:i'), 
            'r_flag'=>1            
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->updatedata('requisition','r_id',$r_id,$data);

        /*delete data from requisition items*/
        $this->Globalmodel->deletedata('requisition_items','ri_rid',$r_id);
        /*delete data from requisition items*/


        /*add data from requisition items*/
        $itemid=$this->input->post('itemid');
        $qty=$this->input->post('qty');        
            for($i=0;$i<count($itemid);$i++)
            {
                $data=array(
                    'ri_rid'=>$r_id,
                    'ri_itemid'=>$itemid[$i],
                    'ri_qty'=>$qty[$i], 
                    'ri_datetime'=>date('Y-m-d H:i'), 
                    'ri_flag'=>1,
                    'ri_userid'=>$this->session->userdata('userdtls')[0]->u_id
                );
                $this->Globalmodel->savedata('requisition_items',$data);
            }
        /*add data from requisition items*/

        $this->session->set_flashdata('successmsg','Requisition Successfully Updated');	
        redirect('Requisition');
    } 

    public function getRequisition()
	{
        $users=$this->Requisitionmodel->get_requisition(array());
        $data = array();
        $i=1;
		foreach($users as $r)
		{
            $file=$this->Requisitionmodel->get_requisition_images(array('rf_rid'=>$r->r_id));

            $sub_array = array();
            $sub_array[] = $i++;
            $sub_array[] = '<h6><span class="badge badge-warning">'.$r->r_orn.'</span></h6>';
            $sub_array[] = date('d-M-Y',strtotime($r->r_date));
            $sub_array[] = $r->r_sectionfor;
            $sub_array[] = $r->r_sub;
            if(date('d-M-Y',strtotime($r->r_recievedate))=='01-Jan-1970' || date('d-M-Y',strtotime($r->r_recievedate))=='30-Nov--0001')
            {
                $sub_array[] = 'PENDING';
            }
            else
            {
                $sub_array[] = date('d-M-Y',strtotime($r->r_recievedate));
            }
            $sub_array[] = $r->r_towhom;
            $sub_array[] = $r->r_forwardedto;
            //$sub_array[] = $r->r_dealingsec;            
            $sub_array[] = $r->r_status;
            //$sub_array[] = date('d-M-Y',strtotime($r->r_supplydate));            
            $sub_array[] = $r->r_remarks;
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
                //$image = file_get_contents( $this->filepath.'/'.$r->r_orn.'/'.$f->rf_filename);
                //$image_codes = base64_encode($image);

                $str.='<a class="example-image-link" href="'.base_url().'uploads/requisitionscan/'.$r->r_orn.'/'.$f->rf_filename.'" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-thumbnail" width=100 src="'.base_url().'uploads/requisitionscan/'.$r->r_orn.'/'.$f->rf_filename.'" alt=""/></a>';
            }
            $sub_array[] = $str;
            if(in_array('createusers',$this->permission)){
            $sub_array[] = $r->u_title;
            }
            $str='';
            if(in_array('updateprocess',$this->permission))
            {
                $str.='<a role="button" href="'.base_url('Requisition/edit?q='.urlencode($this->encrypt->encode($r->r_id))).'" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>';
            }
            if(in_array('uploadscan',$this->permission))
            {
                $str.='<a role="button" href="'.base_url('Requisition/uploadScan?q='.urlencode($this->encrypt->encode($r->r_id))).'" class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-upload"></i> Upload</a>';
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


