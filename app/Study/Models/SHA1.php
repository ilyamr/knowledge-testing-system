<?php

namespace App\Study\Models;


class SHA1
{
    /**
     * Caller
     *
     * @var \App\Study\Controllers\SHA1
     */
    private $caller;

    /**
     * Data to be hashed
     *
     * @var
     */
    private $data;

    public function __construct(\App\Study\Controllers\SHA1 $caller, $data)
    {
        $this->caller = $caller;
        $this->data = $data;
    }

    /**
     * Data that hashed
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    function preProcess($message){
        /*
        Pre-processing:
        append the bit '1' to the message i.e. by adding 0x80 if characters are 8 bits.
        append 0 ≤ k < 512 bits '0', thus the resulting message length (in bits)
           is congruent to 448 (mod 512)
        append ml, in a 64-bit big-endian integer. So now the message length is a multiple of 512 bits.
        */
        $originalSize = strlen($message) * 8;
        $message .= chr(128);
        while (((strlen($message) + 8) % 64) !== 0) {
            $message .= chr(0);
        }
        foreach (str_split(sprintf('%064b', $originalSize), 8) as $bin) {
            $message .= chr(bindec($bin));
        }
        return $message;
    }

    function rotl($x, $n) {
        return ($x << $n) | ($x >> (32 - $n));
    }

    function SHAfunction($step, $b, $c, $d)
    {
        switch ($step) {
            case 0;
                return ($b & $c) ^ (~$b & $d);
            case 1;
            case 3;
                return $b ^ $c ^ $d;
            case 2;
                return ($b & $c) ^ ($b & $d) ^ ($c & $d);
        }
    }

    function run()
    {
        $input = $this->getData();

        $h0 = 0x67452301;
        $h1 = 0xEFCDAB89;
        $h2 = 0x98BADCFE;
        $h3 = 0x10325476;
        $h4 = 0xC3D2E1F0;

        $K = [0x5a827999, 0x6ed9eba1, 0x8f1bbcdc, 0xca62c1d6];

        $message = $this->preProcess($input);

        // Process the message in successive 512-bit chunks:
        // break message into 512-bit chunks
        $chunks = str_split($message, 64);

        $chunksHash = [];

        foreach ($chunks as $chunk) {
            // break chunk into sixteen 32-bit big-endian words w[i], 0 ≤ i ≤ 15
            $words = str_split($chunk, 4);
            foreach ($words as $i => $chrs) {
                $chrs = str_split($chrs);
                $word = '';
                foreach ($chrs as $chr) {
                    $word .= sprintf('%08b', ord($chr));
                }

                $words[$i] = bindec($word);
            }

            $this->caller->setCalculatedStepData('xinputs', [
                'x0' => sprintf('%08x', $words[0]),
                'x1' => sprintf('%08x', $words[1]),
                'x15' => sprintf('%08x', $words[15])
            ]);

            // Extend the sixteen 32-bit words into eighty 32-bit words:
            for ($i = 16; $i < 80; $i++) {
                // for i from 16 to 79
                //     w[i] = (w[i-3] xor w[i-8] xor w[i-14] xor w[i-16]) leftrotate 1
                $words[$i] = $this->rotl($words[$i-3] ^ $words[$i-8] ^ $words[$i-14] ^ $words[$i-16], 1) & 0xffffffff;
            }
            // Initialize hash value for this chunk:
            $a = $h0; $b = $h1; $c = $h2; $d = $h3; $e = $h4;
            // Main loop:[39]

            $steps = [
                0 => 'i0',
                20 => 'i20',
                40 => 'i40',
                60 => 'i60'
            ];

            foreach ($words as $i => $word) {
                $s = floor($i / 20);

                $f = $this->SHAfunction($s, $b, $c, $d);
                $temp = $this->rotl($a, 5) + $f + $e + $K[$s] + ($word) & 0xffffffff;

                if(array_key_exists($i, $steps)) {
                    $this->caller->setCalculatedStepData($steps[$i], [
                        'f' => sprintf('%08x', $f & 0xffffffff),
                        'acycl' => sprintf('%08x', $this->rotl($a, 5) & 0xffffffff),
                        'a' => sprintf('%08x', $temp),

                        'as' =>  sprintf('%08x', $a & 0xffffffff),
                        'b' =>  sprintf('%08x', $b & 0xffffffff),
                        'c' =>  sprintf('%08x', $c & 0xffffffff),
                        'd' =>  sprintf('%08x', $d & 0xffffffff),

                        'e' => sprintf('%08x', $e & 0xffffffff),
                        'K' => sprintf('%08x', $K[$s] & 0xffffffff),
                        'word' => sprintf('%08x', $word & 0xffffffff),
                    ]);
                }

                $e = $d;
                $d = $c;
                $c = $this->rotl($b, 30);
                $b = $a;
                $a = $temp;
            }

            // Add this chunk's hash to result so far:
            $h0 = ($h0 + $a) & 0xffffffff;
            $h1 = ($h1 + $b) & 0xffffffff;
            $h2 = ($h2 + $c) & 0xffffffff;
            $h3 = ($h3 + $d) & 0xffffffff;
            $h4 = ($h4 + $e) & 0xffffffff;

            $chunksHash = [
                'h0' => sprintf('%08x', $h0 & 0xffffffff),
                'h1' => sprintf('%08x', $h1 & 0xffffffff),
                'h2' => sprintf('%08x', $h2 & 0xffffffff),
                'h3' => sprintf('%08x', $h3 & 0xffffffff),
                'h4' => sprintf('%08x', $h4 & 0xffffffff),
            ];

            $this->caller->setCalculatedStepData('prefinal', array_merge([
                'a' => sprintf('%08x', $a & 0xffffffff),
                'b' => sprintf('%08x', $b & 0xffffffff),
                'c' => sprintf('%08x', $c & 0xffffffff),
                'd' => sprintf('%08x', $d & 0xffffffff),
                'e' => sprintf('%08x', $e & 0xffffffff),
            ], $chunksHash));
        }


        $this->caller->setCalculatedStepData('final', array_merge([
            'hash' => sprintf('%08x%08x%08x%08x%08x', $h0, $h1, $h2, $h3, $h4),
        ], $chunksHash));

        return sprintf('%08x%08x%08x%08x%08x', $h0, $h1, $h2, $h3, $h4);
    }
}