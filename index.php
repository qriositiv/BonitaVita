<?php
$browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

$supportedLanguages = ['en', 'ru', 'lt'];

$defaultLanguage = 'en';
$redirectLanguage = in_array($browserLanguage, $supportedLanguages) ? $browserLanguage : $defaultLanguage;

header("Location: /$redirectLanguage/", true, 302);
exit;
