<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('logged_in') == FALSE)
		{
			$this->session->set_flashdata('no_access', '<i class="fas fa-exclamation-triangle"></i> You are not allowed or not logged in! Please Log in.');
			redirect('users/login');
		}

		/*=== Load the cart library ===*/
		$this->load->library('cart');
	}

	public function index()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		/*==============================*/
		$this->form_validation->set_rules('paymentcheck', 'Payment methods', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{
			if($this->cart->contents())
			{

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
				
				$view['user_view'] = "users/checkout_page";
				$this->load->view('layouts/user_layout', $view);
			}
			else
			{
				$this->session->set_flashdata('cart_error', '<i class="fas fa-exclamation-triangle"></i> You cart is empty! Add E-books to cart for checkout.');
				redirect('cart');
			}

		}
		else
		{
			$this->load->model('User_model');

			if($this->User_model->add_orders())
			{
				$this->cart->destroy();
				redirect('checkout/place_order');

			}
		}
		
	}

	public function place_order()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		/*==============================*/

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
		$view['dscs'] = $this->User_model->ft_generate();
		$view['user_view'] = "users/place_order_page";
		$this->load->view('layouts/user_layout', $view);
	}


	
}
