<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PROJECT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Nama Project <?php echo form_error('nama_project') ?></td><td><input type="text" class="form-control" name="nama_project" id="nama_project" placeholder="Nama Project" value="<?php echo $nama_project; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>PIC <?php echo form_error('pic') ?></td><td><input type="text" class="form-control" name="pic" id="pic" placeholder="PIC" value="<?php echo $pic; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Mulai <?php echo form_error('tanggal_mulai') ?></td>
						<td><input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo $tanggal_mulai; ?>" /></td>
					</tr>

	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_project" value="<?php echo $id_project; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_project') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>