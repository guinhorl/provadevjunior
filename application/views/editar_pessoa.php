<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<div class="h3" style="text-align: center;">
			<p>Editar Pessoa</p>
		</div>
		<form id="editarPessoa" name="editarPessoa" method="post" action="<?php echo base_url('Pessoa/editarPessoa/'. $pessoa->id)?>" class="form form-contact">
			<div class="form-group">
				<label for="aditarNome">Nome</label>
				<input type="text" class="form-control" value="<?=$pessoa->nome?>" id="aditarNome" name="aditarNome">
			</div>
			<div class="form-group">
				<label for="editarSobreNome">Sobrenome</label>
				<input type="text" class="form-control" value="<?=$pessoa->sobrenome?>" id="editarSobreNome" name="editarSobreNome">
			</div>

			<button type="submit" class="btn btn-success">Salvar</button>
			<a href="<?= base_url('welcome') ?>" type="reset" class="btn btn-warning">Cancelar</a>
		</form>
	</div>
</div>
