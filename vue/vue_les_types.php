<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">Rechercher un type</h3>
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
		<h3 class="text-center">Liste des types</h3>
	</div>
	<div class="card-body bg-dark text-white">
		<table class="table table-dark table-striped text-center">
		  	<thead>
		    	<tr>
		      		<th scope="col">ID</th>
		      		<th scope="col">Libellé</td>
		      		<th scope="col">Type</th>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<th scope="col">Opérations</th>
		      		<?php } ?>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($lesTypes as $unType) { ?>
		    	<tr>
		      		<td><?= $unType['idType']; ?></td>
		      		<td><?= $unType['libelle']; ?></td>
		      		<td><?= $unType['type']; ?></td>
		      		<?php if (isset($_SESSION['email']) and $_SESSION['role'] == "admin") { ?>
		      		<td>
		      			<a href="index.php?page=1&action=edit&idType=<?= $unType['idType']; ?>" class="btn btn-primary me-2">Modifier</a>
		      			<a href="index.php?page=1&action=sup&idType=<?= $unType['idType']; ?>" class="btn btn-danger">Supprimer</a>
		      		</td>
		      		<?php } ?>
		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>
