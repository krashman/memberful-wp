<?php if ( ! empty( $subscriptions ) || ! empty( $products ) ) : ?>
	<div class="memberful-restrict-access-options">
		<h4 style="font-size: 13px;"><?php _e( 'Required for access', 'memberful' ); ?></h4>
		<p class="memberful-select-all"><a href="#">select all</a> | <a href="#">select none</a>
		<?php if ( ! empty( $subscriptions ) ) : ?>
			<div id="memberful-subscriptions">
				<ul>
				<?php foreach($subscriptions as $id => $subscription): ?>
					<li>
						<label>
							<input type="checkbox" name="memberful_subscription_acl[]" value="<?php echo $id; ?>" <?php checked( $subscription['checked'] ); ?>>
							<?php echo esc_html( $subscription['name'] ); ?>
						</label>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
		<?php if ( ! empty( $products ) ) : ?>
			<div id="memberful-products">
				<p class="memberful-access-label"><?php _e( 'Products', 'memberful' ); ?></p>
				<ul>
				<?php foreach($products as $id => $product): ?>
					<li>
						<label>
							<input type="checkbox" name="memberful_product_acl[]" value="<?php echo $id; ?>" <?php checked( $product['checked'] ); ?>>
							<?php echo esc_html( $product['name'] ); ?>
						</label>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
	<div class="memberful-protected-content">
		<?php

		$content = "This marketing content will be shown in place of your protected content to anyone <strong>without</strong> the required access...";
		$editor_id = 'memberful_protected_content_message';
		wp_editor( $content, $editor_id, $settings );

		?>
		<div class="memberful-restricted-access-content-description">
			<label>
				<input type="checkbox">
				Make this the default marketing content
			</label>
		</div>
	</div>
<?php else: ?>
	<div>
		<p><em><?php _e( "We couldn't find any products or subscriptions in your Memberful account. You'll need to add some before you can restrict access.", 'memberful' ); ?></em></p>
	</div>
<?php endif; ?>