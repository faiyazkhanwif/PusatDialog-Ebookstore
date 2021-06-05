<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		/*=== Load the cart library ===*/
		$this->load->library('cart');
	}

	public function index()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		/*=== Recent Books ===*/
		$this->load->model('user_model');
		$view['books'] = $this->user_model->recent_books();

		$this->load->model('user_model');
		$view['mem_details'] = $this->user_model->get_mem_details($this->session->userdata('id'));

		$this->load->model('user_model');
		$view['user_details'] = $this->user_model->get_user_details($this->session->userdata('id'));

		$this->load->model('user_model');
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		$this->load->model('user_model');
		$view['dscs'] = $this->user_model->ft_generate(); 

		$this->load->model('user_model');
		$view['abtdscs'] = $this->user_model->about_generate(); 

		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate();


		$this->load->model('user_model');
		$view['contactdscs'] = $this->user_model->contact_generate(); 

		/*=== CSE Books ===*/
		//$this->load->model('user_model');
		//$view['cse_books'] = $this->user_model->cse_books();

		$this->load->view('layouts/home_layout', $view);
	}
}
