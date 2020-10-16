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
			<h4>Wagner Ramos Lima</h4>
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

		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Tipo</th>
				<th scope="col">Contato</th>
				<th scope="col" class="botaoList">Ação</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>E-mail</td>
				<td>wagnerramo@yahoo.com</td>
				<td>
					<div class="botaoList">
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarContato">Editar
						</button>
						<a href="<?= base_url('') ?>" class="btn btn-danger  btn-sm">Excluir</a>
					</div>
				</td>
			</tr>
			<tr>
				<td>Telefone</td>
				<td>3246-3636</td>
				<td>
					<div class="botaoList">
						<a href="<?= base_url('') ?>" class="btn btn-warning btn-sm">Editar</a>
						<a href="<?= base_url('') ?>" class="btn btn-danger  btn-sm">Excluir</a>
					</div>
				</td>
			</tr>
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

<!--Modal adicionar Contato-->
<div class="modal" tabindex="-1" role="dialog" id="addContato" tabindex="-1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Adicionar Contato</h5>
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

