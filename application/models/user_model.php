<?php 

class user_model extends CI_Model
{
	public function register_user()
	{

		$options = ['cost'=> 12];
		$encripted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

		$data = array(

			'name'	=> $this->input->post('name'),
			'contact'	=> $this->input->post('contact'),
			'email'	=> $this->input->post('email'),
			'password' => $encripted_pass

		);

		$insert_data = $this->db->insert('users', $data);
		return $insert_data;

	}

	public function login_user($email, $password)
	{
		$this->db->where('email', $email);
		$result = $this->db->get('users');

		$db_password = $result->row('password');

		if(password_verify($password, $db_password))
		{
			// return $result->row(0)->id;
			return $result->row();
		}
		else
		{
			return false;
		}
	}

	##...Get all books and filter category wise books
	public function get_books($limit, $offset)
	{
		/*=== SQL join and Data filter ===*/
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('books', 'books.categoryId = category.id');
		if(isset($_GET['ctg']))
		{
			$a = $_GET['ctg'];
			$query = $this->db->where('category.tag', $a);
			$this->db->order_by('books.id', 'DESC');
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			return $query->result();
		}
		$this->db->order_by('books.id', 'DESC');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}
	#...For pagination
	public function num_rows_books()
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('books', 'books.categoryId = category.id');

		$this->db->order_by('books.id', 'DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function recent_books()
	{
		$this->db->limit(6);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('books');
		return $query->result();
	}


	public function delete_book($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('books');
	}


	public function reviews($id)
	{   $SQL = "SELECT * FROM books WHERE id='".$id."'";
		//$res = $this->db->query($SQL);
		//echo $res;
		//$bookarr = $res->result();
		//$bookname = "";
		//foreach($bookarr as $name){
		//    $bookname = $name;

		//}
		//echo $bookname;
	$query = $this->db->query($SQL);
	$bookname = "";
	foreach ($query->result() as $row)
	{
		//echo $row->book_name;
		$bookname = $row->book_name;

	}
	$data = array(
		'review' => $this->input->post('review'),
		'userId' => $this->session->userdata('id'),
		'bookId' => $id,
		'bookname' => $bookname
	);

	$insert_review = $this->db->insert('reviews', $data);
	return $insert_review;
}

public function get_reviews()
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->join('reviews', 'reviews.userId = users.id');

	$this->db->where('reviews.bookId', $this->uri->segment(3));
	$this->db->order_by('reviews.id', 'DESC');
	$query = $this->db->get();
	return $query->result();
}

public function reviewdelete($id)
{
	$this->db->where('id', $id);
	$this->db->delete('reviews');

}
public function editreview($id){
	$data = array(
		'review' => $this->input->post('review')
	);

	return $query = $this->db->where('id', $id)->update('reviews', $data);
}
public function add_orders()
{	$status = 1;
	$shipping = 0;
	$total = $this->cart->total();
	$total_price = $total + $shipping;

	foreach ($this->cart->contents() as $items) {
		$a[] = $items['id'];
		$books = implode(', ', $a);

		$q[] = $items['qty'];
		$quantity = implode(', ', $q);
        $txn = "-";
		$data = array(
			'userId'	=> $this->session->userdata('id'),
			'paymentcheck' => $this->input->post('paymentcheck'),
			'total_price' => $total_price,
			'bookId' => $books,
			'status' => $status,
			'txn_id' => $txn

		);
		$data2 = array(
			'user_Id'	=> $this->session->userdata('id'),
			'book_Id' => $items['id'],
			'book_name' => $items['name'],
			'book_isbn' => $items['isbn'],
			'book_author' => $items['author'],
			'book_price' => $items['price'],
			'book_image' => $items['book_image'],
			'book_file' =>$items['book_file']

		);
		$this->db->insert('userorderviewonly', $data2);
	}

	$insert_order = $this->db->insert('orders', $data);
	return $insert_order;

}

public function my_orders()
{
	$this->db->order_by('orderId', 'DESC');
	$this->db->where('userId', $this->session->userdata('id'));
	$query = $this->db->get('orders');
	return $query->result();
}
public function my_reviews()
{
	$this->db->order_by('id', 'DESC');
	$this->db->where('userId', $this->session->userdata('id'));
	$query = $this->db->get('reviews');


	return $query->result();
}
public function get_review_details($id)
{
	$this->db->where('id', $id);
	$query = $this->db->get('reviews');
	return $query->row();
}
	//public function my_published_books()
	//{
	//	$this->db->where('userId', $this->session->userdata('id'));
	//	$query = $this->db->get('books');
	//	return $query->result();
	//}


