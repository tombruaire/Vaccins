<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">
			<?= ($leCentre != null ? "Modification" : "Insertion"); ?> d'un centre
		</h3>
	</div>
	<div class="card-body bg-info fw-bold">
		<form method="post" action="">
			<div class="mb-3">
				<label for="adresse" class="form-label">Adresse du centre</label>
				<input type="text" name="adresse" id="adresse" class="form-control" value="<?= ($leCentre != null ? $leCentre['adresse'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="cp" class="form-label">Code postal du centre</label>
				<input type="text" name="cp" id="cp" maxlength="5" class="form-control" value="<?= ($leCentre != null ? $leCentre['cp'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="ville" class="form-label">Ville du centre</label>
				<input type="text" name="ville" id="ville" class="form-control" value="<?= ($leCentre != null ? $leCentre['ville'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="capacite" class="form-label">Capacité du centre</label>
				<input type="number" name="capacite" id="capacite" class="form-control" value="<?= ($leCentre != null ? $leCentre['capacite'] : null); ?>">
			</div>
			<div class="mb-3">
		        <label for="type" class="form-label">Type de centre</label>
		        <select name="idType" id="type" class="form-select">
		            <?php
		            $unControleur->setTable("typeCentreVaccinations");
		            $lesTypes = $unControleur->selectAll();
		            foreach ($lesTypes as $unType) { ?>
		                <option value="<?= $unType['idType']; ?>">
		                	<?= $unType['libelle']; ?> <?= $unType['type']; ?>
		                </option>
		            <?php } ?>
		        </select>
		    </div>
			<div class="d-flex justify-content-center">
				<button type="reset" class="btn btn-danger me-2">Annuler</button>
				<button type="submit" <?= ($leCentre != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
					<?= ($leCentre != null ? "Modifier" : "Ajouter"); ?>
				</button>
			</div>
		</form>
	</div>
</div>
