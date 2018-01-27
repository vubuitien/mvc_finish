<?php 
	class Administrators extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{		
			$this->data['temp'] = 'admin/administrators';			
			$this->load->view('admin/index',$this->data);
		}

		function logout()
		{
			if($this->session->userdata('login'))
			{
				$this->session->unset_userdata('login');
				redirect(admin_url('login/index'));
			}
		}
	}
?>