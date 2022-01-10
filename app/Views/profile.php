<main role="main">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Hola! <?= $user['name'].' '.$user['lastname']; ?></h2>
						<hr>

            <?php if( session()->get('success')): ?>
							<div class="alert alert-success">
								<?php session()->get('success') ?>
							</div>
						<?php endif; ?>

						<form class="" action="<?= base_url('users/profile');?>" method="post">
              <div class="row mb-3">
                <div class="col-6">
                  <label for="input_name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="input_name" name="name" value="<?= set_value('name',$user['name']);?>">
                </div>
                <div class="col-6">
                  <label for="input_lastname" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="input_lastname" name="lastname" value="<?= set_value('lastname',$user['lastname']);?>">
                </div>
              </div>

							<div class="mb-3">
								<label for="input_email" class="form-label">Correo electrónico</label>
								<input type="email" class="form-control" id="input_email" aria-describedby="" value="<?= $user['email']; ?>" readonly>
							</div>
							<div class="mb-3">
								<label for="input_password" class="form-label">Contraseña</label>
								<input type="password" class="form-control" name="password" id="input_password">
							</div>
              <div class="mb-3">
								<label for="repeat_password" class="form-label">Confirmar contraseña</label>
								<input type="password" class="form-control" name="repeat_password" id="repeat_password">
							</div>

              <?php if(isset($validation)): ?>
                <div class="col-12">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
              <?php endif ?>

							<button type="submit" class="btn btn-primary">Actualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
