<?php
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    echo "<script>alert('$error'); </script>";
    unset($_SESSION['error']);
}
