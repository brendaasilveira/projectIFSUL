</div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src=<?php echo base_url("dist/bootstrap/js/bootstrap.min.js") ?> integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  	<!-- Datatables -->
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="<?php echo base_url('dist/bootstrap/js/bootstrap.min.js') ?>"></script></body>
	  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
	  <script type="text/javascript">
		  $(document).ready( function () {
			  $('#tabela').DataTable({
				  language: {
	  "sEmptyTable": "Nenhum registro encontrado",
	  "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
	  "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
	  "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	  "sInfoPostFix": "",
	  "sInfoThousands": ".",
	  "sLengthMenu": "_MENU_ Resultados por página",
	  "sLoadingRecords": "Carregando...",
	  "sProcessing": "Processando...",
	  "sZeroRecords": "Nenhum registro encontrado",
	  "sSearch": "Pesquisar",
	  "oPaginate": {
		  "sNext": "Próximo",
		  "sPrevious": "Anterior",
		  "sFirst": "Primeiro",
		  "sLast": "Último"
	  },
	  "oAria": {
		  "sSortAscending": ": Ordenar colunas de forma ascendente",
		  "sSortDescending": ": Ordenar colunas de forma descendente"
		  }
	  }
			  });
		  } );
  </script>
	  
	  
  </html>