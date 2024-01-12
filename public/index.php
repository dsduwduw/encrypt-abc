<?php

/*
Testé avec PHP 8.0
*/

require_once __DIR__.'/../Core/EncryptDecrypt_A.php';

ini_set('display_errors', '1');

use Core\EncryptDecrypt_A;











$token = "XXX|rrr|ttt";

$encryptDecrypt_A = new EncryptDecrypt_A();
//$encryptDecrypt_A->setPassphrase('testpass1');
$token_encrypted = $encryptDecrypt_A->encrypt($token);

var_dump( $token_encrypted ); echo '<hr>';



//$token_encrypted = '';

$encryptDecrypt_A = new EncryptDecrypt_A();
//$encryptDecrypt_A->setPassphrase('testpass1');
$token_decrypted = $encryptDecrypt_A->decrypt($token_encrypted);

var_dump( $token_decrypted ); die;
