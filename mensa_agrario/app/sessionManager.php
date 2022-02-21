<?php

//funzione che verifica se un utente sia loggato in base al contenuto dell'array session
function isLogged(){
	if(isset($_SESSION['uid'])){
		if(time() < ($_SESSION['scadenza'] ?? 0)){
			return true;
		}
	}
	return false;
}

//funzione che aggiunge all'array $_SESSION l'UID e la SCADENZA attuali
function saveLogin(){

}