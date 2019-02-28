<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_pm" title="Data Jadwal Antar" class="tip-bottom"><i class="icon-wrench"></i> Jadwal Antar</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Jadwal Antar</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">

			<?php if($_SESSION['role']==1 ){ ?>
				<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Jadwal</a>
				<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
				<a href="javascript:void(0)" class="btn btn-danger" id="deletePengemudi"><i class="icon-trash"></i> Hapus Jadwal Antar</a>
			<?php } ?>
			
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Jadwal Antar</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-add">
				        <div class="control-group">
				          <label class="control-label">Pengemudi</label>
				          <div class="controls">
				            <select name="pengemudi" class="form-control span5">
                                <option value=" " selected disabled>Pilih Pengemudi</option>
                                <?php 
                                    $query = "SELECT * FROM mnj_pengemudi ORDER BY nama ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['id_pengemudi'];?>"><?php echo $data['nik'] ." - ". $data['nama'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Kendaraan</label>
				          <div class="controls">
                          <select name="kendaraan" class="form-control span5">
                                <option value=" " selected disabled>Pilih Kendaraan</option>
                                <?php 
                                    $query = "SELECT a.*,b.nama_jenis, c.nama_merk FROM mnj_kendaraan a 
												LEFT JOIN mnj_jenis_kendaraan b ON a.jenis_kendaraan=b.id_jenis
												LEFT JOIN mnj_merk_kendaraan c ON a.merk=c.id_merk
												ORDER BY plat_nomor ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['id_kendaraan'];?>"><?php echo $data['plat_nomor']." - ".$data['nama_merk']." - ".$data['nama_jenis'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Penumpang</label>
				          <div class="controls">
				            <input type"text" name="penumpang" class="span5" required>
				          </div>
				        </div>

						<div class="control-group">
				          <label class="control-label">Antar/Jemput</label>
				          <div class="controls">
				            <select name="action_pengemudi" class="form-control span5">
								<option value="antar">Antar</option>
								<option value="jemput">Jemput</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Tujuan</label>
				          <div class="controls">
				            <input type"text" name="tujuan" class="span5" required>
				          </div>
				        </div>

						<div class="control-group">
				          <label class="control-label">Standby</label>
				          <div class="controls">
				            <select name="standby" class="form-control span5">
								<option value="kantor">Kantor</option>
								<option value="rumah">Rumah</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				            <label class="control-label">Tanggal Berangkat</label>
				            <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_berangkat" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Jam Berangkat</label>
				          <div class="controls">
				            <input type"text" name="jam_berangkat" class="span3 m-wrap timepicker" required readonly>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Tanggal Kembali</label>
				          <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_kembali" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Jam Kembali</label>
				          <div class="controls">
				            <input type"text" name="jam_kembali" class="span3 m-wrap timepicker" required readonly>
				          </div>
				        </div>

				        <input type="hidden" name="id_jadwal" value="">

						<input type="hidden" name="action" value="add">
				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="saveJadwal()"><i class="icon-check"></i> Submit</button>
					        	<button type="button" class="btn" style="margin-left: 10px;" onclick="hideAddForm()"><i class="icon-remove"></i> Cancel</button>
				        	</center>
				        </div>
				  	</form>
				</div>
			</div>
		</div>
	</div>


	<div class="row-fluid">
	  <div class="span12">
	    <div class="widget-box">
	      	<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
	        	<h5>Data Jadwal Antar</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_data" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>Pengemudi</th>
	    					<th>Kendaraan</th>
	    					<th>Penumpang</th>
	    					<th>Tujuan</th>
							<th>Berangkat</th>
							<th>Kembali</th>
							<th>Status</th>
							<th>SMS</th>
	    					<th width="6%">Option</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				
	    			</tbody>
	    		</table>

	    		<br>
	      	</div>
	    </div>
	  </div>
	</div>
</div>

<div id="edit-modal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">x</button>
    <h3>Ubah Data Jadwal Antar</h3>
  </div>
  <div class="modal-body" style="height:600px;">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form-edit">
					<div class="control-group">
				          <label class="control-label">Pengemudi</label>
				          <div class="controls">
				            <select name="pengemudi" class="form-control span5">
                                <option value=" " selected disabled>Pilih Pengemudi</option>
                                <?php 
                                    $query = "SELECT * FROM mnj_pengemudi ORDER BY nama ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['id_pengemudi'];?>"><?php echo $data['nik'] ." - ". $data['nama'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Kendaraan</label>
				          <div class="controls">
                          <select name="kendaraan" class="form-control span5">
                                <option value=" " selected disabled>Pilih Kendaraan</option>
                                <?php 
                                    $query = "SELECT a.*,b.nama_jenis, c.nama_merk FROM mnj_kendaraan a 
												LEFT JOIN mnj_jenis_kendaraan b ON a.jenis_kendaraan=b.id_jenis
												LEFT JOIN mnj_merk_kendaraan c ON a.merk=c.id_merk
												ORDER BY plat_nomor ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['id_kendaraan'];?>"><?php echo $data['plat_nomor']." - ".$data['nama_merk']." - ".$data['nama_jenis'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Penumpang</label>
				          <div class="controls">
				            <input type"text" name="penumpang" class="form-control" required>
				          </div>
				        </div>

						<div class="control-group">
				          <label class="control-label">Antar/Jemput</label>
				          <div class="controls">
				            <select name="action_pengemudi" class="form-control span5">
								<option value="antar">Antar</option>
								<option value="jemput">Jemput</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Tujuan</label>
				          <div class="controls">
				            <input type"text" name="tujuan" class="form-control" required>
				          </div>
				        </div>

						<div class="control-group">
				          <label class="control-label">Standby</label>
				          <div class="controls">
				            <select name="standby" class="form-control span5">
								<option value="kantor">Kantor</option>
								<option value="rumah">Rumah</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				            <label class="control-label">Tanggal Berangkat</label>
				            <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_berangkat" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Jam Berangkat</label>
				          <div class="controls">
				            <input type"text" name="jam_berangkat" class="span3 m-wrap timepicker" required readonly>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Tanggal Kembali</label>
				          <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_kembali" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Jam Kembali</label>
				          <div class="controls">
				            <input type"text" name="jam_kembali" class="span3 m-wrap timepicker" required readonly>
				          </div>
				        </div>

				        <input type="hidden" name="id_jadwal" value="">

						<input type="hidden" name="action" value="add">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editJadwal()"><i class="icon-check"></i> Submit</button>
    				        	<button type="button" class="btn" style="margin-left: 10px;" onclick="closeModal()"><i class="icon-remove"></i> Cancel</button>
    			        	</center>
    			        </div>
    			  	</form>
    			</div>
    		</div>
    	</div>
  	</div>
</div>

<div id="timeline-modal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">x</button>
    <h3>Status SMS</h3>
  </div>
  <div class="modal-body" style="height:400px;">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td width="25%">Nama Penerima</td>
					<td>: <span id="sms_to"></span></td>
				</tr>
				<tr>
					<td>No. Hp</td>
					<td>: <span id="sms_no"></span></td>
				</tr>
				<tr>
					<td>Pesan</td>
					<td>: <span id="sms_msg"></span></td>
				</tr>
			</tbody>
		</table>
		<div class="widget-box">
			<div class="timeline" id="timeline-content">
				
			</div>
		</div>
  </div>
</div>

<div id="status-modal" class="modal hide">
  <div class="modal-header">
    <button data-dismiss="modal" class="close" type="button">x</button>
    <h3>Status Job</h3>
  </div>
  <div class="modal-body" style="height:200px;">
  	<div class="widget-box">
    	<div class="widget-content nopadding">
    		<form class="form-horizontal" id="form-status">
				<div class="control-group">
					<label class="control-label" style="margin-left:-50px;">Status</label>
					<div class="controls" style="margin-left:150px;">
						<select name="status_job" class="form-control span5">
							<option value="x" selected disabled>- Pilih Status- </option>
							<option value="1">On Process</option>
							<option value="2">Done</option>
							<option value="3">Canceled</option>
						</select>
					</div>
				</div>

				<input type="hidden" name="st_id_jadwal">

				<input type="hidden" name="action" value="ch_st">

				<div class="form-actions">
					<center>
						<button type="button" name="action" value="add" class="btn btn-primary" onclick="editStatus()"><i class="icon-check"></i> Submit</button>
						<button type="button" class="btn" style="margin-left: 10px;" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>
					</center>
				</div>
			</form>
		</div>
	</div>
  </div>
</div>

<style type="text/css">
	.select2-container{
		margin:0 !important;
	}
	span.select2-container{
		z-index:10050 !important;
	}
	.select2-container--open{
	    z-index:10050 !important;         
    }
    .select2-close-mask{
        z-index: 10050 !important;
    }
    .select2-dropdown{
        z-index: 10050 !important;
    }
    .modal{
    	z-index: 9999 !important;
    }

	#profile-messages .dropdown-menu{
		left:0 !important;
	}

	.dropdown-menu{
		left:-235%;
	}

	.bootstrap-timepicker-widget table td input{
		width:40px !important;
	}
</style>

<script type="text/javascript">
	var tbl_data;

	$(document).ready(function () {
		

	    //Setup - add a text input to each footer cell
	    // $('#tbl_mekanikthead th').each( function () {
	    //     var title = $(this).text();
	    //     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
	    // } );

	    tbl_data= $('#tbl_data').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : "jadwal_process.php?action=get",
	        select: {
	            style: 'multi+shift',
	        },
			columns:[
				{"data":null,"defaultContent":"","orderable":false,"searchable":false,"width":"4%"},
				{"data":null,"defaultContent":""},
				{"data":null,"defaultContent":""},
				{"data":"penumpang"},
				{"data":"tujuan"},
				{"data":null,"defaultContent":""},
				{"data":null,"defaultContent":""},
				{"data":"status_job"},
				{"data":"send_id"},
				{"data":null,"defaultContent":"","orderable":false,"searchable":false},
			],
	        columnDefs: [
				{
	                "orderable": false,
	                "className": 'select-checkbox',
	                "targets": 0,
	                "data":null,
	                "defaultContent": "",
					"width":"6%"
	            },
				{
					"targets": 1,
					"render": function(data,type,full,meta){
						return full.nik+" - "+full.nama_pengemudi;
					}
				},
				{
					"targets": 2,
					"render": function(data,type,full,meta){
						return full.plat_nomor+" - "+full.nama_merk+" - "+full.nama_jenis;
					}
				},
				{
					"targets": 5,
					"render": function(data,type,full,meta){
						return moment(full.tanggal_berangkat).format('DD-MM-YYYY')+", "+moment(full.jam_berangkat, 'HH:mm:ss').format('HH:mm');
					}
				},
				{
					"targets": 6,
					"render": function(data,type,full,meta){
						return moment(full.tanggal_kembali).format('DD-MM-YYYY')+", "+moment(full.jam_kembali, 'HH:mm:ss').format('HH:mm');
					}
				},
				{
					"targets":7,
					"class":"text-center",
					"render":function(data,type,full,meta){
						var status;
						switch (data) {
							case '1':
								status = '<center><span class="badge badge-warning">On Process</span></center>';
								break;
							case '2':
								status = '<center><span class="badge badge-success">Done</span></center>';
								break;
							case '3':
								status = '<center><span class="badge badge-important">Canceled</span></center>';
								break;
						
							default:
								status = '<center><span class="badge badge-info">Scheduled</span></center>';
								break;
						}

						return status;
					}
				},
				{
					"targets":8,
					"render":function(data,type,full,meta){
						if(data>0){
							return '<center><a href="javascript:;" class="btn btn-success btn-mini chk_status">Cek Status</a></center>';
						}

						return '<center><span class="badge badge-warning">Belum dikirim</span></center>';
					}
				},       
	            {
	                "sortable":false,
	                "targets": 9,
	                "data": "id_pengemudi",
					"width":"8%",
	                "render": function ( data, type, full, meta ) {

						var option = '';
						<?php if($_SESSION['role']==1){ ?>
						option += 	'<div class="btn-group" style="">';
						option +=	'<button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle">Action <span class="caret"></span></button>';
						option +=	'<ul class="dropdown-menu">';
						option +=	'<li><a href="javascript:;" class="sms-btn" ><i class="icon-envelope"></i> Kirim SMS</a></li>';
						option +=	'<li><a href="javascript:;" class="status-btn" ><i class="icon-check"></i> Ubah Status</a></li>';
						option +=	'<li><a href="cetak_surat_jalan.php?id='+full.id_jadwal+'" class="print-btn" ><i class="icon-print"></i> Cetak Surat Jalan</a></li>';
						option +=	'<li><a href="javascript:;" class="edit-btn" ><i class="icon-edit"></i> Edit</a></li>';
						option +=	'</ul>';
						option +=	'</div>';
						<?php } ?>
	                    return option;
	                }
	            },

	        ],
	        select: {
	            style:    'os',
	            selector: 'td:first-child'
	        },
	        order: [[ 1, 'asc' ]]
	    });

	    // Apply the search
	    tbl_data.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

	    

	    $('#deletePengemudi').click( function(){
	            /* get selected row count and its data */
	            var count = tbl_data.rows('.selected').data().length;
	            var item = tbl_data.rows('.selected').data();

	            /* perform deletion */
	            if(count > 0){ /* if has selected count >= 1 */
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data Jadwal Antar. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_jadwal'];
	                            $.post( 'jadwal_process.php?action=del&id=' + did).done(function(){tbl_data.ajax.reload(); });
	                        };
	                    }
	                });
	            }else{
	                $.messager.alert('Delete Confirmation','Tidak ada item terpilih untuk dihapus','warning');                
	            }
	        });
	    
	    
	    $('select').select2();

	    $('#tbl_data tbody').on('click', '.edit-btn', function () {
	        $('#edit-modal').modal();
	        $('#form-edit').find('[name=pengemudi]').val(tbl_data.row($(this).parents('tr')).data().id_pengemudi).change();
	        $('#form-edit').find('[name=kendaraan]').val(tbl_data.row($(this).parents('tr')).data().id_kendaraan).change();
	        $('#form-edit').find('[name=penumpang]').val(tbl_data.row($(this).parents('tr')).data().penumpang);
	        $('#form-edit').find('[name=action_pengemudi]').val(tbl_data.row($(this).parents('tr')).data().action_p).change();
	        $('#form-edit').find('[name=tujuan]').val(tbl_data.row($(this).parents('tr')).data().tujuan);
	        $('#form-edit').find('[name=standby]').val(tbl_data.row($(this).parents('tr')).data().standby_p).change();
	        $('#form-edit').find('[name=tanggal_berangkat]').val(moment(tbl_data.row($(this).parents('tr')).data().tanggal_berangkat).format('DD-MM-YYYY'));
	        $('#form-edit').find('[name=tanggal_kembali]').val(moment(tbl_data.row($(this).parents('tr')).data().tanggal_kembali).format('DD-MM-YYYY'));
	        $('#form-edit').find('[name=jam_berangkat]').val(moment(tbl_data.row($(this).parents('tr')).data().jam_berangkat,'HH:mm:ss').format('HH:mm'));
	        $('#form-edit').find('[name=jam_kembali]').val(moment(tbl_data.row($(this).parents('tr')).data().jam_kembali,'HH:mm:ss').format('HH:mm'));
	        $('#form-edit').find('[name=id_jadwal]').val(tbl_data.row($(this).parents('tr')).data().id_jadwal);
	    }); 

		$('#tbl_data tbody').on('click','.sms-btn',function(){

			var telp = tbl_data.row($(this).parents('tr')).data().telp;
			var pengemudi = tbl_data.row($(this).parents('tr')).data().nama_pengemudi;
			var plat = tbl_data.row($(this).parents('tr')).data().plat_nomor;
			var penumpang = tbl_data.row($(this).parents('tr')).data().penumpang;
			var tujuan = tbl_data.row($(this).parents('tr')).data().tujuan;
			var tgl_berangkat = tbl_data.row($(this).parents('tr')).data().tanggal_berangkat;
			var tgl_kembali = tbl_data.row($(this).parents('tr')).data().tanggal_kembali;
			var jam_berangkat = tbl_data.row($(this).parents('tr')).data().jam_berangkat;
			var jam_kembali = tbl_data.row($(this).parents('tr')).data().jam_kembali;
			var action_p = tbl_data.row($(this).parents('tr')).data().action_p;
			var standby_p = tbl_data.row($(this).parents('tr')).data().standby_p;
			var id_jadwal = tbl_data.row($(this).parents('tr')).data().id_jadwal;

			$.ajax({
				url: 'send_sms.php',
				type: 'POST',
				data: {
					telp:telp,
					pengemudi:pengemudi,
					plat:plat,
					penumpang:penumpang,
					tujuan:tujuan,
					tgl_berangkat:tgl_berangkat,
					tgl_kembali:tgl_kembali,
					jam_berangkat:jam_berangkat,
					jam_kembali:jam_kembali,
					action_p:action_p,
					standby_p:standby_p,
					id:id_jadwal
				},
				success: function(data){
					var parsed = JSON.parse(data);

					if(parsed.result){
						$.gritter.add({
							title:	'Sukses',
							text:	'Berhasil mengirim sms',
							sticky: false
						});
					}else{
						$.gritter.add({
							title:	'Gagal',
							text:	'terjadi kesalahan saat mengirim sms',
							sticky: false
						});
					}

					tbl_data.ajax.reload();
					hideAddForm();
				}
			});
		});

		$('#tbl_data tbody').on('click','.chk_status',function(){
			$('#timeline-modal').modal();
			var sms_id = tbl_data.row($(this).parents('tr')).data().send_id;
			var telp = tbl_data.row($(this).parents('tr')).data().telp;
			var pengemudi = tbl_data.row($(this).parents('tr')).data().nama_pengemudi;
			
			$('#sms_to').html(pengemudi);
			$('#sms_no').html(telp);

			$('#timeline-content').empty();
			$('#sms_msg').empty();

			$.ajax({
				url: 'get_sms_status.php',
				type: 'POST',
				data: {
					id:sms_id,
				},
				success: function(data){
					var parsed = JSON.parse(data);
					console.log(parsed.data);
					if(parsed.result){
						$('#timeline-content').empty().append(parsed.data);
						$('#sms_msg').append(parsed.msg);
					}else{
						$.gritter.add({
							title:	'Gagal',
							text:	'terjadi kesalahan saat cek status sms',
							sticky: false
						});
						$('#timeline-modal').modal('toggle');
					}
					
				}
			});
		});

		$("#tbl_data tbody").on('click','.status-btn', function(){
			$('#status-modal').modal();
			$('[name="status_job"]').val("x").change();
			$('[name="st_id_jadwal"]').val(tbl_data.row($(this).parents('tr')).data().id_jadwal);
		});
	});

	function editRecord(){
		
		// $('#edit_level').val(tbl_data.row().data().level);
		// $('#edit_section').val(tbl_data.row().data().section);
	}

	function closeModal(){
		$('#edit-modal').modal('toggle');
	}


	function showAddForm(){
	    $('#add_form').hide();
	    $('#remove_form').show();
	    $('.add_form_content').slideDown('slow');
	}

	function hideAddForm(){
	    $('#remove_form').hide();
	    $('#add_form').show();
	    $('.add_form_content').slideUp('slow');
	}

	function saveJadwal(){
		var formdata = $('#form-add').serialize();
	    $.ajax({
	        url: 'jadwal_process.php',
	        type: 'POST',
	        data: formdata,
	        success: function(data){
				var res = JSON.parse(data);
				console.log(res);
				if(!res.result){
					$.gritter.add({
						title:	 res.title,
						text:	res.msg,
						sticky: false
					});	
				}else{
					$.gritter.add({
						title:	 res.title,
						text:	res.msg,
						sticky: false
					});	
					document.getElementById("form-add").reset();
	            	$('select').val(" ").trigger('change');
	            	tbl_data.ajax.reload();
	            	hideAddForm();
				}
	           
	        }
	    });
	}

	function editJadwal(){
		var formdata = $('#form-edit').serialize();
	    $.ajax({
	        url: 'jadwal_process.php',
	        type: 'POST',
	        data: formdata,
	        success: function(data){
	            //$('#form_mekanik_edit').form('reset');
	            tbl_data.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}

	function editStatus(){
		var formdata = $('#form-status').serialize();
		$.ajax({
	        url: 'jadwal_process.php',
	        type: 'POST',
	        data: formdata,
	        success: function(data){
	            tbl_data.ajax.reload();
	            $('#status-modal').modal('toggle');
	        }
	    });
	}
</script>