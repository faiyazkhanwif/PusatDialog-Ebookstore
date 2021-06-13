<?php 

class admin_model extends CI_Model
{
	#...Create category
	public function create_category()
	{
		$data = array(

			'category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'tag' => $this->input->post('tag')

		);

		$insert_ctg = $this->db->insert('category', $data);
		return $insert_ctg;
	}

	#...Display all category
	public function get_category()
	{
		$query = $this->db->get('category');
		return $query->result();
	}

	#...Display category details
	public function get_ctg_detail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('category');
		return $query->row();
	}

	#...Edit category
	public function edit_category($id)
	{
		$data = array(

			'category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'tag' => $this->input->post('tag')

		);

		return $query = $this->db->where('id', $id)->update('category', $data);
	}

	#...Delete category
	public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('category');
		
	}

	#...Display all user
	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result();
	}

	public function get_promembers()
	{
		$query = $this->db->get('membershiptransactions');
		return $query->result();
	}

	#...Add user
	public function add_user()
	{

		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(

			'name'	=> $this->input->post('name'),
			'contact'	=> $this->input->post('contact'),
			'email'	=> $this->input->post('email'),
			'password' => $encripted_pass,
			'type' => $this->input->post('type')

		);

		$insert_user = $this->db->insert('users', $data);
		return $insert_user;

	}

	#...Delete User
	public function delete_user($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
		
	}

	#...Add books
	public function add_books()
	{	//$data = $this->upload->data();
		$cover_data = $this->coverupload->data();
		//$catlog_data = $this->catalogupload->data(); 
		$image_path = base_url("uploads/image/".$cover_data['raw_name'].$cover_data['file_ext']);
		//$file_path = base_url("uploads/file/".$catlog_data['raw_name'].$catlog_data['file_ext']);
		
		$data = array(
			'book_name' => $this->input->post('book_name'),
			'book_isbn' => $this->input->post('book_isbn'),
			'description' => $this->input->post('description'),
			'author' => $this->input->post('author'),
			'publisher' => $this->input->post('publisher'),
			'price' => $this->input->post('price'),
			'categoryId' => $this->input->post('categoryId'),
			//'book_image' => $cover_data['full_path'],
			//'book_file' => $catlog_data['full_path']
			'book_image' => $image_path,
			'book_file' => $this->input->post('userfile2')
		);

		$insert_book = $this->db->insert('books', $data);
		return $insert_book;
	}

	#...Display all books
	public function get_books($limit, $offset)
	{	
		/*=== SQL join ===*/
		$this->db->select('books.id, books.book_name,books.book_isbn, books.description, books.author, books.publisher, books.price, books.book_image, category.category');

		$this->db->from('books');
		$this->db->join('category', 'books.categoryId = category.id');

		$this->db->order_by('books.id', 'DESC');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}
	#...For pagination
	public function num_rows_admin_books()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('books', 'books.categoryId = category.id');

		$this->db->order_by('books.id', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	#...For count total books
	public function count_total_books()
	{
		$query = $this->db->get('books');
		return $query->result();
	}
	public function count_total_prousers()
	{
		$query = $this->db->get('membershiptransactions');
		return $query->result();
	}


	#...Display book details
	public function get_book_detail($id)
	{
		/*=== SQL join ===*/
		$this->db->select('books.*, category.category');
		$this->db->from('books');
		$this->db->join('category', 'books.categoryId = category.id');
		

		$this->db->where('books.id', $id);
		$query = $this->db->get();
		return $query->row();		
	}


	#...Edit book info
	public function edit_book($id)
	{
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);
		
		$data = array(
			'book_name' => $this->input->post('book_name'),
			//'book_isbn' => $this->input->post('book_isbn'),
			'description' => $this->input->post('description'),
			'author' => $this->input->post('author'),
			'publisher' => $this->input->post('publisher'),
			'price' => $this->input->post('price'),
			//'quantity' => $this->input->post('quantity'),
			'categoryId' => $this->input->post('categoryId'),
			//'book_image' => $image_path,
			//'userId' => $this->session->userdata('id'),
			//'status' => $this->input->post('status')
		);

		return $query = $this->db->where('id', $id)->update('books', $data);
	}


	#...Delete book
	public function delete_book($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('books');
	}


	#...Get all orders
	public function get_orders()
	{
		$this->db->order_by('orderId', 'DESC');
		$query = $this->db->get('orders');
		return $query->result();
	}

	#...Get order details
	public function get_order_detail($orderId)
	{
		$this->db->select('orders.*, users.name, users.contact');
		$this->db->from('orders');
		$this->db->join('users', 'orders.userId = users.id');
		$this->db->where('orders.orderId', $orderId);
		$query = $this->db->get();
		return $query->row();
	}


	public function changelogo(){
		$this->db->empty_table('logo');
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);

		//$insert_logo = $this->db->insert('logo', $data);
		//return $insert_logo;

		$cover_data = $this->logoupload->data();
		//$catlog_data = $this->catalogupload->data(); 
		$image_path = base_url("uploads/image/".$cover_data['raw_name'].$cover_data['file_ext']);
		//$file_path = base_url("uploads/file/".$catlog_data['raw_name'].$catlog_data['file_ext']);
		
		$data = array(
			
			'logoimg' => $image_path,
			//'book_file' => $file_path
		);

		$insert_logo = $this->db->insert('logo', $data);
		return $insert_logo;
	}

	public function changename(){
		$this->db->empty_table('orgnamedb');
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);

		//$insert_logo = $this->db->insert('logo', $data);
		//return $insert_logo;

		$data = array(

			'orgname' => $this->input->post('org_name'),

		);

		$insert_orgname = $this->db->insert('orgnamedb', $data);
		return $insert_orgname;
	}


	public function changeftdsc(){
		$this->db->empty_table('footerdb');
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);

		//$insert_logo = $this->db->insert('logo', $data);
		//return $insert_logo;

		$data = array(

			'footerdsc' => $this->input->post('ft_dsc'),

		);

		$insert_ftdsc = $this->db->insert('footerdb', $data);
		return $insert_ftdsc;
	}

	public function changeaboutdsc(){
		$this->db->empty_table('aboutdb');
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);

		//$insert_logo = $this->db->insert('logo', $data);
		//return $insert_logo;

		$data = array(

			'aboutdsc' => $this->input->post('about_dsc'),

		);

		$insert_aboutdsc = $this->db->insert('aboutdb', $data);
		return $insert_aboutdsc;
	}

	public function changecontactdsc(){
		$this->db->empty_table('contactdb');
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);

		//$insert_logo = $this->db->insert('logo', $data);
		//return $insert_logo;

		$data = array(

			'contactdsc' => $this->input->post('contact_dsc'),

		);

		$insert_aboutdsc = $this->db->insert('contactdb', $data);
		return $insert_aboutdsc;
	}

	public function changeterms(){
		$this->db->empty_table('termsdb');
		//$data = $this->upload->data();
		//$image_path = base_url("uploads/image/".$data['raw_name'].$data['file_ext']);

		//$insert_logo = $this->db->insert('logo', $data);
		//return $insert_logo;

		$data = array(

			'termsdsc' => $this->input->post('terms_dsc'),

		);

		$insert_termsdsc = $this->db->insert('termsdb', $data);
		return $insert_termsdsc;
	}

	public function get_user_details($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row();
	}

	public function editadminprofile($id)
	{
		//$options = ['cost'=> 12];
		//$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(
			'name'	=> $this->input->post('name'),
			'contact'	=> $this->input->post('contact'),
			//'password' => $encripted_pass,

		);

		return $query = $this->db->where('id', $id)->update('users', $data);
	}

	public function getCurrPassword($id)
	{
		$query = $this->db->where(['id'=>$id])
		->get('users');
		if($query->num_rows() > 0){
			return $query->row();
		} 
	}


	public function changepass($id)
	{
		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('newpassword'), PASSWORD_BCRYPT, $options);

		$data = array(
			//'name'	=> $this->input->post('name'),
			//'contact'	=> $this->input->post('contact'),
			'password' => $encripted_pass,

		);

		return $query = $this->db->where('id', $id)->update('users', $data);
	}

	public function editotheruser($id)
	{
		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(
			'name'	=> $this->input->post('name'),
			'contact'	=> $this->input->post('contact'),
			'password' => $encripted_pass,

		);

		return $query = $this->db->where('id', $id)->update('users', $data);
	}
}