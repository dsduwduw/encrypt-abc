<?php

namespace Core;

class EncryptDecrypt_Test
{
    const CIPHER_ALGO = 'aes-256-cbc';

    const OPTIONS = 0;

    const DEFAULT_PASSPHRASE = 'aaapppcccnnn111000';

    const SEPARATOR = '::';


    private static function getPassphrase()
    {
        return openssl_digest(self::DEFAULT_PASSPHRASE, 'sha512', TRUE);
    }




    public function encrypt(string $token): string
    {
        $iv = random_bytes(openssl_cipher_iv_length(self::CIPHER_ALGO));

        $token_encrypt = openssl_encrypt($token, self::CIPHER_ALGO, self::getPassphrase(), self::OPTIONS, $iv)
            .self::SEPARATOR.
            base64_encode($iv)
            ;

        return $token_encrypt;
    }


    public function decrypt(string $token_encrypt_with_iv): string
    {
        [$token_encrypt, $iv] = explode(self::SEPARATOR, $token_encrypt_with_iv);
        
        $token_decrypt = openssl_decrypt($token_encrypt, self::CIPHER_ALGO, self::getPassphrase(), self::OPTIONS, base64_decode($iv));
        
        return $token_decrypt;
    }
    
}
