<?php
/*
Plugin Name:  MyOrderDesk
Plugin URI:   https://pagepath.com/wordpress-plugin/
Description:  A WordPress plugin that displays a user's MyOrderDesk webpage seamlessly.
Version:      beta_3 (Development release 2)
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

    echo "<h2>" . __( '', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
    background-color: #00000000;
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: black;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 60%;
    background: #00000000;
    padding: 20px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: left;
    padding: 20px;
    width: 40%;
    background-color: #00000000;
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the footer */
footer {
    background-color: #777;
    padding: 10px;
    text-align: center;
    color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}
</style>

<header>
    <img src="https://p19.zdassets.com/hc/settings_assets/123287/200059317/eJ7jArRKlUx7k9xMUMQDVQ-MyOrderDesk-Logo-slider1.png" style="vertical-align:middle; padding: 0 10px;" alt="MyOrderDesk" />
    <h2 style="display: inline;">Settings</h2>
</header>
<hr>
<section>
  <nav>
    <style>
    table.table1 {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        padding: 8px;
    }
    </style>
    <table class="table1">
        <td><?php _e("Your MyOrderDesk Account number (PID):", 'menu-test' ); ?> <input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20"></td>
	    <td style="text-align:right;"><input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" style="margin-left: 15px;" /></td>
	</table>
	
	<?php //Displays the rest of the information if a pid is entered (pid greater than zero) ?>
    <?php if ($opt_val > "0"){ ?>
    
	<br>
	<h2 style="margin: 0;">Embed Shortcodes</h2>
	<h5 style="margin: 0;">Place these on your pages</h5>
	<hr>
	<br>

    <table class="table1">
    <tr>
        <td>My Account shortcode:</td>
        <td><input type="text" value="[mod-myaccount]" class="field left" readonly></td>
        <td style="text-align:right;">Will display the user's My Account Page</td>
      </tr>
      <tr>
        <td>Sign Out shortcode:</td>
        <td><input type="text" value="[mod-signout]" class="field left" readonly></td>
        <td style="text-align:right;">Will sign the user out of the page they are viewing</td>
      </tr>
      <tr>
        <td>Main Order Page shortcode:</td>
        <td><input type="text" value="[mod-order]" class="field left" readonly></td>
        <td style="text-align:right;">Will display the top level order page (if used)</td>
      </tr>
      <tr>
        <td>Job History shortcode:</td>
        <td><input type="text" value="[mod-history]" class="field left" readonly></td>
        <td style="text-align:right;">Will display the user's Job and Order history</td>
      </tr>
      <tr>
        <td>Cart shortcode:</td>
        <td><input type="text" value="[mod-cart]" class="field left" readonly></td>
        <td style="text-align:right;">Will display the user's active carts, if they have any</td>
      </tr>
    </table>
	<br>
	<br>
	<h2 style="margin: 0;">Custom Embed Shortcodes</h2>
	<h5 style="margin: 0;">Used to embed custom Order forms or Catalogs</h5>
	<hr>
	<br>
	<table class="table1">
    <tr>
        <td>Order Form shortcode:</td>
        <td style="text-align:center;"><input type="text" value='[mod-orderform form="######"]' class="field left" style="width: 225px;" readonly></td>
        <td style="text-align:right;">Will display a specific order form based on the defined ID</td>
      </tr>
      <tr>
        <td>Catalog shortcode:</td>
        <td style="text-align:center;"><input type="text" value='[mod-catalog catalog="######"]' class="field left" style="width: 225px;" readonly></td>
        <td style="text-align:right;">Will display a specific catalog based on the defined ID</td>
      </tr>
    </table>
	<?php } ?>
  </nav>
  
  <article>
    <h2 style="margin: 0;">Instructions</h2>
	<h5 style="margin: 0;">How to use and set up this plugin</h5>
	<hr>
	<br>
	<p>1.) Enter your page's PID into the text box, then click "Save Changes"</p>
	<p>You can find your PID in the URL of your order page.</p>
	<p>For example, if your URL is https://www.myorderdesk.com/Catalog/?Provider_ID=1052531 - then your PID will be 1052531</p>
	<br>
	<p>2.) Copy whichever shortcode you want to use.</p>
	<br>
	<p>3.) Navigate to the page you wish to display the code on. If you are using fusion builder, you can simply paste it into a Code Block element, or if you are wanting to use a different method, you can just paste it into your HTML wherever you would like it to display.</p>
	<br>
	<p>4.) [Only for the custom Order Form or Catalog page code] Change the #### in your code, to the ID of the catalog or order form you wish to display.</p>
	<p>For example, if the URL of your order form is https://www.myorderdesk.com/FormV2.asp?Provider_ID=1052531&OrderFormID=457659&CatalogID=0 - the order form ID will be 457659</p>
	<br>
	<p>And it's that simple!</p>
  </article>
</section>

	<?php //Displays the rest of the information if a pid is entered (pid greater than zero) ?>
    <?php if ($opt_val > "0"){ ?>

<br>
	<br>
	<h2 style="margin: 0;">Your MyOrderDesk webpage</h2>
	<h5 style="margin: 0;">This is how your webpage will display</h5>
	<hr>
	<br>
	<div>
    <iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/jobsubmit.asp?Provider_ID=<?php echo $opt_val; ?>&force=1" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)" ></iframe>
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
    
    <?php } ?>
    
    <br>
    <br>

	<h2 style="margin: 0;">About</h2>
	<hr>
	<br>
	Version:      beta_3 (Development release 2)
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
//End Code
