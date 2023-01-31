<!-- Modal Citas -->

<div class="modal fade" id="modalAgregarCitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('citas.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-enfermedad" class="form-horizontal">
                    <!-- CSRF token --> 
                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <input type="hidden" id="idCita" name="idCita" value="0">




                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('citas.nombrePaciente') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select id='pacientes'  name='pacientes' style='width: 80%;'>
                                    <option value='0'><?= lang('citas.seleccionePaciente') ?></option>
                                </select>


                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('citas.observaciones') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <textarea class="form-control <?= session('error.observaciones ') ? 'is-invalid' : '' ?>" rows="3" placeholder="<?= lang('citas.observaciones') ?>" id="observaciones" name="observaciones" autocomplete="off"></textarea>

                            </div>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('citas.fechaHora') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <input type="datetime-local" id="fechaHora" name="fechaHora" value="<?= $fecha ?>">


                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('citas.hastaFechaHora') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>


                                <input type="datetime-local" id="hastaFechaHora" name="hastaFechaHora" value="<?= $hastaFecha ?>">


                            </div>
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnGuardarCita"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAgregarCitas', function (e) {

        console.log("asdasd");
        $(".form-control").val("");

        $("#idCita").val("0");

        $("#btnGuardarCita").removeAttr("disabled");

    })

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnGuardarCita', function (e) {


        var idCita = $(this).attr("idCita");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idCita").val(idCita);
        $("#btnGuardarCita").removeAttr("disabled");

    })

    /**
     * Guardar paciente
     */

    $(document).on('click', '#btnGuardarCita', function (e) {

        var idCita = $("#idCita").val();
        var observaciones = $("#observaciones").val();
        var idPaciente = $("#pacientes").val();
        var fechaHora = $("#fechaHora").val();
        var hastaFechaHora = $("#hastaFechaHora").val();
       

        console.log("OBSERVACIONES:",observaciones);

        $("#btnGuardarCita").attr("disabled", true);


        var datos = new FormData();
        datos.append("idCita", idCita);
        datos.append("observaciones", observaciones);
        datos.append("idPaciente", idPaciente);
        datos.append("fechaHora", fechaHora);
        datos.append("hastaFechaHora", hastaFechaHora);


        $.ajax({

            url: "<?= route_to('admin/citas/guardar') ?>",
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


                    $('.tablaCitas').DataTable().destroy();
                    cargaTabla();
                    $("#btnGuardarCita").removeAttr("disabled");


                    $('#modalAgregarCitas').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnGuardarCita").removeAttr("disabled");
                    //  $('#modalAgregarCita').modal('hide');

                }

            }

        }

        )




    });



    // Initialize select2
    $("#pacientes").select2({
        ajax: {
            url: "<?= site_url('admin/pacientes/traerPacientesAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash // CSRF Token
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },
            cache: true
        }
    });



</script>


<?= $this->endSection() ?>