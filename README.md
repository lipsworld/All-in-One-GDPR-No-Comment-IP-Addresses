# ALL-in-One GDPR: No Comment IP Addresses 

This WordPress plugin will stop your side from inadvertently collecting your users IP Addresses which constitute personal data under GDPR.


# Install

All-in-One GDPR: No Comment IP Addresses can be installed just like any other WordPress plugin.

- Download this rep by clicking [HERE](https://github.com/Ideea-Technologies/All-in-One-GDPR-No-Comment-IP-Addresses/archive/v1.0.zip)
- Login to the back end of your WordPress site buy going to your-site.com/wp-admin
- Click on the button marked plugins from the nav menu in the far left of the screen.
- Click on the ‘Add new’ button at the top of the page, this will take you to the new plugin page, then
- Click on the ‘upload’ button, this will bring up a file dialog box, select the .zip you have just downloaded. Then click open.
- Finally, once the plugin has been uploaded click on the blue 'activate' button.

# Config
To setup All-in-One GDPR: No Comment IP Addresses you will need to open the plugin's settings page. You can get to this page by hovering over the 'Settings' tab in the admin menu and then click on 'No Comment IP Addresses' from the sub-menu.

You can either set the plugin to be enabled or disabled. When disabled the plugin will not change any new comment's IP addresses. When enabled the plugin will use the [wp_insert_comment](https://developer.wordpress.org/reference/hooks/wp_insert_comment/) hook, when a new comment is submitted the hook will replace the IP with the default IP address.

You can set the default IP address by updating the text field labelled 'Default IP address'. When the plugin is enabled and when you purge the column 'comment_author_IP' will be set to this value.

# Purge
If you already have comments on your WordPress site, the 'purge' tool will loop through all existing commnets and will make sure that the comment_author_IP does not contain any IP address for all existing commnets.

# Support
If you have any questions or a feature request please email contact us at support@ideea.co.uk or head to [GDPRPlug.in](https://gdprplug.in)

If you find any bugs or if you would like to improve this plugin please make a pull request!

