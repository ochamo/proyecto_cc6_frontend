<?php


	// se valida si el campo es nulo
	function isNull($userEmail, $userPass, $clientName, $clientLastName, $clientDpi,$clientPhoneNumber){
		if(strlen(trim($userEmail)) < 1 || strlen(trim($userPass)) < 1 || strlen(trim($clientName)) < 1 || strlen(trim($clientLastName)) < 1 || strlen(trim($clientDpi)) < 1|| strlen(trim($clientPhoneNumber)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	//se valida si el email esta de formato correcto
	function isEmail($userEmail)
	{
		if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}


	
	//limite de elementos
	function minMax($min, $max, $valor){
		if(strlen(trim($valor)) < $min)
		{
			return true;
		}
		else if(strlen(trim($valor)) > $max)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	

	
	function generateToken()
	{
		//my_rand nos genera un valor dependiendo datetime,uniqid hace un identificador, md5 genera el token 
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	
	//nos hace el hash del password
	function hashPassword($password) 
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		return $hash;
	}
	
	//
	function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";

			// se recorre el array para mostrar todos los errores
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
	
	//recibe todos los parametros del registro
	function registraUsuario($usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO usuarios (usuario, password, nombre, correo, activacion, token, id_tipo) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('ssssisi', $usuario, $pass_hash, $nombre, $email, $activo, $token, $tipo_usuario);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarEspecie($especies){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO especies (especies) VALUES(?)");
		$stmt->bind_param('s', $especies);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarEspecialidad($especialidad){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO especialidad (especialidad) VALUES(?)");
		$stmt->bind_param('s', $especialidad);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarClinica($clinica){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO clinica(clinica) VALUES(?)");
		$stmt->bind_param('s', $clinica);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarPiso($piso){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO piso (piso) VALUES(?)");
		$stmt->bind_param('i', $piso);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarRaza($razas){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO razas (razas) VALUES(?)");
		$stmt->bind_param('s', $razas);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarDr($nombredr,$especialidad,$colegiado,$clinica,$piso){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO doctores (nombredr,especialidad,colegiado,clinica,piso) VALUES(?,?,?,?,?)");
		$stmt->bind_param('ssisi', $nombredr,$especialidad,$colegiado,$clinica,$piso);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarProducto($nombrep,$disponibilidad,$precio){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO productos (nombrep,disponibilidad,precio) VALUES(?,?,?)");
		$stmt->bind_param('sss', $nombrep,$disponibilidad,$precio);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registraMascota($mascota, $especie, $raza, $fecha, $user){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO mascotas (mascota, especie, raza, fecha, user) VALUES(?,?,?,?,?)");
		$stmt->bind_param('sssss', $mascota, $especie, $raza, $fecha, $user);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}

	function registrarConsulta($nombredr, $especialidad,$mascota,$user, $observaciones, $fecha, $nombrep){
		
		global $mysqli;
		
		//depende el tipo de valor vamos a colocarlo, si esta activo o el tipo usuario
		$stmt = $mysqli->prepare("INSERT INTO consulta (nombredr, especialidad, mascota, user, observaciones, fecha, nombrep) VALUES(?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssss', $nombredr, $especialidad, $mascota, $user,$observaciones, $fecha, $nombrep);
		
		if ($stmt->execute()){
			//nos regresa el id del registro
			return $mysqli->insert_id;
			} else {
			return 0;	
		}		
	}
	
	
	
	
	function validaIdToken($id, $token){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token = ? LIMIT 1");
		$stmt->bind_param("is", $id, $token);
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
		
		if($rows > 0) {
			$stmt->bind_result($activacion);
			$stmt->fetch();
			
			if($activacion == 1){
				$msg = "La cuenta ya se activo anteriormente.";
				} else {
				if(activarUsuario($id)){
					$msg = 'Cuenta activada.';
					} else {
					$msg = 'Error al Activar Cuenta';
				}
			}
			} else {
			$msg = 'No existe el registro para activar.';
		}
		return $msg;
	}
	
	function activarUsuario($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET activacion=1 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	}
	
	//verifica si el login es vacio o no
	function isNullLogin($userEmail, $userPassword){
		if(strlen(trim($userEmail)) < 1 || strlen(trim($userPassword)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	
	
	
	function lastSession($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET last_session=NOW(), token_password='', password_request=0 WHERE id = ?");
		$stmt->bind_param('s', $id);
		$stmt->execute();
		$stmt->close();
	}
	
	//verifica si el usuario es activado
	function isActivo($usuario)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE usuario = ? || correo = ? LIMIT 1");
		$stmt->bind_param('ss', $usuario, $usuario);
		$stmt->execute();
		$stmt->bind_result($activacion);
		$stmt->fetch();
		
		if ($activacion == 1)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}	
	
	function generaTokenPass($user_id)
	{
		global $mysqli;
		
		$token = generateToken();
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET token_password=?, password_request=1 WHERE id = ?");
		$stmt->bind_param('ss', $token, $user_id);
		$stmt->execute();
		$stmt->close();
		
		return $token;
	}
	
	function getValor($campo, $campoWhere, $valor)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT $campo FROM usuarios WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param('s', $valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else
		{
			return null;	
		}
	}
	
	function getPasswordRequest($id)
	{
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT password_request FROM usuarios WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->bind_result($_id);
		$stmt->fetch();
		
		if ($_id == 1)
		{
			return true;
		}
		else
		{
			return null;	
		}
	}
	
	function verificaTokenPass($user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT activacion FROM usuarios WHERE id = ? AND token_password = ? AND password_request = 1 LIMIT 1");
		$stmt->bind_param('is', $user_id, $token);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		
		if ($num > 0)
		{
			$stmt->bind_result($activacion);
			$stmt->fetch();
			if($activacion == 1)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}
		else
		{
			return false;	
		}
	}
	
	function cambiaPassword($password, $user_id, $token){
		
		global $mysqli;
		
		$stmt = $mysqli->prepare("UPDATE usuarios SET password = ?, token_password='', password_request=0 WHERE id = ? AND token_password = ?");
		$stmt->bind_param('sis', $password, $user_id, $token);
		
		if($stmt->execute()){
			return true;
			} else {
			return false;		
		}
	}		