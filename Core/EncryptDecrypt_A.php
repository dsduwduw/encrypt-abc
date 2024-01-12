<?php

namespace Core;

class EncryptDecrypt_A
{
    const CIPHER_ALGO = 'AES-256-CBC';

    const OPTIONS = 0;

    private string $passphrase = 'aaapppwwwnnn111000';




    public function setPassphrase(string $passphrase)
    {
        $this->passphrase = $passphrase;
    }


    private function getPassphraseDigest()
    {
        return openssl_digest($this->passphrase, 'sha512', TRUE);
    }


    private function hash(string $iv, string $value): string
    {
        return hash_hmac('sha256', $value.$iv, $this->passphrase);
    }


    private function getJsonPayload(string $token_encrypted): array
    {
        $payload_string = base64_decode($token_encrypted);

        return json_decode($payload_string, true);
    }




    public function encrypt(string $token): string
    {
        $iv = random_bytes(openssl_cipher_iv_length(self::CIPHER_ALGO));

        $value = openssl_encrypt($token, self::CIPHER_ALGO, $this->getPassphraseDigest(), self::OPTIONS, $iv);

        $iv_encoded = base64_encode($iv);
        
        $mac = $this->hash($iv_encoded, $value);

        $json = json_encode(['iv_encoded' => $iv_encoded, 'value' => $value, 'mac' => $mac], JSON_UNESCAPED_SLASHES);

        return base64_encode($json);
    }


    public function decrypt(string $token_encrypted): string
    {
        $payload = $this->getJsonPayload($token_encrypted);

        $iv = base64_decode($payload['iv_encoded']);
        
        return openssl_decrypt($payload['value'], self::CIPHER_ALGO, $this->getPassphraseDigest(), self::OPTIONS, $iv);
    }
    
}
