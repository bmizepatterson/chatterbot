<?php

require __DIR__.'/setup.php';

echo "Hello! I'm a chatterbot. How are you?\n\n";

SessionManager::init();

echo 'You said: ' . SessionManager::getInput();