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

    /* Tarjeta con efecto cristal translúcido y bordes redondeados */
    .card {
        background: rgba(255, 255, 255, 0.15);
        -webkit-backdrop-filter: blur(15px);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
    }

    .register-card-body {
        background: transparent;
        padding: 2.5rem 2rem;
        color: #ffffff;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
    }

    .login-box-msg {
        color: #ffffff;
        font-weight: 500;
        text-align: center;
        padding: 0 10px 15px;
    }

    /* Campos de entrada con transparencia y esquinas redondeadas a la izquierda */
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

    /* Iconos a la derecha del input con esquinas redondeadas */
    .input-group-text {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-left: none;
        color: rgba(255, 255, 255, 0.85);
        border-radius: 0 25px 25px 0;
    }

    /* Botón de registro */
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
        .register-card-body {
            padding: 2rem 1.5rem;
        }
    }
</style>

<div class="card">
  <div class="card-body register-card-body">
    <p class="login-box-msg"><?= lang('Auth.register') ?></p>

    <?= $this->include('julio101290\boilerplate\Views\Authentication\message_block') ?>

    <form action="<?= base_url(route_to('register')) ?>" method="post">
      <?= csrf_field() ?>

      <!-- USERNAME -->
      <div class="input-group mb-3">
        <input type="text" name="username"
          class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>"
          placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>"
          autocomplete="off">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
        <?php if (session('errors.username')) : ?>
          <div class="invalid-feedback">
            <?= session('errors.username') ?>
          </div>
        <?php endif ?>
      </div>

      <!-- EMAIL -->
      <div class="input-group mb-3">
        <input type="email" name="email"
          class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
          placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>"
          autocomplete="off">
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

      <!-- PASSWORD -->
      <div class="input-group mb-3">
        <input type="password" name="password"
          class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>"
          placeholder="<?= lang('Auth.password') ?>" autocomplete="new-password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        <?php if (session('errors.password')) : ?>
          <div class="invalid-feedback">
            <?= session('errors.password') ?>
          </div>
        <?php endif ?>
      </div>

      <!-- REPEAT PASSWORD -->
      <div class="input-group mb-4">
        <input type="password" name="pass_confirm"
          class="form-control <?= session('errors.pass_confirm') ? 'is-invalid' : '' ?>"
          placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="new-password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        <?php if (session('errors.pass_confirm')) : ?>
          <div class="invalid-feedback">
            <?= session('errors.pass_confirm') ?>
          </div>
        <?php endif ?>
      </div>

      <!-- SUBMIT -->
      <div class="row mb-3">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">
            <?= lang('Auth.register') ?>
          </button>
        </div>
      </div>
    </form>

    <hr style="border-top: 1px solid rgba(255, 255, 255, 0.2);">

    <p class="mt-2 mb-0 text-center">
      <?= lang('Auth.alreadyRegistered') ?>
      <a href="<?= base_url(route_to('login')) ?>" class="font-weight-bold">
        <?= lang('Auth.signIn') ?>
      </a>
    </p>
  </div>
</div>

<?= $this->endSection() ?>