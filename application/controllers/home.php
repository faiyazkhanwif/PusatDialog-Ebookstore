<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		/*=== Load the cart library ===*/
		$this->load->library('cart');
		$this->load->library('stripe_lib');
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
		$view['logos'] = $this->user_model->logo_generate();

		$this->load->model('user_model');
		$view['names'] = $this->user_model->name_generate();

		/*=== CSE Books ===*/
		//$this->load->model('user_model');
		//$view['cse_books'] = $this->user_model->cse_books();

		$this->load->view('layouts/home_layout', $view);
	}
}
