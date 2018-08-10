<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library("Excel");	
		$this->load->model('ProcessModel');	
		$this->load->model('AdminUserModel');
		$this->load->library('upload'); 
    }
	public function index()
	{	
		$this->load->view("userheader");
		$this->load->view("processadd");
		$this->load->view("footer");
		
	}
	public function export_excel() 
	{
		$this->excel->setActiveSheetIndex(0);
		$data = $this->ProcessModel->process_list();
        $this->excel->stream('ProcessList_'.date('Y-m-d').'.xls', $data);
    }
	public function export_pdf()
    {
        //load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        //retrieve data from model
        $data['rec'] = $this->ProcessModel->process_list();        
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
				  <th>Type</th>
                  <th>Send date</th>
                  <th>Req From</th>                  
				  <th>Subject</th>                  
				  <th>Recieve date</th>                  
				  <th>Memo No</th>                  
				  <th>Req Send to</th>                  
				  <th>Remarks</th> 
				  <th>OC Putup Date</th>				  
				  <th>Status</th>	                
                </tr>
                </thead>
                <tbody>';
		foreach($data['rec'] as $r)
		{	
            $html.='<tr><td>'.$r->Type.'</td>';
			$html.='<td>'.date("d-M-Y",strtotime($r->Send_date)).'</td>';
			$html.='<td>'.$r->Req_From.'</td>';
			$html.='<td>'.$r->Subject.'</td>';
			$html.='<td>'.date("d-M-Y",strtotime($r->Recieve_date)).'</td>';
			$html.='<td>'.$r->Memo_no.'</td>';
		    $html.='<td>'.$r->Req_Sendto.'</td>';
			$html.='<td>'.$r->Remarks.'</td>';
			$html.='<td>'.$r->Ocputup_Date.'</td>';
			$html.='<td>'.$r->Status.'</td>';
			
			$html.='</tr>';
		}	
        $html.='</tbody></table></body></html>';
		
		$pdf->SetHTMLHeader('<div style="text-align: center; font-weight: bold;font-size:24px;margin-bottom:20px;">Process List</div>');
		$pdf->SetHTMLFooter('<table width="100%"><tr>
        <td width="33%">{DATE j-M-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">User List</td></tr></table>');
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
				  <th>Type</th>
                  <th>Send date</th>
                  <th>Req From</th>                  
				  <th>Subject</th>                  
				  <th>Recieve date</th>                  
				  <th>Memo No</th>                  
				  <th>Req Sendto</th>                  
				  <th>Remarks</th> 				  
				  <th>Status</th>				  
                </tr>
                </thead>
                <tbody>';
		foreach($data['rec'] as $r)
		{			
			$html.='<tr>
					  <td>'.$r->Type.'</td>
			          <td>'.date("d-M-Y",strtotime($r->Send_date)).'</td>
					  <td>'.$r->Req_From.'</td>
					  <td>'.$r->Subject.'</td>
					  <td>'.date("d-M-Y",strtotime($r->Recieve_date)).'</td>
					  <td>'.$r->Memo_no.'</td>
					  <td>'.$r->Req_Sendto.'</td>
					  <td>'.$r->Remarks.'</td>
					  <td>'.$r->Status.'</td></tr>';					  					  
		}	
        $html.='</tbody></table>';
		
		$html.='<table width="100%">
                <thead>
				<tr><th colspan="4">Process Details Status</th><tr>
                <tr>	  	  
				  <th>Status Date</th>
				  <th>Status Time</th>
				  <th>Status</th>				  
                </tr>
                </thead>
                <tbody>';
        foreach($data['rec2'] as $r)
		{ 
			$html.='<tr>					  
					  <td>'.date("d-M-Y",strtotime($r->Status_Date)).'</td>					  
					  <td>'.$r->Status_Time.'</td>					  
					  <td>'.$r->Status.'</td>
					</tr>'; 
		} 
        $html.='</tbody></table></body></html>';
		
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
    public function process_list()
	{
			$data['rec']=$this->ProcessModel->process_list();
			$data['rec1']=$this->ProcessModel->process_image_list();
			$this->load->view('userheader');
			$this->load->view('processlist',$data);
			$this->load->view('footer');
	}	
	public function process_detail($id)
	{
			$this->session->set_userdata('processid',$id);
			$data['rec']=$this->ProcessModel->process_by_id($id);		
			$data['rec1']=$this->ProcessModel->process_image_list_by_id($id);
			$data['rec2']=$this->ProcessModel->process_stat_list_by_id($id);
			$this->load->view('userheader');
			$this->load->view('processdetail',$data);
			$this->load->view('footer');
	}	
	public function do_upload($time)
    {
			    $config['upload_path']     = './uploads/process/';
				$config['file_name']       = $time.'.jpg';				
                $config['allowed_types']   = 'gif|jpg|png';
                $config['max_size']        = 0;
                $config['max_width']       = 1024;
                $config['max_height']      = 768;
				
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
				
                if (!$this->upload->do_upload('Image_Scan'))
                {
					$error = array('error' => $this->upload->display_errors());
                }
                else
                {
					$now = new DateTime();
					$now->setTimezone(new DateTimezone('Asia/Kolkata'));
					
					$processimg=array(
					'Process_Id'=>$this->session->userdata('processid'),
					'Image_Name'=>$time.'.jpg',
					'Pdate'=>$now->format('Y-m-d'),
					'Ptime'=>$now->format('H:i:s'),	
					'User_Id'=>$this->session->userdata('id')		
					);
					$result= $this->ProcessModel->save_image($processimg);
					//echo "h";
                    $data = array('upload_data' => $this->upload->data());
					$this->session->set_flashdata('add_process_image', 'Image Successfully Added');
                    redirect('Process', 'refresh');
                }
    }
	public function add_process()
	{
	    $now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Kolkata'));
	    
        $process=array(
		'Type'=>$this->input->post('Type'),
		'Send_date'=>date("Y-m-d", strtotime($this->input->post('Send_date'))),
		'Req_From'=>$this->input->post('Req_From'),
		'Subject'=>$this->input->post('Subject'),
		'Recieve_date'=>date("Y-m-d", strtotime($this->input->post('Recieve_date'))),
		'Memo_no'=>$this->input->post('Memo_no'),
		'Req_Sendto'=>$this->input->post('Req_Sendto'),		
		'Remarks'=>$this->input->post('Remarks'),		
		'Ocputup_Date'=>date("Y-m-d", strtotime($this->input->post('Ocputup_Date'))),
		'Status'=>'Active',
		'Entry_Date'=>$now->format('Y-m-d'),
		'Entry_Time'=>$now->format('H:i:s'),		
		'Entry_Flag'=>1,
        'User_Id'=>$this->session->userdata('id')		
        );
		
		$process_id=$this->ProcessModel->addprocess($process);
		
		$process_status=array(
		'Process_Id'=>$process_id,
		'Status'=>'Active',
		'Status_Date'=>$now->format('Y-m-d'),
		'Status_Time'=>$now->format('H:i:s'),
		'User_Id'=>$this->session->userdata('id')
		);
		$process_stat_id=$this->ProcessModel->add_process_status($process_status);
		
		$this->session->set_userdata('processid',$process_id);
		$this->session->set_userdata('processstatid',$process_stat_id);
		
		$this->session->set_flashdata('add_process', 'Process Successfully Added');
		redirect('Process', 'refresh');
	}	
	public function update($id)
	{
		$this->session->set_userdata('processid',$id);
		$data['rec']=$this->ProcessModel->process_by_id($id);		
		$data['rec1']=$this->ProcessModel->process_image_list_by_id($id);
		$data['rec2']=$this->ProcessModel->process_stat_list_by_id($id);
		$this->load->view('userheader');
		$this->load->view('processupdate',$data);
		$this->load->view('footer');
	}
	
	public function update_process()
	{
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		
		$process=array(
		'Type'=>$this->input->post('Type'),
		'Send_date'=>date("Y-m-d", strtotime($this->input->post('Send_date'))),
		'Req_From'=>$this->input->post('Req_From'),
		'Subject'=>$this->input->post('Subject'),
		'Recieve_date'=>date("Y-m-d", strtotime($this->input->post('Recieve_date'))),
		'Memo_no'=>$this->input->post('Memo_no'),
		'Req_Sendto'=>$this->input->post('Req_Sendto'),		
		'Remarks'=>$this->input->post('Remarks'),	
		'Ocputup_Date'=>date("Y-m-d", strtotime($this->input->post('Ocputup_Date'))),
		'Status'=>$this->input->post('pre_stat'),		
		'Entry_Date'=>$now->format('Y-m-d'),
		'Entry_Time'=>$now->format('H:i:s'),		
		'Entry_Flag'=>1		
        );
		
		$id=$this->session->userdata('processid');
		
		$process_status=array(
		'Process_Id'=>$id,
		'Status'=>$this->input->post('pre_stat'),
		'Status_Date'=>$now->format('Y-m-d'),
		'Status_Time'=>$now->format('H:i:s'),
		'User_Id'=>$this->session->userdata('id')
		);
		
		$this->ProcessModel->update_process($process,$id);		
		$this->ProcessModel->add_process_status($process_status);		
		$this->session->set_flashdata('update_success_msg', 'Process Has been Updated Sucessfully');		
		redirect('Process/process_list');
	}
	public function delete_process($id)
	{
		/*
		print_r($id);
		$data['rec']=$this->AdminUserModel->user_list();
		$this->load->view('Admin/adminheader');
		$this->load->view('Admin/updateuser',$data);
		$this->load->view('footer');
		*/
	}
	public function user_logout()
	{
		$this->session->sess_destroy();
		redirect('user', 'refresh');
	}
}
?>

