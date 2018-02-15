
<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['username']) and 
			isset($_POST['email']) and 
				isset($_POST['password']))
		{
		//operate the data further 

		$db = new DbOperations(); 

		$result = $db->createUser( 	$_POST['username'],
									$_POST['password'],
									$_POST['email']
								);
		if($result == 1){
			$response['error'] = false; 
			$response['message'] = "Usuario registrado correctamente";
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = "Ocurrio un error intente de nuevo";			
		}elseif($result == 0){
			$response['error'] = true; 
			$response['message'] = "El email y el usuario ya estan registrados intente con uno nuevo";						
		}

	}else{
		$response['error'] = true; 
		$response['message'] = "Requiere rellenar todos los campos";
	}
}else{
	$response['error'] = true; 
	$response['message'] = "Peticion invalida";
}

echo json_encode($response);
