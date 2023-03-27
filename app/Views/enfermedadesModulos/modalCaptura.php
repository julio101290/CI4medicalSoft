<!-- Modal Enfermedads -->
<div class="modal fade" id="modalAgregarEnfermedades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('enfermedades.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-enfermedad" class="form-horizontal">
                    <input type="hidden" id="idEnfermedad" name="idEnfermedad" value="0">



                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"><?= lang('enfermedades.description') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion ') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('enfermedades.description') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

   
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnGuardarEnfermedad"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAgregarEnfermedad', function (e) {

        console.log("asdasd");
        $(".form-control").val("");

        $("#idEnfermedad").val("0");
        
           $("#btnGuardarEnfermedad").removeAttr("disabled");

    })

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnGuardarEnfermedad', function (e) {


        var idEnfermedad = $(this).attr("idEnfermedad");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idEnfermedad").val(idEnfermedad);
        $("#btnGuardarEnfermedad").removeAttr("disabled");

    })

    
</script>


<?= $this->endSection() ?>