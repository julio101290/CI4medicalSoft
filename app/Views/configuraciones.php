<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>



<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= lang('settings.settings.title') ?></h3>
                    </div>



                    <form action="<?= base_url('admin/configuracion') ?>/guardar" method="post">
                        <?= csrf_field() ?>

                        <div class="card-body">


                            <div class="form-group">
                                <label for="nombreEmpresa"><?= lang('settings.settings.nameCorporation') ?></label>
                                <input type="text" class="form-control" id="nombreHospital" value="<?= $data["nombreHospital"] ?>"  name="nombreHospital" placeholder="<?= lang('settings.nameCompanie') ?>">
                            </div>

                            <div class="form-group">
                                <label for="correoElectronico"><?= lang('settings.settings.email') ?></label>
                                <input type="email" class="form-control" value="<?= $data["correoElectronico"] ?>" id="correoElectronico" name="correoElectronico" placeholder="<?= lang('settings.email') ?>">
                            </div>

                            <div class="form-group">
                                <label for="RFC"><?= lang('settings.settings.ID') ?></label>
                                <input type="text" class="form-control" value="<?= $data["RFC"] ?>" id="RFC" name="RFC" placeholder="<?= lang('settings.idTaxPlaceholder') ?>">
                            </div>


                            <div class="form-group">
                                <label for="telefono"><?= lang('settings.settings.phone') ?></label>
                                <input type="text" class="form-control" value="<?= $data["telefono"] ?>" id="Telefono" name="telefono" placeholder="<?= lang('settings.phoneNumberPlaceholder') ?>">
                            </div>

                            <div class="form-group">
                                <label for="telefono"><?= lang('settings.settings.languaje') ?></label>
                                <select type="select2" class="form-control"  id="languaje" name="languaje" placeholder="Inserte telefono de la empresa">

                                    <option value="en"><?= lang('settings.settings.languajeOptionEN') ?></option>
                                    <option value="es"><?= lang('settings.settings.languajeOptionES') ?></option>
                                    <option value="it"><?= lang('settings.settings.languajeOptionIT') ?></option>
                                    <option value="ep"><?= lang('settings.settings.languajeOptionEP') ?></option>

                                </select>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btnGuardar"><?= lang('settings.settings.save') ?></button>
                        </div>
                    </form>
                </div>





            </div>



        </div>

    </div>
</section>


<?= $this->endSection() ?>


<?= $this->section('js') ?>

<script>
    
    $("#languaje").val("<?= $data["languaje"] ?>");

</script>

<?= $this->endSection() ?>
        