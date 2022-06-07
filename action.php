<?php
$server = "172.19.202.77";
$user = "registros";
$password = "R3g1xtr0s!";
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
        return false;
    }
    else{
        return true;
    }
}
function insertaValor($conn,$nom,$mail){
    if(validaExistencia($conn,$mail)){
        ////////////// Insertar a la tabla la información generada /////////
        $sql="insert into cicloConf22(nombre, email) values(:nombre,:email)";
        $sql = $conn->prepare($sql);
        $sql->bindParam(':nombre', $nom);
        $sql->bindParam(':email', $mail);
        $sql->execute();
        echo "Registro exitoso.";
    }else{
        echo "El email ya se encuentra en la DB.";
    }
}

insertaValor($conexion,"Edwin Nicolas","email@xyz.com");
/**
if(isset($_POST['enviar'])){
    $nombreU = $_POST['nombre'];
    $emailU = $_POST['email'];
    if(validaExistencia($conexion,$emailU)){
        ////////////// Insertar a la tabla la información generada /////////
        $sql="insert into cicloConf22(nombre, email) values(:nombres,:email)";
        $sql = $conexion->prepare($sql);
        $sql->bindParam(':nombre', $nombreU);
        $sql->bindParam(':email', $emailU);
        $sql->execute();
    }else{
        echo "El email ya se encuentra en la DB";
    }
}else{
    echo "Error en el isset";
}
*/
?>