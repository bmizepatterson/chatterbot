<?php

require_once('./setup.php');

echo "Hello! I'm a chatterbot. How are you?\n\n";

$stdin = fopen('php://stdin', 'r');

while (true) {
    echo ">  ";
    $input = trim(fgets($stdin));

    if ($input) break;
}

exit('You said: ' . $input);