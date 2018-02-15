
<?php 

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['id']) and 
			isset($_POST['lat']) and 
				isset($_POST['log']))
		{
		//operate the data further 

		$db = new DbOperations(); 

		$result = $db->createLoc( 	$_POST['id'],
									$_POST['lat'],
									$_POST['log']
								);
		if($result == 1){
			$response['error'] = false; 
			$response['message'] = "Usuario registrado correctamente";
            
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = "Ocurrio un error intente de nuevo";			
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