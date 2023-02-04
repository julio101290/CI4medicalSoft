<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('consultasModulos/datosEncabezadoConsultas') ?>
<?= $this->include('consultasModulos/mostrarConsultasAnteriores') ?>
<?= $this->include('consultasModulos/agregarDiagnostico') ?>
<?= $this->include('consultasModulos/agregarTratamiento') ?>
<?= $this->include('consultasModulos/mostrarDiagnosticosAnteriores') ?>
<?= $this->include('consultasModulos/mostrarTratamientosAnteriores') ?>
<?= $this->include('enfermedadesModulos/modalCaptura') ?>
<?= $this->include('medicamentosModulos/modalCaptura') ?>
<?= $this->include('pacientesModulos/modalCaptura') ?>



<?= $this->endSection() ?>