				<div class="col-md-10">				
					<div class="container">
						<h1 align="center">PRODUCT</h1>
						<a class="btn btn-success"  href="<?php echo admin_url('product/insert')?>">INSERT</a>
						<br><br>
						<div class="table-responsive">
		      				<table class="table table-bordered">
		      						<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Describe</th>
										<th>Price</th>
										<th>Category</th>
										<th>Image</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
									<?php foreach($list as $sanpham){?>
										<td><?php echo $sanpham->id?></td>
										<td><?php echo $sanpham->tieu_de?></td>
										<td><?php echo $sanpham->noi_dung?></td>
										<td><?php echo $sanpham->tien?></td>
										<td><?php echo $sanpham->id_dm?></td>
										<td><img width="100" height="100" src="<?php echo base_url("uploads/posts/".$sanpham->img) ?>"></td>
										<td><a  class="btn btn-warning" href="<?php echo admin_url('product/edit/'.$sanpham->id);?>">EDIT</a></td>
										<td><a  class="btn btn-danger"  href="<?php echo admin_url('product/delete/'.$sanpham->id);?>">DELETE</a></td>
									</tr>
									<?php }?>
							</table>							

					</div><!--end .content-->
				</div>