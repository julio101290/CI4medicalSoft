<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('modulesBitacora/modalCaptureBitacora') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
 <div class="card-header">
     <div class="float-right">
         <div class="btn-group">

             <button class="btn btn-primary btnAddBitacora" data-toggle="modal" data-target="#modalAddBitacora"><i class="fa fa-plus"></i>

                 <?= lang('bitacora.add') ?>

             </button>

         </div>
     </div>
 </div>
 <div class="card-body">
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table id="tableBitacora" class="table table-striped table-hover va-middle tableBitacora">
                     <thead>
                         <tr>

                             <th>#</th>
                             <th><?= lang('bitacora.fields.descripcion') ?></th>
<th><?= lang('bitacora.fields.usuario') ?></th>
<th><?= lang('bitacora.fields.created_at') ?></th>
<th><?= lang('bitacora.fields.deleted_at') ?></th>
<th><?= lang('bitacora.fields.updated_at') ?></th>

                             <th><?= lang('bitacora.fields.actions') ?> </th>

                         </tr>
                     </thead>
                     <tbody>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>

 /**
  * Cargamos la tabla
  */

 var tableBitacora = $('#tableBitacora').DataTable({
     processing: true,
     serverSide: true,
     responsive: true,
     autoWidth: false,
     order: [[1, 'asc']],

     ajax: {
         url: '<?= base_url('admin/bitacora') ?>',
         method: 'GET',
         dataType: "json"
     },
     columnDefs: [{
             orderable: false,
             targets: [6],
             searchable: false,
             targets: [6]

         }],
     columns: [{
             'data': 'id'
         },
        
          
{
    'data': 'descripcion'
},
 
{
    'data': 'usuario'
},
 
{
    'data': 'created_at'
},
 
{
    'data': 'deleted_at'
},
 
{
    'data': 'updated_at'
},

         {
             "data": function (data) {
                 return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditBitacora" data-toggle="modal" idBitacora="${data.id}" data-target="#modalAddBitacora">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
             }
         }
     ]
 });



 $(document).on('click', '#btnSaveBitacora', function (e) {

     
var idBitacora = $("#idBitacora").val();
var descripcion = $("#descripcion").val();
var usuario = $("#usuario").val();

     $("#btnSaveBitacora").attr("disabled", true);

     var datos = new FormData();
datos.append("idBitacora", idBitacora);
datos.append("descripcion", descripcion);
datos.append("usuario", usuario);


     $.ajax({

         url: "<?= base_url('admin/bitacora/save') ?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         success: function (respuesta) {
             if (respuesta.match(/Correctamente.*/)) {
        
                 Toast.fire({
                     icon: 'success',
                     title: "Guardado Correctamente"
                 });

                 tableBitacora.ajax.reload();
                 $("#btnSaveBitacora").removeAttr("disabled");


                 $('#modalAddBitacora').modal('hide');
             } else {

                 Toast.fire({
                     icon: 'error',
                     title: respuesta
                 });

                 $("#btnSaveBitacora").removeAttr("disabled");
                

             }

         }

     }

     ).fail(function (jqXHR, textStatus, errorThrown) {

        if (jqXHR.status === 0) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "No hay conexión.!" + jqXHR.responseText
            });

            $("#btnSaveBitacora").removeAttr("disabled");


        } else if (jqXHR.status == 404) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Requested page not found [404]" + jqXHR.responseText
            });

            $("#btnSaveBitacora").removeAttr("disabled");

        } else if (jqXHR.status == 500) {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Internal Server Error [500]." + jqXHR.responseText
            });


            $("#btnSaveBitacora").removeAttr("disabled");

        } else if (textStatus === 'parsererror') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Requested JSON parse failed." + jqXHR.responseText
            });

           $("#btnSaveBitacora").removeAttr("disabled");

        } else if (textStatus === 'timeout') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Time out error." + jqXHR.responseText
            });

           $("#btnSaveBitacora").removeAttr("disabled");

        } else if (textStatus === 'abort') {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Ajax request aborted." + jqXHR.responseText
            });

            $("#btnSaveBitacora").removeAttr("disabled");

        } else {

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: 'Uncaught Error: ' + jqXHR.responseText
            });


            $("#btnSaveBitacora").removeAttr("disabled");

        }
    })

 });



 /**
  * Carga datos actualizar
  */


 /*=============================================
  EDITAR Bitacora
  =============================================*/
 $(".tableBitacora").on("click", ".btnEditBitacora", function () {

     var idBitacora = $(this).attr("idBitacora");
        
     var datos = new FormData();
     datos.append("idBitacora", idBitacora);

     $.ajax({

         url: "<?= base_url('admin/bitacora/getBitacora')?>",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function (respuesta) {
             $("#idBitacora").val(respuesta["id"]);
             
             $("#descripcion").val(respuesta["descripcion"]);
$("#usuario").val(respuesta["usuario"]);


         }

     })

 })


 /*=============================================
  ELIMINAR bitacora
  =============================================*/
 $(".tableBitacora").on("click", ".btn-delete", function () {

     var idBitacora = $(this).attr("data-id");

     Swal.fire({
         title: '<?= lang('boilerplate.global.sweet.title') ?>',
         text: "<?= lang('boilerplate.global.sweet.text') ?>",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
     })
             .then((result) => {
                 if (result.value) {
                     $.ajax({
                         url: `<?= base_url('admin/bitacora') ?>/` + idBitacora,
                         method: 'DELETE',
                     }).done((data, textStatus, jqXHR) => {
                         Toast.fire({
                             icon: 'success',
                             title: jqXHR.statusText,
                         });


                         tableBitacora.ajax.reload();
                     }).fail((error) => {
                         Toast.fire({
                             icon: 'error',
                             title: error.responseJSON.messages.error,
                         });
                     })
                 }
             })
 })

 $(function () {
    $("#modalAddBitacora").draggable();
    
});


</script>
<?= $this->endSection() ?>
        