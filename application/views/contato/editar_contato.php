<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container">
	<div class="col-md-6 form-alig align-items-center p-3 my-3 shadow-sm">
		<div class="h3" style="text-align: center;">
			<p>Editar Contato</p>
		</div>
		<div class="h5" style="text-align: center;">
			<p><?= $pessoa->nome . ' ' . $pessoa->sobrenome ?></p>
			<hr/>
		</div>
		<form id="editContato" name="editContato" method="post"
			  action="<?php echo base_url('Contato/editarContato/' . $dataContato->id_c_p) ?>"
			  class="form form-contact">
			<?php $tipo = $dataContato->contato_id ?>
			<?php switch ($tipo) {
				case 1 : ?>
					<div class="form-group">
						<label for="InputEmail">Contato</label>
						<input type="email" class="form-control" id="editContato" name="editContato"
							   value="<?= $dataContato->contato ?>">
					</div>
					<?php break; ?>
				<?php case 2 : ?>
					<div class="form-group">
						<label for="InputEmail">Contato</label>
						<input type="tel" class="form-control" id="editContato" name="editContato"
							   value="<?= $dataContato->contato ?>" maxlength="14" placeholder="(00)90000-0000" pattern="\(\d{2}\)\d{5}-\d{4}">
					</div>
					<?php break; ?>
				<?php case 3 : ?>
					<div class="form-group">
						<label for="InputEmail">Contato</label>
						<input type="tel" class="form-control" id="editContato" name="editContato"
							   value="<?= $dataContato->contato ?>" maxlength="13" placeholder="(00)0000-0000" pattern="\(\d{2}\)\d{4}-\d{4}">
					</div>
					<?php break;
				default:
			} ?>
			<div>
				<button type="submit" class="btn btn-success btn-sm">Enviar</button>
				<a href="<?= base_url('Contato/verContato/' . $pessoa->id) ?>" class="btn btn-outline-secondary btn-sm">&#x3C;&#x3C;
					Voltar</a>
			</div>
		</form>
	</div>
</div>
