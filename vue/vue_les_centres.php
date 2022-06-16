<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">Rechercher un centre</h3>
	</div>
	<div class="card-body bg-success">
		<form method="post" action="">
			<div class="mb-3">
				<label for="mot" class="form-label text-white fw-bold">Mot de recherche</label>
				<input type="search" name="mot" id="mot" class="form-control">
			</div>
			<div class="d-flex justify-content-center">
				<button type="submit" name="Rechercher" class="btn btn-light">
					Rechercher
				</button>
			</div>
		</form>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h3 class="text-center">Liste des centres de vaccination</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">ID</th>
		      		<th scope="col">Adresse</td>
		      		<th scope="col">Code postal</th>
		      		<th scope="col">Ville</th>
		      		<th scope="col">Capacité</th>
		      		<th scope="col">Type de centre</th>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<th scope="col">Opérations</th>
		      		<?php } ?>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($lesCentres as $unCentre) { ?>
		    	<tr>
		      		<td><?= $unCentre['idCV']; ?></td>
		      		<td><?= $unCentre['adresse']; ?></td>
		      		<td><?= $unCentre['cp']; ?></td>
		      		<td><?= $unCentre['ville']; ?></td>
		      		<td><?= $unCentre['capacite']; ?></td>
		      		<td><?= $unCentre['libelle']; ?> <?= $unCentre['type']; ?></td>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<td>
		      			<a href="index.php?page=2&action=edit&idCV=<?= $unCentre['idCV']; ?>" class="btn btn-primary me-2">Modifier</a>
		      			<a href="index.php?page=2&action=sup&idCV=<?= $unCentre['idCV']; ?>" class="btn btn-danger">Supprimer</a>
		      		</td>
		      		<?php } ?>
		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>
