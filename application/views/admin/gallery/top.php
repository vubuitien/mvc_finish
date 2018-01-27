

			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <a class="navbar-brand" href="<?php echo admin_url('administrators')?>">Administrators</a>
			    </div>
			   	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			        <li><p class="text-center" style="padding-top: 15px; color:white;">Xin chào : <span style="color: red"><?php echo $this->session->userdata('login');?></span></p></li>
			        <li><a href="<?php echo admin_url('administrators/logout');?>"><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i> Logout</a></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div>
			</nav>
