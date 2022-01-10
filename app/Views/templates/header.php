<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Expires" content="Thursday, 25-Nov-20 00:00:00 GMT">
    <meta http-equiv="Last-Modified" content="Saturday, 5-Sep-20 14:33:00 GMT">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <meta charset="utf-8">
    <meta http-equiv="X-Frame-Options" content="allow-from https://www.youtube.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <title>Default</title>
    <meta name="title" content="...">
    <meta name="description" content="...">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://default.com/">
    <meta property="og:title" content="...">
    <meta property="og:description" content="...">
    <meta property="og:image" content="<?= base_url('img/default.jpg');?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://default.com/">
    <meta property="twitter:title" content="...">
    <meta property="twitter:description" content="...">
    <meta property="twitter:image" content="<?= base_url('img/default.jpg');?>">

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('img/icon/default.png');?>">

		<!-- Css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('dist/bootstrap-5.1.3/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('dist/fontawesome-6.0.0/css/all.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/animate.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/hover.css');?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css?003');?>">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Login</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">

        <?php if(session()->get('loggedIn')): ?>

          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('dashboard'); ?>">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('users/profile'); ?>">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout_modal" href="<?= base_url('users/logout');?>">Logout</a>
            </li>
          </ul>

        <?php else: ?>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('users'); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('users/register'); ?>">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('users'); ?>">Login</a>
          </li>
        </ul>

      <?php endif; ?>

      </div>
    </div>
  </nav>

  <!-- Modal confirmacion de cierre de sesion -->
  <div class="modal fade" id="logout_modal" tabindex="-1" aria-labelledby="logout_modal_label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logout_modal_label">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close" name="button"></button>
        </div>
        <div class="modal-body">
          ¿Está seguro que desea cerrar su sesión actual?
        </div>
        <div class="modal-footer">
          <a href="<?= base_url('users/logout');?>">
            <button type="button" class="btn btn-primary" name="button"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
          </a>
        </div>
      </div>
    </div>
  </div>
