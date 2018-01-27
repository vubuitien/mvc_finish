<html>
	<head>
		<?php $this->load->view('admin/gallery/head')?>
	</head>
	<body>
		<?php $this->load->view('admin/gallery/top')?>
			<div class="container-fluid">    
  				<div class="row">
					<?php $this->load->view('admin/gallery/menu')?>
					<?php $this->load->view($temp)?>
				</div>
			</div>
		<?php $this->load->view('admin/gallery/footer')?>
	</body>
	
</html>