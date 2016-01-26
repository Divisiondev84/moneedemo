<?php
// Get Time from Timesheets
// Return more than 30 entries (the default)
$the_form = 4;
$all_entries = RGFormsModel::get_leads($the_form, 0, 'ASC', '', 0, 999, NULL, NULL, FALSE, NULL, NULL, 'active', FALSE);
?>


<div class="medium caps">
	<a href="<?php echo get_bloginfo('wpurl').'/?gf_pdf=1&fid='.$_GET['fid'].'&lid='.$_GET['lid'].'&template=sg360.php'; ?>" target="_blank">
		<span class="purple"><?php echo $lead[27]; ?>: <?php echo $lead[37]; ?></span>
	</a>
</div>

<div class="left half">
<span class="medium">Task:
<span class="red"> 
<?php 
	$f_id = 1; // Form ID
	$f_ld = $_GET['task']; // Field ID
	
	$form = RGFormsModel::get_form_meta($f_id); // Get Form Meta
	$field = GFFormsModel::get_field($form, $f_ld); // Get Field
	
	echo $label = GFFormsModel::get_label($field);
	
?>
</span>
</span>
</div>

<div class="right half medium">
    <?php 
    switch ($lead[41]) {
        case 'complete':
            $estimate_status = 'purple';
            break;
        case 'active':
            $estimate_status = 'green';
            break;
        case 'inactive':
            $estimate_status = 'red';
            break;
        case 'awaiting approval':
            $estimate_status = 'yellow';
            break;
        case 'on hold':
            $estimate_status = 'red';
            break;
        default:
            $estimate_status = 'purple';
    }
    ?>
    status: <span class="<?php echo $estimate_status; ?>"><?php echo $lead[41]; ?></span>
</div>
<div class="left half"><span class="medium">estimate number:</span> <?php echo $lead[2]; ?></div>
<div class="right half"><span class="medium">job number:</span> <?php if($lead[28]): echo $lead[28]; else: echo 'N/A'; endif; ?></div>
<div></div>
<hr></hr>
<div></div>


<?php

	// loop through all the returned results
	$e_id = 0;
	foreach ($all_entries as $entry) {
		$time_form = RGFormsModel::get_form_meta($the_form);
		$time_lead = RGFormsModel::get_lead($entry['id']);
		$time_form_data = GFPDFEntryDetail::lead_detail_grid_array($time_form, $time_lead);
		$time_lead_id = $_GET['lid'];
						
		$array = $time_form_data['list']['1']; //list field ID		
		
		foreach($array as $element) {
			if($time_lead_id == $element['project']){
				$task = $element['task'];
				if($task == $_GET['task']){
					$employees[$entry[2]]['name'] = $entry[2];
					$employees[$entry[2]]['date'][$element['date']] = $element['hours'];
					$employees[$entry[2]]['total_hours'] += $element['hours'];
					$e_id++;
				}
			}
		}
		
		
	} 
	
	foreach($employees as $employee) { ?>
		
	<div class="breakdown">
    	<div class="breakdown no-mar"><span class="medium half-mar"><?php echo $employee['name']; ?>:</span><?php echo ' - '.$employee['total_hours']; ?> total hours</div>
            <div class="sub-items">
            <?php
                foreach($employee['date'] as $key => $value) {
                    echo '<div class="sub-item"><span class="medium">'.$key.':</span> '.$value. ' hours</div>';
                }
            ?>
            </div>
    </div>
    
	<?php }
?>
	<?php //echo '<pre>'.print_r($employees,true).'</pre>'; ?>