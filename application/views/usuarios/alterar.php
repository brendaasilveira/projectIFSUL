<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #228B22; border-color: #228B22;">
	<div class="container">
		<a class="navbar-brand" id="color">Sistema de Questionários IFSUL</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
							<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('menu')?>" id="color">Voltar</a>
							</li>
					</ul>
			</div>
	</div>
</nav>
<main class="forms-form" id="color">
    <div class="cotainer" >
        <div class="row justify-content-center" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #228B22; border-color:#228B22">Editar Perfil</div>
                    	<div class="card-body">
                        <form action="<?php echo base_url('usuarios/editar')?>" method="POST">
													<div id="color2"><?php echo validation_errors('<p>','</p>'); ?></div>
														<?php if($this->session->flashdata('msg')): ?>
														<?php $alert = $this->session->flashdata('msg')['alert'];?>
														<?php $mensagem = $this->session->flashdata('msg')['mensagem'];?>
														<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
															  <strong><?php echo($mensagem); ?></strong>
														</div>
													<?php endif; ?>
													<input type="hidden" name="id_usuario" value="<?php echo($usuarios->id_usuario); ?>">
													<div class="form-group row">
															<label for="lg_usuario" class="col-md-4 col-form-label text-md-right" id="color2">Nome de Usuário:</label>
															<div class="col-md-6">
																	<input type="text" class="form-control" name="lg_usuario" placeholder="Digite seu usuario"  value="<?php echo set_value('lg_usuario') ?>">
															</div>
													</div>
													<div class="form-group row">
															<label for="nm_usuario" class="col-md-4 col-form-label text-md-right" id="color2">Nome Completo:</label>
															<div class="col-md-6">
																	<input type="text" class="form-control" name="nm_usuario" placeholder="Digite seu nome completo"  value="<?php echo set_value('nm_usuario') ?>">
															</div>
													</div>
													<div class="form-group row">
															<label for="dt_nascimento" class="col-md-4 col-form-label text-md-right" id="color2">Data de nascimento:</label>
															<div class="col-md-6">
																	<input type="date" class="form-control" name="dt_nascimento" placeholder=""  value="<?php echo set_value('dt_nascimento') ?>">
															</div>
													</div>
													<div class="form-group row">
															<label for="ds_email" class="col-md-4 col-form-label text-md-right" id="color2">Email:</label>
															<div class="col-md-6">
																	<input type="text" class="form-control" name="ds_email" placeholder="Digite seu email"  value="<?php echo set_value('ds_email') ?>">
															</div>
													</div>
													<div class="form-group row">
															<label for="us_codt" class="col-md-4 col-form-label text-md-right" id="color2">Tipo de Usuário:</label>
															<div class="col-md-6">
																<select name="us_codt" class="form-control">
																<?php foreach ($tb_usuariotipo as $tb_usuariotipo):?>
																<option value="<?=$tb_usuariotipo->us_codt?>"><?=$tb_usuariotipo->us_tipo?></option>
																<?php endforeach ?>
															</select>
															</div>
													</div>
													<div class="form-group row">
														<label for="ds_senha" class="col-md-4 col-form-label text-md-right" id="color2">Senha:</label>
																<div class="col-md-6">
																	<input name="ds_senha" type="password" placeholder="Digite sua senha" value="<?php echo set_value('ds_senha') ?>" class="form-control input-md">
																</div>
													</div>
													<div class="form-group row">
														<label for="ds_senha1" class="col-md-4 col-form-label text-md-right" id="color2">Confrimar Senha:</label>
																<div class="col-md-6">
																	<input name="ds_senha1" type="password" placeholder="Digite sua senha" value="<?php echo set_value('ds_senha1') ?>" class="form-control input-md">
																</div>
													</div>
										<div class="col-md-6 offset-md-4">
												<button type="submit" class="btn btn-success" name="editar" value="Editar">
														Editar
												</button>
											</div>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
</main>
