<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<div class="h3" style="text-align: center;">
			<p>Adicionar Contato</p>
		</div>
		<div class="form-group">
			<br>
			<?php if ($pessoa) { ?>
				<h4><?= $pessoa->nome . ' ' . $pessoa->sobrenome ?></h4>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<!--Abrir um modal para cadastrar mais contato nessa pessoa-->
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addContato">&#x2795; Contato</button>

		<div class="h3" style="text-align: center;">
			<p>Contatos</p>
		</div>
		<?php echo $this->session->flashdata('mensCadastroContato') ?>
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Tipo</th>
				<th scope="col">Contato</th>
				<th scope="col" class="botaoList">Ação</th>
			</tr>
			</thead>
			<tbody>
			<?php if ($cont_pess) {
				foreach ($cont_pess as $cp) { ?>
					<tr>
						<td><?= $cp['tipo'] ?></td>
						<td><?= $cp['contato'] ?></td>
						<td>
							<div class="botaoList">
								<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarContato">
									Editar
								</button>
								<a href="<?= base_url('') ?>" class="btn btn-danger  btn-sm">Excluir</a>
							</div>
						</td>
					</tr>
				<?php }
			} else { ?>
				<tr>
					<td>Nenhum Tipo cadastrado</td>
					<td>Nenhum Contato</td>
					<td>
						<div class="botaoList">
							<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarContato">
								Editar
							</button>
							<a href="#" class="btn btn-danger  btn-sm">Excluir</a>
						</div>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
	<!--Modal editar contato-->
	<div class="modal" tabindex="-1" role="dialog" id="editarContato">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editar Contato</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form>
					<div class="modal-body">
						<div class="form-group ">
							<label for="selectTipo">Tipo</label>
							<select class="form-control form-control-sm" id="edtSelectTipo">
								<?php if ($tipoCont) {
									foreach ($tipoCont as $tipo) { ?>
										<option value="<?= $tipo->id ?>"><?= $tipo->tipo ?></option>
									<?php }
								} ?>
							</select>
						</div>
						<div class="form-group">
							<label for="tipoContato">Contato</label>
							<input type="text" class="form-control" id="tipoContato">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Salvar</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--Modal adicionar Contato-->
	<div class="modal" tabindex="-1" role="dialog" id="addContato">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Adicionar Contato</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="FormContato" name="FormContato" method="post" action="<?php echo base_url('Contato/newContato')?>" class="form form-contact">
					<div class="modal-body">
						<div class="form-group ">
							<input type="hidden" class="form-control" id="pessoaId" name="pessoaId" value="<?= $pessoa->id ?>" >

							<div class="form-group ">
								<label for="selectTipo">Tipo</label>
								<select class="form-control form-control-sm" id="addSelectTipo" name="addSelectTipo">
									<?php if ($tipoCont) { ?>
										<option data-tipo="placeholder">Selecione um tipo</option>
										<?php	foreach ($tipoCont as $tipo) { ?>
											<option data-tipo="<?= $tipo->tipo ?>" value="<?= $tipo->id ?>"><?= $tipo->tipo ?></option>
										<?php }
									} ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<span id="InputsDocumento">
							<label for="">Contato</label>
							<input type="email" class="form-control" id="Email" name="Email" placeholder="Email" disabled>
							<input type="hidden" class="form-control" id="Celular" name="Celular" maxlength="14" placeholder="(00)90000-0000" disabled pattern="\(\d{2}\)\d{5}-\d{4}">
							<input type="hidden" class="form-control" id="Telefone" name="Telefone" maxlength="13" placeholder="(00)0000-0000" disabled pattern="\(\d{2}\)\d{4}-\d{4}">
							</span>
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Salvar</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



