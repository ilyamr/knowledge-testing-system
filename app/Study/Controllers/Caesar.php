<?php

namespace App\Study\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use App\Study\Controller;

class Caesar extends Controller
{
    protected $slug = 'caesar';

    protected $steps = [
        'initial' => [
            'validation' => [
                'n' => 'required|numeric',
                'name' => 'required|regex:/[a-z]+/|max:10'
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
     * Practice results point
     *
     * @param \Illuminate\Http\Request $request
     * @param string|bool $slug
     * @return mixed
     */
    public function results(Request $request, $slug = false)
    {
        if($response = parent::results($request, 'caesar')) return $response;
        $topic = $this->topic;

        $results = [
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

        // n
        $n = $topic->getTyped('n');
        $name = $topic->getTyped('name');

        $alphabet = range('a', 'z');
        $shiftedAlphabet = array_shift_circular($alphabet, (int)$n);

        $mappedArray = [];
        for($i = 0; $i < count($alphabet); $i++) {
            $mappedArray[$alphabet[$i]] = $shiftedAlphabet[$i];
        }

        // check encryption
        $crptd = $topic->getTyped('cryptedName');

        $allFine = true;
        $encryptedMessage = [];

        for($i = 0; $i < strlen($name); $i++) {
            $letter = $name[$i];
            $submitted = $crptd[$i];
            $encrypted = $mappedArray[$letter];

            $encryptedMessage[] = $encrypted;

            if($encrypted != $submitted) {
                $allFine = false;
                $results['msg']['encryption'][$i] = "Letter $letter encrypted incorrect (submitted: $submitted)";
            }
        }

        if($allFine) {
            $results['encrypted'] = 1;
        }

        $mappedArray = array_flip($mappedArray);

        // check decryption
        $decrypted = $topic->getTyped('decryptedName');
        $correctDecrypted = true;
        for($i = 0; $i < count($encryptedMessage); $i++) {
            $c = $encryptedMessage[$i];
            $submitted = $decrypted[$i];

            if(!$allFine && array_key_exists($i, $results['msg']['encryption'])) {
                $correctDecrypted = false;
                $results['msg']['decryption'][$i] = "This char was encrypted incorrect";
                break;
            }
            else {
                $dcrptd = $mappedArray[$c];
                if($dcrptd != $submitted) {
                    $correctDecrypted = false;
                    $results['msg']['decryption'][$i] = "Char $c decrypted incorrect (submitted: $submitted)";
                }
            }
        }

        if($correctDecrypted) {
            $results['decrypted'] = 1;
        }

        return view('practice.caesar.results', [
            'topic' => $topic,
            'results' => $results
        ]);
    }
}