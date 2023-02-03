<div class="row">

    <div class="col-12">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= lang('consultas.generals') ?></h3>
            </div>



            <div class="card-body">
                <div class="row">

                    <div class="col-4">
                        <div class="form-group">
                            <label for="paciente"><?= lang('consultas.paciente') ?></label>
                            <select id='paciente'  name='paciente' style='width: 80%;'>
                                <option value='0'><?= lang('citas.seleccionePaciente') ?></option>
                            </select>

                        </div>
                        <button type="button" class="btn btn-default " data-toggle="modal" data-target="#modalAgregarPaciente"><?= lang('consultas.nuevoPaciente') ?></button>
                    </div>


                    <div class="col-3">
                        <div class="form-group">
                            <label for="fechaHora"><?= lang('consultas.fechaConsulta') ?></label>
                            <input type="datetime-local" id="fechaHora" name="fechaHora" value="<?= $fecha ?>">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="doctor"><?= lang('consultas.medico') ?></label>
                            <input type="text" id="doctor" name="doctor" disabled value="<?= $userName ?>">
                            <input type="hidden" id="idDoctor" name="idDoctor" value="<?= $idUser ?>">
                            <input type="hidden" id="idConsulta" name="idConsulta" value="0">
                            <input type="hidden" id="uuid" name="uuid" value="<?= $uuid ?>">
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>

</div>


<div class="row">
    <div class ="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><?= lang('consultas.motivoConsulta') ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">


                    <div class="col-md-12">

                        <div class="form-group">
                            <button type="button" class="btn bg-blue btnMostrarConsultas" data-toggle="modal" data-target="#modalConsultasAnteriores" data-dismiss="modal" idcodigo="'1" required="" data-placement="top" title="Consultas Anteriores">
                                <?= lang('consultas.consultasAnteriores') ?>
                            </button>
                            <div class="bootstrap-duallistbox-container row moveonselect moveondoubleclick"> 
                                <div class="box1 col-md-12">   

                                    <!--=====================================
                                   MOTIVO DE LA CONSULTA
                                   ======================================-->

                                    <div class="input-group">

                                        <textarea type="text" class="form-control pull-right" name="motivoConsulta" id="motivoConsulta" placeholder=" <?= lang('consultas.motivoConsultaPlaceholder') ?>" value=""></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class ="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">  <?= lang('consultas.diagnosticos') ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">


                    <div class="col-md-12">

                        <div class="box-body">

                            <div class="box">


                                <button type="button" class="btn bg-blue btnTratamientosAnteriores" data-toggle="modal" data-target="#modalMostrarDiagnosticosAnteriores" data-dismiss="modal" idcodigo="'1" required="" data-placement="top" title="Consultas Anteriores">

                                    <?= lang('consultas.diagnosticosAnteriores') ?>

                                </button>

                                <div class="row">

                                    <!--=====================================
                                    ENCABEZADO
                                    ======================================-->
                                    <div class ="col-2"> </div>
                                    <div class ="col-10">  <?= lang('consultas.diagnosticos') ?> </div>


                                </div>
                                <hr class="hr" />

                                <div class="renglonesDiagnosticos">

                                </div>
                                <input type="hidden" id="listaDiagnosticoEnfermedad" name="listaProductos" value="[]">
                                <!--=====================================
                                BOTÓN PARA AGREGAR PRODUCTO
                                ======================================-->
                                <button type="button" class="btn btn-default btnAgregarRegistro" data-toggle="modal" data-target="#modalAgregarDiagnostico"><?= lang('consultas.agregarDiagnostico') ?></button>
                                <button type="button" class="btn btn-default " data-toggle="modal" data-target="#modalAgregarEnfermedades"><?= lang('consultas.nuevoDiagnostico') ?></button>

                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class ="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><?= lang('consultas.medicamentoTratamiento') ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">


                    <div class="col-md-12">

                        <div class="box-body">

                            <div class="box">


                                <button type="button" class="btn bg-blue btnTratamientosAnteriores" data-toggle="modal" data-target="#modalMostrarTratamientosAnteriores" data-dismiss="modal" idcodigo="'1" required="" data-placement="top" title="Consultas Anteriores">


                                    <?= lang('consultas.tratamientosAnteriores') ?>


                                </button>

                                <div class="row">

                                    <!--=====================================
                                    ENCABEZADO
                                    ======================================-->
                                    <div class ="col-2"> </div>
                                    <div class ="col-5"> <?= lang('consultas.medicamentoTratamientoColumna1') ?> </div>
                                    <div class ="col-5"> <?= lang('consultas.usoColumna2') ?> </div>

                                </div>
                                <hr class="hr" />
                                <!--=====================================
                                ENTRADA PARA AGREGAR PRODUCTO
                                ======================================--> 
                                <div class="renglonesTratamientos">

                                </div>

                                <input type="hidden" id="listaTratamiento" name="listaTratamiento" value="[]">
                                <!--=====================================
                                BOTÓN PARA AGREGAR PRODUCTO
                                ======================================-->
                                <button type="button" class="btn btn-default btnAgregarTratamiento" data-toggle="modal" data-target="#modalAgregarTratamiento"><?= lang('consultas.agregarTratamiento') ?></button>
                                <button type="button" class="btn btn-default " data-toggle="modal" data-target="#modalAgregarMedicamentos"><?= lang('consultas.nuevoTratamiento') ?></button>
                                <hr>
                            </div>
                        </div>

                        <div class="box-footer">


                            <button type="button" class="btn btn-primary pull-right btnGuardarConsultaAjax" data-toggle="modal">  <i class="fa far fa-save"> </i> Guardar Receta Médica</button>

                            <button type="button" class="btn bg-maroon btnImprimirConsulta" data-toggle="modal" required="" data-placement="top" title="Imprimir Examen">
                                <i class="fa fa-print"> </i>  Guardar e Imprimir
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</div>


