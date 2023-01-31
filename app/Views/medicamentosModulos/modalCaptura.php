<!-- Modal Medicamentos -->
<div class="modal fade" id="modalAgregarMedicamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('medicamentos.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-enfermedad" class="form-horizontal">
                    <input type="hidden" id="idMedicamento" name="idMedicamento" value="0">



                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('medicamentos.description') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion ') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('medicamentos.description') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                  

         

   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnGuardarMedicamento"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAgregarMedicamento', function (e) {

        console.log("asdasd");
        $(".form-control").val("");

        $("#idMedicamento").val("0");
        
           $("#btnGuardarMedicamento").removeAttr("disabled");

    })

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnGuardarMedicamento', function (e) {


        var idMedicamento = $(this).attr("idMedicamento");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idMedicamento").val(idMedicamento);
        $("#btnGuardarMedicamento").removeAttr("disabled");

    })

    /**
     * Guardar paciente
     */

    $(document).on('click', '#btnGuardarMedicamento', function (e) {

        var idMedicamento = $("#idMedicamento").val();
        var descripcion = $("#descripcion").val();
      


        $("#btnGuardarMedicamento").attr("disabled", true);


        var datos = new FormData();
        datos.append("idMedicamento", idMedicamento);
        datos.append("descripcion", descripcion);


        $.ajax({

            url: "<?= route_to('admin/medicamentos/guardar') ?>",
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


                    $('.tablaMedicamentos').DataTable().destroy();
                    cargaTabla();
                    $("#btnGuardarMedicamento").removeAttr("disabled");

                   
                     $('#modalAgregarMedicamentos').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnGuardarMedicamento").removeAttr("disabled");
                  //  $('#modalAgregarMedicamento').modal('hide');

                }

            }

        }

        )




    });
</script>


<?= $this->endSection() ?>