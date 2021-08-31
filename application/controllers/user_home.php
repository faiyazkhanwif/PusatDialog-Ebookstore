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


		$this->load->library('cart');
	}

	public function index()
	{

		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
	
		$id = $this->session->userdata('id');
		$this->load->model('User_model');
		$view['user_details'] = $this->User_model->get_user_details($id);
		$view['mem_details'] = $this->User_model->get_mem_details($id);
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


		$view['user_view'] = "users/user_index";
		$this->load->view('layouts/user_home', $view);
	}


	public function my_orders()
	{
		
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		

		$this->load->model('User_model');
		$view['orders'] = $this->User_model->my_orders();

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

		$view['user_view'] = "users/bought_books";
		$this->load->view('layouts/user_home', $view);	
	}


	public function alpha_dash_space($fullname){
		if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function edit_profile()
	{
		
		$this->load->model('Admin_model');
		$view['category'] = $this->Admin_model->get_category();
		
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
		#get existing informations
		$this->load->model('User_model');

		$id = $this->session->userdata('id');
		$view['user_details'] = $this->User_model->get_user_details($id);

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[80]|strip_tags[name]|callback_alpha_dash_space');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[10]|numeric|strip_tags[contact]');


		if($this->form_validation->run() == FALSE)
		{//$this->session->set_flashdata('danger', validation_errors());
	if($this->User_model->get_user_details($id))
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
	$this->load->model('User_model');

	if($this->User_model->edit_profile($id))
	{
		$this->session->set_flashdata('success', 'Your profile information has been updated successfully.');
		redirect('user_home');
	}
	else
	{
		print $this->db->error();
	}
}
}
public function validate_strongpass($str)
{
	$password = trim($str);

	$regex_lowercase = '/[a-z]/';
	$regex_uppercase = '/[A-Z]/';
	$regex_number = '/[0-9]/';
	$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';

	if (empty($password))
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field is required.');

		return FALSE;
	}

	if (preg_match_all($regex_lowercase, $password) < 1)
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field must be have least one lowercase letter.');

		return FALSE;
	}

	if (preg_match_all($regex_uppercase, $password) < 1)
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field must have at least one uppercase letter.');

		return FALSE;
	}

	if (preg_match_all($regex_number, $password) < 1)
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field must have at least one number.');

		return FALSE;
	}

	if (preg_match_all($regex_special, $password) < 1)
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));

		return FALSE;
	}

	if (strlen($password) < 5)
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field must be at least 5 characters in length.');

		return FALSE;
	}

	if (strlen($password) > 32)
	{
		$this->form_validation->set_message('validate_strongpass', 'The {field} field cannot exceed 32 characters in length.');

		return FALSE;
	}

	return TRUE;
}

public function change_password()
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
		#get existing informations
	$this->load->model('User_model');

	$id = $this->session->userdata('id');
	$view['user_details'] = $this->User_model->get_user_details($id);


	$this->form_validation->set_rules('oldpassword', 'Current Password', 'trim|required|callback_validate_strongpass');

	$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|callback_validate_strongpass');
	$this->form_validation->set_rules('repassword', 'Confirm Password',
		'trim|required|callback_validate_strongpass|matches[newpassword]');


	if($this->form_validation->run() == FALSE)
	{
		if($this->User_model->get_user_details($id))
		{
			$view['user_view'] = "users/change_password";
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
		$cur_password = $this->input->post('oldpassword');
		$this->load->model('User_model');
		$passwd = $this->User_model->getCurrPassword($id);


		if(password_verify($cur_password, $passwd->password)){
			if($this->User_model->changepass($id))
			{
				$this->session->set_flashdata('success', 'Your have changed your password successfully.');
				redirect('user_home');
			}
			else
			{
				print $this->db->error();
			}
		}
		else{
			$this->session->set_flashdata('danger', 'Please enter your current password correctly.');
			$view['user_view'] = "users/change_password";
			$this->load->view('layouts/user_home', $view);
		}

	}
}



public function boughtbooks()
{
	$this->load->model('User_model');
	$this->load->library('pagination');
	$config = [

		'base_url' => base_url('user_home/boughtbooks'),
		'per_page' => 10,
		'total_rows'=>  $this->User_model->num_rows_bought_books(),
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
	$this->load->model('Admin_model');
	$view['category'] = $this->Admin_model->get_category();

	$this->load->model('User_model');
	$view['books'] = $this->User_model->get_boughtbooks($config['per_page'], $this->uri->segment(3));

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

	$view['user_view'] = "users/bought_books";
	$this->load->view('layouts/user_home', $view);	
}


public function myreviews(){
	$this->load->model('User_model');
	
	$this->load->model('Admin_model');
	$view['category'] = $this->Admin_model->get_category();

	$this->load->model('User_model');
	$view['reviews'] = $this->User_model->my_reviews();

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

	$view['user_view'] = "users/myreviews";
	$this->load->view('layouts/user_home', $view);
}

public function reviewdelete($id)
{
	$this->load->model('User_model');
	$this->User_model->reviewdelete($id);

	$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> Review deleted successfully');
	redirect('user_home/myreviews');
}
public function editreview($id)
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
				#get existing informations
	$this->load->model('User_model');
	$view['review'] = $this->User_model->get_review_details($id);

	$this->form_validation->set_rules('review', 'Review', 'trim|required|strip_tags[review]');


	if($this->form_validation->run() == FALSE)
	{
		if($this->User_model->get_review_details($id))
		{
			$view['user_view'] = "users/editreview";
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
		$this->load->model('User_model');

		if($this->User_model->editreview($id))
		{
			$this->session->set_flashdata('success', 'Review has been updated successfully.');
			redirect('user_home/myreviews');
		}
		else
		{
			print $this->db->error();
		}
	}
}

public function readbook($id)
{	
		//print($id);
	if ($this->session->userdata('logged_in') == TRUE) {
		$this->load->model('User_model');
		$ud = $this->User_model->get_user_details($this->session->userdata('id'));

		$ownerverification = count($this->User_model->readbookverification($id));
		if ($ownerverification<1) {
			if ($ud->membershipstatus=="pro") {
				$this->load->model('User_model');
				$memdetails = $this->User_model->get_mem_details($ud->id);
				$expiredate = $memdetails->expiredate;
				$todaydate = date("Y-m-d");
				$exp = strtotime($expiredate);
				$td = strtotime($todaydate);
				if ($td>$exp) {
					redirect('users/logout');
				}
			}elseif ($ud->membershipstatus=="normal") {
				redirect('users/logout');
			}
		}
	}

	$this->load->model('User_model');
	$view['logos'] = $this->User_model->logo_generate();

	$this->load->model('User_model');
	$view['names'] = $this->User_model->name_generate();


	$this->load->model('User_model');
	$view['book_detail'] = $this->User_model->get_book_detail($id);

		//$view['user_view'] = "users/read_books";
	$this->load->view('users/read_books',$view);
}


public function book_view($id)
{
	$this->load->model('User_model');

	$this->load->model('Admin_model');
	$view['book_detail'] = $this->Admin_model->get_book_detail($id);

	$this->load->model('Admin_model');
	$view['category'] = $this->Admin_model->get_category();

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
	$view['reviews'] = $this->User_model->get_reviews();


	if($this->Admin_model->get_book_detail($id))
	{ 
		$view['user_view'] = "users/book_view";
		$this->load->view('layouts/user_home', $view);
	}
	else
	{	
		$view['user_view'] = "temp/404page";
		$this->load->view('layouts/user_home', $view);
	}
}



}