<?php

 require "../config/Conexion.php";


Class Bluemedic
 {
  public function _construct(){
  }
 //#############VALIDAR USUARIO#############################
  public function validarUsuario($usuario, $temporalclave){
  $sql= " SELECT * FROM `usuarios` WHERE usuario='$usuario' and temporalclave='$temporalclave' and estado='1'";
/*   die( $sql);  */
  return ejecutarConsulta($sql);
  }   
  
}
 
?>