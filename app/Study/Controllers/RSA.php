<?php

namespace App\Study\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use App\Study\Controller;

class RSA extends Controller
{
    protected $slug = 'rsa';

    /**
     * Available steps (view names are the same)
     *
     * @var array
     */
    protected $steps = [
        'initial' => [
            'validation' => [
                'p' => 'required|numeric',
                'q' => 'required|numeric',
                'name' => 'required|regex:/[a-z]+/|max:10'
            ]
        ],
        'nphin' => [
            'validation' => [
                'n' => 'required|numeric',
                'phin' => 'required|numeric',
            ]
        ],
        'pubkey' => [
            'validation' => [
                'e' => 'required|numeric'
            ]
        ],
        'privkey' => [
            'validation' => [
                'd' => 'required|numeric'
            ]
        ],
        'crypt' => [
            'validation' => [
                'cryptedName.*' => 'required'
            ],
            'save' => [
                'cryptedName'
            ]
        ],
        'decrypt' => [
            'validation' => [
                'decryptedName.*' => 'required'
            ],
            'save' => [
                'decryptedName'
            ]
        ]
    ];

    /**
     * @todo: REFACTOR
     *
     * @param Request $request
     * @param bool $slug
     * @return mixed
     * @throws \Exception
     */
    public function index(Request $request, $slug = false)
    {
        return parent::index($request, 'rsa');
    }


    /**
     * Practice results point
     *
     * @param \Illuminate\Http\Request $request
     * @param string|bool $slug
     * @return mixed
     */
    public function results(Request $request, $slug = false)
    {
        if($response = parent::results($request, 'rsa')) return $response;
        $topic = $this->topic;

        $results = [
            'n' => -1,
            'phin' => -1,
            'e' => -1,
            'd' => -1,
            'encrypted' => 0,
            'decrypted' => 0,

            /*
             * Messages will left empty if everything fine
             */
            'msg' => [
                'encryption' => [],
                'decryption' => []
            ]
        ];

        $p = $topic->getTyped('p');
        $q = $topic->getTyped('q');

        // n
        $n = $topic->getTyped('n');

        if((int)$n == (int)($p * $q)) {
            $results['n'] = 1;
        }
        else {
            $results['n'] = 0;
        }

        // phi(n)
        $phin =  $topic->getTyped('phin');
        if((int)$phin == (int)(($p - 1) * ($q - 1))) {
            $results['phin'] = 1;
        }
        else {
            $results['phin'] = 0;
        }

        if($results['phin'] + $results['n'] == 0) {
            return view('practice.rsa.results', [
                'topic' => $topic,
                'results' => $results
            ]);
        }

        // check public key. check that e is coprime with phin
        $e =  $topic->getTyped('e');

        // euclidan algorithm for finding greatest common divisor
        $gcd = function($a, $b) {
            if($a == 0) {
                return $b;
            }

            while($b != 0) {
                if($a > $b) {
                    $a = $a - $b;
                }
                else {
                    $b = $b - $a;
                }
            }

            return $a;
        };

        if((($e > 1) && ($e < $phin)) && ($gcd($e, $phin) == 1)) {
            $results['e'] = 1;
        }
        else {
            $results['e'] = 0;
        }

        // d
        $d =  $topic->getTyped('d');
        $mod = gmp_intval(gmp_mod((int)($e * $d), (int)$phin));
        if($mod === 1) {
            $results['d'] = 1;
        }
        else {
            $results['d'] = 0;
        }

        // we check messages encrypting/decrypting only if
        // all exponents was calculated correctly
        if(($results['n'] + $results['phin'] + $results['d'] + $results['e']) == 4) {

            // check encryption
            $name = $topic->getTyped('name');
            $crptd = $topic->getTyped('cryptedName');

            $allFine = true;
            $encryptedMessage = [];

            for($i = 0; $i < strlen($name); $i++) {
                $char = ord($name[$i]);
                $submitted = $crptd[$i];
                $encrypted = gmp_intval(gmp_mod(gmp_pow(gmp_init((int)$char), (int)$e), $n));

                $encryptedMessage[] = $encrypted;

                if($encrypted != (int)$submitted) {
                    $allFine = false;
                    $results['msg']['encryption'][$i] = "Char $name[$i]($char) encrypted incorrect (submitted: $submitted)";
                }
            }

            if($allFine) {
                $results['encrypted'] = 1;
            }

            // check decryption
            $decrypted = $topic->getTyped('decryptedName');
            $correctDecrypted = true;
            for($i = 0; $i < count($encryptedMessage); $i++) {
                $c = $encryptedMessage[$i];
                $submitted = $decrypted[$i];

                if(!$allFine && array_key_exists($i, $results['msg']['encryption'])) {
                    $correctDecrypted = false;
                    $results['msg']['decryption'][$i] = "This char was encrypted incorrect";
                }
                else {
                    $dcrptd = gmp_intval(gmp_mod(gmp_pow(gmp_init((int)$c), (int)$d), $n));
                    if($dcrptd != (int)$submitted) {
                        $correctDecrypted = false;
                        $results['msg']['decryption'][$i] = "Code ($c) decrypted incorrect (submitted: $submitted)";
                    }
                }
            }

            if($correctDecrypted) {
                $results['decrypted'] = 1;
            }
        }

        return view('practice.rsa.results', [
            'topic' => $topic,
            'results' => $results
        ]);
    }
}