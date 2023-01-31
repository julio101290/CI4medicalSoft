<!-- Modal Pacientes -->
<div class="modal fade" id="modalAgregarDiagnostico" tabindex="-1" role="dialog" aria-labelledby="modalAgregarDiagnostico" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('consultas.seleccionarDiagnostico') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table-diagnosticos" class="table table-striped table-hover va-middle tablaDiagnosticosConsulta">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?= lang('consultas.diagnosticoEnfermedadColumna1') ?></th>
                                        <th><?= lang('boilerplate.global.action') ?></th>
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


    var tableDiagnostico = $('#table-diagnosticos').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/enfermedades/traeEnfermedadesTabla')) ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [2],
                searchable: false,
                targets: [2]

            }],
        columns: [{
                'data': 'id'
            },
            {
                'data': 'descripcion'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn bg-blue btnAgregarDiagnostico" data-id="${data.id}" descripcion = "${data.descripcion}"><i class="fas fa-plus"></i></button>
                            </div>
                            </td>`;
                }
            }
        ]
    });


    /**
     * Evento al hacer click al boton btnAgregarDiagnostico
     */


    $("#table-diagnosticos").on("click", ".btnAgregarDiagnostico", function () {




        var idDiagnostico = $(this).attr("data-id");
        var descripcionDiagnostico = $(this).attr("descripcion");

        /**
         * Agregando registros
         */
        var renglon = "<div class=\"form-group row nuevoDiagnosticoEnfermedad\">";
        renglon = renglon + "<div class =\"col-2\"> <button type=\"button\" class=\"btn btn-danger quitarDiagnostico\" ><strong>X</strong></button>  </div>";
        renglon = renglon + "<div class =\"col-10\"> <input type=\"text\" id=\"idDiagnostico\" class=\"form-control registroDiagnostico \" idDiagnostico =\"" + idDiagnostico + "\" name=\"idDiagnostico\" value=\"" + descripcionDiagnostico + "\" required=\"\"> </div>";
        renglon = renglon + "</div>";


        console.log(renglon);

        $(".renglonesDiagnosticos").append(renglon);
        
        listarDiagnosticos();

    });


    /**
     * Eliminar Renglon Diagnostico
     */

    $(".renglonesDiagnosticos").on("click", ".quitarDiagnostico", function () {

        console.log("eliminar prueba");

        $(this).parent().parent().remove();
        
        listarDiagnosticos();

    });


    /*
     * Funcion para leer los registros de los diagnosticos / Enfermedades y guardar en un json en un campo
     */
    function listarDiagnosticos() {

        var listaDiagnosticos = [];

        var diagnostico = $(".registroDiagnostico");


        for (var i = 0; i < diagnostico.length; i++) {

            listaDiagnosticos.push({"idDiagnostico": $(diagnostico[i]).attr("idDiagnostico"),
                "descripcion:": $(diagnostico[i]).val()
            });


        }
        
        //Asignamos el JSON en el input
        
        $("#listaDiagnosticoEnfermedad").val(JSON.stringify(listaDiagnosticos));
    }

</script>


<?= $this->endSection() ?>