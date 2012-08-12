<?php foreach($services as $service): ?>

  <table>
    <thead>
      <tr>
        <td>
          <?php if($service['type'] == ClientServicePeer::CLASSKEY_EI): ?>
            <h1>North Country Kids, Inc. Early Intervention Daily Note</h1>
            <table class="report_header">
              <tr>
                <th>Child's Name:</th>
                <td><?php echo $service['client'] ?></td>
                <th>School District:</th>
                <td><?php echo $service['district'] ?></td>
                <th>Type of Service:</th>
                <td><?php echo $service['service'] ?></td>
              </tr>
              <tr>
                <th>Service Location:</th>
                <td><?php echo $service['location'] ?></td>
                <th>IEP Frequency:</th>
                <td><?php echo $service['frequency'] ?></td>
                <th></th>
                <td></td>
              </tr>
              <tr>
                <th>Billing Period:</th>
                <td><?php echo date('m/d/Y', $first_day) ?> - <?php echo date('m/d/Y', $last_day) ?></td>
                <th>Total Units</th>
                <td><?php echo $service['units'] ?></td>
                <th></th>
                <td></td>
              </tr>
              <tr>
                <th>Provider Name:</th>
                <td><?php echo $service['provider'] ?></td>
                <th>License #:</th>
                <td><?php echo $service['license'] ?></td>
                <th>NPI #:</th>
                <td><?php echo $service['npi'] ?></td>
              </tr>
            </table>
          <?php else: ?>
            <h1>North Country Kids, Inc. Preschool Services Classroom Daily Note</h1>
            <table class="report_header">
              <tr>
                <th>Child's Name:</th>
                <td><?php echo $service['client'] ?></td>
                <th>School District:</th>
                <td><?php echo $service['district'] ?></td>
                <th>Type of Service:</th>
                <td><?php echo $service['service'] ?></td>
              </tr>
              <tr>
                <th>Service Location:</th>
                <td><?php echo $service['location'] ?></td>
                <th>IEP Frequency:</th>
                <td><?php echo $service['frequency'] ?></td>
                <th></th>
                <td></td>
              </tr>
              <tr>
                <th>IEP Dates:</th>
                <td><?php echo date('m/d/Y', $first_day) ?> - <?php echo date('m/d/Y', $last_day) ?></td>
                <th>Total Units</th>
                <td><?php echo $service['units'] ?></td>
                <th></th>
                <td></td>
              </tr>
              <tr>
                <th>Provider Name:</th>
                <td><?php echo $service['provider'] ?></td>
                <th>License #:</th>
                <td><?php echo $service['license'] ?></td>
                <th>NPI #:</th>
                <td><?php echo $service['npi'] ?></td>
              </tr>
            </table>
          <?php endif; ?>
        </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>


          <?php foreach($service['entries'] as $entry): ?>
          <!-- START AN ENTRY -->
          <div class="entry">

            <table class="activities" border="0">
                <tr>
                  <th colspan="3">
                    <table class="entry_header" border="0">
                      <tr>
                        <th>Date:</th>
                        <td><?php echo $entry->getServiceDate('m/d/Y') ?></td>
                        <th>Time:</th>
                        <td><?php echo $entry->getTimeIn('h:i') ?> - <?php echo $entry->getTimeOut('h:i') ?></td>
                        <th>CPT Code:</th>
                        <td><?php echo $entry->getCptCode() ?></td>
                        <th>Units:</th>
                        <td><?php echo $entry->getUnits() ?></td>
                      </tr>
                      <tr>
                        <th colspan="2">
                          <?php if($entry->getAbsent()): ?>
                            <?php echo NoteEntryPeer::getAbsentName($entry->getAbsent()) ?> TA-UNBILLED
                          <?php else: ?>
                            <?php if($entry->countNoteEntryKidss()): ?>Group:<?php else: ?>Individual<?php endif; ?> BILLED
                          <?php endif; ?>
                        </th>
                        <td colspan="6">
                          <?php if(!$entry->getAbsent()): ?>
                            <?php if($entry->countNoteEntryKidss()): ?>
                              (<?php echo $entry->countNoteEntryKidss()+1 ?>) <?php echo $entry->getGroup() ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                      </tr>
                    </table>
                  </th>
                </tr>
                <tr>
                  <td>

                    <?php foreach($entry->getGroupedConcerns() as $concern): ?>
                    <table class="area_of_concern" border="0">
                      <thead>
                        <tr>
                          <th><?php echo $concern['name'] ?></th>
                          <th>Prompt</th>
                          <th>Accuracy</th>
                          <th>Level</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($concern['entries'] as $key=>$entry_concern): ?>
                        <tr class="<?php echo ($key%2)?'even':'odd' ?>">
                          <td class="objective"><?php echo $entry_concern->getObjective() ?></td>
                          <td class="prompt"><?php echo $entry_concern->getPrompt() ?></td>
                          <td class="accuracy"><?php echo $entry_concern->getAccuracy() ?></td>
                          <td class="level"><?php echo $entry_concern->getLevel() ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    <?php endforeach; ?>

                  </td>
                </tr>

            </table>

            <?php if($entry->getComments() != ''): ?>
            <table class="comments" border="0">
              <tr>
                <th style="width: 100px;">Comments:</th>
                <td><p><?php echo $entry->getComments() ?></p></td>
              </tr>
            </table>
            <?php endif; ?>

            <table id="footer">
              <tr>
                <th class="siglabel">Signature/Credentials:</th>
                <td class="sigline"></td>
                <th class="unitlabel"></th>
                <td class="unitline"></td>
              </tr>
            </table>
          </div>

          <!-- END AN ENTRY -->
          <?php endforeach; ?>
        </td>
      </tr>
    </tbody>
  </table>

  <div style="page-break-after:always"></div>
  <?php endforeach; ?>
