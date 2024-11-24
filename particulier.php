<?php
if($_POST['identifiant']=="particulier"&&$_POST['password']=="particulier")
{
	require_once('particulier-content.php');
}
else{
	header('Location:/');
}