$(document).ready(function(){
	$("#loginForm").bind("submit", function(){

		$.ajax({
			type:$(this).attr("method"),
			url:$(this).attr("action"),
			data:$(this).serialize(),
			contentType: "application/json; charset=utf-8",
			dataType: "text",
			success: function(response) {
				$("body").overhang({
						type: "success",
						message: "Iniciando sesion...",
						duration: 3,
						upper: true,
						callback: function(){
							window.location.href = "index.html";
						}
					});
				//var jsonData = JSON.parse(response);
				/*if (jsonData.success == "true") {
				}*/
			}
		});

		return false;

	});
});