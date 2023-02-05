<!-- Modal Diagnosticos Anteriores -->
<div class="modal fade" id="modalMostrarDiagnosticosAnteriores" tabindex="-1" role="dialog" aria-labelledby="modalDiagnosticosAnteriores" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('consultas.modalDiagnosticosAnteriores') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tabla-diagnosticos-anteriores" class="table table-striped table-hover va-middle tabla-diagnosticos-anteriores">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?= lang('consultas.fechaConsulta') ?></th>
                                        <th><?= lang('consultas.medico') ?></th>
                                        <th><?= lang('consultas.columnaConsultasAnterioresDescripcion') ?></th>
                                        <th><?= lang('consultas.actions') ?></th>
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


    var tablaDiagnosticosAnteriores = $('#tabla-diagnosticos-anteriores').DataTable({
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
                'data': 'nombreDoctor'
            },
            {
                'data': 'fechaHora'
            },
            {
                'data': 'motivoConsulta'
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


    //CARGA CONSULTAS ANTERIORES

    $(".btnDiagnosticosAnteriores").on("click", function () {

        var paciente = $("#paciente").val();

        tablaDiagnosticosAnteriores.ajax.url(`<?= base_url('admin/consultas/consultasAnteriores') ?>/` + paciente).load();


    });
    
    
    
    /*=============================================
     IMPRIMIR CONSULTA
     =============================================*/

    $(".tabla-diagnosticos-anteriores").on("click", '.btnImprimirConsulta', function () {

        var uuid = $(this).attr("uuid");


        window.open("<?= base_url('admin/consultas/reporte') ?>" + "/" + uuid, "_blank");

    });

</script>


<?= $this->endSection() ?>