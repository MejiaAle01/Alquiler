<?php
	
	ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php
		// Conexion a la BD
		$conn = mysqli_connect("localhost", "root", "", "alquiler") or die('Error al conectar a la BD');

		// Creamos una consulta a la BD
		$cons = "SELECT * FROM alquiler INNER JOIN motoristas ON motoristas.ID_MOT = alquiler.MOT_ID";

		//Ejecutamos la conexion y la consulta
		$res = mysqli_query($conn, $cons);

	?>

	<h3> Reportes de reservas </h3>
	<table>
		<thead>
			<tr>
				<th> # </th>
				<th> Marca </th>
				<th> Nombre </th>
				<th> Cantidad </th>
				<th> Teléfono </th>
				<th> Tipo carro </th>
				<th> Residencia </th>
				<th> Retiro </th>
				<th> Devolución </th>
				<th> # Motorista </th>
				<th> Nombre motorista </th>
			</tr>
		</thead>
		<tbody>
			<?php
				//Iniciamos un contador para ver el total de datos
				$i = 0;
				//Iniciamos la condicion while que obtendra todos los datos de a BD
				while ($fila = mysqli_fetch_assoc($res)) {
					$idAlq = $fila['ID'];
					$markAlq = $fila['Marca'];
					$nameAlq = $fila['Fullname'];
					$cantcarAlq = $fila['CantCar'];
					$telAlq = $fila['Tel'];
					$tcarAlq = $fila['TipoCar'];
					$resAlq = $fila['Residencia'];
					$f_retiroAlq = $fila['Fecha_ret'];
					$f_devAlq = $fila['Fecha_dev'];
					$idAlqMot = $fila['ID_MOT'];
					$nameAlqMot = $fila['Nombre_mot'];

					//Sumamos todo los datos obtenidos
				$i++;
			?>
			<tr>
				<!-- Mostramos los resultados obtenidos de la BD en la tabla -->
				<td><?php echo $idAlq; ?></td>
				<td><?php echo $markAlq; ?></td>
				<td><?php echo $nameAlq; ?></td>
				<td><?php echo $cantcarAlq; ?></td>
				<td><?php echo $telAlq; ?></td>
				<td><?php echo $tcarAlq; ?></td>
				<td><?php echo $resAlq; ?></td>
				<td><?php echo $f_retiroAlq; ?></td>
				<td><?php echo $f_devAlq; ?></td>
				<td><?php echo $idAlqMot; ?></td>
				<td><?php echo $nameAlqMot; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<style>
		* {
			box-sizing: border-box;
		}

		table {
			border: 1px solid black;
			border-collapse: collapse;
			border-width: 0 1px;
			text-indent: initial;
			border-spacing: 2px;
			display: table;
			line-height: 1.5;
			width: 100%;
		}

		thead {
			display: table-header-group;
		}

		tbody {
			border: 1px solid black;
		}

		tr {
			border: 1px solid black;
			padding: 0.5rem 0.5rem;
			display: table-row;
		}

		th {
			border: 1px solid black;
			font-size: 12px;
			padding: 0.5rem 0.5rem;
			font-weight: bold;
			text-align: center;
			display: table-cell;
			vertical-align: inherit;
		}

		td {
			border: 1px solid black;
			font-size: 12px;
			padding: 0.5rem 0.5rem;
			text-align: justify;
		}
	</style>
</body>
</html>

<?php	
	$html = ob_get_clean();
	//echo $html;

	require_once '../../libreria/dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	//use Dompdf\Options;
	$dompdf = new Dompdf();

	/*Probando bordes
	$options = $dompdf->getOptions();
	$options->set(array('isRemoteEnabled' => true));
	$dompdf->setOptions($options);*/

	//Prueba de DOMPDF
	$dompdf->loadHtml($html);

	$dompdf->setPaper('letter');
	$dompdf->render();
	$dompdf->stream("reportes.pdf", array("Attachment" => false));

?>