<?php
// Get Time from Timesheets
// Return more than 30 entries (the default)
$the_form = 4;
$all_entries = RGFormsModel::get_leads($the_form, 0, 'ASC', '', 0, 999, NULL, NULL, FALSE, NULL, NULL, 'active', FALSE);
$task_time[] = '';

// loop through all the returned results
foreach ($all_entries as $entry) {
	$time_form = RGFormsModel::get_form_meta($the_form);
	$time_lead = RGFormsModel::get_lead($entry['id']);
	$time_form_data = GFPDFEntryDetail::lead_detail_grid_array($time_form, $time_lead);
	$time_lead_id = $_GET['lid'];
					
	$array = $time_form_data['list']['1']; //list field ID
	foreach($array as $element) {
		if($time_lead_id == $element['project']){
			$task = $element['task'];
			$hours = $element['hours'];
			$user = $entry[2];
			$task_time[$task]['hours'] += $hours;
		}
	}
} 
?>


<div class="medium caps">ESTIMATE FORM</div>

<div class="left half"><span class="medium">date:</span> <?php echo date("m/d/Y",get_gf_e('date',$_GET['gf_pdf'])); ?></div>

<div class="right half medium">
    <?php 
    switch (get_gf_e('status',$_GET['gf_pdf'])) {
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
    status: <span class="<?php echo $estimate_status; ?>"><?php gf_e('status',$_GET['gf_pdf']); ?></span>
</div>

<div><span class="medium">customer:</span> <?php gf_e('customer',$_GET['gf_pdf']); ?></div>
<div class="left half"><span class="medium">estimate number:</span> <?php gf_e('estimate_number',$_GET['gf_pdf']); ?></div>
<div class="right half"><span class="medium">job number:</span> <?php if(get_gf_e('job_number',$_GET['gf_pdf'])): gf_e('job_number',$_GET['gf_pdf']); else: echo 'N/A'; endif; ?></div>

<?php if(get_gf_e('sales_representative_name',$_GET['gf_pdf'])): ?>
    <div><span class="medium">sales representative:</span> <?php gf_e('sales_representative_name',$_GET['gf_pdf']); ?></div>
<?php else: ?>
    <div><span class="medium">sales representative:</span> <?php gf_e('sales_representative',$_GET['gf_pdf']); ?></div>
<?php endif; ?>

<div>
    <span class="medium">project type:</span>
    <?php 
        $array = get_gf_e('project_type',$_GET['gf_pdf']);
        $count = count($array);
        $i = 0;
        foreach($array as $element) {
            $i++;
			echo $element;
            if($i != $count){
                echo ' / '; // not the last element
            }
        }
    ?>
</div>
<div><span class="medium">project name:</span> <?php gf_e('project_name',$_GET['gf_pdf']); ?></div>
<div><span class="medium">simple project description:</span><br/> <?php echo nl2br(get_gf_e('simple_project_description',$_GET['gf_pdf'])); ?></div>

<div>
    <span class="medium">medium:</span>
    <?php 
        $array = get_gf_e('medium',$_GET['gf_pdf']);
        $count = count($array);
        $i = 0;
        foreach($array as $element) {
            $i++;
			echo $element;
            if($i != $count){
                echo ' / '; // not the last element
            }
        }
    ?>
</div>


<?php 
$task_item[] = '';
$task_item[0]['name'] = 'creative concept:'; 
$task_item[0]['hours'] = 'creative_concept_hours'; 
$task_item[0]['fee'] = 'creative_concept_fee'; 

$task_item[1]['name'] = 'creative refinement:'; 
$task_item[1]['hours'] = 'creative_refinement_hours';
$task_item[1]['fee'] = 'creative_refinement_fee';

$task_item[2]['name'] = 'art direction:'; 
$task_item[2]['hours'] = 'art_direction_hours'; 
$task_item[2]['fee'] = 'art_direction_fee';

$task_item[3]['name'] = 'copy writing:'; 
$task_item[3]['hours'] = 'copy_writing_hours'; 
$task_item[3]['fee'] = 'copy_writing_fee'; 

$task_item[4]['name'] = 'pre-press production:'; 
$task_item[4]['hours'] = 'pre-press_production_hours'; 
$task_item[4]['fee'] = 'pre-press_production_fee';

$task_item[5]['name'] = 'print supervision:'; 
$task_item[5]['hours'] = 'print_supervision_hours'; 
$task_item[5]['fee'] = 'print_supervision_fee';

$task_item[6]['name'] = 'coding:'; 
$task_item[6]['hours'] = 'coding_hours'; 
$task_item[6]['fee'] = 'coding_fee'; ?>

<?php foreach($task_item as $item) { ?>
    <?php if(get_gf_e($item['hours'],$_GET['gf_pdf'])): ?>
        <div>
                <?php 
                echo '<span class="medium">'.$item['name'].'</span> '.get_gf_e($item['hours'],$_GET['gf_pdf']); ?> hours / <?php gf_e($item['fee'],$_GET['gf_pdf']); 
                $status[] = '';
                $used_time = $task_time[$item['hours']]['hours']; 
                $set_time = $lead[$item['hours']];
				$task = $item['hours'];
                if($set_time && ($set_time != 0)):
                    $time_left = ($set_time - $used_time);
                    if($set_time != $time_left){
                        $status['color'] = "green";
                        $status['desc'] = "left";
                        if($time_left < ($set_time/4)){
                            $status['color'] = "yellow";
                        }
                        if($time_left < 0){
                            $status['color'] = "red";
                            $status['desc'] = "over";
                        }  
                        echo ' <a href="'.get_bloginfo('wpurl').'/?gf_pdf=1&fid='.$_GET['fid'].'&lid='.$_GET['lid'].'&task='.$task.'&time=1&template=sg360.php" target="_blank"><span class="time-status '.$status['color'].'"> 
                        ('.abs($time_left).' hours '.$status['desc'].') 
                        </span></a>';
                    }
                endif;
                ?>
        </div>
    <?php endif; ?>
<?php } ?> 
 
<?php if(get_gf_e('photography_fee',$_GET['gf_pdf']) && get_gf_e('photography_fee',$_GET['gf_pdf'])!= 0): ?>
<div><span class="medium">photography:</span> <?php gf_e('photography_fee',$_GET['gf_pdf']); ?></div>
<?php endif; ?> 

<?php if(get_gf_e('wpcf-illustration_fee',$_GET['gf_pdf']) && get_gf_e('photography_fee',$_GET['gf_pdf'])!= 0): ?>
<div><span class="medium">illustration:</span> <?php gf_e('wpcf-illustration_fee',$_GET['gf_pdf']); ?></div>
<?php endif; ?>  

    <?php 
        $array = get_post_meta($_GET['gf_pdf'],'wpcf-other-fee',false);
        $array_qty = get_post_meta($_GET['gf_pdf'],'wpcf-other-qty',false);
        $array_rate = get_post_meta($_GET['gf_pdf'],'wpcf-other-rate',false);
        $array_service = get_post_meta($_GET['gf_pdf'],'wpcf-other-service',false);
		
		$count = count($array);

		$other_total = 0;
		$other_time = 0;
		
        foreach($array as $element) {
			$element = str_replace("$","",$element);
			$element = str_replace(",","",$element);
			$other_total = (floatval($element) + floatval($other_total));
		}
		
        foreach($array_qty as $element) {
			$element = str_replace("$","",$element);
			$element = str_replace(",","",$element);
			$other_time = (floatval($element) + floatval($other_time));
		}
        
    ?>
	<?php if($other_total > 0): ?>
    <div class="other"><span class="medium">other:</span> <?php echo $other_time; ?> hours / <?php echo money_format ('%n',$other_total); ?></div>
    <div class="sub-items">
    <?php $other_count = 0;
        while($other_count < $count) {
			if($array_service[$other_count] == ''){continue;}
            echo '<div class="sub-item"><span class="medium">'.$array_service[$other_count].':</span> '.$array_qty[$other_count]. ' hours / '. $array[$other_count].'</div>';
			$other_count++;
        }
    ?>
    </div>
<?php endif; ?>  
  
<?php 
	$adjustments = str_replace("$","",get_gf_e('adjustments',$_GET['gf_pdf'])); 
	$adjustments = str_replace(",","",get_gf_e('adjustments',$_GET['gf_pdf'])); 
	$adjustments = (float)$adjustments; 
	if($adjustments > 0): 
?>
	<div><span class="medium">adjustments:</span> <?php gf_e('adjustments',$_GET['gf_pdf']); ?></div>
<?php 
	endif; 
?> 

<div class="medium">total: <?php gf_e('total_hours',$_GET['gf_pdf']); ?> hours / <?php gf_e('total_fee',$_GET['gf_pdf']); ?></div>