<?php

namespace App\Study\Models;


class MD5
{
    /**
     * Caller
     *
     * @var \App\Study\Controllers\MD5
     */
    private $caller;

    /**
     * Data to be hashed
     *
     * @var
     */
    private $data;

    public function __construct(\App\Study\Controllers\MD5 $caller, $data)
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

    public function run()
    {
        $data = (string)$this->getData();

        $s = array_merge(
            [7, 12, 17, 22,  7, 12, 17, 22,  7, 12, 17, 22,  7, 12, 17, 22],
            [5,  9, 14, 20,  5,  9, 14, 20,  5,  9, 14, 20,  5,  9, 14, 20],
            [4, 11, 16, 23,  4, 11, 16, 23,  4, 11, 16, 23,  4, 11, 16, 23],
            [6, 10, 15, 21,  6, 10, 15, 21,  6, 10, 15, 21,  6, 10, 15, 21]
        );

        $K = [
            0xd76aa478, 0xe8c7b756, 0x242070db, 0xc1bdceee,
            0xf57c0faf, 0x4787c62a, 0xa8304613, 0xfd469501,
            0x698098d8, 0x8b44f7af, 0xffff5bb1, 0x895cd7be,
            0x6b901122, 0xfd987193, 0xa679438e, 0x49b40821,
            0xf61e2562, 0xc040b340, 0x265e5a51, 0xe9b6c7aa,
            0xd62f105d, 0x02441453, 0xd8a1e681, 0xe7d3fbc8,
            0x21e1cde6, 0xc33707d6, 0xf4d50d87, 0x455a14ed,
            0xa9e3e905, 0xfcefa3f8, 0x676f02d9, 0x8d2a4c8a,
            0xfffa3942, 0x8771f681, 0x6d9d6122, 0xfde5380c,
            0xa4beea44, 0x4bdecfa9, 0xf6bb4b60, 0xbebfbc70,
            0x289b7ec6, 0xeaa127fa, 0xd4ef3085, 0x04881d05,
            0xd9d4d039, 0xe6db99e5, 0x1fa27cf8, 0xc4ac5665,
            0xf4292244, 0x432aff97, 0xab9423a7, 0xfc93a039,
            0x655b59c3, 0x8f0ccc92, 0xffeff47d, 0x85845dd1,
            0x6fa87e4f, 0xfe2ce6e0, 0xa3014314, 0x4e0811a1,
            0xf7537e82, 0xbd3af235, 0x2ad7d2bb, 0xeb86d391
        ];

        $a0 = 0x67452301;   //A
        $b0 = 0xefcdab89;   //B
        $c0 = 0x98badcfe;   //C
        $d0 = 0x10325476;   //D

        $len = 8 * strlen($data);

        //append "1" bit to msg
        //$value = base_convert(unpack('H*', $data)[1], 16, 2) . "1";
        $message = '';
        if($len > 0) {
            $message = $this->leftpad($this->hexbin($this->strhex($data)), $len);
        }

        $value = $message . "1";

        //append "0" bit until message length in bits ≡ 448 (mod 512)
        $buff = strlen($value) % 512;
        if($buff != 448){
            while(strlen($value) % 512 != 448){
                $value = $value . "0";
            }
        }

        // append original length in bits mod (2 pow 64) to message
//        $strlen = decbin(($len) & 0xffffffff);
//        $value .= $strlen;

        $bLen = $this->leftpad(decbin($len), 64);
        $value .= implode('', array_reverse(str_split($bLen, 8)));

        //Process the message in successive 512-bit chunks:
        $calculated = [];
        foreach (str_split($value, 512) as $chunk) {

            //break chunk into sixteen 32-bit words M[j], 0 ≤ j ≤ 15
            $t = str_split($chunk, 32);
            $M = [];
            foreach ($t as $msg) {
                $M[] = bindec(
                    implode('', array_reverse(str_split($msg, 8)))
                );
            }

            $this->caller->setCalculatedStepData('xinputs', [
                'x0' => $this->leftpad(dechex($M[0]), 8),
                'x1' => $this->leftpad(dechex($M[1]), 8),
                'x14' => $this->leftpad(dechex($M[14]), 8)
            ]);

            //Initialize hash value for this chunk:
            $A = $a0;
            $B = $b0;
            $C = $c0;
            $D = $d0;

            for($i = 0; $i < 64; $i++) {

                if($i < 16) {
                    $F = ($B & $C) | (~$B & $D);
                    $g = $i;
                }
                elseif ($i < 32) {
                    $F = ($D & $B) | (~$D & $C);
                    $g = (5*$i + 1) % 16;
                }
                elseif ($i < 48) {
                    $F = $B ^ $C ^ $D;
                    $g = (3*$i + 5) % 16;
                }
                else {
                    $F = $C ^ ($B | ~$D);
                    $g = (7*$i) % 16;
                }

                // $a, $b, $c, $d, $index(message index), $K, $s
                $steps = [
                    0 => 'ff',
                    16 => 'gg',
                    32 => 'hh',
                    48 => 'ii'
                ];
                if(array_key_exists($i, $steps)) {
                    $this->caller->setCalculatedStepData($steps[$i], [
                        'a' => $this->leftpad(dechex($A), 8),
                        'b' => $this->leftpad(dechex($B), 8),
                        'c' => $this->leftpad(dechex($C), 8),
                        'd' => $this->leftpad(dechex($D), 8),
                        'f' => $this->leftpad(dechex($F & 0xffffffff), 8),
                        'msg' => $this->leftpad(dechex($M[$g]), 8),
                        'index' => $g,
                        'K' => $this->leftpad(dechex($K[$i]), 8),
                        's' => $s[$i]
                    ]);
                }

                $dTemp = $D;
                $D = $C;
                $C = $B;

                $apop = $A + $F + $K[$i] + $M[$g] & 0xffffffff;
                $acycl = $this->leftrotate($apop, $s[$i]) & 0xffffffff;
                $B = $B + $acycl & 0xffffffff;

                if(array_key_exists($i, $steps)) {
                    $this->caller->setCalculatedStepData($steps[$i],
                        array_merge($this->caller->getCalculatedStepData($steps[$i]), [
                            'apop' => $this->leftpad(dechex($apop), 8),
                            'acycl' => $this->leftpad(dechex($acycl), 8),
                            'aout' => $this->leftpad(dechex($B), 8)
                        ])
                    );
                }

                $A = $dTemp;
            }

            $this->caller->setCalculatedStepData('prefinal', [
                'a0' =>  $this->leftpad(dechex($A), 8),
                'b0' =>  $this->leftpad(dechex($B), 8),
                'c0' =>  $this->leftpad(dechex($C), 8),
                'd0' =>  $this->leftpad(dechex($D), 8)
            ]);

            $a0 = $a0 + $A;
            $b0 = $b0 + $B;
            $c0 = $c0 + $C;
            $d0 = $d0 + $D;

            $calculated = [
                'a0c' =>  $this->leftpad(dechex($a0 & 0xffffffff), 8),
                'b0c' =>  $this->leftpad(dechex($b0 & 0xffffffff), 8),
                'c0c' =>  $this->leftpad(dechex($c0 & 0xffffffff), 8),
                'd0c' =>  $this->leftpad(dechex($d0 & 0xffffffff), 8)
            ];

            $this->caller->setCalculatedStepData('prefinal',
                array_merge($this->caller->getCalculatedStepData('prefinal'), $calculated)
            );
        }

        $this->caller->setCalculatedStepData('final', $calculated);

        /*
         * var char digest[16] := a0 append b0 append c0 append d0 //(Output is in little-endian)
         */
        $digest =
            $this->toLittleEndian($a0 & 0xffffffff) .
            $this->toLittleEndian($b0 & 0xffffffff) .
            $this->toLittleEndian($c0 & 0xffffffff) .
            $this->toLittleEndian($d0 & 0xffffffff);

        $this->caller->setCalculatedStepData('final',
            array_merge($this->caller->getCalculatedStepData('final'), [
                'hash' => $digest
            ])
        );

        return $digest;
    }

