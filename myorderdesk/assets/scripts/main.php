<?php
function myorderdesk_settingsmenu() {
	add_menu_page( 'MyOrderDesk Settings', 'MyOrderDesk', 'manage_options', 'mod', 'myorderdesk_options' );
}

function myorderdesk_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// variables for the field and option names 
    $opt_name = 'mod_number';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name = 'mod_number';
    $modnumberisvalid = '0';
	
	$currentversion = "3.1.1";
	$newestversion = file_get_contents( "http://plugins.svn.wordpress.org/myorderdesk/trunk/version.txt" ); // get the contents, and echo it out.
	
	//Locations code
	global $wpdb;
	$query = "SELECT ID, post_title, guid FROM ".$wpdb->posts." WHERE (post_content LIKE '%[mod-%' OR post_content LIKE '%W21vZC1%') AND post_status = 'publish'";
	$results = $wpdb->get_results ($query);

    // Read an existing option value from database
    $opt_val = get_option( $opt_name );
    
    $opt_val = sanitize_text_field( $opt_val );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' && wp_verify_nonce($_POST['mod_nonce'], 'mod-nonce')) {
        
        $opt_val = get_option( $opt_name );
        
        $opt_val = sanitize_text_field( $opt_val );
        
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put a "settings saved" message on the screen

?>
<div class="updated"><p><strong><?php _e('Settings Saved.', 'menu-test' ); ?></strong></p></div>
<?php

    } else {
		if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' && wp_verify_nonce($_POST['mod_nonce'], 'mod-nonce') == false) {
            ?>
            <div class="error"><p><strong><?php _e('Settings could not be saved. Are you sure you wanted to do that? Error code NV-NCE', 'menu-test' ); ?></strong></p></div>
            <?php
        } else {
            if(isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y') {
            ?>
            <div class="error"><p><strong><?php _e('Something went wrong. Please report this to PagePath if you see this message. Error code NCE', 'menu-test' ); ?></strong></p></div>
            <?php
            }
        }
    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( '', 'menu-test' ) . "</h2>";

    //Load the stylesheet and js into the page
    
    wp_enqueue_style( 'mod_stylesheet', MODWOP_CSS_URL . 'stylesheet.css' );

    //Call the MODlogo.png url
    
    $mod_modlogo = MODWOP_IMAGES_URL . 'MODlogo.png';

    //check if mod number is a valid pid

    if($opt_val > '0' && $opt_val <= '1000000000') {
        $modnumberisvalid = '1';
    } else {
        $modnumberisvalid = '0';
    }

    //form
?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y" />
<input type="hidden" name="mod_nonce" value="<?php echo wp_create_nonce('mod-nonce'); ?>"/>

<!-- Start web code-->
<?php do_action( 'admin_print_styles' ) ?>

