<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>



<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Hospital</h3>
                    </div>



                    <form action="<?= base_url('admin/configuracion') ?>/guardar" method="post">
                        <?= csrf_field() ?>

                        <div class="card-body">


                            <div class="form-group">
                                <label for="nombreEmpresa">Nombre Empresa</label>
                                <input type="text" class="form-control" id="nombreHospital" value="<?= $data["nombreHospital"] ?>"  name="nombreHospital" placeholder="Inserte Nombre de la empresa">
                            </div>

                            <div class="form-group">
                                <label for="correoElectronico">Correo Electronico</label>
                                <input type="email" class="form-control" value="<?= $data["correoElectronico"] ?>" id="correoElectronico" name="correoElectronico" placeholder="Correo Electronico">
                            </div>

                            <div class="form-group">
                                <label for="RFC">RFC</label>
                                <input type="text" class="form-control" value="<?= $data["RFC"] ?>" id="RFC" name="RFC" placeholder="Inserte RFC de la empresa">
                            </div>


                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" value="<?= $data["telefono"] ?>" id="Telefono" name="telefono" placeholder="Inserte telefono de la empresa">
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btnGuardar">Guardar</button>
                        </div>
                    </form>
                </div>





            </div>



        </div>

    </div>
</section>


<?= $this->endSection() ?>