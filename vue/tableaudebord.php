<?php
$unControleur->setTable("typeCentreVaccinations");
$nbTypes = $unControleur->count();

$unControleur->setTable("centresVaccinations");
$nbCentres = $unControleur->count();

$unControleur->setTable("vaccins");
$nbVaccins = $unControleur->count();

$unControleur->setTable("personnes");
$nbPersonnes = $unControleur->count();
?>

<table class="table table-striped table-dark text-center">
	<thead>
    	<tr>
      		<th scope="col">NB Types</th>
      		<th scope="col">NB Centres</td>
      		<th scope="col">NB Vaccins</th>
      		<th scope="col">NB Personnes</th>
    	</tr>
  	</thead>
  	<tbody>
  		<tr>
  			<td><?= $nbTypes['nb']; ?></td>
  			<td><?= $nbCentres['nb']; ?></td>
  			<td><?= $nbVaccins['nb']; ?></td>
  			<td><?= $nbPersonnes['nb']; ?></td>
  		</tr>
</table>
