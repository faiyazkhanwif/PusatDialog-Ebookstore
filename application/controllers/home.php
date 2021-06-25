<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		
		$this->load->library('cart');
	}

	public function index()
	{
		
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		

		
		$this->load->model('User_model');
		$view['books'] = $this->User_model->recent_books();

		$this->load->model('User_model');
		$view['mem_details'] = $this->User_model->get_mem_details($this->session->userdata('id'));

		$this->load->model('User_model');
		$view['user_details'] = $this->User_model->get_user_details($this->session->userdata('id'));

		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();

		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate(); 

		$this->load->model('User_model');
		$view['abtdscs'] = $this->User_model->about_generate(); 

		$this->load->model('User_model');
		$view['contactdscs'] = $this->User_model->contact_generate();


		$this->load->model('User_model');
		$view['contactdscs'] = $this->User_model->contact_generate(); 



		$this->load->view('layouts/home_layout', $view);
	}
}
