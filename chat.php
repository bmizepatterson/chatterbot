<?php

require __DIR__.'/setup.php';

$debug = (isset($argv[1]) && $argv[1] == 'debug');

(new App($debug))->getBot()->converse();