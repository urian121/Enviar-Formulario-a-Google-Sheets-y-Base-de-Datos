<?php
if(($_SERVER["REQUEST_METHOD"] =="POST")){
    $jsondata = array();

    //Estableciendo conexion con el Servidor
    $usuario  = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "landingkit";
    $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
    $db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
    

    //Recibiendo la Data del Formulario
    date_default_timezone_set("America/Bogota");
    $dateCreate     = date('d-m-Y H:i:s A', time());
	$Nombre 		= $_REQUEST['Nombre'];
	$Correo         = $_REQUEST['Correo'];
	$Movil  	    = $_REQUEST['Movil'];
	
    $queryInsertFormGoogleSheets  = ("INSERT INTO demo(Nombre,Correo,Movil) 
        VALUES ('$Nombre','$Correo','$Movil')");
    $resultInsert = mysqli_query($con, $queryInsertFormGoogleSheets);
    
    if($resultInsert !=0){
        $jsondata['msj'] = true;
    }else{
        $jsondata['msj'] = false;
    }

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();

}
	
?>