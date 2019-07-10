<?php

require __DIR__.'/setup.php';

$app = new App();

$app->getBot()->greet();

$app->output('You said: ' . $app->getInput());