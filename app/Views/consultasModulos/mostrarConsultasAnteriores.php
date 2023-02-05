<!-- Modal Pacientes -->
<div class="modal fade" id="modalConsultasAnteriores" tabindex="-1" role="dialog" aria-labelledby="modalConsultasAnteriores" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('consultas.modalConsultasAnteriores') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabla-consultas-anteriores" class="table table-striped table-hover va-middle tabla-consultas-anteriores">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                          <th><?= lang('consultas.fechaConsulta') ?></th>
                                        <th><?= lang('consultas.columnaConsultasAnterioresDescripcion') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>

            </div>
        </div>
    </div>
</div>



<?= $this->section('js') ?>


<script>

    
   var tablaConsultasAnteriores = $('#tabla-consultas-anteriores').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],
        

        ajax: {
            url: `<?= base_url('admin/consultas/consultasAnteriores') ?>/` + $("#paciente").val(),
            method: 'GET',
            dataType: "json"
            
        },
        columnDefs: [{

            }],
        columns: [
            
            {
                'data': 'id'
            },
              {
                'data': 'fechaHora'
            },
            {
                'data': 'motivoConsulta'
            }
        ]
    });
    
    
    //CARGA CONSULTAS ANTERIORES

    $(".btnMostrarConsultas").on("click", function () {
    
       var paciente = $("#paciente").val();
       
       console.log("paciente:0",paciente);

       tablaConsultasAnteriores.ajax.url(`<?= base_url('admin/consultas/consultasAnteriores') ?>/` + paciente ).load();
       
    


       
    });

</script>


<?= $this->endSection() ?>