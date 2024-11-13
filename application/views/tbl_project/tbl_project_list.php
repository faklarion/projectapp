<style>
    .text-box-warning {
        background-color: orange; /* Warna kotak */
        color: white; /* Warna teks */
        padding: 10px; /* Ruang di dalam kotak */
        border-radius: 5px; /* Sudut membulat (opsional) */
    }

    .text-box-success {
        background-color: green; /* Warna kotak */
        color: white; /* Warna teks */
        padding: 10px; /* Ruang di dalam kotak */
        border-radius: 5px; /* Sudut membulat (opsional) */
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PROJECT</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
                <div class='col-md-9'>
                    <div style="padding-bottom: 10px;">
                        <?php if($this->session->userdata('id_user_level') == 1) : ?>
                        <?php echo anchor(site_url('tbl_project/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                        <?php endif ?>
                    </div>
                </div>
           <!-- <div class='col-md-3'>
                <form action="<?php echo site_url('tbl_project/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('tbl_project'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div> -->
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px" id="tableProject">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Project</th>
                    <th class="text-center">PIC</th>
                    <th class="text-center">Tanggal Mulai</th>
                    <th class="text-center">Status Selesai</th>
                    <th class="text-center">Tanggal Selesai</th>
                    <th class="text-center">Status Approval</th>
                    <th class="text-center">Tanggal Approval</th>
                    <th class="text-center">Status Bonus</th>
                    <th class="text-center">Tanggal Bonus</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tbl_project_data as $tbl_project) { ?>
            <tr>
                <td style="text-align:center" width="10px"><?php echo ++$start ?></td>
                <td style="text-align:center"><?php echo $tbl_project->nama_project ?></td>
                <td style="text-align:center"><?php echo $tbl_project->pic ?></td>
                <td style="text-align:center"><?php echo tgl_indo($tbl_project->tanggal_mulai) ?></td>
                <td style="text-align:center">
                    <?php 
                        if($tbl_project->status_project == 0 ) {
                            echo '<div class="text-box-warning">
                                    <small>Belum Selesai</small>
                                </div>';
                        } elseif($tbl_project->status_project == 1 ) {
                            echo '<div class="text-box-success">
                                    <small>Selesai</small>
                                </div>';
                        }
                    ?>
                </td>
                <td style="text-align:center"><?php echo tgl_indo($tbl_project->tanggal_selesai) ?></td>
                <td style="text-align:center">
                    <?php 
                        if($tbl_project->status_approval == 0 ) {
                            echo '<div class="text-box-warning">
                                    <small>Belum Disetujui</small>
                                </div>';
                        } elseif($tbl_project->status_approval == 1 ) {
                            echo '<div class="text-box-success">
                                    <small>Sudah Disetujui</small>
                                </div>';
                        }
                    ?>
                </td>
                <td style="text-align:center"><?php echo tgl_indo($tbl_project->tanggal_approval) ?></td>
                <td style="text-align:center">
                    <?php 
                            if($tbl_project->status_bonus == 0 ) {
                                echo '<div class="text-box-warning">
                                    <small>Belum Dicairkan</small>
                                </div>';
                            } elseif($tbl_project->status_bonus == 1 ) {
                                echo '<div class="text-box-success">
                                    <small>Sudah Dicairkan</small>
                                </div>';
                            }
                        ?>
                </td>
                <td style="text-align:center"><?php echo tgl_indo($tbl_project->tanggal_bonus) ?></td>
                <td style="text-align:center" width="200px">
                    <?php 
                    if ($this->session->userdata('id_user_level') == 1) {
                        if($tbl_project->status_project == 0) {
                            echo anchor(site_url('tbl_project/update_status/'.$tbl_project->id_project),'<i class="fa fa-check" aria-hidden="true"></i>','class="btn btn-info btn-sm" onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
                        }
                        echo ' ';
                        echo anchor(site_url('tbl_project/update/'.$tbl_project->id_project),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                        echo '  '; 
                        echo anchor(site_url('tbl_project/delete/'.$tbl_project->id_project),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
                    } elseif($this->session->userdata('id_user_level') == 2) {
                        echo anchor(site_url('tbl_project/update_manager/'.$tbl_project->id_project),'<i class="fa fa-check" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                    } elseif($this->session->userdata('id_user_level') == 3) {
                        if($tbl_project->status_approval == 1) {
                            echo anchor(site_url('tbl_project/update_hrd/'.$tbl_project->id_project),'<i class="fa fa-check" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                        }
                    }
                   
                    ?>
			    </td>
		    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <!-- <div class="row">
            <div class="col-md-6">
                
	        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>