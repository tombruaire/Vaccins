<h2 class="text-center mb-3">Gestion des vaccins</h2>

<?php 

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

	$leVaccin = null;

	$unControleur->setTable("vVaccins");

	if (isset($_GET['action']) and isset($_GET['idVaccin'])) {
		$idVaccin = $_GET['idVaccin'];
		$action = $_GET['action'];
		switch ($action) {
			case 'sup': 
				$where = array("idVaccin"=>$idVaccin);
				$unControleur->setTable("vaccins");
				$unControleur->delete($where);
				break;
			case 'edit':
				$where = array("idVaccin"=>$idVaccin);
				$leVaccin = $unControleur->selectWhere($where);
				break;
		}
	}

	require_once("vue/vue_insert_vaccin.php");

	if (isset($_POST['Modifier'])) {
		$unControleur->setTable("vaccins");
		$tab = array(
			"nomV"=>$_POST['nomV'],
			"datePeremption"=>$_POST['datePeremption'],
			"quantite"=>$_POST['quantite'],
			"prix"=>$_POST['prix'],
			"idPersonne"=>$_POST['idPersonne'],
			"idCV"=>$_POST['idCV']
		);
		$where = array("idVaccin"=>$_GET['idVaccin']);
		$unControleur->update($tab, $where);
		echo '<script language="javascript">document.location.replace("index.php?page=3");</script>';
	}

	if (isset($_POST['Valider'])) {
		$unControleur->setTable("vaccins");
		$tab = array(
			"nomV"=>$_POST['nomV'],
			"datePeremption"=>$_POST['datePeremption'],
			"quantite"=>$_POST['quantite'],
			"prix"=>$_POST['prix'],
			"idPersonne"=>$_POST['idPersonne'],
			"idCV"=>$_POST['idCV']
		);
		$unControleur->insert($tab);
	}

}

$unControleur->setTable("vVaccins");

if (isset($_POST['Rechercher'])) {
	$mot = $_POST['mot'];
	$tab = array("nomV", "datePeremption", "quantite", "prix", "nom", "prenom", "libelle", "type");
	$lesVaccins = $unControleur->selectSearch($mot, $tab);
} else {
	$lesVaccins = $unControleur->selectAll();
}

require_once("vue/vue_les_vaccins.php");

?>