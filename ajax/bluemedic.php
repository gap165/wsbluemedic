<?php 
    header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
	header('Content-Type: application/json');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	
	require_once "../modelos/Bluemedic.php";
	$bluemedic=new Bluemedic();
	
	switch ($_GET["op"]){

	//variable input guarda todo lo que trae de ionic	
            
	case 'validarUsuario':
		$obj = json_decode(file_get_contents('php://input'));
			$rspta=$bluemedic->validarUsuario($obj->usuario,$obj->temporalclave);
			while($reg=$rspta->fetch_object()){
			   $resp[]=$reg;
			}
			if(empty($resp)){
				$reeturn=array("status"=>"error",
								"mensaje"=>'Error');
					echo json_encode($reeturn);
			}else{
				$reeturn=array("status"=>'Ok',
								"usuarioBM"=>$resp,
								"mensaje"=>"Datos correctos");
				echo json_encode($reeturn);
			}
	break;

	case 'ping':

		$return=array(
			'status'=>"Correcto",
			'message'=>"Existe Conexion"
		);

		echo json_encode($return);

	break;
	}	
?>