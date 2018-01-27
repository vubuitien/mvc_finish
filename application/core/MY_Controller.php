<?php 
	class MY_Controller extends CI_Controller
	{
		//biến gửi dữ liệu
		public $data =array();
		function __construct()
		{
			parent::__construct();
	        $controller = $this->uri->segment('1');
	        switch ($controller){
	            case 'admin':
	            {
	                $this->load->helper('common');
	                $this->check_login();
	                break;
	            }
	            default:
	            {

	            }
			}
		}
		private function check_login()
		{
			//lay ra gia tri cua controller
			$controller = $this->uri->segment(2);
			$controller = strtolower($controller);
			$login = $this->session->userdata('login');		

			// neu admin chua dang nhap thi chi cho vao trang login
			// neu chua ton tai session login va controller khong phai login
			if(!$login && $controller!= 'login')
			{
				redirect(admin_url('Login/index'));
			}
			if($login && $controller == 'login')
			{
				redirect(admin_url('administrators/index'));
			}
		}
	}
?>