<?php
if (isset($_POST["id"])) {
    session_start();
    $_SESSION["ID"] = $_POST["id"];
} else {
    echo "Error: ID parameter not set";
}
?>
