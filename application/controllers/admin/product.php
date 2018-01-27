<?php 
	class Product extends MY_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('product_model');
		}
		function insert()
		{
			$this->load->model('category_model');
			$dmbv = $this->category_model->get_list();
			$data = array();
			$data['temp'] = 'admin/product/insert-product';
			$data['dmbv'] = $dmbv;
			// neu submit form mà co du lieu post len
			if($this->input->post())
			{
				$this->form_validation->set_rules('title',"Tiêu đề bài viết",'required');	
				$this->form_validation->set_rules('content',"Nội dung bài viết",'required');
				$this->form_validation->set_rules('cat',"Danh mục",'required');
				$this->form_validation->set_rules('price',"Giá tiền",'required');
				//khi nhập liệu chính xác
				if($this->form_validation->run())
				{
					if(!empty($_FILES['img']['name'])){
		                $config['upload_path'] = './uploads/posts';
		                $config['allowed_types'] = 'gif|jpg|png|jpeg';
		                $config['max_size']     = '2048';
		                $config['max_width'] = '1024';
		                $config['max_height'] = '768';
		                $config['file_name'] = $_FILES['img']['name'];
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                if($this->upload->do_upload('img')){
		                    $uploadData = $this->upload->data();
		                    $image = $uploadData['file_name'];
		                }else{
		                    $image = '';
		                }
		            }else{
		                $image = '';
		            }
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$price = $this->input->post('price');
					$img = $image;
					$cat = $this->input->post('cat');

					$dulieu = array(
						'tieu_de'=>$title, 'noi_dung'=>$content, 'tien'=>$price, 'img'=>$img, 'id_dm'=>$cat
						);
					$this->product_model->create($dulieu);
					redirect(admin_url('product/index'));
					}		
				}
				$this->load->view('admin/index',$data);
		}
		function index()
		{
			$input = array();
			$data['list'] = $this->product_model->get_list($input);
			$data['temp'] = 'admin/product/index' ;
			$this->load->view('admin/index',$data);
		}
		function delete()
		{
			$id = $this->uri->segment(4);
			$this->product_model->delete($id);
			$this->session->set_flashdata('mess','Đã xóa thành công');
			redirect(admin_url('product/index'));
		}
		function edit()
		{
			$id = $this->uri->segment(4);
			$id = intval($id);
			$info = $this->product_model->get_info($id);
			$this->load->model("category_model");
			$listdm = $this->category_model->get_list();
			$data = array();
			$data['info'] = $info;
			$data['listdm'] = $listdm;
		
			if($this->input->post())
			{
				$this->form_validation->set_rules('title',"Tiêu đề bài viết",'required');	
				$this->form_validation->set_rules('content',"Nội dung bài viết",'required');
				$this->form_validation->set_rules('price',"Giá tiền",'required');
				$this->form_validation->set_rules('cat',"Danh mục",'required');	

				//khi nhập liệu chính xác
				if($this->form_validation->run())
				{

		            $config['upload_path'] = './uploads/posts';
		           	$config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size']     = '2048';
		            $config['max_width'] = '1024';
		            $config['max_height'] = '768';
		            $config['file_name'] = $_FILES['img']['name'];
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);
		            if($this->upload->do_upload('img')){
		                $uploadData = $this->upload->data();
		                $image = $uploadData['file_name'];
		            }
		            
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$price = $this->input->post('price');
					$img = $image;
					$cat = $this->input->post('cat');

					$dulieu = array(
						'tieu_de'=>$title, 'noi_dung'=>$content, 'tien'=>$price, 'id_dm'=>$cat
					);
					if($img != ''){
						$dulieu['img'] = $img;
					}
					$this->product_model->update($id,$dulieu);
					$this->session->set_flashdata('mess','Đã sửa thành công');
					redirect(admin_url('product/index'));
					$title = $info->tieu_de;
					$conetnt = $info->noi_dung;
					$img = $info->img;
					$price = $info->tien;
				}		
			}
				$data['temp'] = 'admin/product/update-product';
				$this->load->view('admin/index',$data);

		}
	}
?>