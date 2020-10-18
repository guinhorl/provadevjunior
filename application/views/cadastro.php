<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<div class="h3" style="text-align: center;">
			<p>Cadastrar Pessoa</p>
		</div>
	<form id="FormCadastro" name="FormCadastro" method="post" action="<?php echo base_url('Pessoa/cadastrarPessoa')?>" class="form form-contact">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" required>
		</div>
		<div class="form-group">
			<label for="sobreNome">Sobrenome</label>
			<input type="text" class="form-control" id="sobreNome" name="sobreNome" required>
		</div>

		<button type="submit" class="btn btn-success">Salvar</button>
		<a href="<?= base_url('welcome') ?>" type="reset" class="btn btn-warning">Cancelar</a>
	</form>
	</div>
</div>
