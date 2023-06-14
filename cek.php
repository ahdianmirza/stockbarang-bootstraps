<?php
// Jika belum login
if (isset($_SESSION["login"])) {
} else {
    header("Location: login.php");
}
