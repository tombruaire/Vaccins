<h2 class="text-center mb-3">Gestion des centres de vaccinations</h2>

<?php 

if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") {

	$leCentre = null;

	$unControleur->setTable("vCentresVaccinations");

	if (isset($_GET['action']) and isset($_GET['idCV'])) {
		$idCV = $_GET['idCV'];
		$action = $_GET['action'];
		switch ($action) {
			case 'sup': 
				$where = array("idCV"=>$idCV);
				$unControleur->setTable("centresVaccinations");
				$unControleur->delete($where);
				break;
			case 'edit':
				$where = array("idCV"=>$idCV);
				$leCentre = $unControleur->selectWhere($where);
				break;
		}
	}

	require_once("vue/vue_insert_centre.php");

	if (isset($_POST['Modifier'])) {
		$unControleur->setTable("centresVaccinations");
		$tab = array(
			"adresse"=>$_POST['adresse'],
			"cp"=>$_POST['cp'],
			"ville"=>$_POST['ville'],
			"capacite"=>$_POST['capacite'],
			"idType"=>$_POST['idType']
		);
		$where = array("idCV"=>$_GET['idCV']);
		$unControleur->update($tab, $where);
		echo '<script language="javascript">document.location.replace("index.php?page=2");</script>';
	}

	if (isset($_POST['Valider'])) {
		$unControleur->setTable("centresVaccinations");
		$tab = array(
			"adresse"=>$_POST['adresse'],
			"cp"=>$_POST['cp'],
			"ville"=>$_POST['ville'],
			"capacite"=>$_POST['capacite'],
			"idType"=>$_POST['idType']
		);
		$unControleur->insert($tab);
	}

}

$unControleur->setTable("vCentresVaccinations");

if (isset($_POST['Rechercher'])) {
	$mot = $_POST['mot'];
	$tab = array("adresse", "cp", "ville", "capacite", "libelle", "type");
	$lesCentres = $unControleur->selectSearch($mot, $tab);
} else {
	$lesCentres = $unControleur->selectAll();
}

require_once("vue/vue_les_centres.php");

?>