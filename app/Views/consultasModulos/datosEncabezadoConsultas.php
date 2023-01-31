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
                    </div>


                    <div class="col-3">
                        <div class="form-group">
                            <label for="fechaHora"><?= lang('consultas.fechaConsulta') ?></label>
                            <input type="datetime-local" id="fechaHora" name="fechaHora" value="<?= $fecha ?>">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="fechaHora"><?= lang('consultas.medico') ?></label>
                            <input type="text" id="doctor" name="doctor" disabled value="<?= $userName ?>">
                            <input type="hidden" id="doctor" name="doctor" value="<?= $idUser ?>">
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
                                <button type="button" class="btn btn-default " data-toggle="modal" data-target="#modalAgregarDiagnostico"><?= lang('consultas.agregarDiagnostico') ?></button>
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
                       
                                <input type="hidden" id="listaDiagnosticoEnfermedad" name="listaProductos" value="[]">
                                <!--=====================================
                                BOTÓN PARA AGREGAR PRODUCTO
                                ======================================-->
                                <button type="button" class="btn btn-default " data-toggle="modal" data-target="#modalAgregarTratamiento"><?= lang('consultas.agregarTratamiento') ?></button>
                                <hr>
                            </div>
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


</script>


<?= $this->endSection() ?>
