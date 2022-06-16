<?php session_start();
require_once("controleur/config_bdd.php");
require_once("controleur/controleur.class.php");

$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gestion des vaccins</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: #e3f2fd;">

<?php 
	if (!isset($_SESSION['email'])) {
		require_once("vue/vue_connexion.php");
	}

	if (isset($_POST['Connexion'])) {
		$email = $_POST['email'];
		$mdp = sha1($_POST['mdp']);
		$where = array("email"=>$email, "mdp"=>$mdp);
		$unControleur->setTable("personnes");
		$unUser = $unControleur->selectWhere($where);
		if (isset($unUser['email'])) {
			$_SESSION['email'] = $unUser['email'];
			$_SESSION['nom'] = $unUser['nom'];
			$_SESSION['prenom'] = $unUser['prenom'];
			$_SESSION['role'] = $unUser['role'];
			header('Location: /vaccins/');
		}
	}

	if (isset($_SESSION['email'])) {
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<div class="container-fluid">
    	<a class="navbar-brand" href="/vaccins/">Vaccins</a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
      		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        		<li class="nav-item">
          			<a class="nav-link active me-2" aria-current="page" href="index.php?page=0">
          				<img src="images/home.png" width="52" height="42">
          			</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link active me-2" aria-current="page" href="index.php?page=1">
          				<img src="images/type.jpg" width="50" height="50">
          			</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link active me-2" aria-current="page" href="index.php?page=2">
          				<img src="images/centres.png" width="50" height="50">
          			</a>
        		</li>
        		<li class="nav-item">
          			<a class="nav-link active" aria-current="page" href="index.php?page=3">
          				<img src="images/vaccin.png" width="50" height="45">
          			</a>
        		</li>
        		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
        		<li class="nav-item">
          			<a class="nav-link active" aria-current="page" href="index.php?page=4">
          				<img src="images/personnes.png" width="50" height="50">
          			</a>
        		</li>
        		<?php } ?>
      		</ul>
      		<div class="badge bg-primary me-3">
      			<?= $_SESSION['email']; ?>
      		</div>
      		<a href="index.php?page=5" class="btn btn-danger">Déconnexion</a>
    	</div>
  	</div>
</nav>

<div class="container mt-4 mb-3">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<div class="card bg-success text-light">
				<div class="card-header">
					<h2 class="text-center">
						Bienvenue <?= $_SESSION['prenom']; ?> <?= $_SESSION['nom']; ?> !
					</h2>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<?php
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 0;
				}

				switch ($page) {
					case 0 : require_once("home.php"); break;
					case 1 : require_once("gestion_types.php"); break;
					case 2 : require_once("gestion_centres.php"); break;
					case 3 : require_once("gestion_vaccins.php"); break;
					case 4 : require_once("gestion_personnes.php"); break;
					case 5 : 
						unset($_SESSION);
						session_destroy();
						header('Location: /vaccins/');
						break;
				}
			?>
		</div>
	</div>
</div>

<?php } ?>

<div class="card text-center mt-4">
	<div class="card-header">
	    Tom - Mehdi - Jean-Pierre
	</div>
  	<div class="card-body">
    	<h5 class="card-title">Site de gestion de vaccins</h5>
  	</div>
  	<div class="card-footer text-muted">
  		Copyright &copy; 2021. Tout droits réservés. Toutes reproductions interdites.
  	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>