<?= $this->extend('julio101290\boilerplate\Views\Authentication\index') ?>
<?= $this->section('content') ?>

<style>
    body.login-page {
        background: 
        <?php if (file_exists(FCPATH . 'img/back.png')): ?>
            /* Si la imagen existe en public/img/back.png, la aplica encima del degradado */
            url('<?= base_url('img/back.png') ?>') no-repeat center center fixed,
        <?php endif; ?>
            /* Degradados por defecto si no existe la imagen o como respaldo */
            radial-gradient(circle at top left, #1e3c72, transparent 60%),
            radial-gradient(circle at bottom right, #2a5298, transparent 60%),
            linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        background-size: cover;
        min-height: 100vh;
    }

    .login-box {
        animation: fadeSlide .6s ease-out;
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

    /* Tarjeta con efecto cristal translúcido */
    .card {
        background: rgba(255, 255, 255, 0.15);
        -webkit-backdrop-filter: blur(15px);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
    }

    .login-card-body {
        background: transparent;
        padding: 2.5rem 2rem;
        color: #ffffff;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .login-box-msg {
        color: #ffffff;
        font-weight: 400;
        text-align: center;
        padding: 0 10px 15px;
    }

    /* Campo de correo electrónico */
    .form-control {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-right: none;
        color: #ffffff;
        border-radius: 25px 0 0 25px;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
        color: #ffffff;
        box-shadow: none;
    }

    .form-control.is-invalid {
        border-color: #ffcccc;
        background-image: none;
    }

    /* Icono a la derecha del input */
    .input-group-text {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-left: none;
        color: rgba(255, 255, 255, 0.85);
        border-radius: 0 25px 25px 0;
    }

    /* Botón de envío */
    .btn-primary {
        background-color: #4a90e2;
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
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    /* Enlaces inferiores */
    .card a:not(.btn) {
        color: #ffffff;
        opacity: 0.85;
        transition: opacity 0.3s;
    }

    .card a:not(.btn):hover {
        opacity: 1;
        text-decoration: underline;
    }

    @media (max-width: 576px) {
        .login-card-body {
            padding: 2rem 1.5rem;
        }
    }
</style>

<!-- /.login-logo -->
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg"><?= lang('Auth.forgotPassword') ?></p>
    <p class="login-box-msg"><?= lang('Auth.enterEmailForInstructions') ?></p>
    
    <?= $this->include('julio101290\boilerplate\Views\Authentication\message_block') ?>
    
    <form action="<?= base_url(route_to('forgot')) ?>" method="post">
      <?= csrf_field() ?>
      <div class="input-group mb-4">
        <input type="email" name="email"
          class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
          placeholder="<?= lang('Auth.email') ?>"
          value="<?= old('email') ?>">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        <?php if (session('errors.email')) : ?>
          <div class="invalid-feedback">
            <?= session('errors.email') ?>
          </div>
        <?php endif ?>
      </div>

      <div class="row mb-3">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">
            <?= lang('Auth.sendInstructions') ?>
          </button>
        </div>
      </div>
    </form>

    <hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);">

    <p class="mt-2 mb-1 text-center">
      <a href="<?= base_url(route_to('login')) ?>"><?= lang('Auth.signIn') ?></a>
    </p>

    <?php if ($config->allowRegistration) { ?>
    <p class="mb-0 text-center">
      <a href="<?= base_url(route_to('register')) ?>">
        <?= lang('Auth.needAnAccount') ?>
      </a>
    </p>
    <?php } ?>
  </div>
</div>
<?= $this->endSection() ?>