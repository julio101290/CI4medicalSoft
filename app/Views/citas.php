<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('citasModulos/modalCaptura') ?>
<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAgregarCitas" data-toggle="modal" data-target="#modalAgregarCitas"><i class="fa fa-plus"></i>

                    <?= lang('citas.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablaCitas" class="table table-striped table-hover va-middle tablaCitas">
                        <thead>
                            <tr>



                                <th>#</th>

                                <th><?= lang('citas.nombrePaciente') ?></th>
                                <th><?= lang('citas.observaciones') ?></th>
                                <th><?= lang('citas.fechaHora') ?></th>
                                <th><?= lang('citas.hastaFechaHora') ?></th>
                                <th><?= lang('citas.estado') ?></th>


                                <th><?= lang('citas.createdAt') ?></th>
                                <th><?= lang('citas.updateAt') ?></th>
                                <th><?= lang('citas.actions') ?> </th>


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



        $('.tablaCitas').DataTable({
            "ajax": "<?= base_url(route_to('admin/citas')) ?>",
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
    $(".tablaCitas").on("click", ".btnEditarCita", function () {

        var idCita = $(this).attr("idCita");


        console.log("idCita ", idCita);

        var datos = new FormData();
        datos.append("idCita", idCita);

        $.ajax({

            url: "<?= base_url(route_to('admin/citas/traeCita')) ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                $("#idCita").val(respuesta["id"]);
                $("#observaciones").val(respuesta["observaciones"]);
                $("#fechaHora").val(respuesta["fechaHora"]);
                $("#hastaFechaHora").val(respuesta["hastaFechaHora"]);


                //$("#pacientes").val(respuesta["idPaciente"]);

                $("#pacientes").empty() //empty select
                        .append($("<option/>") //add option tag in select
                                .val(respuesta["idPaciente"]) //set value for option to post it
                                .text(respuesta["nombrePaciente"])) //set a text for show in select
                        .val(respuesta["idPaciente"]) //select option of select2
                        .trigger("change");


            }

        })

    })


    /*=============================================
     ELIMINAR PACIENTE
     =============================================*/
    $(".tablaCitas").on("click", ".btnEliminarCita", function () {

        var idCita = $(this).attr("idCita");




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
                            url: `<?= base_url(route_to('admin/citas')) ?>/` + idCita,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });

                            $(".tablaCitas").DataTable().destroy();
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