<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('consultasModulos/datosEncabezadoConsultas') ?>
<?= $this->include('consultasModulos/mostrarConsultasAnteriores') ?>
<?= $this->include('consultasModulos/agregarDiagnostico') ?>
<?= $this->include('consultasModulos/agregarTratamiento') ?>
<?= $this->include('consultasModulos/mostrarDiagnosticosAnteriores') ?>
<?= $this->include('consultasModulos/mostrarTratamientosAnteriores') ?>



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