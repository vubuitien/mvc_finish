<?php 
	class Pages extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function product(){
			$this->load->model('product_model');
        	// lay du lieu tu bang pagination
	        $this->db->select('*');                  
	        $this->db->from('baiviet');
	        $this->db->order_by('id desc');     
	        // lay ra $limit row tu vi tri thu $offset 
	        $offset=$this->uri->segment(5);    
	        $query_poster = $this->db->get();   
			$input = array();
			$data['list'] = $this->product_model->get_list($input);
			$data['sobaitren1trang'] = $query_poster;
			$data['hello'] = $this->uri->segment(1);
			$data['temp'] = 'user/content' ;
			$this->load->view('user/pages/product',$data);
		}
		function contact()
		{
			$this->load->model('pages_model');
			$input = array();
			$data['list'] = $this->db->select('*')->where('id','1')->get('contact')->result();
			$data['temp'] = 'admin/menu/index' ;
			$this->load->view('user/pages/contact',$data);
		}
		function about()
		{
			$this->load->model('pages_model');
			$input = array();
			$data['list'] = $this->db->select('*')->where('id','2')->get('contact')->result();
			$data['temp'] = 'admin/menu/index' ;
			$this->load->view('user/pages/about',$data);
		}
	}
?>