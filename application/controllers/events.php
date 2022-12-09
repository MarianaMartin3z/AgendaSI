<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class events extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EventsModel', 'use');
	}

	public function index_get()
	{
		$data = $this->use->get_all()->result();
		if ($data) {
			$res = $data;
		} else {
			$res['error'] = true;
			$res['message'] = 'failed get data';
		}
		$this->response($res, 200);
	}
	public function index_post()
    {
        $text = $this->input->post('text');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$color = $this->input->post('color');
		$calendar = $this->input->post('calendar');
		$details = $this->input->post('details');
		$all_day = $this->input->post('all_day');
		$recurring = $this->input->post('recurring');
 

        $data = array(
			'text' => $text,
			'start_date' => $start_date,
			'end_date' => $end_date,
			'color' => $color,
			'calendar' => $calendar,
			'details' => $details,
			'all_day' => $all_day,
			'recurring' => $recurring,
        );

        
		if ($text==null|$start_date==null|$end_date==null|$color==null|$calendar==null|$details==null|$all_day==null) {
			echo($data);
		}else {
			$insert = $this->use->save($data);
			if($insert) {
				$res = $data;
			} else {
				$res['error'] = true;
				$res['message'] = 'insert failed';
				$res['data'] = null;
			}
	
			$this->response($res, 200);  
		}

              
    }
	public function index_delete()
	{
		$id = $this->input;
		if (!empty($id)) {
			$delete = $this->use->delete($id);
			if ($delete) {
				$res['error'] = false;
				$res['message'] = 'delete success';
			} else {
				$res['error'] = true;
				$res['message'] = 'delete failed';
			}
		} else {
			$res['error'] = true;
			$res['message'] = 'delete failed';
		}

		$this->response($res, 200);
	}

}

