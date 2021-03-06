<?php
/**
 * Configuration file for creating the 'system' metaboxes.
 * Additionally provides save and retrieve algorithms.
 *
 * @package Tag Wall - Twenty Seventeen
 * @since   0.1.0
 */

/**
 * Create 'Custom Meta' metaboxes for the 'system' custom post type.
 *
 * @since  0.1.0
 * @uses   add_meta_box()
 * @return void
 */
function tagwall_systems_metaboxes() {
	add_meta_box(
		'system-left-1',
		__( 'System Left 1', 'tagwall' ),
		'tagwall_system_left_1_callback',
		'system'
	);

	add_meta_box(
		'system-left-2',
		__( 'Systems Left 2', 'tagwall' ),
		'tagwall_system_left_2_callback',
		'system'
	);

	add_meta_box(
		'system-left-3',
		__( 'Systems Left 3', 'tagwall' ),
		'tagwall_system_left_3_callback',
		'system'
	);

	add_meta_box(
		'configuration',
		__( 'Systems Configuration', 'tagwall' ),
		'tagwall_systems_configuration_callback',
		'system'
	);

	add_meta_box(
		'custom-one',
		__( 'Systems Custom Meta One', 'tagwall' ),
		'tagwall_systems_custom_one_callback',
		'system'
	);

	add_meta_box(
		'custom-two',
		__( 'Systems Custom Meta Two', 'tagwall' ),
		'tagwall_systems_custom_two_callback',
		'system'
	);

	add_meta_box(
		'custom-three',
		__( 'Systems Custom Meta Three', 'tagwall' ),
		'tagwall_systems_custom_three_callback',
		'system'
	);

	add_meta_box(
		'custom-four',
		__( 'Systems Custom Meta Four', 'tagwall' ),
		'tagwall_systems_custom_four_callback',
		'system'
	);

	add_meta_box(
		'custom-five',
		__( 'Systems Custom Meta Five', 'tagwall' ),
		'tagwall_systems_custom_five_callback',
		'system'
	);

	add_meta_box(
		'custom-six',
		__( 'Systems Custom Meta Six', 'tagwall' ),
		'tagwall_systems_custom_six_callback',
		'system'
	);

	add_meta_box(
		'custom-seven',
		__( 'Systems Custom Meta Seven', 'tagwall' ),
		'tagwall_systems_custom_seven_callback',
		'system'
	);

	add_meta_box(
		'custom-eight',
		__( 'Systems Custom Meta Eight', 'tagwall' ),
		'tagwall_systems_custom_eight_callback',
		'system'
	);

	add_meta_box(
		'custom-nine',
		__( 'Systems Custom Meta Nine', 'tagwall' ),
		'tagwall_systems_custom_nine_callback',
		'system'
	);

	add_meta_box(
		'custom-ten',
		__( 'Systems Custom Meta Ten', 'tagwall' ),
		'tagwall_systems_custom_ten_callback',
		'system'
	);
}
add_action( 'add_meta_boxes', 'tagwall_systems_metaboxes' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_system_left_1_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_system_left_1_save_data', 'tagwall_system_left_1_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$left_name_1 = get_post_meta( $post->ID, 'left_name_1', true );
	$left_link_1 = get_post_meta( $post->ID, 'left_link_1', true ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="left_name_1"><?php echo __( 'Name', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="left_name_1" name="left_name_1" style="width: 100%;"><?php echo esc_textarea( $left_name_1 ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="left_link_1"><?php echo __( 'Link', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="left_link_1" name="left_link_1" style="width: 100%;"><?php echo esc_textarea( $left_link_1 ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_system_left_1_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_system_left_1_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_system_left_1_nonce'], 'tagwall_system_left_1_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$left_name_1 = $_POST['left_name_1'];
	$left_link_1 = $_POST['left_link_1'];

	// Update the meta field in the database.
	update_post_meta( $post_id, 'left_name_1', $left_name_1 );
	update_post_meta( $post_id, 'left_link_1', $left_link_1 );
}
add_action( 'save_post', 'tagwall_system_left_1_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_system_left_2_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_system_left_2_save_data', 'tagwall_system_left_2_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$left_name_2 = get_post_meta( $post->ID, 'left_name_2', true );
	$left_link_2 = get_post_meta( $post->ID, 'left_link_2', true ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="left_name_2"><?php echo __( 'Name', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="left_name_2" name="left_name_2" style="width: 100%;"><?php echo esc_textarea( $left_name_2 ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="left_link_2"><?php echo __( 'Link', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="left_link_2" name="left_link_2" style="width: 100%;"><?php echo esc_textarea( $left_link_2 ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_system_left_2_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_system_left_2_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_system_left_2_nonce'], 'tagwall_system_left_2_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$left_name_2 = $_POST['left_name_2'];
	$left_link_2 = $_POST['left_link_2'];

	// Update the meta field in the database.
	update_post_meta( $post_id, 'left_name_2', $left_name_2 );
	update_post_meta( $post_id, 'left_link_2', $left_link_2 );
}
add_action( 'save_post', 'tagwall_system_left_2_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_system_left_3_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_system_left_3_save_data', 'tagwall_system_left_3_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$left_name_3 = get_post_meta( $post->ID, 'left_name_3', true );
	$left_link_3 = get_post_meta( $post->ID, 'left_link_3', true ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="left_name_3"><?php echo __( 'Name', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="left_name_3" name="left_name_3" style="width: 100%;"><?php echo esc_textarea( $left_name_3 ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="left_link_3"><?php echo __( 'Link', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="left_link_3" name="left_link_3" style="width: 100%;"><?php echo esc_textarea( $left_link_3 ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_system_left_3_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_system_left_3_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_system_left_3_nonce'], 'tagwall_system_left_3_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$left_name_3 = $_POST['left_name_3'];
	$left_link_3 = $_POST['left_link_3'];

	// Update the meta field in the database.
	update_post_meta( $post_id, 'left_name_3', $left_name_3 );
	update_post_meta( $post_id, 'left_link_3', $left_link_3 );
}
add_action( 'save_post', 'tagwall_system_left_3_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_configuration_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_configuration_save_data', 'tagwall_configuration_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$gallery = json_decode( get_post_meta( $post->ID, 'gallery', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="gallery"><?php echo __( 'Gallery Link:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="gallery" name="gallery" style="width: 100%;"><?php echo esc_textarea( $gallery ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_configuration_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_configuration_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_configuration_nonce'], 'tagwall_systems_configuration_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$gallery = json_encode( $_POST['gallery'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'gallery', $gallery );
}
add_action( 'save_post', 'tagwall_systems_configuration_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_one_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_one_save_data', 'tagwall_custom_one_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_one_title   = json_decode( get_post_meta( $post->ID, 'custom_one_title', true ) );
	$custom_one_content = json_decode( get_post_meta( $post->ID, 'custom_one_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_one_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_one_title" name="custom_one_title" style="width: 100%;"><?php echo esc_textarea( $custom_one_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_one_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_one_content" name="custom_one_content" style="width: 100%;"><?php echo esc_textarea( $custom_one_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_one_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_one_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_one_nonce'], 'tagwall_systems_custom_one_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_one_title   = json_encode( $_POST['custom_one_title'] );
	$custom_one_content = json_encode( $_POST['custom_one_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_one_title', $custom_one_title );
	update_post_meta( $post_id, 'custom_one_content', $custom_one_content );
}
add_action( 'save_post', 'tagwall_systems_custom_one_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_two_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_two_save_data', 'tagwall_custom_two_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_two_title   = json_decode( get_post_meta( $post->ID, 'custom_two_title', true ) );
	$custom_two_content = json_decode( get_post_meta( $post->ID, 'custom_two_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_two_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_two_title" name="custom_two_title" style="width: 100%;"><?php echo esc_textarea( $custom_two_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_two_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_two_content" name="custom_two_content" style="width: 100%;"><?php echo esc_textarea( $custom_two_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_two_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_two_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_two_nonce'], 'tagwall_systems_custom_two_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_two_title   = json_encode( $_POST['custom_two_title'] );
	$custom_two_content = json_encode( $_POST['custom_two_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_two_title', $custom_two_title );
	update_post_meta( $post_id, 'custom_two_content', $custom_two_content );
}
add_action( 'save_post', 'tagwall_systems_custom_two_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_three_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_three_save_data', 'tagwall_custom_three_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_three_title   = json_decode( get_post_meta( $post->ID, 'custom_three_title', true ) );
	$custom_three_content = json_decode( get_post_meta( $post->ID, 'custom_three_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_three_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_three_title" name="custom_three_title" style="width: 100%;"><?php echo esc_textarea( $custom_three_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_three_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_three_content" name="custom_three_content" style="width: 100%;"><?php echo esc_textarea( $custom_three_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_three_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_three_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_three_nonce'], 'tagwall_systems_custom_three_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_three_title   = json_encode( $_POST['custom_three_title'] );
	$custom_three_content = json_encode( $_POST['custom_three_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_three_title', $custom_three_title );
	update_post_meta( $post_id, 'custom_three_content', $custom_three_content );
}
add_action( 'save_post', 'tagwall_systems_custom_three_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_four_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_four_save_data', 'tagwall_custom_four_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_four_title   = json_decode( get_post_meta( $post->ID, 'custom_four_title', true ) );
	$custom_four_content = json_decode( get_post_meta( $post->ID, 'custom_four_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_four_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_four_title" name="custom_four_title" style="width: 100%;"><?php echo esc_textarea( $custom_four_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_four_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_four_content" name="custom_four_content" style="width: 100%;"><?php echo esc_textarea( $custom_four_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_four_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_four_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_four_nonce'], 'tagwall_systems_custom_four_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_four_title   = json_encode( $_POST['custom_four_title'] );
	$custom_four_content = json_encode( $_POST['custom_four_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_four_title', $custom_four_title );
	update_post_meta( $post_id, 'custom_four_content', $custom_four_content );
}
add_action( 'save_post', 'tagwall_systems_custom_four_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_five_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_five_save_data', 'tagwall_custom_five_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_five_title   = json_decode( get_post_meta( $post->ID, 'custom_five_title', true ) );
	$custom_five_content = json_decode( get_post_meta( $post->ID, 'custom_five_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_five_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_five_title" name="custom_five_title" style="width: 100%;"><?php echo esc_textarea( $custom_five_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_five_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_five_content" name="custom_five_content" style="width: 100%;"><?php echo esc_textarea( $custom_five_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_five_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_five_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_five_nonce'], 'tagwall_systems_custom_five_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_five_title   = json_encode( $_POST['custom_five_title'] );
	$custom_five_content = json_encode( $_POST['custom_five_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_five_title', $custom_five_title );
	update_post_meta( $post_id, 'custom_five_content', $custom_five_content );
}
add_action( 'save_post', 'tagwall_systems_custom_five_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_six_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_six_save_data', 'tagwall_custom_six_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_six_title   = json_decode( get_post_meta( $post->ID, 'custom_six_title', true ) );
	$custom_six_content = json_decode( get_post_meta( $post->ID, 'custom_six_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_six_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_six_title" name="custom_six_title" style="width: 100%;"><?php echo esc_textarea( $custom_six_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_six_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_six_content" name="custom_six_content" style="width: 100%;"><?php echo esc_textarea( $custom_six_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_six_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_six_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_six_nonce'], 'tagwall_systems_custom_six_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_six_title   = json_encode( $_POST['custom_six_title'] );
	$custom_six_content = json_encode( $_POST['custom_six_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_six_title', $custom_six_title );
	update_post_meta( $post_id, 'custom_six_content', $custom_six_content );
}
add_action( 'save_post', 'tagwall_systems_custom_six_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_seven_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_seven_save_data', 'tagwall_custom_seven_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_seven_title   = json_decode( get_post_meta( $post->ID, 'custom_seven_title', true ) );
	$custom_seven_content = json_decode( get_post_meta( $post->ID, 'custom_seven_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_seven_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_seven_title" name="custom_seven_title" style="width: 100%;"><?php echo esc_textarea( $custom_seven_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_seven_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_seven_content" name="custom_seven_content" style="width: 100%;"><?php echo esc_textarea( $custom_seven_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_seven_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_seven_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_seven_nonce'], 'tagwall_systems_custom_seven_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_seven_title   = json_encode( $_POST['custom_seven_title'] );
	$custom_seven_content = json_encode( $_POST['custom_seven_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_seven_title', $custom_seven_title );
	update_post_meta( $post_id, 'custom_seven_content', $custom_seven_content );
}
add_action( 'save_post', 'tagwall_systems_custom_seven_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_eight_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_eight_save_data', 'tagwall_custom_eight_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_eight_title   = json_decode( get_post_meta( $post->ID, 'custom_eight_title', true ) );
	$custom_eight_content = json_decode( get_post_meta( $post->ID, 'custom_eight_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_eight_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_eight_title" name="custom_eight_title" style="width: 100%;"><?php echo esc_textarea( $custom_eight_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_eight_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_eight_content" name="custom_eight_content" style="width: 100%;"><?php echo esc_textarea( $custom_eight_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_eight_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_eight_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_eight_nonce'], 'tagwall_systems_custom_eight_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_eight_title   = json_encode( $_POST['custom_eight_title'] );
	$custom_eight_content = json_encode( $_POST['custom_eight_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_eight_title', $custom_eight_title );
	update_post_meta( $post_id, 'custom_eight_content', $custom_eight_content );
}
add_action( 'save_post', 'tagwall_systems_custom_eight_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_nine_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_nine_save_data', 'tagwall_custom_nine_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_nine_title   = json_decode( get_post_meta( $post->ID, 'custom_nine_title', true ) );
	$custom_nine_content = json_decode( get_post_meta( $post->ID, 'custom_nine_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_nine_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_nine_title" name="custom_nine_title" style="width: 100%;"><?php echo esc_textarea( $custom_nine_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_nine_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_nine_content" name="custom_nine_content" style="width: 100%;"><?php echo esc_textarea( $custom_nine_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_nine_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_nine_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_nine_nonce'], 'tagwall_systems_custom_nine_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_nine_title   = json_encode( $_POST['custom_nine_title'] );
	$custom_nine_content = json_encode( $_POST['custom_nine_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_nine_title', $custom_nine_title );
	update_post_meta( $post_id, 'custom_nine_content', $custom_nine_content );
}
add_action( 'save_post', 'tagwall_systems_custom_nine_save_data' );

/**
 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
 *
 * @since  0.1.0
 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
 * @return void
 */
function tagwall_systems_custom_ten_callback( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'tagwall_systems_custom_ten_save_data', 'tagwall_custom_ten_nonce' );

	/**
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$custom_ten_title   = json_decode( get_post_meta( $post->ID, 'custom_ten_title', true ) );
	$custom_ten_content = json_decode( get_post_meta( $post->ID, 'custom_ten_content', true ) ); ?>

	<table style="width: 100%;">
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_ten_title"><?php echo __( 'Title:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_ten_title" name="custom_ten_title" style="width: 100%;"><?php echo esc_textarea( $custom_ten_title ); ?></textarea>
			</td>
		</tr>
		<tr>
			<td class="label" style="width: 170px">
				<label for="custom_ten_content"><?php echo __( 'Content:', 'tagwall' ); ?></label>
			</td>
			<td>
				<textarea id="custom_ten_content" name="custom_ten_content" style="width: 100%;"><?php echo esc_textarea( $custom_ten_content ); ?></textarea>
			</td>
		</tr>
	</table><?php
}

/**
 * Saves and sanitizes the POST data.
 *
 * @since  0.1.0
 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
 * @return void
 */
function tagwall_systems_custom_ten_save_data( $post_id ) {
	/**
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['tagwall_custom_ten_nonce'] ) )
		return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['tagwall_custom_ten_nonce'], 'tagwall_systems_custom_ten_save_data' ) )
		return;

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) )
		return;

	// Sanitize user input.
	$custom_ten_title   = json_encode( $_POST['custom_ten_title'] );
	$custom_ten_content = json_encode( $_POST['custom_ten_content'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_ten_title', $custom_ten_title );
	update_post_meta( $post_id, 'custom_ten_content', $custom_ten_content );
}
add_action( 'save_post', 'tagwall_systems_custom_ten_save_data' );
