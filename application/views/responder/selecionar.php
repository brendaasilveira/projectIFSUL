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
                    <div class="card-header" style="background-color: #228B22; border-color:#228B22">Respostas dos Usuários</div>
                    	<div class="card-body">
                        <form action="<?php echo base_url('responder/selecionar_pergunta')?>" method="POST">
													<div id="color2"><?php echo validation_errors('<p>','</p>'); ?></div>
														<?php if($this->session->flashdata('msg')): ?>
														<?php $alert = $this->session->flashdata('msg')['alert'];?>
														<?php $mensagem = $this->session->flashdata('msg')['mensagem'];?>
														<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
															  <strong><?php echo($mensagem); ?></strong>
														</div>
													<?php endif; ?>
                          <div class="form-group row">
                              <label for="nm_questionario" class="col-md-4 col-form-label text-md-right" id="color2">Questionário:</label>
                              <div class="col-md-6">
                                <select name="id_questionario" class="form-control">
                              <?php foreach ($tb_questionario as $tb_questionario):?>
                              <option value="<?=$tb_questionario->id_questionario?>"><?=$tb_questionario->nm_questionario?></option>
                              <?php endforeach ?>
                            </select>
                              </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-4">
                              <input type="submit" name="selecionar" value="Selecionar" class="btn btn-success" style=" margin-top: 2px; margin-left: 200px; margin-right: 5px;" class="btn btn-success btn-sm"/>
                            </div>
                          </div>
