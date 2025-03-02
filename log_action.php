<?php
// log_action.php

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

// Validate if the required data exists
if (isset($data['query']) && isset($data['action'])) {
    // File where we will store the logged actions
    $logFile = 'actions_log.json';

    // Get existing log data (if any)
    if (file_exists($logFile)) {
        $jsonData = json_decode(file_get_contents($logFile), true);
    } else {
        $jsonData = [];
    }

    // Create a new entry
    $newEntry = [
        'query' => $data['query'],
        'action' => $data['action'],
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Add the new entry to the data array
    $jsonData[] = $newEntry;

    // Save the updated data back to the file
    file_put_contents($logFile, json_encode($jsonData, JSON_PRETTY_PRINT));

    // Respond with success
    echo json_encode(['status' => 'success']);
} else {
    // Respond with an error if required data is not provided
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
?>
