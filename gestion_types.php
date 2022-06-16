<h2 class="text-center mb-3">Gestion des types</h2>

<?php 

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

	$leType = null;

	$unControleur->setTable("typeCentreVaccinations");

	if (isset($_GET['action']) and isset($_GET['idType'])) {
		$idType = $_GET['idType'];
		$action = $_GET['action'];
		switch ($action) {
			case 'sup': 
				$where = array("idType"=>$idType);
				$unControleur->delete($where);
				break;
			case 'edit': 
				$where = array("idType"=>$idType);
				$leType = $unControleur->selectWhere($where);
				break;
		}
	}
	
	require_once("vue/vue_insert_type.php");

	if (isset($_POST['Modifier'])) {
		$tab = array(
			"libelle"=>$_POST['libelle'],
			"type"=>$_POST['type']
		);
		$where = array("idType"=>$_GET['idType']);
		$unControleur->update($tab, $where);
		header("Location: index.php?page=1");
	}

	if (isset($_POST['Valider'])) {
		$tab = array(
			"libelle"=>$_POST['libelle'],
			"type"=>$_POST['type']
		);
		$unControleur->insert($tab);
	}

}

$unControleur->setTable("typeCentreVaccinations");

if (isset($_POST['Rechercher'])) {
	$mot = $_POST['mot'];
	$tab = array("libelle", "type");
	$lesTypes = $unControleur->selectSearch($mot, $tab);
} else {
	$lesTypes = $unControleur->selectAll();
}

require_once("vue/vue_les_types.php");

?>