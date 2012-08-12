<table style="width:100%;">
  <thead>
    <th></th>
    <th>Client</th>
    <th>Provider</th>
    <th>Service</th>
    <th>Service Type</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Frequency</th>
    <th>Notes</th>
  </thead>
  <tbody>
<?php foreach($services as $service): ?>
  <?php include_partial('program/service', array('service' => $service)) ?>
<?php endforeach; ?>
  </tbody>
</table>