<?php

/*
php8.0 ./public/b_decrypt.php
*/

require_once __DIR__.'/../Core/EncryptDecrypt_A.php';

use Core\EncryptDecrypt_A;





if (php_sapi_name() !== 'cli' ) {
    die();
}





$token_encrypted = 'eyJpdl9lbmNvZGVkIjoiL0VTQU1QbUJKUXA2THBhWnpvelRrUT09IiwidmFsdWUiOiJWSjBCVWttYWgzamRiOXRXOWxUZFQvWGJLYmpJT3R1Ujk5Y3h3S2JBdFFjPSIsIm1hYyI6ImNhYzFmOTQ1ZDFjMzYyNjBkNjRkZWI2OGVkMjI4ODgzYmQzNWJmMzQyZWIxMWRmYzliYjEzNDBiNWQ3MGFiZTAifQ==';

$encryptDecrypt_A = new EncryptDecrypt_A();
//$encryptDecrypt_A->setPassphrase('testpass1');
$token_decrypted = $encryptDecrypt_A->decrypt($token_encrypted);

echo $token_decrypted;
echo "\r\n";
