     <?php 
        $obj               =   & get_instance();
    ?>            
    <?php if($obj->uri->segment(1) != 'my_dashboard'){?>
            <!-- Footer -->
            <footer class="main">
                Software de gestão de pessoas para as novas gerações version: V1.4.8.1
            </footer>
    <?php } ?>
        </div>

    </div>

    <script src="<?php echo base_url('assets/portal/concat')?>/scripts.js?fja=V1.4.7.3"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/multirange.js" ></script>
    <script src="<?php echo base_url('assets/portal/concat')?>/app.js?pattern=1"></script>
    <script src="<?php echo base_url('assets/portal/concat')?>/myDashboard.js?fja=V1.4.7.3"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/jquery.slideControl.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/owl.carousel.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/jquery.emojiFace.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/Encryption.js"></script>
    <script src="<?php echo base_url('assets/portal/js')?>/crypto-js.js"></script>
    <?php if($obj->uri->segment(1) == 'feedbacks'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/feedbacks.js?fja=V1.4.7.3"></script>
            <script src="<?php echo base_url('assets/portal/js')?>/Chart.extentions.js"></script>
    <?php } if($obj->uri->segment(1) == 'indicators'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/indicators.js"></script>
    <?php } if($obj->uri->segment(1) == 'rchavehistory'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/rchavehistory.js"></script>
    <?php } if($obj->uri->segment(1) == 'nineboxdetail'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/nineboxdetail.js"></script>
    <?php } if($obj->uri->segment(1) == 'ciclos'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/ciclos.js"></script>
    <?php } if($obj->uri->segment(1) == 'matriz'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/matriz.js"></script>
    <?php } if($obj->uri->segment(1) == 'avaliacoes'){?>
            <script src="<?php echo base_url('assets/portal/concat')?>/avaliacoes.js"></script>
    <?php } if($obj->uri->segment(1) == 'carreira'){?>
            <script src="<?php echo base_url('assets/portal/js')?>/Chart.extentions.js"></script>
    <?php }

$message 			= 	$obj->session->userdata('updated_item');
$message2 			= 	$obj->session->userdata('cancel_message');

if(!empty($message) && isset($message)) {
?>
	<script>
	toastr.success("<?php echo $message;?>");
	</script>
	<?php 
	$obj->session->unset_userdata('updated_item');
} 
if(!empty($message2) && isset($message2)) {
	?>
	<script>
	toastr.error("<?php echo $message2;?>");
	</script>
	<?php 
	$obj->session->unset_userdata('cancel_message');
} ?>
<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
<!-- Instantiate single textfield component rendered in the document -->
<script>
  [].slice.call(document.querySelectorAll('.mdc-text-field')).forEach((ele) => mdc.textField.MDCTextField.attachTo(ele));
    [].slice.call(document.querySelectorAll('.mdc-radio')).forEach((ele) => mdc.formField.MDCFormField.attachTo(ele));
    const mdcTabBar = new mdc.tabBar.MDCTabBar(document.querySelector('.mdc-tab-bar'));
    const select = new mdc.select.MDCSelect(document.querySelector('.mdc-select'));
    const helperText = new mdc.select.MDCSelectHelperText(document.querySelector('.mdc-select-helper-text'));
    const icon = new mdc.select.MDCSelectIcon(document.querySelector('.mdc-select__icon'));
    const list = new mdc.list.MDCList(document.querySelector('.mdc-list'));
    const listItemRipples = list.listElements.map((listItemEl) => new MDCRipple(listItemEl));
    const menu = new mdc.menu.MDCMenu(document.querySelector('.mdc-menu')); menu.open = true;
    const menuSurface = new mdc.menuSurface.MDCMenuSurface(document.querySelector('.mdc-menu-surface'));
    const notchedOutline = new mdc.notchedOutline.MDCNotchedOutline(document.querySelector('.mdc-notched-outline'));

</script>
    <script type="text/javascript">
        [].slice.call(document.querySelectorAll('.mdc-button')).forEach((ele) => mdc.ripple.MDCRipple.attachTo(ele));
</script>
</body>
</html>
