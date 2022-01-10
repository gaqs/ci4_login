<main role="main">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Login</h2>
						<hr>
						<?php if( session()->get('success')): ?>
							<div class="alert alert-success">
								<?= session()->get('success') ?>
							</div>
						<?php endif; ?>
						<form class="" action="<?= base_url('users/index');?>" method="post">
							<div class="mb-3">
								<label for="email" class="form-label">Correo electrónico</label>
								<span class="fas fa-envelope icon-input"></span>
								<input type="email" class="form-control" id="input_email" name="email" placeholder="ejemplo@puertomontt.cl" value="<?= set_value('email');?>">
								<div id="" class="form-text"></div>
							</div>
							<div class="mb-4">
								<label for="password" class="form-label">Contraseña</label>
								<span class="fas fa-unlock-alt icon-input"></span>
								<input type="password" class="form-control" name="password" id="input_password" placeholder="********">
							</div>
							<!--
							<div class="mb-3 form-check">
								<input type="checkbox" class="form-check-input" id="input_check">
								<label class="form-check-label" for="input_check">Recordarme?</label>
							</div>
							-->
							<?php if(isset($validation)): ?>
                <div class="col-12">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
              <?php endif ?>
							<button type="submit" class="btn btn-primary w-100 mb-3 mt-3"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
