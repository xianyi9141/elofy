<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PushNotification {
	// (Android)API access key from Google API's Console.
	private static $API_ACCESS_KEY = 'AAAAfXJLCFs:APA91bGcfLZC4iXHqhqN6ebfLU0cYRC7KgAL1i99gVe7YUtc0ofI0HlcVzZDjDapWPbZi8v3_JOqshOjuDK_hpYs-Mvf9w_FaRFLR3S6A0z_WALU6NXBrj6yXEvNbb4rasC73JtMqx-l';
	// (iOS) Private key's passphrase.
	private static $passphrase = 'elofy';
	
	public function __construct() {
		exit('Init function is not allowed');
	}
	
	// Sends Push notification for Android users
	public static function android($data, $tokens) {
		$url = 'https://android.googleapis.com/gcm/send';
		$headers = array(
			'Authorization: key=' .self::$API_ACCESS_KEY,
			'Content-Type: application/json'
		);

		$fields = array(
			'registration_ids' => $tokens,
			'data' => $data
		);

		// Open connection
		$ch = curl_init();
		// Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Disabling SSL Certificate support temporarly
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
		// Execute post
		$result = curl_exec($ch);
		if ($result === FALSE) {
			return false;
		}
 
		// Close connection
		curl_close($ch);

		return true;
	}
	
	// Sends Push notification for iOS users
	public static function iOS($data, $tokens) {
		$ctx = stream_context_create();

		// elofy.pem is your certificate file
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'elofy.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', self::$passphrase);

		// Open a connection to the APNS server
		// $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		if (!$fp) {
			return false;
		}
		// Create the payload body
		$body['aps'] = array(
			'alert' => $data,
			'sound' => 'default'
		);
		// Encode the payload as JSON
		$payload = json_encode($body);
		foreach ($tokens as $token) {
			// Build the binary notification
			$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
			// Send it to the server
			fwrite($fp, $msg, strlen($msg));
		}
		
		// Close the connection to the server
		fclose($fp);

		return true;
	}
}