<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_kn" title="Data Kendaraan" class="tip-bottom"><i class="icon-user"></i> Kendaraan</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Kendaraan</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php if($_SESSION['role']==1){ ?>
			<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Kendaraan</a>
			<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
			<a href="javascript:void(0)" class="btn btn-danger" id="deletekendaraan"><i class="icon-trash"></i> Hapus Kendaraan</a>
			<?php } ?>
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Kendaraan</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-add">
				        <div class="control-group">
				          <label class="control-label">Nomor Plat</label>
				          <div class="controls">
				            <input type="text" name="plat_nomor" class="span3" required>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Jenis Kendaraan</label>
				          <div class="controls">
						  	<select name="jenis_kendaraan" class="span5">
								<option value=" " selected disabled>Pilih Jenis Kendaraan</option>
								<?php
									$query = "SELECT * FROM mnj_jenis_kendaraan ORDER BY nama_jenis ASC";
									$sql = mysqli_query($connect,$query);

									while($data_jenis = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
								?>

										<option value="<?php echo $data_jenis['id_jenis'];?>"><?php echo $data_jenis['nama_jenis'];?></option>

								<?php } ?>
							</select>
				          </div>
				        </div>
						<div class="control-group">
				          <label class="control-label">Tahun</label>
				          <div class="controls">
				            <input type="text" name="tahun" class="span3" required>
				          </div>
				        </div>
						<div class="control-group">
				          <label class="control-label">Merk Kendaraan</label>
				          <div class="controls">
						  <select name="merk" class="span5">
								<option value=" " selected disabled>Pilih Merk Kendaraan</option>
								<?php
									$query = "SELECT * FROM mnj_merk_kendaraan ORDER BY nama_merk ASC";
									$sql = mysqli_query($connect,$query);

									while($data_merk = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
								?>

										<option value="<?php echo $data_merk['id_merk'];?>"><?php echo $data_merk['nama_merk'];?></option>

								<?php } ?>
							</select>
				          </div>
				        </div>

				        <input type="hidden" name="id_kendaraan" value="">

				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="saveKendaraan()"><i class="icon-check"></i> Submit</button>
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
	        	<h5>Data Kendaraan</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_kendaraan" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>Plat Nomor</th>
	    					<th>Jenis Kendaraan</th>
	    					<th>Tahun</th>
	    					<th>Merk</th>
	    					<th width="8%">Option</th>
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
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Ubah Data Kendaraan</h3>
  </div>
  <div class="modal-body">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form-edit">

    			        <div class="control-group">
    			          <label class="control-label">Nomor Plat</label>
    			          <div class="controls">
    			            <input type="text" required id="edit_plat_nomor">
    			          </div>
    			        </div>
    			        <div class="control-group">
    			          <label class="control-label">Jenis Kendaraan</label>
    			          <div class="controls">
						  <select id="edit_jenis_kendaraan" class="span5">
								<option value=" " selected disabled>Pilih Jenis Kendaraan</option>
								<?php
									$query = "SELECT * FROM mnj_jenis_kendaraan ORDER BY nama_jenis ASC";
									$sql = mysqli_query($connect,$query);

									while($data_jenis = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
								?>

										<option value="<?php echo $data_jenis['id_jenis'];?>"><?php echo $data_jenis['nama_jenis'];?></option>

								<?php } ?>
							</select>
    			          </div>
    			        </div>
						<div class="control-group">
    			          <label class="control-label">Tahun</label>
    			          <div class="controls">
    			            <input type="text" class="form-control" required id="edit_tahun">
    			          </div>
    			        </div>
						<div class="control-group">
    			          <label class="control-label">Merk Kendaraan</label>
    			          <div class="controls">
						  <select id="edit_merk" class="span5">
								<option value=" " selected disabled>Pilih Merk Kendaraan</option>
								<?php
									$query = "SELECT * FROM mnj_merk_kendaraan ORDER BY nama_merk ASC";
									$sql = mysqli_query($connect,$query);

									while($data_merk = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
								?>

										<option value="<?php echo $data_merk['id_merk'];?>"><?php echo $data_merk['nama_merk'];?></option>

								<?php } ?>
							</select>
    			          </div>
    			        </div>

    			        <input type="hidden" value="" id="id_kendaraan">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editKendaraan()"><i class="icon-check"></i> Submit</button>
    				        	<button type="button" class="btn" style="margin-left: 10px;" onclick="closeModal()"><i class="icon-remove"></i> Cancel</button>
    			        	</center>
    			        </div>
    			  	</form>
    			</div>
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
</style>
<script type="text/javascript">
	var tbl_kendaraan;

	$(document).ready(function () {
		

	    //Setup - add a text input to each footer cell
	    // $('#tbl_instrukturthead th').each( function () {
	    //     var title = $(this).text();
	    //     $(this).html( title + '<br><input type="text" placeholder="Search '+title+'" />' );
	    // } );

	    tbl_kendaraan= $('#tbl_kendaraan').DataTable( {
	    	bJQueryUI: true,
	    	sPaginationType: "full_numbers",
	        "ajax" : "kendaraan_process.php?action=get",
	        select: {
	            style: 'multi+shift',
	        },
			columns:[
				{
	                "orderable": false,
	                "className": 'select-checkbox',
	                "data":null,
	                "defaultContent": ""
	            },
				{"data":"plat_nomor"},
				{"data":"nama_jenis"},
				{"data":"tahun"},
				{"data":"nama_merk","width":"20%"},
				{"data":null,"defaultContent":""},
			],
	        columnDefs: [                
	            {
	                "sortable":false,
	                "targets": 5,
	                "data": "id_kendaraan",
	                "render": function ( data, type, full, meta ) {
						<?php if($_SESSION['role']==1){ ?>
	                    return '<center><a href="javascript:;" class="btn btn-mini btn-info edit-btn" ><i class="icon-edit"></i> Edit</a></center>';
						<?php } ?>
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
	    tbl_kendaraan.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.header() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );

	    

	    $('#deletekendaraan').click( function(){
	            /* get selected row count and its data */
	            var count = tbl_kendaraan.rows('.selected').data().length;
	            var item = tbl_kendaraan.rows('.selected').data();

	            /* perform deletion */
	            if(count > 0){ /* if has selected count >= 1 */
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data kendaraan. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_kendaraan'];
	                            $.post( 'kendaraan_process.php?action=del&id=' + did).done(function(){tbl_kendaraan.ajax.reload(); });
	                        };
	                    }
	                });
	            }else{
	                $.messager.alert('Delete Confirmation','Tidak ada item terpilih untuk dihapus','warning');                
	            }
	        });
	    
	    
	    $('select').select2();

	    $('#tbl_kendaraan tbody').on('click', '.edit-btn', function () {
	        $('#edit-modal').modal();
	        $('#id_kendaraan').val(tbl_kendaraan.row($(this).parents('tr')).data().id_kendaraan);
	        $('#edit_plat_nomor').val(tbl_kendaraan.row($(this).parents('tr')).data().plat_nomor);
	        $('#edit_jenis_kendaraan').val(tbl_kendaraan.row($(this).parents('tr')).data().jenis_kendaraan).change();
	        $('#edit_tahun').val(tbl_kendaraan.row($(this).parents('tr')).data().tahun);
	        $('#edit_merk').val(tbl_kendaraan.row($(this).parents('tr')).data().merk).change();
	    }); 
	});

	function editRecord(){
		
		// $('#edit_level').val(tbl_kendaraan.row().data().level);
		// $('#edit_section').val(tbl_kendaraan.row().data().section);
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

	function saveKendaraan(){
	    $.ajax({
	        url: 'kendaraan_process.php',
	        type: 'POST',
	        data: {
	            plat: $('[name=plat_nomor]').val(),
	            jenis: $('[name=jenis_kendaraan]').val(),
	            tahun: $('[name=tahun]').val(),
	            merk: $('[name=merk]').val(),
	            action: $('[name=action]').val(),
	            id_kendaraan: $('[name=id_kendaraan]').val(),
	        },
	        success: function(data){
	        	document.getElementById("form-add").reset();
				$('[name=jenis_kendaraan]').val(" ").change();
				$('[name=merk]').val(" ").change();
	            tbl_kendaraan.ajax.reload();
	            hideAddForm();
	        }
	    });
	}

	function editKendaraan(){
	    $.ajax({
	        url: 'kendaraan_process.php',
	        type: 'POST',
	        data: {
	            plat: $('#edit_plat_nomor').val(),
	            jenis: $('#edit_jenis_kendaraan').val(),
	            tahun: $('#edit_tahun').val(),
	            merk: $('#edit_merk').val(),
	            action: $('[name=action]').val(),
	            id_kendaraan: $('#id_kendaraan').val(),
	        },
	        success: function(data){
	            $('#form-edit').form('reset');
				$('#edit_jenis_kendaraan').val(" ").change();
				$('#edit_merk').val(" ").change();
	            tbl_kendaraan.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}
</script>