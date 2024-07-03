<?php

function elementor_form_email_field_validation( $field, $record, $ajax_handler ) {
	// Validate email format
	if ( ! is_email( $field['value'] ) ) {
		$ajax_handler->add_error( $field['id'], esc_html__( 'Invalid email address, it must be in xx@xx.xx format.', 'textdomain' ) );
		return;
	}

	// Business email validation
	$business_email_regex = '/^[a-zA-Z0-9._%+-]+@(?!gmail\.com$|yahoo\.com$|hotmail\.com$|aol\.com$|outlook\.com$|icloud\.com$|live\.com$|mail\.com$|yandex\.com$|zoho\.com$)[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

	if ( ! preg_match( $business_email_regex, $field['value'] ) ) {
		$ajax_handler->add_error( $field['id'], esc_html__( 'Please use a business email address.', 'textdomain' ) );
		return;
	}

	// Additional validation can be added here.
}
add_action( 'elementor_pro/forms/validation/email', 'elementor_form_email_field_validation', 10, 3 );


//=====================================================================================================================

function elementor_form_email_field_validation( $field, $record, $ajax_handler ) {
    // Retrieve form name
    $form_name = $record->get_form_settings('form_name');

    // Skip validation for the "Newsletter Form"
    if ( $form_name === 'Newsletter Form' ) {
        return;
    }

    // Validate email format
    if ( ! is_email( $field['value'] ) ) {
        $ajax_handler->add_error( $field['id'], esc_html__( 'Invalid email address, it must be in xx@xx.xx format.', 'textdomain' ) );
        return;
    }

    // Business email validation
    $business_email_regex = '/^[a-zA-Z0-9._%+-]+@(?!gmail\.com$|yahoo\.com$|hotmail\.com$|aol\.com$|outlook\.com$|icloud\.com$|live\.com$|mail\.com$|yandex\.com$|zoho\.com$)[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    if ( ! preg_match( $business_email_regex, $field['value'] ) ) {
        $ajax_handler->add_error( $field['id'], esc_html__( 'Please use a business email address.', 'textdomain' ) );
        return;
    }

    // Additional validation can be added here.
}

add_action( 'elementor_pro/forms/validation/email', 'elementor_form_email_field_validation', 10, 3 );



//=====================================================================================================================
function elementor_form_email_field_validation( $field, $record, $ajax_handler ) {
	
	$form_id = $record->get_form_settings( 'form_id' );

	// Add specific form IDs if needed
	$forms_to_validate = array( 'form_1', 'form_2', 'form_3' ); // replace with your actual form IDs

	if ( ! in_array( $form_id, $forms_to_validate ) ) {
		return;
	}

	// Validate email format
	if ( ! is_email( $field['value'] ) ) {
		$ajax_handler->add_error( $field['id'], esc_html__( 'Invalid email address, it must be in xx@xx.xx format.', 'textdomain' ) );
		return;
	}

	// Business email validation
	$business_email_regex = '/^[a-zA-Z0-9._%+-]+@(?!gmail\.com$|yahoo\.com$|hotmail\.com$|aol\.com$|outlook\.com$|icloud\.com$|live\.com$|mail\.com$|yandex\.com$|zoho\.com$)[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

	if ( ! preg_match( $business_email_regex, $field['value'] ) ) {
		$ajax_handler->add_error( $field['id'], esc_html__( 'Please use a business email address.', 'textdomain' ) );
		return;
	}

	// Additional validation can be added here.
}

add_action( 'elementor_pro/forms/validation/email', 'elementor_form_email_field_validation', 10, 3 );

?>
