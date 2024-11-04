<!-- Modal Bitacora -->
  <div class="modal fade" id="modalAddBitacora" tabindex="-1" role="dialog" aria-labelledby="modalAddBitacora" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"><?= lang('bitacora.createEdit') ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form-bitacora" class="form-horizontal">
                      <input type="hidden" id="idBitacora" name="idBitacora" value="0">

                      <div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label"><?= lang('bitacora.fields.descripcion') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="descripcion" id="descripcion" class="form-control <?= session('error.descripcion') ? 'is-invalid' : '' ?>" value="<?= old('descripcion') ?>" placeholder="<?= lang('bitacora.fields.descripcion') ?>" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="usuario" class="col-sm-2 col-form-label"><?= lang('bitacora.fields.usuario') ?></label>
    <div class="col-sm-10">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" name="usuario" id="usuario" class="form-control <?= session('error.usuario') ? 'is-invalid' : '' ?>" value="<?= old('usuario') ?>" placeholder="<?= lang('bitacora.fields.usuario') ?>" autocomplete="off">
        </div>
    </div>
</div>

        
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                  <button type="button" class="btn btn-primary btn-sm" id="btnSaveBitacora"><?= lang('boilerplate.global.save') ?></button>
              </div>
          </div>
      </div>
  </div>

  <?= $this->section('js') ?>


  <script>

      $(document).on('click', '.btnAddBitacora', function (e) {


          $(".form-control").val("");

          $("#idBitacora").val("0");

          $("#btnSaveBitacora").removeAttr("disabled");

      });

      /* 
       * AL hacer click al editar
       */



      $(document).on('click', '.btnEditBitacora', function (e) {


          var idBitacora = $(this).attr("idBitacora");

          //LIMPIAMOS CONTROLES
          $(".form-control").val("");

          $("#idBitacora").val(idBitacora);
          $("#btnGuardarBitacora").removeAttr("disabled");

      });


    $("#idEmpresa").select2();

  </script>


  <?= $this->endSection() ?>
        