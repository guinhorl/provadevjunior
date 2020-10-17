<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<!--<script src="assets/dist/js/bootstrap.bundle.js"></script>-->
<!--<script src="assets/dist/js/offcanvas.js"></script>-->
<script type="text/javascript">

	$('#addSelectTipo').change(function(e) {
		let opcaoSelecionada = this.querySelector('option:checked');

		//desabilita e esconde todos os inputs
		let inputs = $('#InputsDocumento input');
		inputs.attr('type', 'hidden');
		inputs.attr('disabled', '');

		//habilita e mostra o input relevante
		let inputEscolhido = inputs.filter('#'+ opcaoSelecionada.dataset.tipo);
		inputEscolhido.attr('type', 'text');
		if (opcaoSelecionada.dataset.tipo !== 'placeholder')
			inputEscolhido.removeAttr('disabled');
	});

</script>
</body>
</html>

