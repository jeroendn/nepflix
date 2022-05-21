<?php
require_once __DIR__ . '../../.config.php';
require_once __DIR__ . '/functions.php';

session_start();

if (!isset($_SESSION['customer']) && basename(getUrl()) !== 'login') {
  header('Location: /login');
}
