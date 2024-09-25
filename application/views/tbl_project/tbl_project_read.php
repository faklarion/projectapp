
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_PROJECT</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Nama Project</td>
				<td><?php echo $nama_project; ?></td>
			</tr>
	
			<tr>
				<td>Pic</td>
				<td><?php echo $pic; ?></td>
			</tr>
	
			<tr>
				<td>Status Approval</td>
				<td><?php echo $status_approval; ?></td>
			</tr>
	
			<tr>
				<td>Status Bonus</td>
				<td><?php echo $status_bonus; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Mulai</td>
				<td><?php echo $tanggal_mulai; ?></td>
			</tr>
	
			<tr>
				<td>Tanggal Selesai</td>
				<td><?php echo $tanggal_selesai; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_project') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>