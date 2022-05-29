<?php
session_start();

require_once __DIR__ . '../../vendor/autoload.php';
require_once __DIR__ . '../../.config.php';
require_once __DIR__ . '/functions.php';

if (!loggedIn() && basename(getUrl()) !== 'login') {
  header('Location: /p/login/');
}
