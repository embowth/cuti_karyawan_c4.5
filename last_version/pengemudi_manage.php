<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_pm" title="Data Pengemudi" class="tip-bottom"><i class="icon-wrench"></i> Pengemudi</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Pengemudi</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">

			<?php if($_SESSION['role']==1 ){ ?>
				<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Pengemudi</a>
				<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
				<a href="javascript:void(0)" class="btn btn-danger" id="deletePengemudi"><i class="icon-trash"></i> Hapus Pengemudi</a>
			<?php } ?>
			
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Pengemudi</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-pengemudi">
				        <div class="control-group">
				          <label class="control-label">NIK</label>
				          <div class="controls">
				            <input type="text" name="nik" required>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Nama</label>
				          <div class="controls">
				            <input type="text" name="nama" class="span5" required>
				          </div>
				        </div>
				        <div class="control-group">
				          <label class="control-label">Telpon</label>
				          <div class="controls">
				            <input type"text" name="telp" class="span5" required>
				          </div>
				        </div>
				        <div class="control-group">
				          	<label class="control-label">Jenis Kelamin</label>
				          	<div class="controls">
				              <select class="span5" name="jenis_kelamin">
				                <option value=" " selected disabled>- Pilih Jenis Kelamin -</option>
				                <option value="1">Laki-laki</option>
				                <option value="0">Perempuan</option>
				              </select>
				            </div>
				        </div>

				        <input type="hidden" name="id_pengemudi" value="">

				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="savePengemudi()"><i class="icon-check"></i> Submit</button>
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
	        	<h5>Data Pengemudi</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_data" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>NIK</th>
	    					<th>Nama</th>
	    					<th>Telp</th>
	    					<th>Jenis Kelamin</th>
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
    <button data-dismiss="modal" class="close" type="button">×</button>
    <h3>Ubah Data Pengemudi</h3>
  </div>
  <div class="modal-body">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form_mekanik_edit">
    			        <div class="control-group">
    			          <label class="control-label">NIK</label>
    			          <div class="controls">
    			            <input type="text" name="nrp" required disabled id="nik">
    			          </div>
    			        </div>
    			        <div class="control-group">
    			          <label class="control-label">Nama</label>
    			          <div class="controls">
    			            <input type="text" name="nama" class="form-control" required id="nm">
    			          </div>
    			        </div>
    			        <div class="control-group">
				          <label class="control-label">Telpon</label>
				          <div class="controls">
				            <input type"text" name="edit_telp" class="form-control" required id="telp">
				          </div>
				        </div>
				        <div class="control-group">
				          	<label class="control-label">Jenis Kelamin</label>
				          	<div class="controls">
				              <select class="form-control" name="edit_jenis_kelamin" id="jk">
				                <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
				                <option value="1">Laki-laki</option>
				                <option value="0">Perempuan</option>
				              </select>
				            </div>
				        </div>

    			        <input type="hidden" name="id_pengemudi" value="" id="id_pengemudi">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editPengemudi()"><i class="icon-check"></i> Submit</button>
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
	        "ajax" : "pengemudi_process.php?action=get",
	        select: {
	            style: 'multi+shift',
	        },
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
	                "data":"nik",
	                "targets": 1,
					"width":"15%",
	            },
	            {
	                "data":"nama",
	                "targets": 2
	            },
	            {
	                "data":"telp",
	                "targets": 3,
					"width":"15%"
	            },
	            {
	                "data":"jenis_kelamin",
	                "targets": 4,
					"width":"12%",
					"render":function(data,type,full,meta){
						if(data==1){
							return "Laki-laki";
						}

						return "Perempuan";
					}
	            },
	            {
	                "sortable":false,
	                "targets": 5,
	                "data": "id_pengemudi",
					"defaultContent": "",
	                "render": function ( data, type, full, meta ) {
						<?php if($_SESSION['role']==1){ ?>
	                    return '<a href="javascript:;" class="btn btn-mini btn-info edit-btn" ><i class="icon-edit"></i> Edit</a>';
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
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data Pengemudi. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_pengemudi'];
	                            $.post( 'pengemudi_process.php?action=del&id=' + did).done(function(){tbl_data.ajax.reload(); });
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
	        $('#id_pengemudi').val(tbl_data.row($(this).parents('tr')).data().id_pengemudi);
	        $('#nik').val(tbl_data.row($(this).parents('tr')).data().nik);
	        $('#nm').val(tbl_data.row($(this).parents('tr')).data().nama);
	        $('#telp').val(tbl_data.row($(this).parents('tr')).data().telp);
	        $('#jk').val(tbl_data.row($(this).parents('tr')).data().jenis_kelamin).trigger('change');
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

	function savePengemudi(){
	    $.ajax({
	        url: 'pengemudi_process.php',
	        type: 'POST',
	        data: {
	            nik: $('[name=nik]').val(),
	            nama: $('[name=nama]').val(),
	            level: $('[name=level]').val(),
	            telp: $('[name=telp]').val(),
	            jenis_kelamin: $('[name=jenis_kelamin]').val(),
				action: $('[name=action]').val(),
	            id_pengemudi: $('[name=id_pengemudi]').val(),
	        },
	        success: function(data){
	            document.getElementById("form-pengemudi").reset();
	            $('[name=jenis_kelamin]').val(" ").trigger('change');
	            tbl_data.ajax.reload();
	            hideAddForm();
	        }
	    });
	}

	function editPengemudi(){
	    $.ajax({
	        url: 'pengemudi_process.php',
	        type: 'POST',
	        data: {
	            nik: $('#nik').val(),
	            nama: $('#nm').val(),
	            telp: $('#telp').val(),
	            jenis_kelamin: $('#jk').val(),
	            action: $('[name=action]').val(),
	            id_pengemudi: $('#id_pengemudi').val(),
	        },
	        success: function(data){
	            //$('#form_mekanik_edit').form('reset');
	            tbl_data.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}
</script>