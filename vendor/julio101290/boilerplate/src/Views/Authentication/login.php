<?= $this->extend('julio101290\boilerplate\Views\Authentication\index') ?>
<?= $this->section('content') ?>

<style>
    body.login-page {
        background: 
        <?php if (file_exists(FCPATH . 'img/back.png')): ?>
            /* Si la imagen existe, la aplica encima del degradado */
            url('<?= base_url('img/back.png') ?>') no-repeat center center fixed,
        <?php endif; ?>
            /* Degradados por defecto si no existe la imagen o como respaldo */
            radial-gradient(circle at top left, #1e3c72, transparent 60%),
            radial-gradient(circle at bottom right, #2a5298, transparent 60%),
            linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        background-size: cover;
        min-height: 100vh;
        display: flex; /* Asegura centrado */
        align-items: center;
        justify-content: center;
    }

    .login-box {
        animation: fadeSlide .6s ease-out;
        width: 360px; /* Ancho estándar AdminLTE */
    }

    @keyframes fadeSlide {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-logo {
        font-size: 2.1rem;
        font-weight: 300;
        color: #fff;
        text-align: center;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,.4);
    }
    
    .login-logo a {
        color: #fff;
    }

    /* --- CAMBIOS PRINCIPALES AQUÍ --- */
    .card {
        /* Fondo blanco con mucha transparencia */
        background: rgba(255, 255, 255, 0.15); 
        /* Efecto de desenfoque detrás de la tarjeta (Glassmorphism) */
        -webkit-backdrop-filter: blur(15px);
        backdrop-filter: blur(15px);
        /* Esquinas bastante redondeadas */
        border-radius: 25px; 
        /* Sombra más suave y difusa */
        box-shadow: 0 15px 35px rgba(0,0,0,.2);
        /* Borde sutil blanco para definir el cristal */
        border: 1px solid rgba(255, 255, 255, 0.2); 
        overflow: hidden; /* Para que el contenido respete las esquinas redondeadas */
    }

    .login-card-body {
        background: transparent; /* Importante para que se vea el fondo de la card */
        padding: 2.5rem 2rem;
    }

    /* Ajuste de color para textos predeterminados dentro de la tarjeta */
    .login-card-body, .login-boxmsg, .custom-control-label, .icheck-primary label {
        color: #ffffff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.3);
    }

    .login-box-msg {
        color: #eeeeee;
        margin: 0;
        padding: 0 20px 20px;
        text-align: center;
    }

    /* Estilos para los Inputs transparentes */
    .form-control {
        background: rgba(255, 255, 255, 0.2); /* Fondo input semi-transparente */
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-right: none; /* Mantener diseño original */
        color: #fff; /* Texto blanco dentro del input */
        border-radius: 25px 0 0 25px; /* Redondear lado izquierdo */
    }

    /* Color del placeholder (texto de ayuda) */
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
        color: #fff;
        box-shadow: none;
    }
    
    /* Corrección para AdminLTE is-invalid */
    .form-control.is-invalid {
        border-color: #ffcccc;
        background-image: none;
    }

    /* Estilos para el icono del input */
    .input-group-text {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-left: none;
        color: rgba(255, 255, 255, 0.8);
        border-radius: 0 25px 25px 0; /* Redondear lado derecho */
        cursor: pointer;
    }

    /* Estilo del botón */
    .btn-primary {
        background-color: #4a90e2; /* Un azul vibrante */
        border-color: #4a90e2;
        border-radius: 25px;
        font-weight: 600;
        letter-spacing: .5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #357abd;
        border-color: #357abd;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,.3);
    }

    /* Estilos para los enlaces inferiores */
    .card a:not(.btn) {
        color: #ffffff;
        opacity: 0.8;
        transition: opacity 0.3s;
    }

    .card a:not(.btn):hover {
        opacity: 1;
        text-decoration: underline;
    }
    
    /* Ajuste hr */
    .card hr {
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }

    @media (max-width: 576px) {
        .login-box {
            width: 90%;
        }
        .login-card-body {
            padding: 2rem 1.5rem;
        }
    }
</style>

<div class="login-box">

    <!-- Título configurable -->
    <div class="login-logo">
        <a href="<?= base_url() ?>"><b><?= lang('Auth.loginTitle') ?></b></a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <?= $this->include('julio101290\boilerplate\Views\Authentication\message_block') ?>

            <form action="<?= base_url(route_to('login')) ?>" method="post">
                <?= csrf_field() ?>

                <!-- LOGIN -->
                <div class="input-group mb-4">
                    <input
                        type="<?= $config->validFields === ['email'] ? 'email' : 'text' ?>"
                        name="login"
                        class="form-control <?= session('errors.login') ? 'is-invalid' : '' ?>"
                        placeholder="<?= $config->validFields === ['email']
                            ? lang('Auth.email')
                            : lang('Auth.emailOrUsername') ?>"
                        value="<?= old('login') ?>"
                        autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <?php if (session('errors.login')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    <?php endif ?>
                </div>

                <!-- PASSWORD -->
                <div class="input-group mb-3">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
                        placeholder="<?= lang('Auth.password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text" onclick="togglePassword()">
                            <span id="toggleIcon" class="fas fa-eye"></span>
                        </div>
                    </div>
                    <?php if (session('errors.password')) : ?>
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    <?php endif ?>
                </div>

                <!-- SHOW PASSWORD (Opcional, ya está el icono en el input) -->
                <div class="form-group mb-3 text-right" style="display: none;">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                               class="custom-control-input"
                               id="showPassword"
                               onclick="togglePassword()">
                        <label class="custom-control-label" for="showPassword">
                            <?= lang('boilerplate.Auth.showPassword') ?? 'Ver contraseña' ?>
                        </label>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <?php if ($config->allowRemembering) { ?>
                        <div class="col-7">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox"
                                       id="remember"
                                       name="remember"
                                       <?= old('remember') ? 'checked' : '' ?>>
                                <label for="remember">
                                    <?= lang('Auth.rememberMe') ?>
                                </label>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">
                            <?= lang('Auth.signIn') ?>
                        </button>
                    </div>
                </div>
            </form>

            <hr>

            <p class="mb-1 text-center">
                <a href="<?= route_to('forgot') ?>">
                    <?= lang('Auth.forgotYourPassword') ?>
                </a>
            </p>

            <?php if ($config->allowRegistration) { ?>
                <p class="mb-0 text-center">
                    <a href="<?= route_to('register') ?>">
                        <?= lang('Auth.needAnAccount') ?>
                    </a>
                </p>
            <?php } ?>

        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon  = document.getElementById('toggleIcon');
    const check = document.getElementById('showPassword');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
        if (check) check.checked = true;
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
        if (check) check.checked = false;
    }
}
</script>

<?= $this->endSection() ?>