<div class="card mb-5">
	<div class="card-header">
		<h3 class="text-center">
			<?= ($leVaccin != null ? "Modification" : "Insertion"); ?> d'un vaccin
		</h3>
	</div>
	<div class="card-body bg-info fw-bold">
		<form method="post" action="">
			<div class="mb-3">
				<label for="nom" class="form-label">Nom du vaccin</label>
				<input type="text" name="nomV" id="nom" class="form-control" value="<?= ($leVaccin != null ? $leVaccin['nomV'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="dateP" class="form-label">Date de péremption</label>
				<input type="date" name="datePeremption" id="dateP" class="form-control" value="<?= ($leVaccin != null ? $leVaccin['datePeremption'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="qte" class="form-label">Quantité du vaccin</label>
				<input type="number" name="quantite" id="qte" class="form-control" value="<?= ($leVaccin != null ? $leVaccin['quantite'] : null); ?>">
			</div>
			<div class="mb-3">
				<label for="prix" class="form-label">Prix du vaccin</label>
				<input type="text" name="prix" id="prix" class="form-control" value="<?= ($leVaccin != null ? $leVaccin['prix'] : null); ?>">
			</div>
			<div class="mb-3">
		        <label for="personne" class="form-label">Personne</label>
		        <select name="idPersonne" id="personne" class="form-select">
		            <?php
		            $unControleur->setTable("personnes");
		            $lesPersonnes = $unControleur->selectAll();
		            foreach ($lesPersonnes as $unePersonne) { ?>
		                <option value="<?= $unePersonne['idPersonne']; ?>">
		                	<?= $unePersonne['prenom']; ?> <?= $unePersonne['nom']; ?>
		                </option>
		            <?php } ?>
		        </select>
		    </div>
		    <div class="mb-3">
		        <label for="centre" class="form-label">Centre de vaccination</label>
		        <select name="idCV" id="centre" class="form-select">
		            <?php
		            $unControleur->setTable("vCentresVaccinations");
		            $lesCentres = $unControleur->selectAll();
		            foreach ($lesCentres as $unCentre) { ?>
		                <option value="<?= $unCentre['idCV']; ?>">
		                	<?= $unCentre['libelle']; ?> <?= $unCentre['type']; ?>
		                </option>
		            <?php } ?>
		        </select>
		    </div>
			<div class="d-flex justify-content-center">
				<button type="reset" class="btn btn-danger me-2">Annuler</button>
				<button type="submit" <?= ($leVaccin != null ? 'name="Modifier"' : 'name="Valider"'); ?> class="btn btn-success">
					<?= ($leVaccin != null ? "Modifier" : "Ajouter"); ?>
				</button>
			</div>
		</form>
	</div>
</div>
