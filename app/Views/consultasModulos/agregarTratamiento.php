<!-- Modal Pacientes -->
<div class="modal fade" id="modalAgregarTratamiento" tabindex="-1" role="dialog" aria-labelledby="modalTratamientosAnteriores" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('consultas.seleccionarTratamiento') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table-tratamientos" class="table table-striped table-hover va-middle tablaTratamientosConsulta">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?= lang('consultas.tratamientoColumna1') ?></th>
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


    var tableTratamientos = $('#table-tratamientos').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url(route_to('admin/tratamientos/traeTratamientosTabla')) ?>',
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
                                <button class="btn bg-blue btnAgregarTratamiento" data-id="${data.id}" descripcion = "${data.descripcion}"><i class="fas fa-plus"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });


    /**
     * Evento al hacer click al boton btnAgregarDiagnostico
     */


    $("#table-tratamientos").on("click", ".btnAgregarTratamiento", function () {




        var idTratamiento = $(this).attr("data-id");
        var descripcionTratamiento = $(this).attr("descripcion");

        /**
         * Agregando registros
         */
        var renglon = "<div class=\"form-group row nuevoDiagnosticoEnfermedad\">";
        renglon = renglon + "<div class =\"col-2\"> <button type=\"button\" class=\"btn btn-danger quitarTratamiento\" ><strong>X</strong></button>  </div>";
        renglon = renglon + "<div class =\"col-5\"> <input type=\"text\" id=\"descripcionTratamiento\" class=\"form-control descripcionTratamiento\" idTratamiento =\"" + idTratamiento + "\" name=\"descripcionTratamiento\" value=\"" + descripcionTratamiento + "\" required=\"\"> </div>";
        renglon = renglon + "<div class =\"col-5\"> <input type=\"text\" id=\"nuevouso\" class=\"form-control uso\" name=\"uso\" value=\"\" required=\"\"> </div></div>";


        console.log(renglon);

        $(".renglonesTratamientos").append(renglon);
        
        listarTratamientos();

    });


    /**
     * Eliminar Renglon Diagnostico
     */

    $(".renglonesTratamientos").on("click", ".quitarTratamiento", function () {

        console.log("eliminar prueba");

        $(this).parent().parent().remove();
        
        listarTratamientos();

    });




    /*
     * Funcion para leer los registros de los diagnosticos / Enfermedades y guardar en un json en un campo
     */
    function listarTratamientos() {

        var listaTratamientos = [];

        var tratamiento = $(".descripcionTratamiento");
        var uso = $(".uso");


        for (var i = 0; i < tratamiento.length; i++) {

            listaTratamientos.push({"idTratamiento": $(tratamiento[i]).attr("idTratamiento"),
                "descripcion:": $(tratamiento[i]).val(),
                "uso:": $(uso[i]).val()
            });
        }

        //Asignamos el JSON en el input

        $("#listaTratamiento").val(JSON.stringify(listaTratamientos));

    }

</script>


<?= $this->endSection() ?>