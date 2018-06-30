<?php
$env = require_once 'env.php';
session_start();

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    header('Location:' . $env['url']);
} else {
    header('Location:' . $env['url']);
}