<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="jumbotron bg-gradient-primary text-white rounded-lg shadow-lg p-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="display-4">Bienvenido, <span class="font-weight-bold"><?= $userName ?> </span>!</h1>
                        <p class="lead">Esto es lo que está sucediendo con tu cuenta hoy.</p>
                        <div class="d-flex mt-4">
                            <div class="mr-4">
                                <p class="mb-0">Hoy es</p>
                                <?php
                                $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                            
                                ?>
                                <h4 class="mb-0"><?= $formatter->format(new DateTime()) ?></h4>
                            </div>
                            <div>
                                <p class="mb-0">Tiempo Local</p>
                                <h4 class="mb-0" id="current-time"><?= date('h:i:s A') ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-block">
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3Cpath d='M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z'/%3E%3C/svg%3E" 
                             alt="Welcome" style="height: 150px; opacity: 0.2;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-info text-white shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 mr-3">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">New Users</h5>
                            <h2 class="mb-0">24</h2>
                            <p class="mb-0"><small>+12% respecto a la semana pasada</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-success text-white shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 mr-3">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Rendimiento</h5>
                            <h2 class="mb-0">98%</h2>
                            <p class="mb-0"><small>Todos los sistemas operativos.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-warning text-white shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 mr-3">
                            <i class="fas fa-tasks fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Tareas</h5>
                            <h2 class="mb-0">12/18</h2>
                            <p class="mb-0"><small>4 revisión pendiente</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-gradient-danger text-white shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 mr-3">
                            <i class="fas fa-calendar-check fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">Eventos</h5>
                            <h2 class="mb-0">5</h2>
                            <p class="mb-0"><small>2 próximos hoy</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Welcome Content -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">Empezando</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-light rounded-circle p-3 mr-3">
                            <i class="fas fa-rocket text-primary fa-2x"></i>
                        </div>
                        <div>
                            <h5>Guía de inicio rápido</h5>
                            <p class="mb-0">Descubra cómo aprovechar al máximo su panel de control con nuestra guía paso a paso.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-light rounded-circle p-3 mr-3">
                            <i class="fas fa-cog text-info fa-2x"></i>
                        </div>
                        <div>
                            <h5>Personaliza tu experiencia</h5>
                            <p class="mb-0">Personaliza tu panel de control para mostrar la información que más te importa.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="bg-light rounded-circle p-3 mr-3">
                            <i class="fas fa-bell text-warning fa-2x"></i>
                        </div>
                        <div>
                            <h5>Configurar notificaciones</h5>
                            <p class="mb-0">Manténgase informado con alertas sobre eventos importantes y actualizaciones.</p>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary btn-lg px-5">Explorar el panel</button>
                        <button class="btn btn-outline-primary btn-lg px-5 ml-2">Ver tutoriales</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg h-100">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">Actividad reciente</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-badge bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Registro de nuevo usuario</h6>
                                <p class="mb-0 small text-muted">John Doe se registró hace 2 horas</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-badge bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">actualización del sistema</h6>
                                <p class="mb-0 small text-muted">Versión 2.3.1 implementada exitosamente</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-badge bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Tarea Completada</h6>
                                <p class="mb-0 small text-muted">Informe mensual presentado</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-badge bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Nuevo Mensaje</h6>
                                <p class="mb-0 small text-muted">From Sarah Williams</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-outline-secondary">Ver registro de actividad completo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inspirational Quote -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card bg-light border-0 rounded-lg shadow-sm">
                <div class="card-body text-center py-4">
                    <i class="fas fa-quote-left fa-2x text-muted mb-3"></i>
                    <h4 class="font-italic mb-0">"El secreto para salir adelante es empezar."</h4>
                    <p class="mb-0 mt-2 text-muted">— Mark Twain</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .jumbotron {
        background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
        position: relative;
        overflow: hidden;
    }

    .jumbotron::before {
        content: "";
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        z-index: 0;
    }

    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #396afc 0%, #2948ff 100%);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #f46b45 0%, #eea849 100%);
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #c31432 0%, #240b36 100%);
    }

    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 0;
        bottom: 0;
        width: 2px;
        background-color: #e9ecef;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }

    .timeline-badge {
        position: absolute;
        left: -30px;
        top: 0;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        z-index: 1;
    }

    .timeline-content {
        padding-left: 20px;
    }
</style>

<script>
    // Update current time every second
    function updateTime() {
        const now = new Date();
        const timeStr = now.toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', second: '2-digit'});
        document.getElementById('current-time').textContent = timeStr;
    }

    setInterval(updateTime, 1000);
</script>
<?= $this->endSection() ?>