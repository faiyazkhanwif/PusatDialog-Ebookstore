<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		#Loading dynamic category between U and A.
		$this->load->model('admin_model');

		$this->load->view('layouts/home_layout');
	}
}
