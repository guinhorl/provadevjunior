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
			<a href="<?= base_url('') ?>" class="btn btn-outline-secondary btn-sm">&#x3C;&#x3C; Voltar</a>
			<a href="<?= base_url('contato/verContato/' . $pessoa->id) ?>" class="btn btn-primary btn-sm">&#x2795; Contato</a>
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
						<a href="<?= base_url('Contato/editar/' . $cp['id_c_p'] ) ?>" class="btn btn-warning btn-sm" >
							Editar
						</a>
						<a href="<?= base_url('Contato/excluirContato/' . $cp['id_c_p'] .'/'.$cp['pessoa_id']) ?>" class="btn btn-danger  btn-sm">Excluir</a>
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


