<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$type = $this->session->userdata('type');
		if($type != 'U')
		{
			$this->session->set_flashdata('no_access', '<i class="fas fa-exclamation-triangle"></i> You are not allowed or not logged in! Please Log in with an user account');
			redirect('users/login');
		}

		/*=== Load the cart library ===*/
		$this->load->library('cart');
	}

	public function index()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		#...Get User Info
		$id = $this->session->userdata('id');
		$this->load->model('user_model');
		$view['user_details'] = $this->user_model->get_user_details($id);

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


		$view['user_view'] = "users/user_index";
		$this->load->view('layouts/user_home', $view);
	}
/*
	public function sell_books()
	{
		
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		

		$config = [
			'upload_path'=>'./uploads/image/',
			'allowed_types'=>'jpg|png',
			'max_size' => '400',
			'overwrite' => FALSE
		];

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('book_name', 'Book name', 'trim|required|strip_tags[book_name]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[100]|strip_tags[description]');
		$this->form_validation->set_rules('author', 'Author name', 'trim|required|strip_tags[author]');
		$this->form_validation->set_rules('publisher', 'Publisher name', 'trim|required|strip_tags[publisher]');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|alpha_numeric_spaces|strip_tags[price]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|strip_tags[quantity]');
		$this->form_validation->set_rules('categoryId', 'Category', 'trim|required');
		
		$this->form_validation->set_rules('conditionBox', 'Check box', 'trim|required');


		if(($this->form_validation->run() && $this->upload->do_upload()) == FALSE)
		{

			$view['user_view'] = "users/sell_books";
			$this->load->view('layouts/user_home', $view);

		}
		else
		{	
			$this->load->model('user_model');

			if($this->user_model->add_books())
			{
				$this->session->set_flashdata('success', 'Book added successfully,this book will published by admin soon.');
				redirect('user_home');
			}
			else
			{
				print $this->db->error();
			}
			redirect('user_home/myBooks');	
		}

		
	}
*/
	public function myBooks()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		$this->load->model('user_model');
		$view['books'] = $this->user_model->my_books();

		$view['user_view'] = "users/users_books";
		$this->load->view('layouts/user_home', $view);
	}

	public function myBooks_delete($id)
	{
		$this->load->model('user_model');
		$this->user_model->delete_book($id);

		$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> Book deleted successfully');
		redirect('user_home/myBooks');
	}

	public function my_orders()
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		$this->load->model('user_model');
		$view['orders'] = $this->user_model->my_orders();

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

		$view['user_view'] = "users/bought_books";
		$this->load->view('layouts/user_home', $view);	
	}

	public function order_view($orderId)
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/

		$this->load->model('admin_model');
		$view['order_detail'] = $this->admin_model->get_order_detail($orderId);

		if($this->admin_model->get_order_detail($orderId))
		{
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

			$view['user_view'] = "users/myOrder_detail";
			$this->load->view('layouts/user_home', $view);
		}
		else
		{
			$view['user_view'] = "temp/404page";
			$this->load->view('layouts/user_home', $view);
		}
		

	}


	public function edit_profile($id)
	{
		/*=== LOAD DYNAMIC CATAGORY ===*/
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();
		/*==============================*/
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
		#get existing informations
		$this->load->model('user_model');
		$view['user_details'] = $this->user_model->get_user_details($id);

		$this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags[name]');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric|strip_tags[contact]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[3]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
			'trim|required|alpha_dash|min_length[3]|matches[password]');
		//$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[80]|strip_tags[address]');

		//$this->form_validation->set_rules('city', 'City', 'trim|required|strip_tags[city]');

		if($this->form_validation->run() == FALSE)
		{
			if($this->user_model->get_user_details($id))
			{
				$view['user_view'] = "users/edit_profile";
				$this->load->view('layouts/user_home', $view);
			}
			else
			{
				$view['user_view'] = "temp/404page";
				$this->load->view('layouts/user_home', $view);
			}
		}
		else
		{
			$this->load->model('user_model');

			if($this->user_model->edit_profile($id, $data))
			{
				$this->session->set_flashdata('success', 'Your profile info update successfully');
				redirect('user_home');
			}
			else
			{
				print $this->db->error();
			}
		}
	}

	public function boughtbooks()
	{
		$this->load->model('user_model');
		$this->load->library('pagination');
		$config = [

			'base_url' => base_url('user_home/boughtbooks'),
			'per_page' => 10,
			'total_rows'=>  $this->user_model->num_rows_bought_books(),
			'full_tag_open' => "<ul class='custom-pagination'>",
			'full_tag_close' => "</ul>", 
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_link'=>'last',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'cur_tag_open' => "<li class = 'active'><a>",
			'cur_tag_close' => '</a></li>',
		];
		$this->pagination->initialize($config);


		$this->load->model('user_model');
		$view['books'] = $this->user_model->get_boughtbooks($config['per_page'], $this->uri->segment(3));

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

		$view['user_view'] = "users/bought_books";
		$this->load->view('layouts/user_home', $view);	
	}


}