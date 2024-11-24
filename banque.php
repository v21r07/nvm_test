<?php
if($_POST['identifiant']=="banque"&&$_POST['password']=="banque")
{
	require_once('banque-content.php');
}
else{
	header('Location:/');
}