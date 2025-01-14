!function() {

	$('body').on('click', '[data-confirm]', function(event) {
		var elem = $(this);   
		var href = elem.attr('href');
		var mensagem = confirm("Deseja realmente ser excluir?");
		if (mensagem) {			
			window.location.href = href;
		} else {
			event.preventDefault();
		}
	});
	
	$('body').on('change', '[data-boolean]', function(event) {
		event.preventDefault();
		var elem = $(this);   
		var boolean = elem.data('boolean');
		var val = elem.is(':checked') ? 1 : 0;
		booleanArray = boolean.split('|');
		$.ajax({
			type: "POST",
			url: "../ajax/boolean.php",
			dataType: "html",
			data: "table=" + booleanArray[0]+"&boolean=" + booleanArray[1]+"&id=" + booleanArray[2]+"&val=" + val,
			error: function(data) {
				console.log('error: ' + data);
			},
			success: function(data) {
				console.log('success: ' + data);				
			}
		});
	});

	$('body').on('click', '[data-dia]', function(event) {
		event.preventDefault();
		var elem = $(this);

		var time = Date.now();

		var novo = '<div class="row data-'+time+'">';
		novo += '<div class="col-auto mb-2">';
		novo += '<input name="dia[]" class="form-control" type="datetime-local" value="" required>';
		novo += '</div>';
		novo += '<div class="col-auto mb-2">';
		novo += '<input name="ate[]" class="form-control" type="datetime-local" value="" required>';
		novo += '</div>';
		novo += '<div class="col-2 mb-2">';
		novo += '<input name="lotacao[]" class="form-control" type="number" value="" required>';
		novo += '</div>';
		novo += '<div class="col-auto">';
		novo += '<a href="" data-minus=".data-'+time+'" class="btn btn-icon btn-outline-danger"><span class="bx bx-minus"></span></a>';
		novo += '</div>';
		novo += '</div>';
		$('.content-dias').append(novo);		
	});
	
	$('body').on('click', '[data-minus]', function(event) {
		event.preventDefault();
		var elem = $(this).data('minus');
		$(elem).remove();
	});


	document.addEventListener('DOMContentLoaded', function () {
            // Seleciona todos os textareas com a classe 'ckeditor'
		var textareas = document.querySelectorAll('.ckeditor');

            // Itera sobre cada textarea e inicializa o CKEditor
		textareas.forEach(function (textarea) {
			ClassicEditor
			.create(textarea, {
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'|',
						'bulletedList',
						'numberedList',
						]
				},

			})
			.catch(error => {
				console.error(error);
			});
		});
	});



}();