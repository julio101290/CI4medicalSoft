<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="card-tools">
            <div class="btn-group">


            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tablaBitacora" class="table table-striped table-hover va-middle tablaBitacora">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?= lang('log.description') ?></th>
                                <th><?= lang('log.user') ?></th>
                                <th><?= lang('log.date') ?></th>


                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>

    /**
     * Cargamos la tabla
     */
    $('.tablaBitacora').DataTable({
        "ajax": "<?= base_url(route_to('admin/bitacora/manage')) ?>",
        "deferRender": true,
        "serverSide": true,
        "retrieve": true,
        "processing": true

    })


</script>
<?= $this->endSection() ?>