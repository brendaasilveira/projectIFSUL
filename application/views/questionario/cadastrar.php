<nav class="navbar navbar-expand-lg navbar-light navbar-laravel" style="background-color: #228B22; border-color: #228B22;">
  	<div class="container">
  		<a class="navbar-brand" id="color">Sistema de Questionários IFSUL</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  					<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
  					<ul class="navbar-nav ml-auto">
  							<li class="nav-item">
  									<a class="nav-link" href="<?php echo base_url('questionario/index')?>" id="color">Voltar</a>
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
                      <div class="card-header" style="background-color: #228B22; border-color:#228B22"> Cadastrar Questionários</div>
                      	<div class="card-body">
                          <form action="<?php echo base_url('questionario/cadastrar')?>" method="POST">
  													<div id="color2"><?php echo validation_errors('<p>','</p>'); ?></div>
  														<?php if($this->session->flashdata('msg')): ?>
  														<?php $alert = $this->session->flashdata('msg')['alert'];?>
  														<?php $mensagem = $this->session->flashdata('msg')['mensagem'];?>
  														<div class="alert alert-<?php echo($alert);?> alert-dismissible fade show" role="alert">
  														<strong><?php echo($mensagem); ?></strong>
  														</div>
  													<?php endif; ?>
                            <div class="form-group row">
                                <label for="nm_questionario" class="col-md-4 col-form-label text-md-right" id="color2">Nome do questionário:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nm_questionario" placeholder="Digite o nome do questionário"  value="<?php echo set_value('nm_questionario') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dt_datai" class="col-md-4 col-form-label text-md-right" id="color2">Data de Início do Questionário:</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="dt_datai" placeholder=""  value="<?php echo set_value('dt_datai') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dt_fim" class="col-md-4 col-form-label text-md-right" id="color2">Data de Fim:</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="dt_fim" placeholder=""  value="<?php echo set_value('dt_fim') ?>">
                                </div>
                            </div>
                            <h4>Selecione as perguntas</h4>
                            <table class="table table-hover" id="tabela">
                            	  <thead>
                            		    <tr>
                            			     <th scope="col">Selecionar Pergunta</th>
                            			     <th scope="col">Pergunta</th>
                            				 <th scope="col">Descrição</th>
											<th scope="col">Tipo de resposta</th>
                            		    </tr>
                            	  </thead>
                            	  <tbody>
										  <?php
										  foreach ($perguntas as $key => $linha ):
											?>
												<tr>
													<td scope="row">
													 	<input type="checkbox" value="<?= $linha['id_pergunta'] ?>" name="id_pergunta<?= $linha['id_pergunta'] ?>"></td>
														<td><?= $linha['pr_pergunta']?></td>
														<td><?= $linha['ds_pergunta'] ?></td>
														<?php
														$resposta="";?>
											<input type="hidden" value="$tipo->id_tipo" name="id_tipo"></input>
										  	<?php foreach ($linha['opcoes'] as $key2 => $linha2 ):?>
														<?php
															$resposta .= $linha2->ds_opcao . ', '?>
                              <input type="hidden" value="<?= $linha2->id_opcao ?>" name="id_opcao_<?= $linha2->id_opcao?>">
														<?php endforeach; ?>
														<td><?= $resposta?></td>
													</td>
									   			</tr>

                                        <?php endforeach; ?>
                                      </tbody>
                                  </table>
                          	<div class="form-group">
                          	  <div class="col-md-4">
                          	    <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success"/>
                          	  </div>
                          	</div>
                          </form>
