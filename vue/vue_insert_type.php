<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">
			<?= ($leType != null ? "Modification" : "Insertion"); ?> d'une type
		</h3>
	</div>
	<div class="card-body bg-info fw-bold">
		<form method="post" action="">
			<div class="mb-3">
				<label for="libelle" class="form-label">Nom du type</label>
				<input type="text" name="libelle" id="libelle" class="form-control" value="<?= ($leType != null ? $leType['libelle'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="type" class="form-label">Type de centre</label>
				<input type="text" name="type" id="type" class="form-control" value="<?= ($leType != null ? $leType['type'] : null); ?>">
			</div>
			<div class="d-flex justify-content-center">
				<button type="reset" class="btn btn-danger me-2">Annuler</button>
				<button type="submit" <?= ($leType != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
					<?= ($leType != null ? "Modifier" : "Ajouter"); ?>
				</button>
			</div>
		</form>
	</div>
</div>