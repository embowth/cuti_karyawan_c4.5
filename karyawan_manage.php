<!--breadcrumbs-->
<div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_jk" title="Data Data Karyawan" class="tip-bottom"><i class="icon-wrench"></i> Data Karyawan</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Data Karyawan</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">

			<?php if($_SESSION['role']==1 ){ ?>
				<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Karyawan</a>
				<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
				<a href="javascript:void(0)" class="btn btn-danger" id="deletePengemudi"><i class="icon-trash"></i> Hapus Data Karyawan</a>
			<?php } ?>
			
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Data Karyawan</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-add">
                        <div class="control-group">
				          <label class="control-label">NIK</label>
				          <div class="controls">
				            <input type"text" name="nik" class="span5" required>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Nama Karyawan</label>
				          <div class="controls">
				            <input type"text" name="nama_karyawan" class="span5" required>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Tempat Lahir</label>
				          <div class="controls">
				            <input type"text" name="tempat_lahir" class="span5" required>
				          </div>
				        </div>

                        <div class="control-group">
				            <label class="control-label">Tanggal Lahir</label>
				            <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_lahir" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Jenis Kelamin</label>
				          <div class="controls">
				            <select name="jenis_kelamin" class="form-control span5">
                                <option value=" " selected disabled>Pilih Jenis Kelamin</option>
								<option value="1">Laki-laki</option>
								<option value="2">Perempuan</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Status Kawin</label>
				          <div class="controls">
				            <select name="status_kawin" class="form-control span5">
                                <option value=" " selected disabled>Pilih Status Kawin</option>
								<option value="1">Menikah</option>
								<option value="2">Belum Menikah</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Alamat</label>
				          <div class="controls">
				            <textarea class="span5" name="alamat" rows="5"></textarea>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Telp.</label>
				          <div class="controls">
				            <input type"text" name="telp" class="span5" required>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Agama</label>
				          <div class="controls">
				            <select name="agama" class="form-control span5">
                                <option value=" " selected disabled>Pilih Agama</option>
								<option value="1">Islam</option>
								<option value="2">Protestan</option>
								<option value="3">Katolik</option>
								<option value="4">Hindu</option>
								<option value="5">Budha</option>
							</select>
				          </div>
				        </div>


				        <div class="control-group">
				          <label class="control-label">Divisi</label>
				          <div class="controls">
				            <select name="divisi" class="form-control span5">
                                <option value=" " selected disabled>Pilih Divisi</option>
                                <?php 
                                    $query = "SELECT * FROM ct_divisi ORDER BY nama_divisi ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['kd_divisi'];?>"><?php echo $data['nama_divisi'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Jabatan</label>
				          <div class="controls">
                          <select name="jabatan" class="form-control span5">
                                <option value=" " selected disabled>Pilih Jabatan</option>
                                <?php 
                                    $query = "SELECT * FROM ct_jabatan ORDER BY nama_jabatan ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['kd_jabatan'];?>"><?php echo $data['nama_jabatan'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>

				        <input type="hidden" name="id_karyawan" value="">

						<input type="hidden" name="action" value="add">
				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="saveData()"><i class="icon-check"></i> Submit</button>
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
	        	<h5>Data Data Karyawan</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_data" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>NIK</th>
	    					<th>Nama</th>
	    					<th>Alamat</th>
	    					<th>Divisi</th>
	    					<th>Jabatan</th>
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
    <h3>Ubah Data Data Karyawan</h3>
  </div>
  <div class="modal-body" style="height:600px;">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form-edit">
                    <div class="control-group">
				          <label class="control-label">NIK</label>
				          <div class="controls">
				            <input type"text" name="nik" class="" required readonly>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Nama Karyawan</label>
				          <div class="controls">
				            <input type"text" name="nama_karyawan" class="" required>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Tempat Lahir</label>
				          <div class="controls">
				            <input type"text" name="tempat_lahir" class="" required>
				          </div>
				        </div>

                        <div class="control-group">
				            <label class="control-label">Tanggal Lahir</label>
				            <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy" class="datepicker span3" name="tanggal_lahir" readonly>
                                <span class="help-block"></span> 
                            </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Jenis Kelamin</label>
				          <div class="controls">
				            <select name="jenis_kelamin" class="form-control ">
                                <option value=" " selected disabled>Pilih Jenis Kelamin</option>
								<option value="1">Laki-laki</option>
								<option value="2">Perempuan</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Status Kawin</label>
				          <div class="controls">
				            <select name="status_kawin" class="form-control">
                                <option value=" " selected disabled>Pilih Status Kawin</option>
								<option value="1">Menikah</option>
							</select>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Alamat</label>
				          <div class="controls">
				            <textarea class="" stye="width:180%;" name="alamat" rows="5"></textarea>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Telp.</label>
				          <div class="controls">
				            <input type"text" name="telp" class="" required>
				          </div>
				        </div>

                        <div class="control-group">
				          <label class="control-label">Agama</label>
				          <div class="controls">
				            <select name="agama" class="form-control">
                                <option value=" " selected disabled>Pilih Agama</option>
								<option value="1">Islam</option>
								<option value="2">Protestan</option>
								<option value="3">Katolik</option>
								<option value="4">Hindu</option>
								<option value="5">Budha</option>
							</select>
				          </div>
				        </div>


				        <div class="control-group">
				          <label class="control-label">Divisi</label>
				          <div class="controls">
				            <select name="divisi" class="form-control">
                                <option value=" " selected disabled>Pilih Divisi</option>
                                <?php 
                                    $query = "SELECT * FROM ct_divisi ORDER BY nama_divisi ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['kd_divisi'];?>"><?php echo $data['nama_divisi'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Jabatan</label>
				          <div class="controls">
                          <select name="jabatan" class="form-control">
                                <option value=" " selected disabled>Pilih Jabatan</option>
                                <?php 
                                    $query = "SELECT * FROM ct_jabatan ORDER BY nama_jabatan ASC";
                                    $sql = mysqli_query($connect,$query);

                                    while($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
                                ?>
                                        <option value="<?php echo $data['kd_jabatan'];?>"><?php echo $data['nama_jabatan'];?></option>
                                <?php } ?>
                            </select>
				          </div>
				        </div>

				        <input type="hidden" name="id_karyawan" value="">

						<input type="hidden" name="action" value="add">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editData()"><i class="icon-check"></i> Submit</button>
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

				<input type="hidden" name="st_id_karyawan">

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
	        "ajax" : "karyawan_process.php?action=get",
	        select: {
	            style: 'multi+shift',
	        },
			columns:[
				{
	                "orderable": false,
	                "className": 'select-checkbox',
	                "data":null,
	                "defaultContent": "",
                    "width":"4%"
	            },
				{"data":"nik"},
				{"data":"nama_karyawan"},
				{"data":"alamat"},
				{"data":"nama_divisi"},
				{"data":"nama_jabatan"},
				{
                    "data":null,"defaultContent":"","orderable":false,"searchable":false,
                    "render":function(data,type,row,meta){
                        <?php if($_SESSION['role']==1){ ?>
	                    return '<center><a href="javascript:;" class="btn btn-mini btn-info edit-btn" ><i class="icon-edit"></i> Edit</a></center>';
						<?php } ?>
                    }
                },
			],
	        columnDefs: [

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
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data Data Karyawan. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_karyawan'];
	                            $.post( 'karyawan_process.php?action=del&id=' + did).done(function(){tbl_data.ajax.reload(); });
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
	        $('#form-edit').find('[name=nik]').val(tbl_data.row($(this).parents('tr')).data().nik);
	        $('#form-edit').find('[name=nama_karyawan]').val(tbl_data.row($(this).parents('tr')).data().nama_karyawan);
	        $('#form-edit').find('[name=tempat_lahir]').val(tbl_data.row($(this).parents('tr')).data().tempat_lahir);
	        $('#form-edit').find('[name=tanggal_lahir]').val(moment(tbl_data.row($(this).parents('tr')).data().tanggal_lahir).format('DD-MM-YYYY'));
            $('#form-edit').find('[name=jenis_kelamin]').val(tbl_data.row($(this).parents('tr')).data().jenis_kelamin).change();
            $('#form-edit').find('[name=status_kawin]').val(tbl_data.row($(this).parents('tr')).data().status_kawin).change();
            $('#form-edit').find('[name=alamat]').val(tbl_data.row($(this).parents('tr')).data().alamat);
            $('#form-edit').find('[name=telp]').val(tbl_data.row($(this).parents('tr')).data().nomor_tlp);
            $('#form-edit').find('[name=agama]').val(tbl_data.row($(this).parents('tr')).data().agama).change();
            $('#form-edit').find('[name=divisi]').val(tbl_data.row($(this).parents('tr')).data().divisi).change();
            $('#form-edit').find('[name=jabatan]').val(tbl_data.row($(this).parents('tr')).data().jabatan).change();
            $('#form-edit').find('[name=id_karyawan]').val(tbl_data.row($(this).parents('tr')).data().id_karyawan);
            

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

	function saveData(){
		var formdata = $('#form-add').serialize();
	    $.ajax({
	        url: 'karyawan_process.php',
	        type: 'POST',
	        data: formdata,
	        success: function(data){
				var res = JSON.parse(data);
				//console.log(res);
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

	function editData(){
		var formdata = $('#form-edit').serialize();
	    $.ajax({
	        url: 'karyawan_process.php',
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
	        url: 'karyawan_process.php',
	        type: 'POST',
	        data: formdata,
	        success: function(data){
	            tbl_data.ajax.reload();
	            $('#status-modal').modal('toggle');
	        }
	    });
	}
</script>