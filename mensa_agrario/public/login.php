<?php 
require_once '../app/config.php';
require_once DB_LOC;
require MCRUD_LOC;
require_once SM_LOC;
require_once UTILS_LOC;
session_start();

//verifica utente già loggato
if(isLogged()){
	redirect('../private/privata.php');
}


$email = $_REQUEST['email'] ?? null;
$pwdChiara = $_REQUEST['password'] ?? null;
$btnOperazione = $_REQUEST['btnOperazione'] ?? null;

if(isset($btnOperazione)){
	$u = login($pdo, $email, $pwdChiara); //dati utente che si vuole loggare oppure FALSE
	//utente non esistente
	if ($u === FALSE){
		echo "utente non esistente";
	}else{
		//utente con quelle credenziali trovato
		$_SESSION['uid'] = $u['uid'];
		$_SESSION['scadenza'] = time() + 60*60;
		redirect('../private/privata.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Mensa I.I.S Antonio Della Lucia</title>

	<h1>Login</h1>
	<form method = "get">
		Email <input type = "email" name = "email"/> </br>
		Password <input type = "password" name = "password" id = "password" />
		<input type = "button" onClick = "mostraNascondi()" value = "Mostra/Nascondi"/>  </br>
		<button type = "submit" name = "btnOperazione">Accedi</button>
	</form>
	Non ti ricordi la password ? <a href = "recuperoPassword.php">Clicca qui</a>

</head>

<script>
	
	//funzione che mostra e nasconde la password 
	function mostraNascondi() {
        var input = document.getElementById('password');
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
      }
</script>
<body>

</body>
</html>