<?php

namespace App\Study\Models;

class AESModel
{
    /**
     * Caller
     *
     * @var \App\Study\Controllers\AES
     */
    private $caller;

    /**
     * Data that will be encrypted
     *
     * @var
     */
    private $data;

    /**
     * Key for encryption and decryption
     *
     * @var
     */
    private $key;

    public function __construct(\App\Study\Controllers\AES $caller, $data, $key)
    {
        $this->caller = $caller;
        $this->data = $data;
        $this->key = $key;
    }

    /**
     * Data that will be encrypted
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Key for algorithm
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    public function run()
    {
        AES::$caller = $this->caller;

        $text = $this->getData();
        $key = $this->getKey();

        $encryptor = new AESCipher(AES::AES128);

        $encrypted = $encryptor->encrypt($text, $key);
    }
}