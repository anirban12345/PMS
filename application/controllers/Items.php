
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends Admin_Controller 
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
        $this->render_template('items/index', $this->data);
    }

    public function create()
	{
        $this->render_template('items/create', $this->data);
    }

    public function edit()
	{
        $i_id=rawurldecode($this->encrypt->decode($_GET['q']));	        
        $this->data['items']=$this->Globalmodel->getdata_by_field_array('*','items',array('items_id'=>$i_id),'items_id', 'asc');
        $this->render_template('items/edit', $this->data);
    }
    
    public function saveItems()
	{
        $this->form_validation->set_rules('items_name', 'Name', 'required');                

        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');
        
        //a:6:{i:0;s:7:"allcase";i:1;s:10:"createcase";i:2;s:10:"updatecase";i:3;s:8:"viewcase";i:4;s:11:"createusers";i:5;s:11:"updateusers";}

        if ($this->form_validation->run() == TRUE) 
		{
            $data=array(                  
                'items_name'=>$this->input->post('items_name'),                                           
            );
            //echo '<pre>';
            //print_r($data);
            $this->Globalmodel->savedata('items',$data);
            $this->session->set_flashdata('successmsg','Items Successfully Created');	
            redirect('Items');
        }
        else{
            $this->render_template('items/create', $this->data);
        }
    }
    public function updateItems()
	{
        $i_id=rawurldecode($this->encrypt->decode($_GET['q']));		        
        $data=array(                  
            'items_name'=>$this->input->post('items_name'),                                           
        );
        //echo '<pre>';
        //print_r($data);
        $this->Globalmodel->updatedata('items','items_id',$i_id,$data);
        $this->session->set_flashdata('successmsg','Items Successfully Updated');	
        redirect('Items');
    } 

    public function getItems()
	{
        $items=$this->Globalmodel->getdata('*','items','items_id', 'asc');
        $data = array();
        $i=1;
		foreach($items as $r)
		{
            $sub_array = array();
            $sub_array[] = $i++;            
            $sub_array[] = $r->items_name;            
            $sub_array[] = '<a role="button" href="'.base_url('Items/edit?q='.urlencode($this->encrypt->encode($r->items_id))).'" class="btn btn-info btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>';                            
			$data[] = $sub_array;
		}

		$output = array(			
			"data"   =>  $data
		   );
		   
		echo json_encode($output);
    }

    public function getfile()
    {

        $image = file_get_contents('/home/ddsw/Anirban/processscan/032883/1598078101.jpg', true);
        $image_codes = base64_encode($image);

        $str='<img class="example-image img-thumbnail" width=100 src="data:image/jpg;charset=utf-8;base64,'.$image_codes.'" alt=""/>';
        echo $str;
        //echo getcwd();
        //echo FCPATH;
        //echo $_SERVER['DOCUMENT_ROOT'];

        $dir = dirname("/home/ddsw/Anirban/processscan/032883/1598078101.jpg");
        $file = basename("/home/ddsw/Anirban/processscan/032883/1598078101.jpg");
        //echo $dir.'/'.$file;
        
        $total=$dir.'/'.$file;
        $str='<img class="example-image img-thumbnail" width=100 src="'.$total.'" alt=""/>';
        echo $str;
    }
}   


