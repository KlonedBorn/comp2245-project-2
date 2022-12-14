<?php
    session_start();
    if(isset($_SESSION['email'])) {
        $response = array(
            'status' => 200,
            'message' => 'Login confirmed',
            'role' => $_SESSION['role']
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 404,
            'message' => 'User not logged in'
        );
        echo json_encode($response);
    }
?>