	##...Get all E-books and filter category wise E-books
	//public function get_ebooks()
	//{
/*=== SQL join and Data filter ===*/
	//	$this->db->select('*');
	//	$this->db->from('category');
	//	$this->db->join('ebooks', 'ebooks.categoryId = category.id');
	//	if(isset($_GET['ctg']))
	//	{
	//		$a = $_GET['ctg'];
	//		$query = $this->db->where('category.tag', $a);
	//		$this->db->order_by('ebooks.id', 'DESC');
	//		$query = $this->db->get();
	//		return $query->result();
	//	}
	//	$this->db->order_by('ebooks.id', 'DESC');
	//	$query = $this->db->get();
	//	return $query->result();
	//}


public function search($query)
{
	$this->db->order_by('id', 'DESC');
	$this->db->from('books');

	$string = str_replace(" ","|", $query);
	$this->db->where('book_isbn',$string);
	$this->db->or_where("book_name RLIKE '$string'");
	$this->db->or_where("author RLIKE '$string'"); 

	$q = $this->db->get();
	return $q->result();
}

public function get_user_details($id)
{
	$this->db->where('id', $id);
	$query = $this->db->get('users');
	return $query->row();
}
public function get_mem_details($id)
{
	$this->db->where('userId', $id);
	$query = $this->db->get('membershiptransactions');
	return $query->row();
}

public function edit_profile($id)
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

public function logo_generate()
{
		//$this->db->limit(6);
		//$this->db->order_by('id', 'DESC');
	$query = $this->db->get('logo');
	return $query->result();
}

public function name_generate()
{
		//$this->db->limit(6);
		//$this->db->order_by('id', 'DESC');
	$query = $this->db->get('orgnamedb');
	return $query->result();
}

public function ft_generate()
{
		//$this->db->limit(6);
		//$this->db->order_by('id', 'DESC');
	$query = $this->db->get('footerdb');
	return $query->result();
}

public function about_generate()
{
		//$this->db->limit(6);
		//$this->db->order_by('id', 'DESC');
	$query = $this->db->get('aboutdb');
	return $query->result();
}

public function contact_generate()
{
		//$this->db->limit(6);
		//$this->db->order_by('id', 'DESC');
	$query = $this->db->get('contactdb');
	return $query->result();
}

public function terms_generate()
{
		//$this->db->limit(6);
		//$this->db->order_by('id', 'DESC');
	$query = $this->db->get('termsdb');
	return $query->result();
}

public function num_rows_bought_books()
{
	$id = $this->session->userdata('id');
	$this->db->select('*');
	$this->db->from('userorderviewonly');
		//$this->db->join('books', 'books.categoryId = category.id');

	$this->db->where('user_Id', $id);
	$query = $this->db->get();
	return $query->num_rows();
}

public function get_boughtbooks($limit, $offset)
{	
	/*=== SQL join ===*/
	$id = $this->session->userdata('id');
	$this->db->select('*');
	$this->db->from('userorderviewonly');
		//$this->db->join('books', 'books.categoryId = category.id');

	$this->db->where('user_Id', $id);
	$this->db->limit($limit, $offset);
	$query = $this->db->get();
	return $query->result();
}
public function myboughtbooks(){
	$this->db->order_by('book_Id', 'DESC');
	$this->db->where('user_Id', $this->session->userdata('id'));
	$query = $this->db->get('userorderviewonly');
	return $query->result();
}
public function get_book_detail($id)
{
	$this->db->where('id', $id);
	$query = $this->db->get('books');
	return $query->row();	
}

public function subscribeaspro($months,$cost)
{	
	$mstring = "0months";
	if ($months==1) {
		$mstring = "1months";
	} elseif ($months == 3) {
		$mstring = "3months";
	} elseif ($months == 6){
		$mstring = "6months";
	}

	$date = date_create(date("Y-m-d"));
	$currentdate = date_format($date,"Y-m-d");
	date_add($date,date_interval_create_from_date_string($mstring));
	$expdate = date_format($date,"Y-m-d");


	$data = array(
		'userId'	=> $this->session->userdata('id'),
		'paymentcheck' => $this->input->post('paymentcheck'),
		'subscriptionfee' => $cost,
		'months' => $months,
		'transactiondate' => $currentdate,
		'expiredate' => $expdate
	);

	$this->db->insert('membershiptransactions', $data);

	$status = "pro";
	$data2 = array(
		'membershipstatus'	=> $status,

	);

	return $query = $this->db->where('id', $this->session->userdata('id'))->update('users', $data2);

}
public function removepromembership($id)
{
	$this->db->where('userId', $id);
	$this->db->delete('membershiptransactions');

	$status = "normal";
	$data2 = array(
		'membershipstatus'	=> $status,

	);

	return $query = $this->db->where('id', $id)->update('users', $data2);
}
} 



?>