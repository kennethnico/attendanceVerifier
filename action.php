<?php
//include('conn.php');
$server = "172.19.202.77";
$user = "registros";
$password = "R3g1xtr0s!";
//$password = "Pjcdmx@22!";
$dbName = "registros";
try {
    $conexion = new PDO("mysql:host=$server;dbname=$dbName", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión realizada satisfactoriamente";
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

function validaExistencia($canal,$email){
    $sql = "SELECT * FROM cicloConf22 WHERE email='".$email."'";
    $query = $canal->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "Encontrado";
        /*foreach ($results as $result) {
            echo "<tr><td>" . $result->id . "</td><td>" . $result->nombre . "</td><td>" . $result->email . "</td></tr>";
        }*/
    }
    else{
        echo "Sin existencias";
    }
}

validaExistencia($conexion,"krenicgm@gmailo.com");
?>