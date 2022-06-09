<?php
session_start();

require_once __DIR__ . './../../vendor/autoload.php';
require_once __DIR__ . './../../.config.php';
require_once __DIR__ . '/functions.php';

$allowedUrl = false;
foreach (UNAUTHENTICATED_ALLOWED_URL as $url) {
  if (preg_match("/$url/", getUrl())) $allowedUrl = true;
}

if (!loggedIn() && !$allowedUrl) {
  header('Location: /p/entry/');
}
