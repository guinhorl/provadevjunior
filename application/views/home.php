<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<main role="main" class="container">
	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-azul rounded shadow-sm">
		<img class="mr-3" src="assets/brand/icon-agenda.png" alt="" width="48" height="48">
		<div class="lh-100">
			<h6 class="mb-0 text-white lh-100">Lista dos Contatos</h6>
			<small>2020</small>
		</div>
		<a class="nav-link btn btn-danger btn-md d-none d-sm-block" style="margin-left: auto;"
		   href="<?= base_url('cadastro') ?>">Cadastrar <span class="sr-only">(current)</span></a>
	</div>

	<div class="my-3 p-3 bg-white rounded shadow-sm">
		<?php echo $this->session->flashdata('mensagemCadastro') ?>
		<?php echo $this->session->flashdata('mensagemEditar') ?>
		<?php echo $this->session->flashdata('mensagemDelete') ?>
		<h6 class="border-bottom border-gray pb-2 mb-0">Cadastrados</h6>
		<div style="text-align: center;">
			<?= $this->pagination->create_links() ?>
		</div>
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col">Nome Completo</th>
				<th scope="col" class="botaoList">Ação</th>
			</tr>
			</thead>
			<tbody>
			<?php if ($pessoas) {
			foreach ($pessoas as $pessoa) { ?>
			<tr>
				<td><?= $pessoa->nome ." ". $pessoa->sobrenome ?></td>
				<td>
					<div class="botaoList">
						<a href="<?= base_url('contato/verContato/' . $pessoa->id) ?>" class="btn btn-primary btn-sm">&#x2795; Contato</a>
						<a href="<?= base_url('welcome/pessoaView/' . $pessoa->id) ?>" class="btn btn-success btn-sm">Visualizar</a>
						<a href="<?= base_url('welcome/editarPessoa/' . $pessoa->id) ?>" class="btn btn-warning btn-sm">Editar</a>
						<a href="<?= base_url('Pessoa/deletarPessoa/' . $pessoa->id) ?>" class="btn btn-danger  btn-sm">Excluir</a>
					</div>
				</td>
			</tr>
			<?php }
			} else { ?>
			<tr>
				<td>Nenhuma pessoa cadastrada!</td>
				<td>
					<div class="botaoList">
						<a href="<?= base_url() ?>" class="btn btn-primary btn-sm">&#x2795; Contato</a>
						<a href="<?= base_url() ?>" class="btn btn-success btn-sm">Visualizar</a>
						<a href="<?= base_url() ?>" class="btn btn-warning btn-sm">Editar</a>
						<a href="<?= base_url() ?>" class="btn btn-danger  btn-sm">Excluir</a>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</main>




