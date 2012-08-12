<style type="text/css">
  table tbody tr td, table thead th {
    text-align: left;
}
  table tbody tr.even td {
    background-color: #EDEDED;
}
</style>
<h1>RS2</h1>


<table width="100%">
  <thead>
    <tr>
      <th>Client</th>
      <?php foreach($months as $month => $blah): ?>
      <th><?php echo $month ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php $row_class = 0;foreach($report as $client_id => $child): $row_class++;?>
      <tr class="<?php echo ($row_class%2==0)?'even':'odd' ?>">
        <td>
          <strong><?php echo $client_id ?></strong>
        </td>
        <td colspan="<?php echo count($months) ?>"></td>
      </tr>

      <?php foreach($child as $type => $otpt): ?>
        <tr class="<?php echo ($row_class%2==0)?'even':'odd' ?>">
          <td><em><?php echo $type ?></em></td>

        <?php foreach($otpt as $month => $units): ?>
          <td>
            <?php if(count($units['units'])): ?>
              <?php foreach($units['units'] as $key => $value): ?>
                <?php echo $key ?>: <strong><?php echo $value ?></strong><br />
              <?php endforeach; ?>
            <?php else: ?>
                Units: 0<br />
            <?php endif; ?>

            <?php if(count($units['absent'])): ?>
              <?php foreach($units['absent'] as $key => $value): ?>
                <?php echo $key ?>: <strong><?php echo $value ?></strong><br />
              <?php endforeach; ?>
            <?php else: ?>
                Absent: 0<br />
            <?php endif; ?>
          </td>
        <?php endforeach; ?>

        </tr>

      <?php endforeach; ?>

    <?php endforeach; ?>
  </tbody>
</table>