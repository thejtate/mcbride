<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */


//Set Account Values
//Live data
//For changing live/test also edit html--node-96.tpl
	$x_login = "WSP-MCBRI-UthCFABr7Q";//LIVE Payment Page ID
	$transaction_key = "6wGUfQQIEEhIJvghWLjy";// LIVE Transaction Key
    $recurring_id_weekly = 'MB-MCBRI-126-815731';
    $recurring_id_bi_weekly = 'MB-MCBRI-31-815730';
    $recurring_id_monthly = 'MB-MCBRI-2-815733';
//Test data
//    $x_login = "HCO-TEST-633";//TEST Payment Page ID
//    $transaction_key = "Wrfk44GGd_lqbk6cTZkL";//TEST Transaction Key
//    $recurring_id_weekly = 'MB-TEST-44-7942';
//    $recurring_id_bi_weekly = 'MB-TEST-139-7943';
//    $recurring_id_monthly = 'MB-TEST-106-7941';

	$x_currency_code = "USD";//Currency Code, set to terminal default (usually USD)
	$x_fp_timestamp = time();
	srand(time());
	$x_fp_sequence = rand(1000, 100000) + 123456;

//Generate Hash
function createHash($x_amount,$x_login,$transaction_key,$x_currency_code,$x_fp_timestamp,$x_fp_sequence)
{
	//global $transaction_key, $x_fp_timestamp, $x_login, $x_fp_sequence, $x_amount,$x_currency_code;
	$hmac_data = $x_login . "^" . $x_fp_sequence . "^" . $x_fp_timestamp . "^" . $x_amount . "^" . $x_currency_code;
	$x_fp_hash = hash_hmac('md5', $hmac_data, $transaction_key);
	return $x_fp_hash;
}
?>
<div  class="wrapper" id="wrapper">
  <div id="header" class="header">
    <div class="block-structure">
      <div class="section clearfix">
        <div class="logo">
          <?php if ($logo): ?>
            <?php print l(theme('image', array('path' => $logo, 'alt' => t('Home'), 'title' => t('Home'))), $front_page, array('attributes' => array('id' => array('logo')), 'html' => TRUE, 'external' => TRUE)) ?>
          <?php endif; ?>
        </div>
          <div class="top-wrapper">
            <?php print render($page['header_top']); ?>
            <?php print render($page['social_icons']); ?>
          </div>
        <?php if (in_array("careers editor", $user->roles)) : ?>
          <div class="logout">
            <?php print l(theme('image', array('path' => $directory . '/images/logout-button-blue-hi-75.png', 'alt' => t('LogOut'), 'title' => t('LogOut'))), '/user/logout', array('attributes' => array('id' => array('logout')), 'html' => TRUE, 'external' => TRUE)) ?>
          </div>
        <?php endif; ?>
		
        <div class="call-to-action">
         <?php print render($page['calltoaction']);?>
        </div>


        <div id="navigation" class="navigation">
          <?php if (!empty($main_menu)): ?>
            <?php print $main_menu; ?>
          <?php endif; ?>
        </div>

        <?php print render($page['header']); ?>

      </div>
    </div><!-- /.section, /#header -->
  </div>
  <div class="middle <?php print (isset($page_class)) ? $page_class : ''  ?>">
    <div class="middle-top">
      <div class="block-structure">
        <h1><?php print (isset($page_section_name)) ? $page_section_name : $title;  ?></h1>
        <h2><?php print (isset($page_sub_section_name)) ? $page_sub_section_name : '';  ?></h2>
      </div>
    </div>
    <div class="middle-separate-shadow"></div>
    <div class="wrapper-middle-content">
      <div class="block-structure">

        <div class="left-nav-menu">
          <?php print render($page['sidebar_first']); ?>
        </div>

        <?php print render($page['highlighted']); ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>

        <?php if ($tabs = render($tabs)): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php //print render($page['content']); ?>
        <div class="wrapper-block-content">
            
        
        <p><?php if (!array_key_exists("identifier", $_REQUEST) || ($_REQUEST["identifier"]== NULL) ) { ?>	  
        </p>
        <p>
        <!--This is where you can collect information from the customer-->	  
        </p>
        <div class="block-title">
          <h2><span style="font-family:Arial, Helvetica, sans-serif">Make a Payment</span></h2>
        </div>
	
        <div class="block-content-item">
          <div class="title-notice">
            <p>Thank you for choosing McBride to be your healthcare provider. We appreciate the opportunity to meet your healthcare needs. For your convenience, McBride offers online payments for your patient account.</p>
          </div>
  
    
    
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" name="mainform" id="payment-form">
		<span style="font-family:Arial, Helvetica, sans-serif">Patient Account Number:</span>
          <input id="x_invoice_num" name="x_invoice_num"/><br>
          <br>
          <span style="font-family:Arial, Helvetica, sans-serif">Patient Name:</span>
          <input name="x_reference_3"/><br>
          <br>
          <span style="font-family:Arial, Helvetica, sans-serif">DOB:</span>
          <input name="x_po_num"/><br>
          <br>
<!--            <span style="font-family:Arial, Helvetica, sans-serif">Type:</span>-->
            <div class="form-radios payment-radios-wrap">
                <span style="font-family:Arial, Helvetica, sans-serif">Payment type:</span><br>
                <div class="form-item form-type-radio">

                <input name="x_recurring_billing_id" type="radio" value="" id="paymentType0" checked/>
                    <label for="paymentType0">Single payment</label>
                </div>
                <div class="form-item form-type-radio">

                <input name="x_recurring_billing_id" type="radio" value="<?php print $recurring_id_weekly?>" id="paymentType1" data-type="week"/>
                    <label for="paymentType1">Recurring weekly</label>
                </div>
                <div class="form-item form-type-radio">

                <input name="x_recurring_billing_id" type="radio" value="<?php print $recurring_id_bi_weekly?>" id="paymentType2" data-type="bi-week"/>
                    <label for="paymentType2">Recurring bi-weekly</label>
                </div>
                <div class="form-item form-type-radio">

                <input name="x_recurring_billing_id" type="radio" value="<?php print $recurring_id_monthly?>" id="paymentType3" data-type="month"/>
                    <label for="paymentType3">Recurring monthly</label>
                </div>
            </div>
            <div class="dates-wrap" >
                <div>
                <span style="font-family:Arial, Helvetica, sans-serif">From:</span>
                <input id="x_recurring_billing_start_date" name="x_recurring_billing_start_date"/>
                </div>
                <div>
                <span style="font-family:Arial, Helvetica, sans-serif">To:</span>
                <input id="x_recurring_billing_end_date" name="x_recurring_billing_end_date"/>
                </div>
            </div>
            <div class="rec-amount-wrap" style="display: none;">
                <span style="font-family:Arial, Helvetica, sans-serif">Recurring billing Amount:</span>
                <INPUT name="x_recurring_billing_amount" maxlength="10"/><br>
                <span class="total-recur-amount-placeholder"></span>
            </div>

            <div class="amount-wrap">
                <span style="font-family:Arial, Helvetica, sans-serif">Amount:</span>
                <INPUT id="x_amount" name="x_amount"/>
            </div>



        <br>
            <div class="payment-submit">
                <INPUT type=submit value="Submit Your Payment">
            </div>
		<input type="hidden" name="identifier" value="true" /><br>
        <br>
       
	</form>

          
                    <!--<FORM action="<?php //echo $_SERVER['REQUEST_URI']; ?>" method="post" name="mainform">
            <div class="form-item">
              <span style="font-family:Arial, Helvetica, sans-serif">Patient Account Number:</span>
              <INPUT class="webform form-text" name="x_invoice_num"/><br>
           </div>
              <br>
           <div class="form-item">
              <span style="font-family:Arial, Helvetica, sans-serif">Patient Name:</span>
              <INPUT class="webform form-text" name="x_reference_3"/><br>
          </div>
              <br>
          <div class="form-item">
              <span style="font-family:Arial, Helvetica, sans-serif">DOB:</span>
              <INPUT class="webform form-text" name="x_po_num"/><br>
         </div>
              <br>
          <div class="form-item">
              <span style="font-family:Arial, Helvetica, sans-serif">Amount:</span>
              <INPUT class="webform form-text" name="x_amount"/><br>
         </div>
              <br>
         <div class="form-item">
              <INPUT type=submit value="Submit Your Payment">
              <input type="hidden" name="identifier" value="true" /><br>
        </div>
              <br>

            </FORM> -->
          
          
          
          
	<?php } else {?><FORM method="post" id="redirectForm" name="redirectForm">

	<?php
		//Pull the properties from the form above here. Use the x_amount field as an example.

        $x_recurring_billing_id = !empty($_REQUEST["x_recurring_billing_id"]) ? $_REQUEST["x_recurring_billing_id"] : NULL;
        $x_recurring_billing_start_date = !empty($_REQUEST["x_recurring_billing_start_date"]) ? $_REQUEST["x_recurring_billing_start_date"] : NULL;
        $x_recurring_billing_end_date = !empty($_REQUEST["x_recurring_billing_end_date"]) ? $_REQUEST["x_recurring_billing_end_date"] : NULL;
        $x_recurring_billing_amount = !empty($_REQUEST["x_recurring_billing_amount"]) ? $_REQUEST["x_recurring_billing_amount"] : NULL;

        $x_amount = !empty($_REQUEST["x_amount"]) && empty($x_recurring_billing_id) ? $_REQUEST["x_amount"] : 0;
        $x_invoice_num = $_REQUEST["x_invoice_num"];
        $x_reference_3 = $_REQUEST["x_reference_3"];
        $x_po_num = $_REQUEST["x_po_num"];

	?>
	<!--Build the Form
			Uncomment the line below if you are using a Demo account-->
<!--		<input type="hidden" name="x_test_request" value="TRUE" />-->

	<!--Required Fields. Do not change any of this code-->
		<input type="hidden" name="x_currency_code" value="<?php echo $x_currency_code ?>" />
		<input type="hidden" name="x_fp_sequence" value="<?php echo $x_fp_sequence ?>" />
		<input type="hidden" name="x_fp_timestamp" value="<?php echo $x_fp_timestamp ?>" />
		<input type="hidden" name="x_login" value="<?php echo $x_login ?>" />
      <?php if(empty($x_recurring_billing_id)): ?>
		<input type="hidden" name="x_amount" value="<?php echo $x_amount ?>"/>
      <?php endif; ?>
		<input type="hidden" name="x_fp_hash" value="<?php echo createHash($x_amount,$x_login,$transaction_key,$x_currency_code,$x_fp_timestamp,$x_fp_sequence) ?>" />
		<input type="hidden" name="x_invoice_num" value="<?php echo $x_invoice_num ?>" />
        <input type="hidden" name="x_reference_3" value="<?php echo $x_reference_3 ?>" />
        <input type="hidden" name="x_po_num" value="<?php echo $x_po_num ?>" />


	<!--Optional Fields. Add any additional information here for things like Recurring or Level 3.-->
      <?php if(!empty($x_recurring_billing_id)): ?>
            <input type="hidden" name="x_recurring_billing_id" value="<?php echo $x_recurring_billing_id ?>" />
            <input type="hidden" name="x_recurring_billing" value="TRUE" />
            <input type="hidden" name="x_recurring_billing_start_date" value="<?php echo $x_recurring_billing_start_date ?>" />
            <input type="hidden" name="x_recurring_billing_end_date" value="<?php echo $x_recurring_billing_end_date ?>" />
            <input type="hidden" name="x_recurring_billing_amount" value="<?php echo $x_recurring_billing_amount ?>"/>
            <input type="hidden" name="x_type" value="AUTH_ONLY"/>
            <input type="hidden" name="x_amount" value="0"/>
      <?php endif; ?>


	<input type="hidden" name="x_show_form" value="PAYMENT_FORM"/>
	</FORM>
	<?php } ?>  
          
          
          
          
      </div> 
      </div>     
          
        <?php print render($page['content_bottom']); ?>
        <?php print $feed_icons; ?>

      </div>
    </div></div><!-- /#main, /#main-wrapper -->

</div><!--  /#page-wrapper -->
<hr />
<div id="footer" class="footer">
  <div class="block-structure">
    <div class="logo-footer-1">
      <?php print $footer_logo; ?>
    </div>
      <div class="logo-footer-2">
        <?php print $footer_logo2; ?>
      </div>
    <div class="copyright">
      <p>
        <?php print render($page['copyright']); ?>
      </p>
    </div>
    <?php if (!empty($footer_file)): ?>
      <div class="file-footer">
        <?php print $footer_file; ?>
      </div>
    <?php endif; ?>
    <?php print render($page['footer']); ?>
    <?php print render($page['bottom']); ?>
  </div>
</div>
