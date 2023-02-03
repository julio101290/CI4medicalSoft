<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('pacientesModulos/modalCaptura') ?>
<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAgregarPaciente" data-toggle="modal" data-target="#modalAgregarPaciente"><i class="fa fa-plus"></i>

                    <?= lang('patients.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablaConsultas" class="table table-striped table-hover va-middle tablaConsultas">
                        <thead>
                            <tr>



                                <th>#</th>
                                <th><?= lang('consultas.motivoConsulta') ?></th>
                                <th><?= lang('consultas.medico') ?></th>
                                <th><?= lang('consultas.paciente') ?></th>
                                <th><?= lang('consultas.fechaConsulta') ?></th>
                                <th><?= lang('consultas.createdAt') ?></th>
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


    var tablaConsultas = $('#tablaConsultas').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/consultas/listaConsultas')) ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [2],
                searchable: false,
                targets: [2]

            }],
        columns: [{
                'data': 'id'
            },
            {
                'data': 'motivoConsulta'
            },

            {
                'data': 'nombreDoctor'
            },

            {
                'data': 'nombrePaciente'
            },

            {
                'data': 'fechaHora'
            },

            {
                'data': 'created_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn bg-blue btnImprimirConsulta" uuid="${data.uuid}" ><i class="far fa-file-pdf"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });




    /*=============================================
     IMPRIMIR CONSULTA
     =============================================*/

    $(".tablaConsultas").on("click",'.btnImprimirConsulta', function () {

        var uuid = $(this).attr("uuid");


        window.open("<?= base_url('admin/consultas/reporte') ?>" + "/" + uuid, "_blank");

    });



    /*=============================================
     ELIMINAR PACIENTE
     =============================================*/
    $(".tablaPacientes").on("click", ".btnEliminarPaciente", function () {

        var idPaciente = $(this).attr("idPaciente");


        console.log("eliminar");

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
                            url: `<?= base_url(route_to('admin/pacientes')) ?>/` + idPaciente,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });

                            $(".tablaPacientes").DataTable().destroy();
                            cargaTabla();
                            //tableUser.ajax.reload();
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