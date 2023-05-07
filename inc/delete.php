<?php
    include_once "conn.php";
    session_start();
    // Build the SQL query to update the user information
    $sql = "DELETE FROM fake_users WHERE id=".$_SESSION["ID"] ; // Replace id=1 with your own WHERE clause

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        
        session_destroy();
        echo "<script>alert('deleted sucssesfully.');</script>";
    } else {
        echo "<script>alert('".mysqli_error($conn)."');</script>";        
    }
    session_destroy();

    echo "<script>window.location.href = 'http://localhost/phpwork/CRM/inc/get.php';</script>";
    
    

?>