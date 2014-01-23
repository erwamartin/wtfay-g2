$('.index a').on('click', function(evt){
	evt.preventDefault();
	$.ajax({
		url : $(this).attr('href')
	})
	.success(function(data){
		$('.users').html(data);
	})
});

$('body').on('click', '.users a', function(evt){
	evt.preventDefault();
	$.ajax({
		url : $(this).attr('href')
	})
	.success(function(data){
		$('section+section').html(data);
	})
});