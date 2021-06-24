$(document).ready(function(){
	// hilangkan tombol cari
	$('#tombolCari').hide();

	// buat event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		// munculkan icon loading
		$('.loader').show();

		// ajax menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

		// $_GET()
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
			$('#container').html(data);
			$('.loader').hide();
		});
	});
});



