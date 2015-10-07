<h1>North Country Kids Daily Log</h1>
<?php #die(print_r($overlaps, true)); ?>
<?php foreach($classrooms as $classname => $weeks): ?>
  <h2><?php echo $classname ?></h2>
  <table width="100%" class="dailyLog">
  <?php foreach($weeks as $week => $clients): ?>
    <?php if(count($clients)): ?>

          <tr class="headerRow">
            <th>Child's name</th>
            <?php for($day=1; $day<=5; $day++): ?>
              <th><?php echo date('m/d/Y', strtotime($year."W".$week.$day)); ?></th>
            <?php endfor; ?>
          </tr>

          <?php foreach($clients as $client => $columns): ?>
          <tr>
            <th>
              <?php echo $client ?>
            </th>
            <?php foreach($columns as $day => $entries): ?>
            <td>
              <?php foreach($entries as $entry): ?>

                      <?php if($overlaps->offsetExists($entry->getId())): ?>
                        <span style="color:red;font-weight:bold;">
                <strong><?php echo $entry->getEmployee()->getJob()->getShortName() ?>:</strong>
                <?php echo $entry->getTimeIn('h:i a') ?> - <?php echo $entry->getTimeOut('h:i a') ?>
                <br />
                [<?php echo $entry->getEmployee() ?>&nbsp;(<?php echo $entry->getClient() ?>)]
<br />
<?php

if (array_key_exists($overlaps[$entry->getId()], $all_entries)):

?>
&mdash;                        <?php echo $all_entries[$overlaps[$entry->getId()]]->getEmployee()->getJob()->getShortName()  ?>:
                                     <?php echo $all_entries[$overlaps[$entry->getId()]]->getTimeIn('h:i a') .' - '. $all_entries[$overlaps[$entry->getId()]]->getTimeOut('h:i a') ?>
                        <br >
&mdash;                        [<?php echo $all_entries[$overlaps[$entry->getId()]]->getEmployee() ?>&nbsp(<?php echo $all_entries[$overlaps[$entry->getId()]]->getClient() ?>)]

                        <br />
<?php endif; ?>
                        </span>
              <?php else: ?>

                <strong><?php echo $entry->getEmployee()->getJob()->getShortName() ?>:</strong>
                <?php echo $entry->getTimeIn('h:i a') ?> - <?php echo $entry->getTimeOut('h:i a') ?>

                      <?php endif; ?>
              
                <br />
              <?php endforeach; ?>
            </td>
            <?php endforeach; ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      
    <?php endif; ?>

  <?php endforeach; ?>
  </table>
  <br />
  <div style="page-break-after:always"></div>
<?php endforeach; ?>
