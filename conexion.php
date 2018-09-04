<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
$mysqli = new mysqli('localhost', 'root', '1234', 'ada');


if ($mysqli->connect_errno) {
  
    echo "Lo sentimos, este sitio web está experimentando problemas.";


    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
  
    exit;
}

// Realizar una consulta SQL
$sql="SELECT * FROM alumnos WHERE id = '".$q."'";

if (!$resultado = $mysqli->query($sql)) {
    // ¡Oh, no! La consulta falló. 
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    // cómo obtener información del error
    echo "Error: La ejecución de la consulta falló debido a: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

$result = mysqli_query($con,$sql);


echo "<table>
<tr>
<th>id</th>
<th>alumno</th>
<th>puntuacion</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['alumno'] . "</td>";
    echo "<td>" . $row['puntuacion'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);

?>

</body>
</html> 