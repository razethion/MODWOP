<?php
/*
Plugin Name:  MyOrderDesk
Plugin URI:   https://pagepath.com/wordpress-plugin/
Description:  A WordPress plugin that displays a user's MyOrderDesk webpage seamlessly.
Version:      beta_2.0 (Development release 1)
Author:       Riley Magnuson
Author URI:   https://github.com/razethion/
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); /* Disallows direct file access. */

/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_menu_page( 'MyOrderDesk Settings', 'MyOrderDesk', 'manage_options', 'mod', 'myorderdesk_options' );
}

/** Step 3. */
function myorderdesk_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// variables for the field and option names 
    $opt_name = 'mod_number';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name = 'mod_number';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put a "settings saved" message on the screen

?>
<div class="updated"><p><strong><?php _e('Settings Saved.', 'menu-test' ); ?></strong></p></div>
<?php

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'MyOrderDesk Display Settings', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Your MyOrderDesk Account number (PID):", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">

<?php //Displays the rest of the information if a pid is entered (pid greater than zero) ?>
<?php if ($opt_val > "0"){ ?>
        <div id="content">
           <p>Your MyOrderDesk Webpage:</p>
           <iframe src="https://www.myorderdesk.com/Catalog/?Provider_ID=<?php echo $opt_val; ?>" width="600px" height="400px"></iframe>
           <hr>
           <p>Place these shortcodes into their respective pages to embed your myorderdesk page into wordpress.</p>
           <p>Not sure how to use these? Read this article on shortcode: <a>https://en.support.wordpress.com/shortcodes/</a></p>
           <hr>
           <p>My Account shortcode: <input type="text" value="[mod-myaccount]" class="field left" readonly></p>
           <p>Sign Out shortcode: <input type="text" value="[mod-signout]" class="field left" readonly></p>
           <p>Main Order Page shortcode: <input type="text" value="[mod-order]" class="field left" readonly></p>
           <p>Job History shortcode: <input type="text" value="[mod-history]" class="field left" readonly></p>
           <p>Cart shortcode: <input type="text" value="[mod-cart]" class="field left" readonly></p>
           <hr>
           <p>To link a specific order form or catalog, use the shortcode below, and insert the ID between the quotation marks.</p>
           <p>Be sure not to include any extra spaces. It must be typed exactly as displayed.</p>
           <p>Example: [mod-orderform id="457334"]</p>
           <hr>
           <p>Order Form shortcode: <input type="text" value='[mod-orderform form="######"]' class="field left" readonly></p>
           <p>Catalog shortcode: <input type="text" value='[mod-catalog catalog="######"]' class="field left" readonly></p>
        </div>
    <?php } ?>

<hr />
<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>
</form>
</div>

<?php
 
}



//Function & Shortcode Assembly

//Builds the My Account frame & shortcode
function mod_myaccount_frame() { ?>
    <div>
    <iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/settings.asp?Provider_ID=<?php echo $opt_val; ?>" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe>
    </div>
    <script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript">
    </script>
    <script type="text/javascript">
    iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
    </script>
    <script src='//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js'>
    </script>
    <script> MODSkinService('mainFrame');
    </script>
<?php }
//shortcode
add_shortcode( 'mod-myaccount', 'mod_myaccount_frame' );

//Builds the Sign out frame & shortcode
function mod_signout_frame() { ?>
    <div>
    <iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/logout.asp?Provider_ID=<?php echo $opt_val; ?>" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe>
    </div>
    <script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
    </script>
    <script src="//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js">
    </script>
    <script>
    MODSkinService('mainFrame'); 
    </script>
<?php }
//shortcode
add_shortcode( 'mod-signout', 'mod_signout_frame' );

//Builds the Main order page & shortcode
function mod_order_frame() { ?>
    <div>
    <iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/jobsubmit.asp?Provider_ID=<?php echo $opt_val; ?>&force=1" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe>
    </div>
    <script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
    </script>
    <script src="//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js">
    </script>
    <script>
    MODSkinService('mainFrame'); 
    </script>
<?php }
//shortcode
add_shortcode( 'mod-order', 'mod_order_frame' );

//Builds the Job history page & shortcode
function mod_history_frame() { ?>
    <div>
    <iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/Jobs.asp?provider_id=<?php echo $opt_val; ?>" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe>
    </div>
    <script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
    </script>
    <script src="//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js">
    </script>
    <script>
    MODSkinService('mainFrame'); 
    </script>
<?php }
//shortcode
add_shortcode( 'mod-history', 'mod_history_frame' );

//Builds the Shopping cart page & shortcode
function mod_cart_frame() { ?>
    <div>
    <iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/carts.asp?Provider_ID=<?php echo $opt_val; ?>" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe>
    </div>
    <script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
    </script>
    <script src="//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js">
    </script>
    <script>
    MODSkinService('mainFrame'); 
    </script>
<?php }
//shortcode
add_shortcode( 'mod-cart', 'mod_cart_frame' );


//      MANUAL ORDER FORM / CATALOG ENTRY       //

//Builds the Order Form page & shortcode
function mod_orderform_frame( $atts ) {
   extract( shortcode_atts( array(
        'form' => 0 //default order form number - will error without a value
    ), $atts ) ); ?>
<div>
<iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/jobsubmit.asp?Provider_ID=<?php echo $opt_val; ?>&OrderFormID=<?php echo $form; ?>" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)" ></iframe>
</div>
<script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript">
</script>
<script type="text/javascript">
iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
</script>
<script src='//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js'>
</script>
<script> MODSkinService('mainFrame');
</script>
<?php }
//shortcode
add_shortcode( 'mod-orderform', 'mod_orderform_frame' );

//Builds the Catalog page & shortcode
function mod_catalog_frame( $atts ) {
   extract( shortcode_atts( array(
        'catalog' => 0 //default order form number - will error without a value
    ), $atts ) ); ?>
<div>
<iframe id="mainFrame" name="mainFrame" src="https://www.MyOrderDesk.com/Catalog/?Provider_ID=<?php echo $opt_val; ?>&CatalogID=<?php echo $catalog; ?>" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)" ></iframe>
</div>
<script src="//www.myorderdesk.com/scripts/davidjbradshaw-iframe-resizer-a22ff52/js/iframeResizer.min.js" type="text/javascript">
</script>
<script type="text/javascript">
iFrameResize({scrolling:false, checkOrigin: false,}, '#mainFrame');
</script>
<script src='//www.myorderdesk.com/Scripts/MODSkinService/MODSkinService.js'>
</script>
<script> MODSkinService('mainFrame');
</script>
<?php }
//shortcode
add_shortcode( 'mod-catalog', 'mod_catalog_frame' );
