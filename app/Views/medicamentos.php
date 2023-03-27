<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('medicamentosModulos/modalCaptura') ?>
<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAgregarMedicamento" data-toggle="modal" data-target="#modalAgregarMedicamentos"><i class="fa fa-plus"></i>

                    <?= lang('medicamentos.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablaMedicamentos" class="table table-striped table-hover va-middle tablaMedicamentos">
                        <thead>
                            <tr>



                                <th>#</th>
                                <th><?= lang('medicamentos.description') ?></th>

                                <th><?= lang('medicamentos.createdAt') ?></th>
                                <th><?= lang('medicamentos.updateAt') ?></th>
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

     var tablaMedicamentos = $('#tablaMedicamentos').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],
        

        ajax: {
            url: `<?= base_url('admin/medicamentos') ?>/`,
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
                          
                          <button class="btn btn-warning btnEditarMedicamento" data-toggle="modal" idMedicamento="${data.id}" data-target="#modalAgregarMedicamentos">  <i class=" fa fa-edit "></i></button>
                          <button class="btn btn-danger btnEliminarMedicamento" idMedicamento="${data.id}"><i class="fa fa-times"></i></button></div>`
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
    $(".tablaMedicamentos").on("click", ".btnEditarMedicamento", function () {

        var idMedicamento = $(this).attr("idMedicamento");


        console.log("idMedicamento ", idMedicamento);

        var datos = new FormData();
        datos.append("idMedicamento", idMedicamento);

        $.ajax({

            url: "<?= base_url('admin/medicamentos/traerMedicamento')?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
              
                $("#idMedicamento").val(respuesta["id"]);
                $("#descripcionTratamiento").val(respuesta["descripcion"]);

            }

        })

    })


    /*=============================================
     ELIMINAR PACIENTE
     =============================================*/
    $(".tablaMedicamentos").on("click", ".btnEliminarMedicamento", function () {

        var idMedicamento = $(this).attr("idMedicamento");




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
                            url: `<?= base_url(route_to('admin/medicamentos')) ?>/` + idMedicamento,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });

               
                            tablaMedicamentos.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })




</script>
<?= $this->endSection() ?>