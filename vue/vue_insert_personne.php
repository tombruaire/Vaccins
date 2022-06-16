<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">
			<?= ($laPersonne != null ? "Modification" : "Insertion"); ?> d'une personne
		</h3>
	</div>
	<div class="card-body bg-info fw-bold">
		<form method="post" action="">
			<div class="mb-3">
				<label for="nom" class="form-label">Nom de la personne</label>
				<input type="text" name="nom" id="nom" class="form-control" value="<?= ($laPersonne != null ? $laPersonne['nom'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="prenom" class="form-label">Prénom de la personne</label>
				<input type="text" name="prenom" id="prenom" class="form-control" value="<?= ($laPersonne != null ? $laPersonne['prenom'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email de la personne</label>
				<input type="email" name="email" id="email" class="form-control" value="<?= ($laPersonne != null ? $laPersonne['email'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="mdp" class="form-label">Mot de passe de la personne</label>
				<input type="password" name="mdp" id="mdp" class="form-control" value="<?= ($laPersonne != null ? $laPersonne['mdp'] : null); ?>">
			</div>
			<div class="d-flex justify-content-center">
				<button type="reset" class="btn btn-danger me-2">Annuler</button>
				<button type="submit" <?= ($laPersonne != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
					<?= ($laPersonne != null ? "Modifier" : "Ajouter"); ?>
				</button>
			</div>
		</form>
	</div>
</div>
