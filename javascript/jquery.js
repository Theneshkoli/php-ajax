$(document).ready(function(){
	$('button#jquery').click(function(){
		$('#simple_ajax').load('simple_html.txt', function(responseTxt, statusTxt, xhr){
		if(statusTxt == "success")
			alert("Error: " + xhr.status + ": " + xhr.statusText);
		if(statusTxt == "error")
			alert("Error: " + xhr.status + ": " + xhr.statusText);
		});
	});	
});