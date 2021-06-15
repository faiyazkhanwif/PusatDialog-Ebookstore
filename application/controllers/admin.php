<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$type = $this->session->userdata('type');
		if($type != 'A')
		{
			$this->session->set_flashdata('no_access', '<i class="fas fa-exclamation-triangle"></i> You are not allowed or not logged in! Please Log in with an admin account');
			redirect('users/login');
		}

		/*=== Load the cart library ===*/
		$this->load->library('cart');
	}
	public function alpha_dash_space($fullname){
	    if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
	        $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
	        return FALSE;
	    } else {
	        return TRUE;
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
	/*=============== Admin Index Page =================*/
	public function index()
	{
		$this->load->model('Admin_model');
		
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();

		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$this->load->model('User_model');
		$view['abtdscs'] = $this->User_model->about_generate(); 

		$view['admin_view'] = "admin/admin_index";
		$this->load->view('layouts/admin_layout', $view);
	}
/*======================================================
					CATEGORY
					========================================================*/

					/*============= Category && Category List Page =========*/
					public function category()
					{
						$this->load->model('Admin_model');
						$view['category'] = $this->Admin_model->get_category();

						$this->load->model('User_model');
						$view['logos'] = $this->User_model->logo_generate();

						$this->load->model('User_model');
						$view['names'] = $this->User_model->name_generate();

						$this->load->model('User_model');
						$view['dscs'] = $this->User_model->ft_generate();

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
							$this->load->model('User_model');
							$view['logos'] = $this->User_model->logo_generate();

							$this->load->model('User_model');
							$view['names'] = $this->User_model->name_generate();


							$this->load->model('User_model');
							$view['dscs'] = $this->User_model->ft_generate();

							$view['admin_view'] = "admin/add_category";
							$this->load->view('layouts/admin_layout', $view);
						}
						else
						{
							$this->load->model('Admin_model');
							if($this->Admin_model->create_category())
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
						$this->load->model('Admin_model');
						$view['ctg_detail'] = $this->Admin_model->get_ctg_detail($id);

						if($this->Admin_model->get_ctg_detail($id))
						{
							$this->load->model('User_model');
							$view['logos'] = $this->User_model->logo_generate();

							$this->load->model('User_model');
							$view['names'] = $this->User_model->name_generate();

							$this->load->model('User_model');
							$view['dscs'] = $this->User_model->ft_generate();

							$view['admin_view'] = "admin/ctg_view";
							$this->load->view('layouts/admin_layout', $view);
						}
						else
						{
							$this->load->model('User_model');
							$view['logos'] = $this->User_model->logo_generate();

							$this->load->model('User_model');
							$view['names'] = $this->User_model->name_generate();

							$this->load->model('User_model');
							$view['dscs'] = $this->User_model->ft_generate();

							$view['admin_view'] = "temp/404page";
							$this->load->view('layouts/admin_layout', $view);
						}

					}

					/*================ Category Edit || Update ================*/
					public function ctg_edit($id)
					{
						/* For geting the existing info...*/
						$this->load->model('Admin_model');
						$view['ctg_detail'] = $this->Admin_model->get_ctg_detail($id);

						$this->form_validation->set_rules('category', 'Category name', 'trim|required|alpha_numeric_spaces');
						$this->form_validation->set_rules('tag', 'Category tag', 'trim|required|alpha|strip_tags[tag]');
						$this->form_validation->set_rules('description', 'Description', 'trim|required|strip_tags[description]');


						if($this->form_validation->run() == FALSE)
						{
							if($this->Admin_model->get_ctg_detail($id))
							{
								$this->load->model('User_model');
								$view['logos'] = $this->User_model->logo_generate();

								$this->load->model('User_model');
								$view['names'] = $this->User_model->name_generate();

								$this->load->model('User_model');
								$view['dscs'] = $this->User_model->ft_generate();

								$view['admin_view'] = "admin/ctg_edit";
								$this->load->view('layouts/admin_layout', $view);
							}
							else
								{		$this->load->model('User_model');
							$view['logos'] = $this->User_model->logo_generate();

							$this->load->model('User_model');
							$view['names'] = $this->User_model->name_generate();


							$this->load->model('User_model');
							$view['dscs'] = $this->User_model->ft_generate();

							$view['admin_view'] = "temp/404page";
							$this->load->view('layouts/admin_layout', $view);
						}

					}
					else
					{
						$this->load->model('Admin_model');
						if($this->Admin_model->edit_category($id))
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
					$this->load->model('Admin_model');
					$this->Admin_model->delete_category($id);

					$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> Category deleted successfully');
					redirect('admin/category');
				}



/*==================================================
					USERS
					====================================================*/

					/*============= Display all Users ================*/
					public function allUsers()
					{
						$this->load->model('Admin_model');
						$view['users_data'] = $this->Admin_model->get_users();

						$this->load->model('User_model');
						$view['logos'] = $this->User_model->logo_generate();

						$this->load->model('User_model');
						$view['names'] = $this->User_model->name_generate();

						$this->load->model('User_model');
						$view['dscs'] = $this->User_model->ft_generate();

						$view['admin_view'] = "admin/view_users";
						$this->load->view('layouts/admin_layout', $view);
					}

					public function currentpromembers()
					{
						$this->load->model('Admin_model');
						$view['users_data'] = $this->Admin_model->get_promembers();

						$this->load->model('User_model');
						$view['logos'] = $this->User_model->logo_generate();

						$this->load->model('User_model');
						$view['names'] = $this->User_model->name_generate();

						$this->load->model('User_model');
						$view['dscs'] = $this->User_model->ft_generate();

						$view['admin_view'] = "admin/view_prousers";
						$this->load->view('layouts/admin_layout', $view);
					}
					/*=============== ADD Users By admin ===============*/
					public function add_users()
					{
						$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[80]|callback_alpha_dash_space');
						$this->form_validation->set_rules('contact', 'Contact', 'trim|min_length[10]|max_length[15]|required|numeric');
						$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
						$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_validate_strongpass');
						$this->form_validation->set_rules('repassword', 'Confirm Password',
							'trim|required|callback_validate_strongpass|matches[password]');
						$this->form_validation->set_rules('type', 'Type','trim|required');
						//$this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[80]|strip_tags[address]');
						//$this->form_validation->set_rules('city', 'City', 'trim|required|alpha_numeric_spaces');


						if($this->form_validation->run() == FALSE)
						{		
							$this->load->model('User_model');
							$view['logos'] = $this->User_model->logo_generate();

							$this->load->model('User_model');
							$view['names'] = $this->User_model->name_generate();

							$this->load->model('User_model');
							$view['dscs'] = $this->User_model->ft_generate();

							$view['admin_view'] = "admin/add_users";
							$this->load->view('layouts/admin_layout', $view);
						}
						else
						{
							$this->load->model('Admin_model');

							if($this->Admin_model->add_user())
							{
								$this->session->set_flashdata('success', 'User Registration is successful');
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
						$this->load->model('Admin_model');
						$this->Admin_model->delete_user($id);

						$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> User deleted successfully');
						redirect('admin/allUsers');
					}

					public function edit_user($id)
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
						$this->load->model('Admin_model');
						$view['user_details'] = $this->Admin_model->get_user_details($id);

						$this->form_validation->set_rules('name', 'Name', 'trim|max_length[80]|required|strip_tags[name]|callback_alpha_dash_space');
						$this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[10]|max_length[15]|numeric|strip_tags[contact]');
						$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_validate_strongpass');
						$this->form_validation->set_rules('repassword', 'Confirm Password',
							'trim|required|callback_validate_strongpass|matches[password]');

						if($this->form_validation->run() == FALSE)
						{
							if($this->User_model->get_user_details($id))
							{
								$view['admin_view'] = "admin/editotheruser";
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
							$this->load->model('Admin_model');

							if($this->Admin_model->editotheruser($id))
							{
								$this->session->set_flashdata('success', 'User profile has been updated successfully.');
								redirect('admin');
							}
							else
							{
								print $this->db->error();
							}
						}
					}


/*=============================================
					BOOKS
					===============================================*/
					/*================ Books &&  All Books list page ===============*/
					public function books()
					{
						$this->load->model('Admin_model');
						$this->load->library('pagination');
						$config = [

							'base_url' => base_url('admin/books'),
							'per_page' => 10,
							'total_rows'=>  $this->Admin_model->num_rows_admin_books(),
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
						$view['books'] = $this->Admin_model->get_books($config['per_page'], $this->uri->segment(3));

						$this->load->model('User_model');
						$view['logos'] = $this->User_model->logo_generate();

						$this->load->model('User_model');
						$view['names'] = $this->User_model->name_generate();

						$this->load->model('User_model');
						$view['dscs'] = $this->User_model->ft_generate();

						$view['admin_view'] = "admin/books";
						$this->load->view('layouts/admin_layout', $view);
					}




					/*================ Add Books Page =================*/
					public function add_books()
					{
						/*=== LOAD DYNAMIC CATAGORY ===*/
						$this->load->model('Admin_model');
						$view['category'] = $this->Admin_model->get_category();
						/*==============================*/

						/*==== Image Upload validation*/
//		$config = [
//			'upload_path'=>'./uploads/image/',
//			'allowed_types'=>'jpg|png',
//			'max_size' => '400',
//			'overwrite' => FALSE
//			];

//		$this->load->library('upload', $config);





						$this->form_validation->set_rules('book_name', 'Book name', 'trim|required|strip_tags[book_name]');
						//$this->form_validation->set_rules('book_isbn', 'Book ISBN', 'trim|required|strip_tags[book_isbn]');
						$this->form_validation->set_rules('book_isbn', 'Book ISBN', 'trim|required|strip_tags[book_isbn]|is_unique[books.book_isbn]',
							array(
								'is_unique' => 'This ISBN exists in the database.')
						);
						$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[100]|strip_tags[description]');
						$this->form_validation->set_rules('author', 'Author name', 'trim|required|strip_tags[author]');
						$this->form_validation->set_rules('publisher', 'Publisher name', 'trim|required|strip_tags[publisher]');
						$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|strip_tags[price]');

						$this->form_validation->set_rules('categoryId', 'Category', 'trim|required');

						$this->form_validation->set_rules('userfile2', 'File link', 'trim|required|strip_tags[userfile2]');
    // Cover upload
						$config = array();
						$config['upload_path'] = './uploads/image/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size'] = '100000';

    $this->load->library('upload', $config, 'coverupload'); // Create custom object for cover upload
    $this->coverupload->initialize($config);
    $upload_cover = $this->coverupload->do_upload('userfile');



    // Catalog upload
    //$config = array();
    //$config['upload_path'] = './uploads/file/';
    //$config['allowed_types'] = 'pdf';
    //$config['max_size'] = '1000000';
    //$this->load->library('upload', $config, 'catalogupload');  // Create custom object for catalog upload
    //$this->catalogupload->initialize($config);
   // $upload_catalog = $this->catalogupload->do_upload('userfile2');

    $url = $this->input->post('userfile2');


    if(($this->form_validation->run() && $upload_cover) == FALSE)
    {

    	
    	$this->load->model('User_model');
    	$view['logos'] = $this->User_model->logo_generate();

    	$this->load->model('User_model');
    	$view['names'] = $this->User_model->name_generate();

    	$this->load->model('User_model');
    	$view['dscs'] = $this->User_model->ft_generate();

    	$view['admin_view'] = "admin/add_books";
    	$this->load->view('layouts/admin_layout', $view);

    }
    else
    {
		//	$this->load->model('Admin_model');

		//	if($this->Admin_model->add_books())
		//	{
		//		$this->session->set_flashdata('success', 'Book added successfully');
			//	redirect('admin/books');
		//	}
		//	else
		//	{
		//		print $this->db->error();
		//	}
			// Check uploads success
    	if ($upload_cover) {
    		$res = "TRUE";

    		if (strpos($url, 'https://drive.google.com/file') !== false) {
    			$res = "TRUE";
    		}else{
    			$res = "FALSE";
    		}
    		//echo $res;


    		if ($res=="FALSE") {
    			$this->session->set_flashdata('danger', 'This website uses google drive to store PDFs. Please enter a valid drive link as file link.');
    			$this->load->model('User_model');
    			$view['logos'] = $this->User_model->logo_generate();

    			$this->load->model('User_model');
    			$view['names'] = $this->User_model->name_generate();

    			$this->load->model('User_model');
    			$view['dscs'] = $this->User_model->ft_generate();

    			$view['admin_view'] = "admin/add_books";
    			$this->load->view('layouts/admin_layout', $view);
    		}else{
    			$this->load->model('Admin_model');

    			if($this->Admin_model->add_books())
    			{
    				$this->session->set_flashdata('success', 'Book added successfully');
    				redirect('admin/books');
    			}
    			else
    			{
    				print $this->db->error();
    			}
    		}
      // Both Upload Success


    	} else {

      // Error Occured in one of the uploads

    		echo 'Cover upload Error : ' . $this->coverupload->display_errors() . '<br/>';
    		//echo 'Catlog upload Error : ' . $this->catalogupload->display_errors() . '<br/>';
    	}

    }


}

public function link_check($url)
{

}



public function book_view($id)
{
	$this->load->model('Admin_model');
	$view['book_detail'] = $this->Admin_model->get_book_detail($id);

	if($this->Admin_model->get_book_detail($id))
	{
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();

		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$view['admin_view'] = "admin/book_view";
		$this->load->view('layouts/admin_layout', $view);
	}
	else
	{
		$view['admin_view'] = "temp/404page";
		$this->load->view('layouts/admin_layout', $view);
	}
}

public function book_edit($id)
{
	/*=== LOAD DYNAMIC CATAGORY ===*/
	$this->load->model('Admin_model');
	$view['category'] = $this->Admin_model->get_category();
	/*==============================*/
	/* For geting the existing info...*/
	$this->load->model('Admin_model');
	$view['book_detail'] = $this->Admin_model->get_book_detail($id);


	$this->load->model('User_model');
	$view['logos'] = $this->User_model->logo_generate();

	$this->load->model('User_model');
	$view['dscs'] = $this->User_model->ft_generate();

	$this->load->model('User_model');
	$view['names'] = $this->User_model->name_generate();

	/*==== Image Upload validation*/
	//$config = [
	//	'upload_path'=>'./uploads/image/',
	//	'allowed_types'=>'jpg|png',
	//	'max_size' => '400',
	//	'overwrite' => TRUE
	//];

	//$this->load->library('upload', $config);

	$this->form_validation->set_rules('book_name', 'Book name', 'trim|required|strip_tags[book_name]');
	//$this->form_validation->set_rules('book_isbn', 'Book ISBN', 'trim|required|strip_tags[book_isbn]');
	$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[100]|strip_tags[description]');
	$this->form_validation->set_rules('author', 'Author name', 'trim|required|strip_tags[author]');
	$this->form_validation->set_rules('publisher', 'Publisher name', 'trim|required|strip_tags[publisher]');
	$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|strip_tags[price]');
	//$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric|strip_tags[quantity]');
	$this->form_validation->set_rules('categoryId', 'Category', 'trim|required');


	//if(($this->form_validation->run() && $this->upload->do_upload()) == FALSE)
	if($this->form_validation->run()== FALSE)
	{

		if($this->Admin_model->get_book_detail($id))
		{
			$view['admin_view'] = "admin/book_edit";
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
		$this->load->model('Admin_model');

		if($this->Admin_model->edit_book($id))
		{
			$this->session->set_flashdata('success', 'Book info update successfully');
			redirect('admin/books');
		}
		else
		{
			print $this->db->error();
		}

	}
}

public function book_delete($id)
{
	$this->load->model('Admin_model');
	$this->Admin_model->delete_book($id);

	$this->session->set_flashdata('success', '<i class= "fas fa-trash text-danger"></i> Book deleted successfully');
	redirect('admin/books');
}



	#...Display all orders
public function orders()
{
	$this->load->model('Admin_model');
	$view['orders'] = $this->Admin_model->get_orders();

	$this->load->model('User_model');
	$view['logos'] = $this->User_model->logo_generate();

	$this->load->model('User_model');
	$view['names'] = $this->User_model->name_generate();

	$this->load->model('User_model');
	$view['dscs'] = $this->User_model->ft_generate();

	$view['admin_view'] = "admin/display_orders";
	$this->load->view('layouts/admin_layout', $view);
}

	#...Display Order Details
public function order_view($orderId)
{
	$this->load->model('Admin_model');
	$view['order_detail'] = $this->Admin_model->get_order_detail($orderId);

	$this->load->model('User_model');
	$view['logos'] = $this->User_model->logo_generate();

	$this->load->model('User_model');
	$view['names'] = $this->User_model->name_generate();

	$this->load->model('User_model');
	$view['dscs'] = $this->User_model->ft_generate();

	if($this->Admin_model->get_order_detail($orderId))
	{
		$view['admin_view'] = "admin/order_detail";
		$this->load->view('layouts/admin_layout', $view);
	}
	else
	{
		$view['admin_view'] = "temp/404page";
		$this->load->view('layouts/admin_layout', $view);
	}

}


public function customize(){
	$this->load->model('User_model');
	$view['logos'] = $this->User_model->logo_generate();

	$this->load->model('User_model');
	$view['names'] = $this->User_model->name_generate();

	$this->load->model('User_model');
	$view['dscs'] = $this->User_model->ft_generate();

	$this->load->model('User_model');
	$view['abtdscs'] = $this->User_model->about_generate(); 

	$view['admin_view'] = "admin/customize_web";
	$this->load->view('layouts/admin_layout', $view);
}
public function changelogo(){
	//$view['admin_view'] = "admin/change_logo";
	//$this->load->view('layouts/admin_layout', $view);

	$this->load->model('User_model');
	$view['logos'] = $this->User_model->logo_generate();

	$this->load->model('User_model');
	$view['names'] = $this->User_model->name_generate();

	$this->load->model('User_model');
	$view['dscs'] = $this->User_model->ft_generate();

	/*=== LOAD DYNAMIC CATAGORY ===*/
	$this->load->model('Admin_model');
	$view['category'] = $this->Admin_model->get_category();
	/*==============================*/

	/*==== Image Upload validation*/
	$config = array();
	$config['upload_path'] = './uploads/image/';
	$config['allowed_types'] = 'jpg|png|jpeg';
	$config['max_size'] = '100000';

    $this->load->library('upload', $config, 'logoupload'); // Create custom object for cover upload
    $this->logoupload->initialize($config);
    $upload_logo = $this->logoupload->do_upload('userfile');


    if(($upload_logo) == FALSE)
    {

    	$view['admin_view'] = "admin/change_logo";
    	$this->load->view('layouts/admin_layout', $view);

    }
    else
    {

    	if ($upload_logo) {

      // Both Upload Success

    		$this->load->model('Admin_model');

    		if($this->Admin_model->changelogo())
    		{
    			$this->session->set_flashdata('success', 'Logo added successfully');
    			redirect('admin/customize');
    		}
    		else
    		{
    			print $this->db->error();
    		}
    	} else {

      // Error Occured in one of the uploads

    		echo 'Cover upload Error : ' . $this->logoupload->display_errors() . '<br/>';
    		//echo 'Catlog upload Error : ' . $this->catalogupload->display_errors() . '<br/>';
    	}

    }
    //$config = [
   // 	'upload_path'=>'./uploads/image/',
   // 	'allowed_types'=>'jpg|png',
   // 	'max_size' => '4000',
   // 	'overwrite' => FALSE
   // ];

   // $this->load->library('upload', $config);


    //if(($this->upload->do_upload()) == FALSE)
    //{

    //	$view['admin_view'] = "admin/change_logo";
    //	$this->load->view('layouts/admin_layout', $view);

    //}
    //else
   // {
    //	$this->load->model('Admin_model');
//
    //	if($this->Admin_model->changelogo())
    //	{
    //		$this->session->set_flashdata('success', 'Logo added successfully');
    ///		redirect('admin/books');
    //	}
    //	else
    //	{
    //		print $this->db->error();
    //	}
//
   // }

}

public function changename(){

	//$this->load->model('User_model');
	//$view['logos'] = $this->User_model->logo_generate();

	//$view['admin_view'] = "admin/change_name";
	//$this->load->view('layouts/admin_layout', $view);

	$this->form_validation->set_rules('org_name', 'Organization name', 'trim|required|min_length[1]|max_length[25]|alpha_numeric_spaces');

	if($this->form_validation->run() == FALSE)
	{
		$this->session->set_flashdata('danger', validation_errors());
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();

		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$view['admin_view'] = "admin/change_name";
		$this->load->view('layouts/admin_layout', $view);
	}
	else
	{
		$this->load->model('Admin_model');
		if($this->Admin_model->changename())
		{
			$this->session->set_flashdata('success', 'Organization name added successfully');
			redirect('admin/customize');
		}
		else
		{
			print $this->db->error();
		}
	}

}


public function changeftdsc(){

	//$this->load->model('User_model');
	//$view['logos'] = $this->User_model->logo_generate();

	//$view['admin_view'] = "admin/change_name";
	//$this->load->view('layouts/admin_layout', $view);

	$this->form_validation->set_rules('ft_dsc', 'Footer description', 'trim|required|min_length[15]|strip_tags[ft_dsc]');

	if($this->form_validation->run() == FALSE)
	{
		$this->session->set_flashdata('danger', validation_errors());
		$this->load->model('User_model');
		$view['logos'] = $this->User_model->logo_generate();

		$this->load->model('User_model');
		$view['names'] = $this->User_model->name_generate();

		$this->load->model('User_model');
		$view['dscs'] = $this->User_model->ft_generate();

		$view['admin_view'] = "admin/change_footerdsc";
		$this->load->view('layouts/admin_layout', $view);
	}
	else
	{
		$this->load->model('Admin_model');
		if($this->Admin_model->changeftdsc())
		{
			$this->session->set_flashdata('success', 'Footer description added successfully');
			redirect('admin/customize');
		}
		else
		{
			print $this->db->error();
		}
	}

}


public function changeaboutdsc(){

	//$this->load->model('User_model');
	//$view['logos'] = $this->User_model->logo_generate();

	//$view['admin_view'] = "admin/change_name";
	//$this->load->view('layouts/admin_layout', $view);

	$this->form_validation->set_rules('about_dsc', 'About description', 'trim|required|min_length[15]|strip_tags[about_dsc]');

	if($this->form_validation->run() == FALSE)
	{	
		$this->session->set_flashdata('danger', validation_errors());
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

		$view['admin_view'] = "admin/change_about";
		$this->load->view('layouts/admin_layout', $view);
	}
	else
	{
		$this->load->model('Admin_model');
		if($this->Admin_model->changeaboutdsc())
		{
			$this->session->set_flashdata('success', 'About description added successfully');
			redirect('admin/customize');
		}
		else
		{
			print $this->db->error();
		}
	}

}

public function changecontactdsc(){

	//$this->load->model('User_model');
	//$view['logos'] = $this->User_model->logo_generate();

	//$view['admin_view'] = "admin/change_name";
	//$this->load->view('layouts/admin_layout', $view);

	$this->form_validation->set_rules('contact_dsc', 'Contact description', 'trim|required|min_length[15]|strip_tags[contact_dsc]');
	

	if($this->form_validation->run() == FALSE)
	{
		$this->session->set_flashdata('danger', validation_errors());
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

		//$this->load->model('User_model');
		//$view['contactdscs'] = $this->User_model->contact_generate();

		$view['admin_view'] = "admin/change_contact";
		$this->load->view('layouts/admin_layout', $view);
	}
	else
	{
		$this->load->model('Admin_model');
		if($this->Admin_model->changecontactdsc())
		{
			$this->session->set_flashdata('success', 'Contact description added successfully');
			redirect('admin/customize');
		}
		else
		{	
			print $this->db->error();
		}
	}

}

public function changeterms(){

	//$this->load->model('User_model');
	//$view['logos'] = $this->User_model->logo_generate();

	//$view['admin_view'] = "admin/change_name";
	//$this->load->view('layouts/admin_layout', $view);

	$this->form_validation->set_rules('terms_dsc', 'Terms and Conditions', 'trim|required|min_length[15]|strip_tags[terms_dsc]');

	if($this->form_validation->run() == FALSE)
		{	$this->session->set_flashdata('danger', validation_errors());
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
	$view['termsdscs'] = $this->User_model->terms_generate();

	$view['admin_view'] = "admin/change_terms";
	$this->load->view('layouts/admin_layout', $view);
}
else
{
	$this->load->model('Admin_model');
	if($this->Admin_model->changeterms())
	{
		$this->session->set_flashdata('success', 'Terms and Conditions added successfully');
		redirect('admin/customize');
	}
	else
	{
		print $this->db->error();
	}
}

}

public function editadminprofile($id)
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
	$this->load->model('Admin_model');
	$view['user_details'] = $this->Admin_model->get_user_details($id);

	$this->form_validation->set_rules('name', 'Name', 'trim|required|strip_tags[name]|callback_alpha_dash_space');
	$this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[10]|max_length[15]|numeric|strip_tags[contact]');

	if($this->form_validation->run() == FALSE)
	{
		if($this->User_model->get_user_details($id))
		{
			$view['admin_view'] = "admin/editadminprofile";
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
		$this->load->model('Admin_model');

		if($this->Admin_model->editadminprofile($id))
		{
			$this->session->set_flashdata('success', 'Admin profile information has been updated successfully.');
			redirect('admin');
		}
		else
		{
			print $this->db->error();
		}
	}
}


public function change_password($id)
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
	$view['user_details'] = $this->User_model->get_user_details($id);


	$this->form_validation->set_rules('oldpassword', 'Current Password', 'trim|required');

	$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|callback_validate_strongpass');
	$this->form_validation->set_rules('repassword', 'Confirm Password',
		'trim|required|callback_validate_strongpass|matches[newpassword]');


	if($this->form_validation->run() == FALSE)
	{
		if($this->User_model->get_user_details($id))
		{
			$view['admin_view'] = "admin/editadminpass";
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
		$cur_password = $this->input->post('oldpassword');
		$this->load->model('Admin_model');
		$passwd = $this->User_model->getCurrPassword($id);


		if(password_verify($cur_password, $passwd->password)){
			if($this->User_model->changepass($id))
			{
				$this->session->set_flashdata('success', 'Your have changed your password successfully.');
				redirect('admin');
			}
			else
			{
				print $this->db->error();
			}
		}
		else{
			$this->session->set_flashdata('danger', 'Please enter your current password correctly.');
			$view['admin_view'] = "admin/editadminpass";
			$this->load->view('layouts/admin_layout', $view);
		}

	}
}


}
