<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">Rechercher un vaccin</h3>
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
		<h3 class="text-center">Liste des vaccins</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">ID</th>
		      		<th scope="col">Nom</td>
		      		<th scope="col">Date péremption</th>
		      		<th scope="col">Quantité</th>
		      		<th scope="col">Prix</th>
		      		<th scope="col">Personne</th>
		      		<th scope="col">Centre de vaccination</th>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<th scope="col">Opérations</th>
		      		<?php } ?>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($lesVaccins as $unVaccin) { ?>
		    	<tr>
		      		<td><?= $unVaccin['idVaccin']; ?></td>
		      		<td><?= $unVaccin['nomV']; ?></td>
		      		<td><?= $unVaccin['datePeremption']; ?></td>
		      		<td><?= $unVaccin['quantite']; ?></td>
		      		<td><?= $unVaccin['prix']; ?> €</td>
		      		<td><?= $unVaccin['prenom']; ?> <?= $unVaccin['nom']; ?></td>
		      		<td><?= $unVaccin['libelle']; ?> <?= $unVaccin['type']; ?></td>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<td>
		      			<a href="index.php?page=3&action=edit&idVaccin=<?= $unVaccin['idVaccin']; ?>" class="btn btn-primary me-2">Modifier</a>
		      			<a href="index.php?page=3&action=sup&idVaccin=<?= $unVaccin['idVaccin']; ?>" class="btn btn-danger">Supprimer</a>
		      		</td>
		      		<?php } ?>
		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>
