<div class="wrap">
	<h1>All-in-One GDPR: No Comment IP Addresses</h1>
	<p>This WordPress plugin will stop your side from inadvertently collecting your users IP Addresses which constitute personal data under GDPR.</p>
	<p>More GDPR plugins availble at <a href="https://gdprplug.in/">GDPRPlug.in</a></p>

	<?php if(isset($_REQUEST['rows_affected'])): ?>
		<div class="notice notice-success is-dismissible">
			<p>
				Success! <?php echo $_REQUEST['rows_affected'] ?> rows have been updated.
			</p>
		</div>
	<?php endif; ?>

	<?php if(isset($_REQUEST['success'])): ?>
		<div class="notice notice-success is-dismissible">
			<p>
				Settings saved.
			</p>
		</div>
	<?php endif; ?>

	<form method="post" action="<?php echo admin_url('/admin-ajax.php'); ?>">
		<input type="hidden" name="action" value="aio_gdpr_no_ips_admin_submit">

		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">Enabled</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span>Enabled</span>
							</legend>
							
							<label for="aiogdpr_no_ip_enabled">
								<input name="aiogdpr_no_ip_enabled" type="checkbox" id="aiogdpr_no_ip_enabled" value="1" <?php echo (get_option('AIO_GDPR_NO_IP_enabled') === '1')? ' checked ' : '';  ?>>
							</label>
						</fieldset>
					</td>
				</tr>

				<tr>
					<th scope="row">Default IP address</th>
					<td>
						<fieldset>
							<legend class="screen-reader-text">
								<span>Default IP address</span>
							</legend>

							<label for="aiogdpr_no_ip_default">
								<input name="aiogdpr_no_ip_default" type="text" id="aiogdpr_no_ip_default" value="<?php echo get_option('AIO_GDPR_NO_IP_default') ?>">
							</label>
							<p class="description">All new comments will be reset to the value you speift in the field above.</p>
						</fieldset>
					</td>
				</tr>

				<tr>
					<th scope="row">
						<?php submit_button(); ?>
					</th>
					<td>
						
					</td>
				</tr>
			</tbody>
		</table>
	</form>

	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">Remove all existing IP addresses</th>
				<td>
					<a class="button button-primary" href="<?php echo admin_url('/admin-ajax.php') .'?action=aio_gdpr_no_ips_purge' ?>">Click here</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>