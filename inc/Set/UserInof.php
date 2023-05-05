<?php
if (isset($_POST["id"])) {
    session_start();
    $_SESSION["Email"] = $_POST["id"];
    $_SESSION["Password"] = $_POST["id"];

} else {
    echo "Error: ID parameter not set";
}
?>