<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminUser extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library("Excel");		
		$this->load->model("AdminUserModel");	
    }
	public function index()
	{	
			
	}
	public function adminhome()
	{
		$this->load->view('Admin/adminheader');
		$data['rec']=$this->AdminUserModel->count_user();
		$data['rec1']=$this->AdminUserModel->count_process();
		$data2['rec']=$this->AdminUserModel->user_reg_by_date();	
		$data2['rec2']=$this->AdminUserModel->process_list_by_date();	
		$this->load->view('Admin/welcome',$data);
		$this->load->view('Admin/welcomefooter',$data2);
	}
	public function export_excel() 
	{
		$this->excel->setActiveSheetIndex(0);
		$data = $this->AdminUserModel->user_list();
        $this->excel->stream('UserList_'.date('Y-m-d').'.xls', $data);
    }
	public function export_pdf()
    {
        //load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        //retrieve data from model
        $data['rec'] = $this->AdminUserModel->user_list();        
        ini_set('memory_limit', '256M'); 
        //boost the memory limit if it's low ;)
	     
	    $html='<html>
		<head>
			<style>
					table 
					{
							font-family: verdana;
							border: 1px solid #ccc;
							border-collapse: collapse;
					}
					td,th 
					{
						padding: 5px;
						border: 1px solid #ccc;
						vertical-align: middle;
					}
			</style>
			<title>User_List_' . date('Y_m_d_H_i_s') . '_.pdf</title>
		</head>
		<body>
		<table>
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>                  
				  <th>Address</th>                  
				  <th>Phone</th>                  
				  <th>Email</th>                  
				  <th>User Type</th>                  
				  <th>Status</th>                  
                </tr>
                </thead>
                <tbody>';
		foreach($data['rec'] as $r)
		{			
			$html.='<tr>
					  <td>'.$r->Firstname.'</td>
					  <td>'.$r->Lastname.'</td>
					  <td>'.$r->Address.'</td>
					  <td>'.$r->Phone.'</td>
					  <td>'.$r->Email.'</td>
					  <td>'.$r->Title.'</td>';
					  if($r->Uflag==0)
					  {
						$html.='<td>Deactive</td>';
					  }	
					  else
					  {
						$html.='<td>Active</td>';}
			$html.='</tr>';
		}	
        $html.='</tbody></table></body></html>';
		
		$pdf->SetHTMLHeader('<div style="text-align: center; font-weight: bold;font-size:24px;margin-bottom:20px;">User List</div>');
		$pdf->SetHTMLFooter('<table width="100%"><tr>
        <td width="33%">{DATE j-M-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">User List</td></tr></table>');
        // render the view into HTML
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'User_List_' . date('Y_m_d_H_i_s') . '_.pdf';
		$pdf->SetWatermarkText('Aniz User List');
		$pdf->showWatermarkText = true;
		$pdf->watermarkTextAlpha = 0.1;
        $pdf->Output("$output", 'I'); // save to file because we can
        exit();
    }
	
	public function export_excel_process() 
	{
		$this->excel->setActiveSheetIndex(0);
		$data = $this->AdminUserModel->process_list();
        $this->excel->stream('UserList_'.date('Y-m-d').'.xls', $data);
    }
	public function export_pdf_process()
    {
        //load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        //retrieve data from model
        $data['rec'] = $this->AdminUserModel->process_list();        
        ini_set('memory_limit', '256M'); 
        //boost the memory limit if it's low ;)
	     
	    $html='<html>
		<head>
			<style>
					table 
					{
							font-family: verdana;
							border: 1px solid #ccc;
							border-collapse: collapse;
					}
					td,th 
					{
						padding: 5px;
						border: 1px solid #ccc;
						vertical-align: middle;
					}
			</style>
			<title>Process_List_' . date('Y_m_d_H_i_s') . '_.pdf</title>
		</head>
		<body>
		<table>
                <thead>
                <tr>
                  <th>Send date</th>
                  <th>Req From</th>                  
				  <th>Subject</th>                  
				  <th>Recieve date</th>                  
				  <th>Memo No</th>                  
				  <th>Req Sendto</th>                  
				  <th>Remarks</th> 
				  <th>OC Putup Date</th>				  
				  <th>Status</th>                
                </tr>
                </thead>
                <tbody>';
		foreach($data['rec'] as $r)
		{			
			$html.='<tr>';
			$html.='<td>'.date("d-M-Y",strtotime($r->Send_date)).'</td>';
			$html.='<td>'.$r->Req_From.'</td>';
			$html.='<td>'.$r->Subject.'</td>';
			$html.='<td>'.date("d-M-Y",strtotime($r->Recieve_date)).'</td>';
			$html.='<td>'.$r->Memo_no.'</td>';
			$html.='<td>'.$r->Req_Sendto.'</td>';
			$html.='<td>'.$r->Remarks.'</td>';
			$html.='<td>'.date("d-M-Y",strtotime($r->Ocputup_Date)).'</td>';
			$html.='<td>'.$r->Status.'</td>';	
			$html.='</tr>';
		}	
        $html.='</tbody></table></body></html>';
		
		$pdf->SetHTMLHeader('<div style="text-align: center; font-weight: bold;font-size:24px;margin-bottom:20px;">Process List</div>');
		$pdf->SetHTMLFooter('<table width="100%"><tr>
        <td width="33%">{DATE j-M-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Process List</td></tr></table>');
        // render the view into HTML
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'Process_List_' . date('Y_m_d_H_i_s') . '_.pdf';
		$pdf->SetWatermarkText('Process List');
		$pdf->showWatermarkText = true;
		$pdf->watermarkTextAlpha = 0.1;
        $pdf->Output("$output", 'I'); // save to file because we can
        exit();
    }
	public function export_excel_process_details() 
	{
		$this->excel->setActiveSheetIndex(0);
		$id = $this->session->userdata('processid');
		$data['rec']=$this->AdminUserModel->process_by_id_by_user($id);		
		$data['rec1']=$this->AdminUserModel->process_image_list_by_id($id);
		$data['rec2']=$this->AdminUserModel->process_stat_list_by_id_by_user($id);
        $this->excel->stream('PrcessDetailsList_'.date('Y-m-d').'.xls', $data);
    }
	
	public function export_pdf_process_details()
    {   
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $id = $this->session->userdata('processid');
		
		
        $data['rec']=$this->AdminUserModel->process_by_id_by_user($id);		
		$data['rec1']=$this->AdminUserModel->process_image_list_by_id($id);
		$data['rec2']=$this->AdminUserModel->process_stat_list_by_id_by_user($id);
        ini_set('memory_limit', '256M'); 
        //boost the memory limit if it's low ;)
	     
	    $html='<html>
		<head>
			<style>
					table 
					{
							font-family: verdana;
							border: 1px solid #ccc;
							border-collapse: collapse;
					}
					td,th 
					{
						padding: 5px;
						border: 1px solid #ccc;
						vertical-align: middle;
					}
			</style>
			<title>Process_Deatils_List_' . date('Y_m_d_H_i_s') . '_.pdf</title>
		</head>
		<body>
		<table>
                <thead>
				<tr><th colspan="9">Process Details</th></tr>
                <tr>
                  <th>Send date</th>
                  <th>Req From</th>                  
				  <th>Subject</th>                  
				  <th>Recieve date</th>                  
				  <th>Memo No</th>                  
				  <th>Req Sendto</th>                  
				  <th>Remarks</th> 				  
				  <th>Status</th>
				  <th>User</th>               
                </tr>
                </thead>
                <tbody>';
		foreach($data['rec'] as $r)
		{			
			$html.='<tr><td>'.date("d-M-Y",strtotime($r->Send_date)).'</td>
					  <td>'.$r->Req_From.'</td>
					  <td>'.$r->Subject.'</td>
					  <td>'.date("d-M-Y",strtotime($r->Recieve_date)).'</td>
					  <td>'.$r->Memo_no.'</td>
					  <td>'.$r->Req_Sendto.'</td>
					  <td>'.$r->Remarks.'</td>
					  <td>'.$r->Status.'</td>					  
					  <td>'.$r->Firstname.'</td></tr>';
		}	
        $html.='</tbody></table>';
		
		$html.='<table width="100%">
                <thead>
				<tr><th colspan="4">Process Details Status</th><tr>
                <tr>	  	  
				  <th>Status Date</th>
				  <th>Status Time</th>
				  <th>Status</th>
				  <th>User</th>
                </tr>
                </thead>
                <tbody>';
        foreach($data['rec2'] as $r)
		{ 
			$html.='<tr>					  
					  <td>'.date("d-M-Y",strtotime($r->Status_Date)).'</td>					  
					  <td>'.$r->Status_Time.'</td>					  
					  <td>'.$r->Status.'</td>
					  <td>'.$r->Firstname.'</td>
					</tr>'; 
		} 
        $html.='</tbody></table>';
		
		$html.='</body></html>';
		
		$pdf->SetHTMLHeader('<div style="text-align: center; font-weight: bold;font-size:24px;margin-bottom:20px;">Process Deatils List</div>');
		$pdf->SetHTMLFooter('<table width="100%"><tr>
        <td width="33%">{DATE j-M-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">Process List</td></tr></table>');
        // render the view into HTML
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $output = 'Process_Deatils_List_' . date('Y_m_d_H_i_s') . '_.pdf';
		$pdf->SetWatermarkText('Prcess Deatils List');
		$pdf->showWatermarkText = true;
		$pdf->watermarkTextAlpha = 0.1;
        $pdf->Output("$output", 'I'); // save to file because we can
        exit();
    }
	
	public function user_list()
	{
			$data['rec']=$this->AdminUserModel->user_list();
			$this->load->view('Admin/adminheader');
			$this->load->view('Admin/userlist',$data);
			$this->load->view('Admin/footer');
	}
	public function process_list()
	{
			$data['rec']=$this->AdminUserModel->process_list();
			$data['rec1']=$this->AdminUserModel->process_image_list();
			
			//print_r($data);
			
			$this->load->view('Admin/adminheader');
			$this->load->view('Admin/processlist',$data);
			$this->load->view('Admin/footer');
	}
	public function process_image_list()
	{
	        $this->db->select('*');
	        $this->db->from('process_image');		
	        $this->query=$this->db->get();
	        return $this->query->result();
	}
	public function process_detail($id)
	{
		    $this->session->set_userdata('processid',$id);
			$data['rec']=$this->AdminUserModel->process_by_id_by_user($id);		
			$data['rec1']=$this->AdminUserModel->process_image_list_by_id($id);
			$data['rec2']=$this->AdminUserModel->process_stat_list_by_id_by_user($id);
			$this->load->view('Admin/adminheader');
			$this->load->view('Admin/processdetail',$data);
			$this->load->view('Admin/footer');
	}	
	public function update_user($id)
	{
			$data['rec']=$this->AdminUserModel->user_by_id($id);
			//$data['rec1']=$this->AdminUserModel->user_level();			
			$this->load->view('Admin/adminheader');
			$this->load->view('Admin/updateuser',$data);
			$this->load->view('Admin/footer');			
	}	
	public function delete_user($id)
	{
			/*
			print_r($id);
			$data['rec']=$this->AdminUserModel->user_list();
			$this->load->view('Admin/adminheader');
			$this->load->view('Admin/updateuser',$data);
			$this->load->view('footer');
			*/
	}
	public function activate_user($id)
	{
	        //$id=$this->input->post('id');
			//$uflag=$this->input->post('uflag');
			
			$data['rec']=$this->AdminUserModel->userflag_by_id($id);
			//echo $data['rec'];
			$uflag=0;
			
			foreach($data['rec'] as $r)
			{
				if($r->Uflag==0)
				{
				   $uflag=1;
				}
			}
			$data=array('Uflag'=>$uflag);
			$this->AdminUserModel->user_activate($id,$data);			
			redirect('Admin/AdminUser/user_list', 'refresh');
	}
	public function dbbackup()
	{
		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable
		$backup = $this->dbutil->backup();

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('/path/to/pms_db.zip', $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('pms_db.zip', $backup);
		
		$prefs = array(
        'tables'        => array('process', 'process_image','process_status'),   // Array of tables to backup.
        'ignore'        => array(),                     // List of tables to omit from the backup
        'format'        => 'txt',                       // gzip, zip, txt
        'filename'      => 'pms_db.sql',              // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
	);

		$this->dbutil->backup($prefs);
	}

	function empty_all()
	{
	  $this->db->truncate('process'); 
	  $this->db->truncate('process_status'); 
	  $this->db->truncate('process_image'); 
	  
	  redirect('user/login_user', 'refresh');
	}
	
	public function user_logout()
	{
		$this->session->sess_destroy();
		redirect('user', 'refresh');
	}
}


