<?php foreach($clients as $client): ?>
<?php echo $client->getFullName() ?>|<?php echo $client->getId() ?> 
<?php endforeach; ?>