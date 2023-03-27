<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('enfermedadesModulos/modalCaptura') ?>
<!-- SELECT2   EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAgregarEnfermedad" data-toggle="modal" data-target="#modalAgregarEnfermedades"><i class="fa fa-plus"></i>

                    <?= lang('enfermedades.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablaEnfermedades" class="table table-striped table-hover va-middle tablaEnfermedades">
                        <thead>
                            <tr>



                                <th>#</th>
                                <th><?= lang('enfermedades.description') ?></th>

                                <th><?= lang('enfermedades.createdAt') ?></th>
                                <th><?= lang('enfermedades.updateAt') ?></th>
                                <th>Acciones </th>


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


     var tablaEnfermedades = $('#tablaEnfermedades').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],
        

        ajax: {
            url: `<?= base_url(route_to('admin/enfermedades')) ?>/`,
            method: 'GET',
            dataType: "json"
            
        },
        columnDefs: [{
                orderable: false,
                targets: [4],
                searchable: false,
                targets: [4]

            }],
        columns: [
            
            {
                'data': 'id'
            },
            {
                'data': 'descripcion'
            },
            {
                'data': 'created_at'
            },

            {
                'data': 'updated_at'
            },
            {
                "data": function (data) {
                    return `<div class="btn-group">
                          
                          <button class="btn btn-warning btnEditarEnfermedad" data-toggle="modal" idEnfermedad="${data.id}" data-target="#modalAgregarEnfermedades">  <i class=" fa fa-edit "></i></button>
                          <button class="btn btn-danger btnEliminarEnfermedad" idEnfermedad="${data.id}"><i class="fa fa-times"></i></button></div>`
                }
            }
        ]
    });
    


    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR PACIENTE
     =============================================*/
    $(".tablaEnfermedades").on("click", ".btnEditarEnfermedad", function () {

        var idEnfermedad = $(this).attr("idEnfermedad");


        console.log("idEnfermedad ", idEnfermedad);

        var datos = new FormData();
        datos.append("idEnfermedad", idEnfermedad);

        $.ajax({

            url: "<?= base_url(route_to('admin/enfermedades/traerEnfermedad')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                $("#idEnfermedad").val(respuesta["id"]);
                $("#descripcion").val(respuesta["descripcion"]);

            }

        })

    })


    /*=============================================
     ELIMINAR PACIENTE
     =============================================*/
    $(".tablaEnfermedades").on("click", ".btnEliminarEnfermedad", function () {

        var idEnfermedad = $(this).attr("idEnfermedad");




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
                            url: `<?= base_url(route_to('admin/enfermedades')) ?>/` + idEnfermedad,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });

                            tablaPacientes.ajax.reload();
                            
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })


/**
     * Guardar paciente
     */

     $(document).on('click', '#btnGuardarEnfermedad', function (e) {

var idEnfermedad = $("#idEnfermedad").val();
var descripcion = $("#descripcion").val();



$("#btnGuardarEnfermedad").attr("disabled", true);


var datos = new FormData();
datos.append("idEnfermedad", idEnfermedad);
datos.append("descripcion", descripcion);


$.ajax({

    url: "<?= route_to('admin/enfermedades/guardar') ?>",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    //dataType:"json",
    success: function (respuesta) {


        if (respuesta.match(/Correctamente.*/)) {


            Toast.fire({
                icon: 'success',
                title: "Guardado Correctamente"
            });

            tablaEnfermedades.ajax.reload();

            $("#btnGuardarEnfermedad").removeAttr("disabled");

           
             $('#modalAgregarEnfermedades').modal('hide');
        } else {

            Toast.fire({
                icon: 'error',
                title: respuesta
            });

            $("#btnGuardarEnfermedad").removeAttr("disabled");
          //  $('#modalAgregarEnfermedad').modal('hide');

        }

    }

}

)




});

</script>
<?= $this->endSection() ?>