<?php
/*
Plugin Name: Random Dog Picture
Description: A simple plugin to display random dog pictures using shortcode.
Version: 1.0
Author: Patrik Sjeren
*/

// Definiera shortcode och funktionalitet
function random_dog_pic_shortcode($atts) {
	// Set the default error message
	$error_message = "Failed to load a random dog picture.";

	// Make an API request to get a random dog picture
	$response = wp_remote_get("https://dog.ceo/api/breeds/image/random");

	// Check if the request was successful
	if (is_wp_error($response)) {
		// Handle the error
		return $error_message;
	}

	// Parse the JSON response
	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body);

	// Check if the JSON decoding was successful
	if (!$data || empty($data->message)) {
		// Handle the error
		return $error_message;
	}

	// Get the dog picture URL
	$dog_picture_url = $data->message;

	// Display the dog picture
	return "<img src='$dog_picture_url' alt='Random Dog Picture' class='w-50'>";
}

// Register the shortcode
add_shortcode('random_dog_pic', 'random_dog_pic_shortcode');
?>