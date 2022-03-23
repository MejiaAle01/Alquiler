<?php
	session_start();

	session_destroy();

	echo 
		'<script>
			alert("Cerrando sesion...");
			window.location.href = "index.html"
		</script>'
	;
?>