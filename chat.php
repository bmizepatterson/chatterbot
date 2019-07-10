<?php

require __DIR__.'/setup.php';

App::init();

echo "Hello! I'm a chatterbot. How are you?\n\n";

echo 'You said: ' . App::getInput();