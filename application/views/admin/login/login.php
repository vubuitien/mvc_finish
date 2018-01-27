<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset=utf-8 />
	<title>Login</title>
		<link rel=stylesheet href="<?php echo public_helper('admin/css')?>/bootstrap.min.css" />
		<script src="<?php echo public_helper('admin/js')?>/jquery-2.2.2.js"></script>
		<script src="<?php echo public_helper('admin/js')?>/bootstrap.min.js"></script>
		<link  rel="stylesheet" href="css/scrolling-nav.css"/>	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>
		<link  rel="stylesheet" href="<?php echo public_helper('admin/css')?>/style.css"/>
		<script src="js/scrolling-nav.js"></script>	
	</head>
	<style>
	.col-xs-4{
		margin-top: 8%;
	}
	.btn{
		width:100%;
		margin-top: 15px;
	}
	</style>
	<body>
		<div class="container">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-4">
				<h3 align="center" style="margin-bottom: 20px;">Login</h3>
				<form method="post">
					<div class="form-group">
						<label for="">Username</label>
						<input name="tai_khoan" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="mat_khau" type="password" class="form-control" required>
					</div>
					<div style="color: red !important; text-align: center;"><?php echo form_error('login'); ?></div>
					<input type="submit" value="Đăng nhập" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
	</body>
<html>