<?= $this->section('js') ?>


<script>


// Initialize select2
    $("#paciente").select2({
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



    $(".btnAgregarRegistro").on("click", function () {

        tableDiagnostico.ajax.reload();

    });

    $(".btnAgregarTratamiento").on("click", function () {

        tableTratamientos.ajax.reload();

    });


    /**
     * Guarda Receta Medica
     */

    $(".btnGuardarConsultaAjax").on("click", function () {


        console.log("Guarda Receta Medica");

        guardarConsulta();

    });


    function guardarConsulta() {


        listarDiagnosticos();
        listarTratamientos()
        var UUID = $("#uuid").val();
        var idPaciente = $("#paciente").val();
        var fechaHora = $("#fechaHora").val();
        var idDoctor = $("#idDoctor").val();
        var motivoConsulta = $("#motivoConsulta").val();
        var diagnosticos = $("#listaDiagnosticoEnfermedad").val();
        var tratamientos = $("#listaTratamiento").val();

        var ajaxGuardarConsulta = "ajaxGuardarConsulta";


        $(".btnGuardarConsultaAjax").attr("disabled", true);

        console.log("nombres", nombres);
        var datos = new FormData();
        datos.append("paciente", idPaciente);
        datos.append("fechaHora", fechaHora);
        datos.append("idDoctor", idDoctor);
        datos.append("motivoConsulta", motivoConsulta);
        datos.append("diagnosticos", diagnosticos);
        datos.append("tratamientos", tratamientos);
        datos.append("uuid", UUID);

        $.ajax({

            url: "<?= base_url(route_to('admin/consultas/guardar')) ?>",
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

                    $(".btnGuardarConsultaAjax").removeAttr("disabled");

                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $(".btnGuardarConsultaAjax").removeAttr("disabled");


                }

            }

        }

        )


    }

    /*=============================================
     IMPRIMIR CONSULTA
     =============================================*/

    $(".btnImprimirConsulta").on("click", function () {


        guardarConsulta();
        var uuid = $("#uuid").val();


        window.open("<?= base_url('admin/consultas/reporte') ?>" + "/" + uuid, "_blank");

    })

</script>


<?= $this->endSection() ?>
