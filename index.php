<?php
// Server-side logic to handle requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'getTime') {
        echo json_encode(array('time' => date('H:i:s')));
    } elseif (isset($_GET['action']) && $_GET['action'] === 'getDate') {
        echo json_encode(array('date' => date('Y-m-d')));
    } else {
        echo json_encode(array('message' => 'Welcome to Viras, your virtual assistant.'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request.'));
}
?>
