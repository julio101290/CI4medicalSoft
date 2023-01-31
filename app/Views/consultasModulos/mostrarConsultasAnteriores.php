<!-- Modal Pacientes -->
<div class="modal fade" id="modalConsultasAnteriores" tabindex="-1" role="dialog" aria-labelledby="modalTratamientosAnteriores" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('patients.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-paciente" class="form-horizontal">
                    <input type="hidden" id="idPaciente" name="idPaciente" value="0">



                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('patients.names') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="nombres" id="nombres" class="form-control <?= session('error.nombres') ? 'is-invalid' : '' ?>" value="<?= old('nombres') ?>" placeholder="<?= lang('patients.names') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('patients.lastName') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="apellidos"  id="apellidos"class="form-control <?= session('error.apellidos') ? 'is-invalid' : '' ?>" value="<?= old('apellidos') ?>" placeholder="<?= lang('patients.lastName') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dni" class="col-sm-2 col-form-label"><?= lang('patients.dni') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                </div>
                                <input type="text" name="dni"  id="dni" class="form-control <?= session('error.dni') ? 'is-invalid' : '' ?>" value="<?= old('dni') ?>" placeholder="<?= lang('patients.dni') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label"><?= lang('patients.phone') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="text" name="telefono" id="telefono" class="form-control <?= session('error.phone') ? 'is-invalid' : '' ?>" value="<?= old('telefono') ?>" placeholder="<?= lang('patients.phone') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="correoElectronico" class="col-sm-2 col-form-label"><?= lang('patients.email') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" name="correoElectronico" id="correoElectronico" class="form-control <?= session('error.correoElectronico') ? 'is-invalid' : '' ?>" value="<?= old('correoElectronico') ?>" placeholder="<?= lang('patients.email') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </form>
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