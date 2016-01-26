<?php

/**
 * Don't give direct access to the template
 */ 
if(!class_exists("RGForms")){
	return;
}

/** 
 * Set up the form ID and lead ID
 * Form ID and Lead ID can be set by passing it to the URL - ?fid=1&lid=10
 */
 PDF_Common::setup_ids();  

/**
 * Load the form data to pass to our PDF generating function 
 */
$form = RGFormsModel::get_form_meta($form_id);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<head>
    <link rel="stylesheet" href="<?php echo GFCommon::get_base_url(); ?>/css/print.css" type="text/css" />
    <link rel='stylesheet' href='<?php echo get_bloginfo('template_directory') .'/PDF_EXTENDED_TEMPLATES/template.css'; ?>' type='text/css' />
    <title>SG360° Estimate</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
    <body>
    
        <?php	

        foreach($lead_ids as $lead_id) {

            $lead = RGFormsModel::get_lead($lead_id);
            $form_data = GFPDFEntryDetail::lead_detail_grid_array($form, $lead);
			
			/*
			 * Add &data=1 when viewing the PDF via the admin area to view the $form_data array
			 */
			PDF_Common::view_data($form_data);				 					

			?>  
            
    
        <div class="background license_contractor">
        	<div class="name_container bg_contractor">
            	<div style="font-size:14px; font-weight:bold">
				<?php if(get_post_meta($_GET['gf_pdf'],'business_info_d/b/a',true)){ echo get_post_meta($_GET['gf_pdf'],'business_info_business_name',true); ?> <span style="font-weight:normal;">d/b/a</span><?php }else{ echo '<span style="font-weight:normal;">&nbsp;</span>';} ?>
                </div>
            	<div style="font-size:38px; font-weight:bold"><?php if(get_post_meta($_GET['gf_pdf'],'business_info_d/b/a',true)){ echo get_post_meta($_GET['gf_pdf'],'business_info_d/b/a',true); }else{ echo get_post_meta($_GET['gf_pdf'],'business_info_business_name',true); } ?></div>
            	<div style="font-size:14px; font-weight:bold; text-transform:uppercase;">
					<?php echo get_post_meta($_GET['gf_pdf'],'business_info_address',true); ?>
					<?php echo get_post_meta($_GET['gf_pdf'],'business_info_city',true); ?>,
					<?php echo get_post_meta($_GET['gf_pdf'],'business_info_state',true); ?>
					<?php echo get_post_meta($_GET['gf_pdf'],'business_info_zip',true); ?>
                </div>
            </div> 
        </div>
            
            
            <?php
                /*
                 * Loop through the entries
                 * There is usually only one but you can pass more IDs through the lid URL parameter
                 */
                setlocale(LC_MONETARY,"en_US");?>
                    
                <?php 
				
                }
            ?>
    </body>
</html>