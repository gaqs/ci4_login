<div id="authentication" class="bg-primary bg-gradient">
	<div id="authentication_content" class="mt-5">
	<main role="main">
	  <div class="container">
	      <div class="row justify-content-center">
	          <div class="col-lg-7">
	              <div class="card shadow-lg border-0 rounded-lg">
	                  <div class="card-header">
											<h3 class="text-center font-weight-light my-4">
												<span class="fas fa-user-circle"></span> Registro
											</h3>
										</div>
	                  <div class="card-body">
	                      <form class="" action="<?= base_url('users/register');?>" method="post">
	                          <div class="row mb-3">
	                              <div class="col-md-6">
	                                  <div class="form-floating mb-3 mb-md-0">
	                                      <input class="form-control" id="input_name" name="name" type="text" value="<?= set_value('name');?>" placeholder="Juan Andrés" />
	                                      <label for="input_name">Nombres</label>
	                                  </div>
	                              </div>
	                              <div class="col-md-6">
	                                  <div class="form-floating">
	                                      <input class="form-control" id="input_lastname" type="text" name="lastname" placeholder="Perez Gonzales" />
	                                      <label for="input_lastname">Apellidos</label>
	                                  </div>
	                              </div>
	                          </div>
	                          <div class="form-floating mb-3">
	                              <input class="form-control" id="input_email" type="email" placeholder="nombre@ejemplo.com" />
	                              <label for="input_email">Correo electrónico</label>
	                          </div>
	                          <div class="row mb-3">
	                              <div class="col-md-6">
	                                  <div class="form-floating mb-3 mb-md-0">
	                                      <input class="form-control" id="input_password" type="password" name="password" placeholder="********" />
	                                      <label for="input_password">Contraseña</label>
	                                  </div>
	                              </div>
	                              <div class="col-md-6">
	                                  <div class="form-floating mb-3 mb-md-0">
	                                      <input class="form-control" id="repeat_password" type="password" name="repeat_password" placeholder="Confirm password" />
	                                      <label for="repeat_password">Confirmar contraseña</label>
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
	                          <div class="mt-4 mb-0">
	                              <div class="d-grid">
																	<button type="submit" class="btn btn-primary btn-block">
																		<i class="fas fa-user-plus"></i> Registrarse
																	</button>
																</div>
	                          </div>
	                      </form>
	                  </div>
	                  <div class="card-footer text-center py-3">
	                      <div class="small"><a href="<?= base_url('users'); ?>">Ya posees una cuenta? Logeate!</a></div>
	                  </div>
	              </div>
	          </div>
	      </div>
	  </div>
	</main>
</div><!-- /end authentication_content -->
