<?php
//      FUNCTION AND SHORTCODE ASSEMBLY       //

//Builds the My Account frame & shortcode
function mod_myaccount_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/settings.asp?Provider_ID=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-myaccount', 'mod_myaccount_frame' );

//Builds the Sign out frame & shortcode
function mod_signout_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/logout.asp?Provider_ID=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-signout', 'mod_signout_frame' );

//Builds the Sign in frame & shortcode
function mod_signin_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/SignIn/?Provider_ID=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-signin', 'mod_signin_frame' );

//Builds the Main order page & shortcode
function mod_order_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/jobsubmit.asp?Provider_ID=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;	
}
//shortcode
add_shortcode( 'mod-order', 'mod_order_frame' );

//Builds the Job history page & shortcode
function mod_history_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/Jobs.asp?provider_id=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;	
}
//shortcode
add_shortcode( 'mod-history', 'mod_history_frame' );

//Builds the Shopping cart page & shortcode
function mod_cart_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/carts.asp?Provider_ID=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-cart', 'mod_cart_frame' );


//      MANUAL ORDER FORM / CATALOG ENTRY       //

//Builds the Order Form page & shortcode
function mod_orderform_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
        'form' => 0, //default order form number - will error without a value
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/jobsubmit.asp?Provider_ID=' . $site . '&OrderFormID=' . $form . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-orderform', 'mod_orderform_frame' );

//Builds the Catalog page & shortcode
function mod_catalog_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
        'catalog' => 0, //default catalog number - will error without a value
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.MyOrderDesk.com/Catalog/?Provider_ID=' . $site . '&CatalogID=' . $catalog . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-catalog', 'mod_catalog_frame' );

//Builds the w2p frame & shortcode
function mod_w2p_frame( $atts ) {
	
	$opt_name = 'mod_number';
	$opt_val = get_option( $opt_name );
	
	extract( shortcode_atts( array(
		'site' => $opt_val
    ), $atts ) );
	
	//Enqueue the iframe stylization
    wp_enqueue_script( 'mod_frameresizer', MODWOP_IFRAME_URL . 'iframeresizer.min.js', $in_footer = true ); //Calls the resize code
    wp_enqueue_script( 'mod_frameresizer1', MODWOP_IFRAME_URL . 'MODSkinService.js', $in_footer = true ); //Calls the mod skin code
    wp_enqueue_script( 'mod_frameresizer2', MODWOP_IFRAME_URL . 'ifrzsk.js', $in_footer = true ); //Runs the resize and skin code
	
	$testvar1 = '<div><iframe id="mainFrame" name="mainFrame" src="https://www.myorderdesk.com/settings.asp?Provider_ID=' . $site . '" scrolling="no" allowtransparency="true" style="border:0px solid gray; background-color:transparent; width:100%; height:1600px" onload="window.parent.parent.scrollTo(0,0)"></iframe></div>';
	
	return $testvar1;
}
//shortcode
add_shortcode( 'mod-w2p', 'mod_w2p_frame' );
?>