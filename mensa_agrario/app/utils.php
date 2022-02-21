<?php 

//funzione che effettua il "redirect"
function redirect($path){
	header("Location: $path");
}