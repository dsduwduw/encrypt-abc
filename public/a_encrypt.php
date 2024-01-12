<?php

/*
php8.0 ./public/a_encrypt.php
*/

require_once __DIR__.'/../Core/EncryptDecrypt_A.php';

use Core\EncryptDecrypt_A;





if (php_sapi_name() !== 'cli' ) {
    die();
}





$token = "1:aaa|2:bbb|3:ccc|4:ddd";

$encryptDecrypt_A = new EncryptDecrypt_A();
//$encryptDecrypt_A->setPassphrase('testpass1');
$token_encrypted = $encryptDecrypt_A->encrypt($token);

echo $token_encrypted;
echo "\r\n";
