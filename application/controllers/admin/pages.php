<?php 
	class Pages extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('pages_model');
		}
		function insert()
		{
			$data = array();
			$data['temp'] = 'admin/pages/insert-pages';
			// neu submit form mà co du lieu post len
			if($this->input->post())
			{
				$this->form_validation->set_rules('title',"Tiêu đề",'required');
				$this->form_validation->set_rules('content',"Nội dung",'required');
			
				//khi nhập liệu chính xác
				if($this->form_validation->run())
				{
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$map = $this->input->post('map');
					$dulieu = array(
						'title'=>$title,
						'content'=>$content,
						'map'=>$map
						);
					$this->pages_model->create($dulieu);
					$this->session->set_flashdata('mess','thành công');
					redirect(admin_url('page/index'));
					}		
				}
				$this->load->view('admin/index',$data);
		}	
		function index()
		{
			$input = array();
			$data['list'] = $this->pages_model->get_list($input);
			$data['temp'] = 'admin/pages/index' ;
			$this->load->view('admin/index',$data);
		}
		function edit()
		{
			$id = $this->uri->segment(4);
			$id = intval($id);
			$info = $this->pages_model->get_info($id);
			$data = array();
			$data['info'] = $info;
		
			if($this->input->post())
			{
				$this->form_validation->set_rules('title',"Tiêu đề",'required');
				$this->form_validation->set_rules('content',"Nội dung",'required');			
				//khi nhập liệu chính xác
				if($this->form_validation->run())
				{
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$map = $this->input->post('map');
					$dulieu = array(
						'title'=>$title,
						'content'=>$content,
						'map'=>$map
						);
					$this->pages_model->update($id,$dulieu);
					$this->session->set_flashdata('mess','Đã sửa thành công');
					$info->title = $title;
					$info->content = $content;
					$info->map = $map;
					redirect(admin_url('pages/index'));

				}		
			}
				$data['temp'] = 'admin/pages/update-pages';
				$this->load->view('admin/index',$data);

		}

		function delete()
		{
			$id = $this->uri->segment(4);
			$this->pages_model->delete($id);
			$this->session->set_flashdata('mess','Đã xóa thành công');
			redirect(admin_url('page/index'));
		}

	}	
?>