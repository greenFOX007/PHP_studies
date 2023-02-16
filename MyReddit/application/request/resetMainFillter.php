<?php
session_start();
unset($_SESSION['url']);
// $lol = $_SERVER['REQUEST_URI'];
header("Location: /admin/");