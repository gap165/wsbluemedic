<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
$op = $_POST['op'];
if (!isset($op))    {
    echo json_encode("No se definió  la variable op");
    exit;
}

include 'db/db.php';

$db = new db();
    switch ($op)
    {

        case 'login':
            $usuario = $_POST['usuario'];
            $temporalclave = $_POST['temporalclave'];
            $sql= " SELECT * FROM usuarios WHERE usuario=? and temporalclave=? and estado='1'";
            $select = $db->query($sql, $usuario, $temporalclave)->fetchArray(); 
                   
            echo json_encode($select);
        break;

        case 'ping':

            $return=array(
                'status'=>"Correcto",
                'message'=>"Existe Conexion"
            );
    
            echo json_encode($return);
        break;
        

        default:
        echo json_encode("Error no existe la opcion " . $op);
    }
?>