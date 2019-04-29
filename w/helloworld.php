<?php

require __DIR__ . '/../vendor/autoload.php';


// create a log channel
$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('log_me_here.txt', Monolog\Logger::INFO));

// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');
$log->addInfo("ELLO MATE")
?>