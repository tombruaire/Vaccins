<?php
$unControleur->setTable("nbTypesCentres");
$lesTypes = $unControleur->selectAll();
?>

<table class="table table-striped table-dark text-center">
	<thead>
    	<tr>
      		<th scope="col">Types de centres</th>
      		<th scope="col">NB Centres</th>
    	</tr>
  	</thead>
  	<tbody>
	<?php foreach($lesTypes as $unType) { ?>
		<tr>
			<td><?= $unType['libelle']; ?></td>
			<td><?= $unType['nb']; ?></td>
		</tr>
	<?php } ?>
</table>