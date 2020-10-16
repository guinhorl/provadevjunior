<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<div class="h3" style="text-align: center;">
			<p>Visualizar Pessoa</p>
		</div>
		<div class="form-group">
			<?php if ($pessoa) { ?>

			<label for="nome">Nome</label>
			<input type="text" class="form-control" value="<?= $pessoa->nome ?>" disabled="true">

		</div>
		<div class="form-group">
			<label for="sobreNome">Sobrenome</label>
			<input type="text" class="form-control" value="<?= $pessoa->sobrenome ?>"disabled="true">
		</div>
		<?php 	} ?>
	</div>
</div>

<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<div>
			<!--Abrir um modal para cadastrar mais contato nessa pessoa-->
			<a href="<?= base_url('') ?>" class="btn btn-primary btn-sm">&#x2795; Contato</a>
		</div>
		<div class="h3" style="text-align: center;">
			<p>Contatos</p>
		</div>

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
					<td><?= $cp['tipo']?></td>
					<td><?= $cp['contato']?></td>
				<td>
					<div class="botaoList">
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarContato">Editar
						</button>
						<a href="<?= base_url('') ?>" class="btn btn-danger  btn-sm">Excluir</a>
					</div>
				</td>
			</tr>
			<?php }
			} else { ?>
				<tr>
					<td></td>
					<td></td>
					<td>
						<div class="botaoList">
							<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="">Editar
							</button>
							<a href="#" class="btn btn-danger  btn-sm">Excluir</a>
						</div>
					</td>
				</tr>
			<?php } ?>

			</tbody>
		</table>

	</div>
</div>
<!--Modal editar contato-->
<div class="modal" tabindex="-1" role="dialog" id="editarContato" tabindex="-1">
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
						<select class="form-control form-control-sm" id="selectTipo">
							<option>E-mail</option>
							<option>Telefone</option>
							<option>Outros</option>
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
