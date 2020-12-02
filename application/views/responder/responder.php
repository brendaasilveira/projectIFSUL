<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #228B22; border-color: #228B22;">
	<div class="container">
		<a class="navbar-brand" id="color">Sistema de Questionários IFSUL</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
							<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('responder/index')?>" id="color">Voltar</a>
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
                    <div class="card-header" style="background-color: #228B22; border-color:#228B22">
											<label> <?php
												foreach ($questionario as $key => $linha):
												echo($linha->nm_questionario);
												break;
												endforeach;?></label>
										</div>
                    <div class="card-body">
											<form action="<?php echo base_url('responder/respostas')?>" method="POST">
													<div id="color2"><?php echo validation_errors('<p>','</p>'); ?></div>
														<?php if($this->session->flashdata('msg')): ?>
														<?php $alert = $this->session->flashdata('msg')['alert'];?>
														<?php $mensagem = $this->session->flashdata('msg')['mensagem'];?>
														<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
															  <strong><?php echo($mensagem); ?></strong>
														</div>
													<?php endif; ?>
													<input type="hidden" name="id_usuario" value="<?= $this->session->userdata('id_usuario');?>">
													<?php
													foreach ($questionario as $key => $linha): ?>
														<input type="hidden" name="id_questionario" value="<?php echo($linha->id_questionario); ?>">
													<?php
														break;
														endforeach;
													?>
													<?php
													foreach ($pergunta as $key => $linha): ?>
													<br><input type="hidden" id="color2" value="<?= $linha->id_pergunta ?>" name="pr_pergunta_<?=$linha->id_pergunta;?>"></input>
													<br><label id="color2"><?= $linha->pr_pergunta?></label>
													<br><label id="color2" name="ds_pergunta"><?= $linha->ds_pergunta ?></label>
														<?php foreach ($questionario as $key2 => $linha2):
															if($linha->id_pergunta == $linha2->id_pergunta) { ?>
																<?php if($linha2->id_tipo==1){?>
																	<br><input type="hidden" value="<?= $linha2->id_qpo?>" name="id_qpo" ></input>
																	<br><input type="text" value="" id_qpo="<?= $linha2->id_qpo?>" name="resposta"></input>
																<?php }
																	?>
																	<?php if($linha2->id_tipo==2){?>
																		<br><label id="color2"><?= $linha2->ds_opcao?></label>
																		<input type="radio" value="<?= $linha2->id_qpo?>"  name="ds_opcao_<?=$linha2->id_pergunta?>"></input>
																	<?php }?>
																	<?php if($linha2->id_tipo==3){?>
																			<br><label id="color2"><?= $linha2->ds_opcao?></label>
																			<input type="checkbox" value="<?= $linha2->id_qpo?>"  name="ds_opcao_<?=$linha2->id_pergunta?>[]"></input>
																<?php
																	}
																		?>
															<?php
															}
															?>
														<?php
															endforeach;
														?>
														<?php
														endforeach; ?>
													<div class="form-group">
														<div class="col-md-4">
															<br><input type="submit" name="responder" value="Responder" class="btn btn-success"/></br>
														</div>
													</div>
												</form>
												<script>
