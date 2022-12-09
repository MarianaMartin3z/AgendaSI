<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class calendars extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CalendarModel', 'use');
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
}
