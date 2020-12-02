<!DOCTYPE html>
<html>
<head>
		<title><?php echo $titulo?></title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('dist/css/style.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('dist/bootstrap/bootstrap.min.css')?>" rel="stylesheet">
		<link rel="icon" href="Favicon.png">
		<style>
	.navbar-brand{
		color:white;
		}</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #228B22; border-color: #228B22;">
    <div class="container">
			<a class="navbar-brand" id="color">Sistema de Questionários IFSUL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="usuarios/cadastrar" id="color">Cadastrar</a>
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
                    <div class="card-header" style="background-color: #228B22; border-color:#228B22">Login</div>
                    	<div class="card-body">
                        <form action="login/login" method="POST">
													<?= $this->session->flashdata('erro_login');?>
													<?php if($this->session->flashdata('msg')): ?>
													<?php $alert = $this->session->flashdata('msg')['alert'];?>
													<?php $mensagem = $this->session->flashdata('msg')['mensagem'];?>
													<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
													<strong><?php echo($mensagem); ?></strong>
													</div>
													<?php endif; ?>
                            <div class="form-group row">
                                <label for="nm_usuario" class="col-md-4 col-form-label text-md-right" id="color2">Nome de Usuário:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lg_usuario" placeholder="Digite seu usuario"  value="<?php echo set_value('lg_usuario') ?>" required autofocus>
                                </div>
                            </div>
														<div class="form-group row">
            									<label for="ds_senha" class="col-md-4 col-form-label text-md-right" id="color2">Senha:</label>
                									<div class="col-md-6">
                                    <input name="ds_senha" type="password" placeholder="Digite sua senha" value="<?php echo set_value('ds_senha') ?>" class="form-control input-md" required></input>
                                	</div>
                            </div>

														<div class="form-group row">
													<div class="col-md-6 offset-md-4">
															<div class="checkbox">
																	<label id="color2"> <input type="checkbox" name="remember"> Lembrar Usuário </label>
															</div>
													</div>
											</div>
											<div class="col-md-6 offset-md-4">
													<button type="submit" class="btn btn-success">
															Entrar
													</button>
											</div>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
</main>
</body>
</html>
