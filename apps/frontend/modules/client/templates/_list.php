<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" class="rowstylehover-rowHover">
      <thead>
        <tr>
          <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('client/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions" class="noprint"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
        <tfoot>
                <tr>
                        <th colspan="10">
                          <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
                          <?php if ($pager->haveToPaginate()): ?>
                            <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
                          <?php endif; ?>
                        </th>
                </tr>
                <tr>
                        <td colspan="10">
                          <?php if ($pager->haveToPaginate()): ?>
                            <?php include_partial('client/pagination', array('pager' => $pager)) ?>
                          <?php endif; ?>
                        </td>
                </tr>
        </tfoot>
      <tbody>
        <?php foreach ($pager->getResults() as $i => $client): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr class="sf_admin_row <?php echo $odd ?> <?php echo ($client->getIsIep())? 'is_iep':'' ?>">
            <?php include_partial('client/list_td_batch_actions', array('client' => $client, 'helper' => $helper)) ?>
            <?php include_partial('client/list_td_tabular', array('client' => $client)) ?>
            <?php include_partial('client/list_td_actions', array('client' => $client, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {

    $("#client_filters_employee_id").multiSelect({ oneOrMoreSelected: '*' });
    $("#client_filters_service_id").multiSelect({ oneOrMoreSelected: '*' });
    $("#client_filters_office_id").multiSelect({ oneOrMoreSelected: '*' });
    $("#client_filters_object_type").multiSelect({ oneOrMoreSelected: '*' });
});
//]]>
</script>