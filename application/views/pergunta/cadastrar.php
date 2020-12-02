<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #228B22; border-color: #228B22;">
	<div class="container">
		<a class="navbar-brand" id="color">Sistema de Questionários IFSUL</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
							<li class="nav-item">
									<a class="nav-link" href="<?php echo base_url('pergunta/index')?>" id="color">Voltar</a>
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
                    <div class="card-header" style="background-color: #228B22; border-color:#228B22" id="color"> Cadastrar Perguntas</div>
                    	<div class="card-body">
                        <form action="<?php echo base_url('pergunta/cadastrar')?>" method="POST">
													<div id="color2"><?php echo validation_errors('<p>','</p>'); ?></div>
														<?php if($this->session->flashdata('msn')): ?>
														<?php $alert = $this->session->flashdata('msn')['alert'];?>
														<?php $mensagem = $this->session->flashdata('msn')['mensagem'];?>
														<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
															  <strong><?php echo($mensagem); ?></strong>
														</div>
													<?php endif; ?>
													<div class="form-group row">
															<label for="pr_pergunta" class="col-md-4 col-form-label text-md-right" id="color2">Pergunta:</label>
															<div class="col-md-6">
																	<input type="text" class="form-control" name="pr_pergunta" placeholder="Digite sua pergunta"  value="<?php echo set_value('pr_pergunta') ?>">
															</div>
													</div>
													<div class="form-group row">
															<label for="ds_pergunta" class="col-md-4 col-form-label text-md-right" id="color2">Descrição da Pergunta:</label>
															<div class="col-md-6">
																	<input type="text" class="form-control" name="ds_pergunta" placeholder="Digite sua descrição"  value="<?php echo set_value('ds_pergunta') ?>">
															</div>
													</div>
													<div class="form-group row">
																			<label for="us_codt" class="col-md-4 col-form-label text-md-right" id="color2">Tipo de Pergunta:</label>
																			<div class="col-md-6">
																				<select name="id_tipo">
																			<?php foreach ($tb_perguntatipo as $key =>$linha ):?>
																			<option value="<?=$linha->id_tipo?>"><?=$linha->ds_tipo?></option>
																			<?php endforeach ?>
																		</select>
																			</div>
																	</div>
																	<h4>Selecione as perguntas</h4>
																<table class="table table-hover" id="tabela">
																	<thead>
																			<tr>
																				<th scope="col">Selecionar Opção</th>
																				<th scope="col">Opção</th>
																			</tr>
																	</thead>
																	<tbody>
														<?php foreach ($opcao as $key => $linha ): ?>
															<?php if($linha->ds_opcao=='Dissertativa'){?>
																<input type="hidden" value="Dissertativa">
																	<?php }else{?>
															<tr>
																<td scope="row">
																	<input type="checkbox" value="<?= $linha->id_opcao?>" name="id_opcao[]"></td>
																	<td><?= $linha->ds_opcao ?></td>
														</tr>
														<?php }?>
														<?php endforeach; ?>
													</tbody>
													</table>
													<div class="col-md-6 offset-md-4">
													<button type="submit" class="btn btn-success" name="cadastrar" value="Cadastrar">
														Cadastrar
												</button>
											</div>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
</main>