    private function toLittleEndian($num)
    {
        return implode('', array_reverse(str_split($this->leftpad(dechex($num), 8), 2)));
    }

    private function hexbin($str)
    {
        $hexbinmap = array("0" => "0000"
            , "1" => "0001"
            , "2" => "0010"
            , "3" => "0011"
            , "4" => "0100"
            , "5" => "0101"
            , "6" => "0110"
            , "7" => "0111"
            , "8" => "1000"
            , "9" => "1001"
            , "A" => "1010"
            , "a" => "1010"
            , "B" => "1011"
            , "b" => "1011"
            , "C" => "1100"
            , "c" => "1100"
            , "D" => "1101"
            , "d" => "1101"
            , "E" => "1110"
            , "e" => "1110"
            , "F" => "1111"
            , "f" => "1111"
        );

        $bin = "";
        for ($i = 0; $i < strlen($str); $i++)
        {
            $bin .= $hexbinmap[$str[$i]];
        }

        $bin = ltrim($bin, '0');
        return $bin;
    }

    private function strhex($str){
        $hex = "";
        for ($i = 0; $i < strlen($str); $i++)
        {
            $hex = $hex.$this->leftpad(dechex(ord($str[$i])), 2);
        }
        return $hex;
    }

    private function leftpad($needs_padding, $alignment)
    {
        if (strlen($needs_padding) % $alignment) {
            $pad_amount    = $alignment - strlen($needs_padding) % $alignment;
            $left_pad      = implode('', array_fill(0, $pad_amount, '0'));
            $needs_padding = $left_pad . $needs_padding;
        }
        return $needs_padding;
    }

    private function leftrotate($x, $p)
    {
        return ($x << $p) ^ ($x >> (32 - $p)) & 0xffffffff;
    }
}