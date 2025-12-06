<?php
$password = 'S3ptimob$tec'; // tu contraseña
$hash = password_hash($password, PASSWORD_BCRYPT);
echo $hash . PHP_EOL;
