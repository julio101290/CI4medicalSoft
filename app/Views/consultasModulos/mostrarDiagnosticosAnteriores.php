<!-- Modal Pacientes -->
<div class="modal fade" id="modalMostrarDiagnosticosAnteriores" tabindex="-1" role="dialog" aria-labelledby="modalMostrarDiagnosticosAnteriores" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('patients.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnGuardarPaciente"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAgregarPaciente', function (e) {

        console.log("asdasd");
        $(".form-control").val("");

        $("#idPaciente").val("0");
        
           $("#btnGuardarPaciente").removeAttr("disabled");

    })

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditarPaciente', function (e) {


        var idPaciente = $(this).attr("idPaciente");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idPaciente").val(idPaciente);
        $("#btnGuardarPaciente").removeAttr("disabled");

    })

    /**
     * Guardar paciente
     */

    $(document).on('click', '#btnGuardarPaciente', function (e) {

        var idPaciente = $("#idPaciente").val();
        var nombres = $("#nombres").val();
        var apellidos = $("#apellidos").val();
        var telefono = $("#telefono").val();
        var dni = $("#dni").val();
        var correoElectronico = $("#correoElectronico").val();

        var ajaxPaciente = "ajaxPaciente";


        $("#btnGuardarPaciente").attr("disabled", true);


        var datos = new FormData();
        datos.append("idPaciente", idPaciente);
        datos.append("nombres", nombres);
        datos.append("apellidos", apellidos);
        datos.append("telefono", telefono);
        datos.append("dni", dni);
        datos.append("correoElectronico", correoElectronico);

        $.ajax({

            url: "<?= route_to('admin/pacientes/guardar') ?>",
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


                    $('.tablaPacientes').DataTable().destroy();
                    cargaTabla();
                    $("#btnGuardarPaciente").removeAttr("disabled");

                   
                     $('#modalAgregarPaciente').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnGuardarPaciente").removeAttr("disabled");
                  //  $('#modalAgregarPaciente').modal('hide');

                }

            }

        }

        )




    });
</script>


<?= $this->endSection() ?>