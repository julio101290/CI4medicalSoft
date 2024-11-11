<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $totalConsultas ?></h3>
                    <p><?= lang("dashboard.totalConsultas") ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= base_url('admin/consultas/listaConsultas') ?>" class="small-box-footer"><?= lang("dashboard.moreInfo") ?><i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $totalMedicamentos ?></h3>
                    <p><?= lang("dashboard.totalMedicamentos") ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?= base_url('admin/medicamentos') ?>" class="small-box-footer"><?= lang("dashboard.moreInfo") ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $totalPacientes ?></h3>
                    <p><?= lang("dashboard.totalPacientes") ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= base_url('admin/pacientes') ?>" class="small-box-footer"><?= lang("dashboard.moreInfo") ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $totalCitas ?></h3>
                    <p><?= lang("dashboard.totalCitas") ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?= base_url('admin/citas') ?>" class="small-box-footer"><?= lang("dashboard.moreInfo") ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    
    <?= $this->include('dashboardGraph/PieChartPatiens') ?>


</div>
<?= $this->endSection() ?>