<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the SSH2 extension is loaded
if (!function_exists('ssh2_connect')) {
    die('The SSH2 extension is not loaded.');
} else {
    echo "SSH2 PHP Extension is working";
}