<?php
    require_once "./Controllers/controller.php";
    $conn = new Controller();
    $conn->crawl();
    // header("Refresh: 300");
?>