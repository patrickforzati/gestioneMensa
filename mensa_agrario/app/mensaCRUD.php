<?php
function getUtente($pdo, $uid){
	$sql = <<<SQL
		select *
		from Utente
		where uid = :uid 
	SQL;
	//da ultimare	
}

//funzione che restituisce i dati di un utente in base a password ed email 
//se non c'è un utente corrispondente restituisce false
function login($pdo, $email, $pwdChiaro){
	$sql = <<<SQL
	select *
	from Utente
	where email = :email;
	SQL;

	$stmt=$pdo->prepare($sql);
	$stmt->execute([
   		'email'=>$email
	]);	
	$user=$stmt->fetch();
	if($user===false) {
   		return false;
	}
	$pwdHash = $user['pwd_hash'];
	$pwdValida = password_verify($pwdChiaro, $pwdHash);
	if($pwdValida === false){
		return false;
	}else{
		return $user;
	}
}

