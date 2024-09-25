<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA PROJECT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Status Approval</td>
						<td>
						<label>
							<input type="radio" name="status_approval" value="0"
							<?php if ($status_approval == 0) echo 'checked'; ?>> Belum ACC
						</label>
							<br>
						<label>
							<input type="radio" name="status_approval" value="1"
							<?php if ($status_approval == 1) echo 'checked'; ?>> Sudah ACC
						</label>
						</td>
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