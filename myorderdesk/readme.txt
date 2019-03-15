=== MyOrderDesk ===
Contributors: pagepath, rmagnuson
Tags: myorderdesk, my, order, desk, order desk, web, to, print, portal, printers, plan, pagepath, page, path
Tested up to: 5.0.2
Stable tag: 3.1.1
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

This is a simple plugin that is used to make embedding a MyOrderDesk webpage into WordPress faster, and easier.

== Installation ==
For manual installation:

1. Upload the plugin files to the `/wp-content/plugins/` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the `Plugins` screen in WordPress
3. Use the MyOrderDesk screen to configure the plugin

== Frequently Asked Questions ==
= Setup =

To get the plugin to know which page to display, you will need to enter your MyOrderDesk Provider ID for the page you want to display. There are two ways you can locate this:

Method 1:

Navigate to the top level order page of the MyOrderDesk webpage. The URL of your webpage will look similar to the following:
https://www.myorderdesk.com/Catalog/?Provider_ID=#####
The last set of numbers at the end of your URL will be your Provider ID, and you can enter that into the field above.

Method 2:

While logged into your webpage as an administrator, open the administration menu by clicking the three horizontal lines in the top left corner of the screen.

Directly below the word "Administration", you will see a dropdown menu that says "[#####] Your Company Name" The numbers inside of the square brackets will be your Provider ID, and you can enter that into the field above.

Once you successfully enter your account Provider ID, the page layout should change and you should see a list of shortcodes that can be used to display specific pages based on that Provider ID.

= Linking =

The final step of setup is putting the shortcode onto the respective pages that you want your site to appear on.

To do this, all you need to do is copy the [mod-xxxxxx] text, and paste it into the page that you want it to display on. The plugin will handle everything else for you, and it\'s that simple!

For more complex scenarios, where you want to embed specific order forms, catalgos, or use a branded site, you can implement that by changing the modifier designated to it.
[mod-orderform form="###"] is used to link specific order forms
[mod-catalog catalog="###"] is used to link specific catalogs
site="###" can be added to any shortcodes as well, to change what site is being displayed, rather than the master set in settings. This lets you link branded websites.

== Changelog ==
= 3.1.1 =
*Fixed a bug where old pages would display in the list (post_status = 'publish' was not being respected)

= 3.1 =
+"Locations" list can now search inside themefusion code blocks

= 3.0 =
+"Locations" section added. Lists all pages (that it can find in the database) with any of the shortcodes on it.
+Index.php for plugin folders. Disallows direct access.
+Support for branded sites via site="###" in all shortcodes.
*File structure subdivided (Majour change)
*Small performance increases

= 2.6.3 = 
*Compatibility for wordpress 5.0

= 2.6.2 =
*Stability changes

= 2.6.1 =
+Notify the user on the mod page when an update is released

= 2.6 =
*Fixed an issue where the iframe is generated at the top of the page no matter where the shortcode is inserted

= 2.5 =
+Email Notifications (w2p) sections
*Cleaned up notes

= 2.4 =
+Faq section
+Error message for invalid PID
*Expanded readme.txt
*Changed instruction link
*Changed how instruction link opens
*Changed plugin description

= 2.3 =
*Hid shortcode commands when the user does not enter a PID, or enters an invalid one.
*Forced numbers in the input box
*Sanitized the value field correctly
*Fixed a bug where you could not update your PID number
*Displayed instructions on how to locate your PID

= 2.2 =
*Made shortcode on the settings page a hyperlink to the respective pages.

= 2.1 =
*Fixed hardcoded plugin folder name
*Localized all files
*Enqueued all scripts

= 2.0 =
*Fixed generic function names
*Removed remote images
*Enqueued styles
*Set up a nonce for the data field
*Secured the variable for the MOD number
*Changed the plugin name

= 1.0 =
*Official Release

== Upgrade Notice ==
We are constantly rolling out updates with new features and security updates to keep you safe and help you save time.