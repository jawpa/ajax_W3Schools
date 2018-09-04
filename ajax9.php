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

// obtiene el valor entero de una variable
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','1234','ada');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}


$sql="SELECT * FROM alumnos WHERE idAlumno = '".$q."'";


$result = mysqli_query($con,$sql);



echo "<table>
<tr>
<th>id</th>
<th>alumno</th>
<th>puntuacion</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['idAlumno'] . "</td>";
    echo "<td>" . $row['alumno'] . "</td>";
    echo "<td>" . $row['puntuacion'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 