<?php
// Define constants for API endpoints
define('API_BASE_URL', 'http://localhost/api/'); // Change this to your actual backend API base URL

class APIService {
    // Function to make GET requests to the API
    public static function get($endpoint) {
        $url = API_BASE_URL . $endpoint;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    // Function to make POST requests to the API
    public static function post($endpoint, $data) {
        $url = API_BASE_URL . $endpoint;
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    // Function to make PUT requests to the API
    public static function put($endpoint, $data) {
        $url = API_BASE_URL . $endpoint;
        $options = [
            'http' => [
                'method' => 'PUT',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }

    // Function to make DELETE requests to the API
    public static function delete($endpoint) {
        $url = API_BASE_URL . $endpoint;
        $options = [
            'http' => [
                'method' => 'DELETE'
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        return json_decode($response, true);
    }
}
?>
