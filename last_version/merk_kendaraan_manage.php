<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> 
    	<a href="<?php echo $base_url;?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
    	<a href="<?php echo $base_url;?>/?p=m_mk" title="Data Merk Kendaraan" class="tip-bottom"><i class="icon-user"></i> Merk Kendaraan</a>    	
    </div>
  </div>
<!--End-breadcrumbs-->


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h3>Merk Kendaraan</h3>
			<hr>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php if($_SESSION['role']==1){ ?>
			<a href="javascript:void(0)" class="btn btn-primary" onclick="showAddForm()"  id="add_form"><i class="icon-plus"></i> Tambah Merk Kendaraan</a>
			<a href="javascript:void(0)" class="btn btn-warning" onclick="hideAddForm()" style="display: none;" id="remove_form"><i class="icon-remove"></i> Cancel</a>
			<a href="javascript:void(0)" class="btn btn-danger" id="deletekendaraan"><i class="icon-trash"></i> Hapus Merk Kendaraan</a>
			<?php } ?>
		</div>
	</div>

	<div class="row-fluid add_form_content" style="display: none;">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon"><i class="icon-plus"></i></span>
					<h5>Tambah Merk Kendaraan</h5>
				</div>
				<div class="widget-content nopadding">
					<form class="form-horizontal" id="form-add">
				        <div class="control-group">
				          <label class="control-label">Merk Kendaraan</label>
				          <div class="controls">
				            <input type="text" name="merk_kendaraan" class="span5" required>
				          </div>
				        </div>

				        <input type="hidden" name="id_merk" value="">

				        <div class="form-actions">
				        	<center>
					        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="saveMerkKendaraan()"><i class="icon-check"></i> Submit</button>
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
	        	<h5>Data Merk Kendaraan</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<table id="tbl_kendaraan" class="table table-striped table-bordered">
	    			<thead>
	    				<tr>
	    					<th></th>
	    					<th>Merk Kendaraan</th>
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
    <h3>Ubah Data Merk Kendaraan</h3>
  </div>
  <div class="modal-body">
    		<div class="widget-box">
    			<div class="widget-content nopadding">
    				<form class="form-horizontal" id="form-edit">

    			        <div class="control-group">
    			          <label class="control-label">Merk Kendaraan</label>
    			          <div class="controls">
    			            <input type="text" required id="edit_merk_kendaraan">
    			          </div>
    			        </div>

    			        <input type="hidden" value="" id="id_merk">

    			        <div class="form-actions">
    			        	<center>
    				        	<button type="button" name="action" value="add" class="btn btn-primary" onclick="editMerkKendaraan()"><i class="icon-check"></i> Submit</button>
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
	        "ajax" : "merk_kendaraan_process.php?action=get",
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
				{"data":"nama_merk"},
				{"data":null,"defaultContent":""},
			],
	        columnDefs: [                
	            {
	                "sortable":false,
	                "targets": 2,
	                "data": "id_merk",
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
	                
	                $.messager.confirm('Delete Confirmation', 'Konfirmasi penghapusan ' + count + ' Data Merk Kendaraan. <br><br><br> <strong class="text-danger">Perhatian : Proses ini akan menghapus seluruh data yang dipilih</strong>', function(r){
	                    if(r){
	                        for (var i = 0; i <= count - 1; i++) {
	                            //console.log(item[i]['id_inkaso']);
	                            var did=item[i]['id_merk'];
	                            $.post( 'merk_kendaraan_process.php?action=del&id=' + did).done(function(){tbl_kendaraan.ajax.reload(); });
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
	        $('#id_merk').val(tbl_kendaraan.row($(this).parents('tr')).data().id_merk);
	        $('#edit_merk_kendaraan').val(tbl_kendaraan.row($(this).parents('tr')).data().nama_merk);
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

	function saveMerkKendaraan(){
	    $.ajax({
	        url: 'merk_kendaraan_process.php',
	        type: 'POST',
	        data: {
	            merk: $('[name=merk_kendaraan]').val(),
	            action: $('[name=action]').val(),
	            id_merk: $('[name=id_merk]').val(),
	        },
	        success: function(data){
	        	document.getElementById("form-add").reset();
	            tbl_kendaraan.ajax.reload();
	            hideAddForm();
	        }
	    });
	}

	function editMerkKendaraan(){
	    $.ajax({
	        url: 'merk_kendaraan_process.php',
	        type: 'POST',
	        data: {
	            merk: $('#edit_merk_kendaraan').val(),
	            action: $('[name=action]').val(),
	            id_merk: $('#id_merk').val(),
	        },
	        success: function(data){
	            $('#form-edit').form('reset');
	            tbl_kendaraan.ajax.reload();
	            $('#edit-modal').modal('toggle');
	        }
	    });
	}
</script>