<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="content/img/Nouvelle Vision Madagascar.ico	">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
	<link rel="stylesheet" href="<?= URL . "content/css/customized/base.css"; ?>">
	<link rel="stylesheet" href="<?= URL . "content/css/customized/".$customizedCSS.".css "; ?>">
	<link rel="stylesheet" href="<?= URL . "content/css/customized/card.css "; ?>">
	<link rel="stylesheet" href="<?= URL . "content/css/customized/bouton.css "; ?>">

	<meta name="description"
		content="<?php if(isset($MetaDescription)){echo $MetaDescription;} else {echo 'Agence Immobilier à Madagascar, Nouvelle vision Madagascar';} ?> ">
	<meta name="keywords"
		content="<?php if(isset($KeyWord)){echo $KeyWord;} else {echo 'Agence Immobilier à Madagascar, Nouvelle vision Madagascar';} ?> ">
	<title><?= $titre ?></title>
</head>

<body>
	<header>
		<div style="text-align:center!important;">
			<nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark w-75 fixed-top shadow-lg" data-aos="fade-down"
				data-aos-easing="linear">
				<div class="container">
					<a class="navbar-brand" href="<?= URL . "Promotion-Immobilière "; ?>"><img width="120" height="80"
							src="<?= URL . "content/img/NVM.png"; ?>" alt="Nouvelle Vision Madagascar" class="rounded-3"></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
						aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav d-flex col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
							<li><a href="#Accueil" class="nav-link px-4"> Accueil</a></li>
							<li><a href="#Qui-sommes-nous" class="nav-link px-4"> Qui sommes-nous?</a></li>
							<li><a href="#" class="nav-link px-4"> Nos services </a></li>
							<li><a href="#" class="nav-link px-4"> Nos atouts </a></li>
							<li><a href="#" class="nav-link px-4"> Map</a></li>
							<li><a href="#" class="nav-link px-4"> Contact</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>