<table class="page">
    <tr>
        <td style="width: 66%;">
            <header>
                <img src="<?php echo $mod_modlogo ?>" style="vertical-align:middle; padding: 0 10px;" alt="MyOrderDesk" />
                <h2 style="display: inline;">Settings</h2>
            </header>
            <subheader>
                <br>
                <h2>
                    Thanks for installing the MyOrderDesk plugin!
                    <br>
                    For instructions on how to use this plugin, you can find them on this page: <a href="https://wordpress.org/plugins/myorderdesk/#faq" target="_blank">https://wordpress.org/plugins/myorderdesk/#faq/</a>
					<?php if ( $newestversion > $currentversion ) {
						echo "<p><font color='red' size='4'>There is a new version of the plugin available! Update here: <a href=/wp-admin/plugins.php'>/wp-admin/plugins.php</a></font></p>";
					}
					?>
                </h2>
                <hr>
            </subheader>
            <settingsbody>
                <mnsleft>
                    <?php _e("Your MyOrderDesk Provider ID:", 'menu-test' ); ?> <input type="number" max="10000000000" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
                </mnsleft>
                <mnsright>
                    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" style="margin-left: 15px;" />
                </mnsright>
                <br>
                <br>
                <br>
                
                <?php
                if($modnumberisvalid == '0') {
                    ?>
                    <div class="error"><p><strong><?php _e('Your Provider ID can not be blank, negative, or zero.', 'menu-test' ); ?></strong></p></div>
                <h1>
                    How do I find my Provider ID?
                </h1>
                <hr>
                <br>
                <p>Each MyOrderDesk site has their own Provider ID assigned to their account, and there are two easy methods of finding out what yours is.</p>
                <br>
	            <h3 style="margin: 0;">Method 1:</h3>
	            <p>Navigate to the top level order page of the MyOrderDesk webpage. The URL of your webpage will look similar to the following:</p>
	            <p><b>https://www.myorderdesk.com/Catalog/?Provider_ID=#####</b></p>
	            <p>The last set of numbers at the end of your URL will be your Provider ID, and you can enter that into the field above.</p>
	            <br>
	            <h3 style="margin: 0;">Method 2:</h3>
	            <p>While logged into your webpage as an administrator, open the administration menu by clicking the three horizontal lines in the top left corner of the screen.</p>
	            <p>Directly below the word "Administration", you will see a dropdown menu that says "<b>[#####] Your Company Name</b>"</p>
	            <p>The numbers inside of the square brackets will be your Provider ID, and you can enter that into the field above.</p>
                    
                    <?php
                } else {
                    ?>
                
                <h1>
                    Shortcode
                </h1>
                <hr>
                <br>
                <table class="table1">
                    <tr>
                        <td>Display the My Account page:</td>
                        <td><input type="text" value="[mod-myaccount]" class="field left" readonly style="margin-right: 10px"><a href="https://www.myorderdesk.com/settings.asp?Provider_ID=<?php echo $opt_val; ?>" target="_blank">Preview</a></td>
                    </tr>
                    <tr>
                        <td>Sign the user in:</td>
                        <td><input type="text" value="[mod-signin]" class="field left" readonly style="margin-right: 10px"><a href="https://www.myorderdesk.com/SignIn/?Provider_ID=<?php echo $opt_val; ?>&force=1" target="_blank">Preview</a></td>
                    </tr>
                    <tr>
                        <td>Sign the user out:</td>
                        <td><input type="text" value="[mod-signout]" class="field left" readonly style="margin-right: 10px"><a href="https://www.myorderdesk.com/logout.asp?Provider_ID=<?php echo $opt_val; ?>" target="_blank">Preview</a></td>
                    </tr>
                    <tr>
                        <td>Display the main order page:</td>
                        <td><input type="text" value="[mod-order]" class="field left" readonly style="margin-right: 10px"><a href="https://www.myorderdesk.com/jobsubmit.asp?Provider_ID=<?php echo $opt_val; ?>&force=1" target="_blank">Preview</a></td>
                    </tr>
                    <tr>
                        <td>Display the user's Job history:</td>
                        <td><input type="text" value="[mod-history]" class="field left" readonly style="margin-right: 10px"><a href="https://www.myorderdesk.com/Jobs.asp?provider_id=<?php echo $opt_val; ?>" target="_blank">Preview</a></td>
                    </tr>
                    <tr>
                        <td>Display the user's carts:</td>
                        <td><input type="text" value="[mod-cart]" class="field left" readonly style="margin-right: 10px"><a href="https://www.myorderdesk.com/carts.asp?Provider_ID=<?php echo $opt_val; ?>" target="_blank">Preview</a></td>
                    </tr>
                </table>
                <br>
                <br>
                <h1>
                    Custom Shortcode
                </h1>
                <hr>
                <br>
                <table class="table1">
                    <tr>
                        <td>Display a specific order form:</td>
                        <td><input type="text" value='[mod-orderform form="######"]' class="field left" style="width: 225px;" readonly></td>
                    </tr>
                    <tr>
                        <td>Display a specific catalog:</td>
                        <td><input type="text" value='[mod-catalog catalog="######"]' class="field left" style="width: 225px;" readonly></td>
                    </tr>
                </table>
                <br>
                <br>
	            <h1 style="margin: 0;">W2P (Email Notifications)</h2>
	            <hr>
	            <br>
	            <p>You must setup a page on your Wordpress site that can be used when you or your users click on email links.</p>
                <p>In your Wordpress website, create a new page and name it: w2p</p>
                <p>Paste the code below onto that page and save the page. When the MyOrderDesk techs take your site live they will setup the configuration within your MyOrderDesk website.</p>
                <input type="text" value="[mod-w2p]" class="field left" readonly>
                <br>
                <br>
                <?php
                } ?>
                <br>
                <br>
                <h1 style="margin: 0;">Locations</h1>
				<p>A URL list of all the places you are using shortcode</p>
	            <hr>
	            <br>
	            <?php
				foreach ( $results as $results ) {
					?>
						<p>
							<a href="/?page_id=<?php echo $results->ID;?>">
							<?php echo $results->post_title;?>
							</a>
						<br>
						</p>
					<?php
					}
				?>
				<br>
                <br>
                <h2 style="margin: 0;">About</h2>
	            <hr>
	            <br>
	                Version:      3.1.1
                </settingsbody>
            </td>
            <td>
                <!--Do not delete this. This moves the site over.-->
            </td>
        </tr>
    </table>
</form>
</div>

<!-- End web code -->

<?php
 
}

?>