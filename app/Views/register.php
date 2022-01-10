<main role="main">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Registro</h2>
						<hr>
						<form class="" action="<?= base_url('users/register');?>" method="post">
              <div class="row mb-3">
                <div class="col-6">
                  <label for="input_name" class="form-label">Nombre</label>
									<span class="fas fa-user icon-input"></span>
                  <input type="text" class="form-control" id="input_name" name="name" value="<?= set_value('name');?>" placeholder="Juan">
                </div>
                <div class="col-6">
                  <label for="input_lastname" class="form-label">Apellidos</label>
									<span class="fas fa-user-friends icon-input"></span>
                  <input type="text" class="form-control" id="input_lastname" name="lastname" value="<?= set_value('lastname');?>" placeholder="Pérez Soto">
                </div>
              </div>

							<div class="mb-3">
								<label for="input_email" class="form-label">Correo electrónico</label>
								<span class="fas fa-envelope icon-input"></span>
								<input type="email" class="form-control" id="input_email" name="email" aria-describedby="" value="<?= set_value('email');?>" placeholder="ejemplo@puertomontt.cl">
							</div>
							<div class="mb-3">
								<label for="input_password" class="form-label">Contraseña</label>
								<span class="fas fa-unlock-alt icon-input"></span>
								<input type="password" class="form-control" name="password" id="input_password" placeholder="********">
							</div>
              <div class="mb-3">
								<label for="repeat_password" class="form-label">Confirmar contraseña</label>
								<span class="fas fa-unlock-alt icon-input"></span>
								<input type="password" class="form-control" name="repeat_password" id="repeat_password" placeholder="********">
							</div>

              <?php if(isset($validation)): ?>
                <div class="col-12">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
              <?php endif ?>

							<button type="submit" class="btn btn-primary w-100"><i class="fas fa-user-plus"></i> Registrarse</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
