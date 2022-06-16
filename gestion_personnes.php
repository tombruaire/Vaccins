<h2 class="text-center mb-3">Gestion des personnes</h2>

<?php 

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

	$laPersonne = null;

	$unControleur->setTable("personnes");

	if (isset($_GET['action']) and isset($_GET['idPersonne'])) {
		$idPersonne = $_GET['idPersonne'];
		$action = $_GET['action'];
		switch ($action) {
			case 'sup': 
				$where = array("idPersonne"=>$idPersonne);
				$unControleur->delete($where);
				break;
			case 'edit': 
				$where = array("idPersonne"=>$idPersonne);
				$laPersonne = $unControleur->selectWhere($where);
				break;
		}
	}

	require_once("vue/vue_insert_personne.php");

	if (isset($_POST['Modifier'])) {
		$tab = array(
			"nom"=>$_POST['nom'],
			"prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'],
			"mdp"=>$_POST['mdp']
		);
		$where = array("idPersonne"=>$_GET['idPersonne']);
		$unControleur->update($tab, $where);
		echo '<script language="javascript">document.location.replace("index.php?page=4");</script>';
	}

	if (isset($_POST['Valider'])) {
		$tab = array(
			"nom"=>$_POST['nom'],
			"prenom"=>$_POST['prenom'],
			"email"=>$_POST['email'],
			"mdp"=>$_POST['mdp']
		);
		$unControleur->insert($tab);
	}

}

$unControleur->setTable("personnes");

if (isset($_POST['Rechercher'])) {
	$mot = $_POST['mot'];
	$tab = array("nom", "prenom", "email");
	$lesPersonnes = $unControleur->selectSearch($mot, $tab);
} else {
	$lesPersonnes = $unControleur->selectAll();
}

require_once("vue/vue_les_personnes.php");

?>