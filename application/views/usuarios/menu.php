<style>
    {
    	margin:0px;
    	padding:0px;
    }
    nav
    {
				font-family: Raleway, sans-serif	;
        line-height:1.5;
    }
    .vmenu h4
    {
        background:#f5f8fa;
        width:200px;
        color:#f5f8fa;
        font-size:large;
        font-weight:500;
        padding:7px 15px;
        background:green;
				font-family: Raleway, sans-serif;
    }
    .vmenu h4 a
    {
        text-decoration:none;
        color:White;
        width:200px;
        display:block;
				font-family: Raleway, sans-serif;
    }
    .vmenu h4:hover
    {
       background:green;
			 font-family: Raleway, sans-serif;
    }
    .vmenu li
    {
      border-bottom:solid 2px #f5f8fa;
			font-family: Raleway, sans-serif;
    }
    .vmenu li:hover
    {
        background:#f5f8fa;
				font-family: Raleway, sans-serif;
    }
    .vmenu:hover #s3
    {
        height:93px;
				font-family: Raleway, sans-serif;
    }
     .vmenu:hover #s4
    {
        height:124px;
				font-family: Raleway, sans-serif;

    }
</style>
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #228B22; border-color: #228B22;">
	<div class="container">
		<a class="navbar-brand" id="color">Sistema de Questionários IFSUL</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
							<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('login/sair')?>" id="color">Encerrar Sessão</a>
							</li>
					</ul>
			</div>
	</div>
	</nav>
	<main class="forms-form" id="color">
	    <form action="<?php echo base_url('menu')?>" method="POST">
					<div id="color2"><?php echo validation_errors('<p>','</p>'); ?></div>
							<?php if($this->session->flashdata('msg')): ?>
							<?php $alert = $this->session->flashdata('msg')['alert'];?>
							<?php $mensagem = $this->session->flashdata('msg')['mensagem'];?>
							<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
							<strong><?php echo($mensagem); ?></strong>
							</div>
							<?php endif; ?>
							<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
							<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
							<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

							<div class="container">
								<div class="row">
								 <nav>
							       <div class="vmenu">
							       <h4><a href="<?php echo base_url('usuarios/editar')?>">Editar Usuário</a></h4>
							        </div>
											<div class="container">
												<div class="row">
														<div class="vmenu">
														 	<h4><a href="<?php echo base_url('usuarios/index')?>">Habilitar e Desabilitar Usuários</a></h4>
														</div>
														</div>
														</div>
															<div class="container">
																<div class="row">
																		<div class="vmenu">
																		 <h4><a href="<?php echo base_url('pergunta')?>">Administração Perguntas</a></h4>
																			</div>
																			</div>
																			</div>
																			<div class="container">
																				<div class="row">
																					<div class="vmenu">
																					<h4><a href="<?php echo base_url('opcao')?>">Administração das Opções</a></h4>
																						</div>
																						</div>
																						</div>
																			<div class="container">
																				<div class="row">

																						<div class="vmenu">
																						 <h4><a href="<?php echo base_url('questionario')?>">Administração Questionário</a></h4>
																							</div>
																							</div>
																							</div>
																							<div class="container">
																								<div class="row">
																										<div class="vmenu">
																										 <h4><a href="<?php echo base_url('responder/index')?>">Responder Questionário</a></h4>
																											</div>
																											</div>
																											</div>
																											<div class="container">
																												<div class="row">

																														<div class="vmenu">
																														 <h4><a href="<?php echo base_url('responder/respostas_view')?>">Respostas Questionários</a></h4>
																															</div>
																															</div>
																															</div>

	</body>
	</html>
