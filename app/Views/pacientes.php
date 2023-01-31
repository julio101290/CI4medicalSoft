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
                    <table id="tablaPacientes" class="table table-striped table-hover va-middle tablaPacientes">
                        <thead>
                            <tr>



                                <th>#</th>
                                <th><?= lang('patients.names') ?></th>
                                <th><?= lang('patients.lastName') ?></th>
                                <th><?= lang('patients.dni') ?></th>
                                <th><?= lang('patients.phone') ?></th>
                                <th><?= lang('patients.email') ?></th>
                                <th><?= lang('patients.createdAt') ?></th>
                                <th><?= lang('patients.updateAt') ?></th>
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


    function cargaTabla() {



        $('.tablaPacientes').DataTable({
            "ajax": "<?= base_url(route_to('admin/pacientes')) ?>",
            "deferRender": true,
            "serverSide": true,
            "retrieve": true,
            "processing": true

        });

    }


    cargaTabla();



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR PACIENTE
     =============================================*/
    $(".tablaPacientes").on("click", ".btnEditarPaciente", function () {

        var idPaciente = $(this).attr("idPaciente");


        console.log("paciente ", idPaciente);

        var datos = new FormData();
        datos.append("idPaciente", idPaciente);

        $.ajax({

            url: "<?= base_url(route_to('admin/pacientes/traerPaciente')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                $("#idPaciente").val(respuesta["id"]);
                $("#nombres").val(respuesta["nombres"]);
                $("#apellidos").val(respuesta["apellidos"]);
                $("#correoElectronico").val(respuesta["correoElectronico"]);
                $("#telefono").val(respuesta["telefono"]);
                $("#dni").val(respuesta["dni"]);

            }

        })

    })


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