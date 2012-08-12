<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" class="rowstylehover-rowHover">
        <thead>
        <tr>
          <th id="sf_admin_list_batch_actions" class="noprint" style="padding:0px;text-align:center;vertical-align:middle"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('employee/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"  class="noprint"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
        </thead>        
        <tfoot>
                <tr>
                        <th colspan="8">
							            <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
							            <?php if ($pager->haveToPaginate()): ?>
							              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
							            <?php endif; ?>
                        </th>
                </tr>
                <tr>
                        <td colspan="8">
							            <?php if ($pager->haveToPaginate()): ?>
							              <?php include_partial('employee/pagination', array('pager' => $pager)) ?>
							            <?php endif; ?>
                        </td>
                </tr>
        </tfoot>
               <tbody>
        <?php foreach ($pager->getResults() as $i => $employee): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('employee/list_td_batch_actions', array('employee' => $employee, 'helper' => $helper)) ?>
            <?php include_partial('employee/list_td_tabular', array('employee' => $employee)) ?>
            <?php include_partial('employee/list_td_actions', array('employee' => $employee, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
        </tbody>
</table>

  <?php endif; ?>
</div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
    $("#employee_filters_job_id").multiSelect({ oneOrMoreSelected: '*' });
});
//]]>
</script>