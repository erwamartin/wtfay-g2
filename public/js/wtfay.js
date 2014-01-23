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

$('input[name=name]').on('keyup', function(evt){
	evt.preventDefault();

	var $form = $(this).parent();
	$.ajax({
		url : $form.attr('action'), 
		method : $form.attr('method'), 
		data : $form.serialize()
	})
	.success(function(data){
		$('.users').html(data);
	})
});