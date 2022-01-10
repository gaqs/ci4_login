<main role="main">

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<h2 class="card-title">Editar</h2>
						<hr>

            <?php if( session()->get('success')): ?>
							<div class="alert alert-success">
								<?= session()->get('success') ?>
							</div>
						<?php endif; ?>

						<form class="" action="<?= base_url('users/profile');?>" method="post">
              <div class="row mb-3">
                <div class="col-6">
                  <label for="input_name" class="form-label">Nombre</label>
									<span class="fas fa-user icon-input"></span>
                  <input type="text" class="form-control" id="input_name" name="name" value="<?= set_value('name',$user['name']);?>">
                </div>
                <div class="col-6">
                  <label for="input_lastname" class="form-label">Apellidos</label>
									<span class="fas fa-user-friends icon-input"></span>
                  <input type="text" class="form-control" id="input_lastname" name="lastname" value="<?= set_value('lastname',$user['lastname']);?>">
                </div>
              </div>
							<div class="mb-3">
								<label for="input_email" class="form-label">Correo electrónico</label>
								<span class="fas fa-envelope icon-input"></span>
								<input type="email" class="form-control" id="input_email" aria-describedby="" value="<?= $user['email']; ?>" readonly>
							</div>


							<!-- Cambio contraseña accordion -->
							<div class="accordion accordion-flush border rounded-1 mt-4" id="accordion_password">
							  <div class="accordion-item">
							    <h2 class="accordion-header" id="heading_one">
							      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_one" aria-expanded="false" aria-controls="collapse_one">
							        Cambiar contraseña
							      </button>
							    </h2>
							    <div id="collapse_one" class="accordion-collapse collapse" aria-labelledby="heading_one" data-bs-parent="#accordion_password">
							      <div class="accordion-body">
											<div class="mb-3">
												<label for="input_password" class="form-label">Contraseña</label>
												<span class="fas fa-unlock-alt icon-input"></span>
												<input type="password" class="form-control" name="password" id="input_password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" placeholder="*******">
											</div>
				              <div class="mb-3">
												<label for="repeat_password" class="form-label">Confirmar contraseña</label>
												<span class="fas fa-unlock-alt icon-input"></span>
												<input type="password" class="form-control" name="repeat_password" id="repeat_password" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" placeholder="********">
											</div>
										</div>
							    </div>
							  </div>
							</div>

              <?php if(isset($validation)): ?>
                <div class="col-12">
                  <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors() ?>
                  </div>
                </div>
              <?php endif ?>

							<button type="submit" class="btn btn-primary mt-5 w-100"><i class="fas fa-edit"></i> Actualizar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
