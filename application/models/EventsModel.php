<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EventsModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_all()
	{
		$q = $this->db->get('event');
		return $q;
	}

	public function save($data)
	{
		return $this->db->insert('event', $data);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('event');
	}
}
