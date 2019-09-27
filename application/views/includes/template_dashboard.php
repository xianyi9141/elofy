<?php 
	$headerData = []; 
	if(isset($css_personalization_file)) $headerData['css_personalization_file'] = $css_personalization_file;
	else $headerData['css_personalization_file'] = null;
	if (isset($from_results)) $headerData['from_results'] = $from_results;
?>

<?php $this->load->view('includes/header_dash', $headerData); ?>

<div class="bottom_con">
<?php $this->load->view($main_content); ?>
</div>

<?php $this->load->view('includes/footer_dash'); ?>