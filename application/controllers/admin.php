<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$type = $this->session->userdata('type');
		if($type != 'A')
		{
			$this->session->set_flashdata('no_access', '<i class="fas fa-exclamation-triangle"></i> You are not allowed or not logged in! Please Log in with an admin account');
			redirect('users/login');
		}
		
	}

/*=============== Admin Index Page =================*/
	public function index()
	{
		$this->load->model('admin_model');
		
		$view['admin_view'] = "admin/admin_index";
		$this->load->view('layouts/admin_layout', $view);
	}


/*==================================================
					USERS
====================================================*/

/*============= Display all Users ================*/
	public function allUsers()
	{
		$this->load->model('admin_model');
		$view['users_data'] = $this->admin_model->get_users();

		$view['admin_view'] = "admin/view_users";
		$this->load->view('layouts/admin_layout', $view);
	}
/*=============== ADD Users By admin ===============*/
	public function add_users()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_dash|min_length[3]');
		$this->form_validation->set_rules('repassword', 'Confirm Password',
		'trim|required|alpha_dash|min_length[3]|matches[password]');
		$this->form_validation->set_rules('type', 'Type','trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[80]|strip_tags[address]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|alpha_numeric_spaces');


		if($this->form_validation->run() == FALSE)
		{
			$view['admin_view'] = "admin/add_users";
			$this->load->view('layouts/admin_layout', $view);
		}
		else
		{
			$this->load->model('admin_model');

			if($this->admin_model->add_user())
			{
				$this->session->set_flashdata('success', 'User has been added successfully.');
				redirect('admin/allUsers');
			}
			else
			{
				print $this->db->error();
			}

		}
	}
/*=============== Delete User =================*/
	public function user_delete($id)
	{
		$this->load->model('admin_model');
		$this->admin_model->delete_user($id);

		$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> User deleted successfully.');
		redirect('admin/allUsers');
	}

/*======================================================
					CATEGORY
========================================================*/

/*============= Category && Category List Page =========*/
	public function category()
	{
		$this->load->model('admin_model');
		$view['category'] = $this->admin_model->get_category();

		$view['admin_view'] = "admin/category";
		$this->load->view('layouts/admin_layout', $view);
	}

/*============ Category Create page =====================*/
	public function add_category()
	{
		$this->form_validation->set_rules('category', 'Category name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('tag', 'Category tag', 'trim|required|alpha|strip_tags[tag]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|strip_tags[description]');

		if($this->form_validation->run() == FALSE)
		{
			$view['admin_view'] = "admin/add_category";
			$this->load->view('layouts/admin_layout', $view);
		}
		else
		{
			$this->load->model('admin_model');
			if($this->admin_model->create_category())
			{
				$this->session->set_flashdata('success', 'Category created successfully');
				redirect('admin/category');
			}
			else
			{
				print $this->db->error();
			}
		}

	}

/*================ Category Detail display page ================*/
	public function ctg_view($id)
	{
		$this->load->model('admin_model');
		$view['ctg_detail'] = $this->admin_model->get_ctg_detail($id);

		if($this->admin_model->get_ctg_detail($id))
		{
			$view['admin_view'] = "admin/ctg_view";
			$this->load->view('layouts/admin_layout', $view);
		}
		else
		{
			$view['admin_view'] = "temp/404page";
			$this->load->view('layouts/admin_layout', $view);
		}

	}

/*================ Category Edit || Update ================*/
	public function ctg_edit($id)
	{
		/* For geting the existing info...*/
		$this->load->model('admin_model');
		$view['ctg_detail'] = $this->admin_model->get_ctg_detail($id);

		$this->form_validation->set_rules('category', 'Category name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('tag', 'Category tag', 'trim|required|alpha|strip_tags[tag]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|strip_tags[description]');


		if($this->form_validation->run() == FALSE)
		{
			if($this->admin_model->get_ctg_detail($id))
			{
				$view['admin_view'] = "admin/ctg_edit";
				$this->load->view('layouts/admin_layout', $view);
			}
			else
			{
				$view['admin_view'] = "temp/404page";
				$this->load->view('layouts/admin_layout', $view);
			}

		}
		else
		{
			$this->load->model('admin_model');
			if($this->admin_model->edit_category($id, $data))
			{
				$this->session->set_flashdata('success', 'Category Updated successfully');
				redirect('admin/category');
			}
			else
			{
				print $this->db->error();
			}
		}
	}

/*=============== Delete Category =================*/
	public function ctg_delete($id)
	{
		$this->load->model('admin_model');
		$this->admin_model->delete_category($id);

		$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> Category deleted successfully');
		redirect('admin/category');
	}




}
