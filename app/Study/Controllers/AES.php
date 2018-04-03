<?php

namespace App\Study\Controllers;

use App\Questionable;
use App\Topic;
use Illuminate\Http\Request;
use App\Study\Controller;

class AES extends Controller
{
    protected $slug = 'aes';

    /**
     * Available steps (view names are the same)
     *
     * @var array
     */
    protected $steps = [
        'initial' => [
            'validation' => [
                'data' => 'required',
                'key' => 'required'
            ],
            'afterExists' => true
        ],
        'keyexpansion' => [
            'preExists' => true,
            'validation' => [
                'column0.*' => 'required'
            ],
            'save' => ['column0']
        ],
        'subbytes' => [
            'preExists' => true,
            'validation' => [
                'state1.*.*' => 'required'
            ],
            'save' => ['state1']
        ],
        'shiftrows' => [
            'preExists' => true,
            'validation' => [
                'state2.*.*' => 'required',
            ],
            'save' => ['state2']
        ],
        'mixcolumns' => [
            'preExists' => true,
            'validation' => [
                'column1.*' => 'required',
            ],
            'save' => ['column1']
        ],
        'addroundkey' => [
            'preExists' => true,
            'validation' => [
                'row1.*' => 'required',
            ],
            'save' => ['row1']
        ]
    ];

    /**
     * Calculate data for needed steps. This method executing right after
     * user input his data, that should be hashed
     *
     * @param Request $request
     * @param Topic $topic
     * @return bool
     */
    protected function calculateCryptData(Request $request, Topic $topic)
    {
        $data = $topic->getTyped('data');
        $key = $topic->getTyped('key');

        $hasher = new \App\Study\Models\AESModel(
            $this,
            $data,
            $key
        );
        $hasher->run();

        return true;
    }

    /**
     * Save data that calculated
     *
     * @param $step
     * @param array $data
     * @return bool
     */
    public function setCalculatedStepData($step, array $data)
    {
        $this->topic->setTyped($step, $data);
    }

    /**
     * Return saved data, that calculated for step
     *
     * @param $step
     * @return array
     */
    public function getCalculatedStepData($step)
    {
        return $this->topic->getTyped($step);
    }

    /**
     * Functions that called before running some step
     *
     * @return array
     */
    public function preMethods()
    {
        return [
            'keyexpansion' => function($topic){
                $data = $this->getCalculatedStepData('keyexpansion');
                return is_array($data)?$data:[];
            },
            'subbytes' => function($topic){
                $data = $this->getCalculatedStepData('subbytes');
                return is_array($data)?$data:[];
            },
            'shiftrows' => function($topic){
                $data = $this->getCalculatedStepData('shiftrows');
                return is_array($data)?$data:[];
            },
            'mixcolumns' => function($topic){
                $data = $this->getCalculatedStepData('mixcolumns');
                return is_array($data)?$data:[];
            },
            'addroundkey' => function($topic){
                $data = $this->getCalculatedStepData('addroundkey');
                return is_array($data)?$data:[];
            }
        ];
    }

    /**
     * Functions that called after submitting data from some step
     *
     * @return array
     */
    public function afterMethods()
    {
        return [
            'initial' => function($request, $topic){
                $this->calculateCryptData($request, $topic);
            }
        ];
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
        if($response = parent::results($request, $this->slug)) return $response;
        $topic = $this->topic;

        $results = [
            'keyexpansion' => 0,
            'subbytes' => 0,
            'shiftrows' => 0,
            'mixcolumns' => 0,
            'addroundkey' => 0
        ];

        $data = [
            'keyexpansion' => [
                'column0' => 'resultColumn',
            ],
            'subbytes' => [
                'state1' => 'newState'
            ],
            'shiftrows' => [
                'state2' => 'newState'
            ],
            'mixcolumns' => [
                'column1' => 'newState',
                'compareFunction' => function($inputed, $expected) {
                    // $inputed == $column1 (column)
                    // $expected == $newState (matrix)
                    $correct = true;

//                    dd($inputed, $expected);

                    for($i = 0; $i < 4; $i++) {
                        for($j = 0; $j < 4; $j++) {
                            if($j == 1) {
                                $correct = $correct && ($inputed[$i] == $expected[$i][$j]);
                            }
                        }
                    }

                    return $correct;
                }
            ],
            'addroundkey' => [
                'row1' => 'newState',
                'compareFunction' => function($inputed, $expected) {
                    // $inputed == $row1 (row #0)
                    // $expected == $newState (matrix)
                    $correct = true;

                    for($i = 0; $i < 4; $i++) {
                        if($i != 0) continue;

                        for($j = 0; $j < 4; $j++) {
                            $correct = $correct && ($inputed[$j] == $expected[$i][$j]);
                        }
                    }

                    return $correct;
                }
            ]
        ];

        // check everything
        foreach($data as $step => $compare) {
            if(array_values($compare) === $compare) {
                $storageKeys = $stepKeys = $compare;
            }
            else {
                $storageKeys = array_keys($compare);
                $stepKeys = array_values($compare);
            }

            $stepFine = true;

            $resulting = [];

            if(array_key_exists('compareFunction', $compare)
                && is_callable($fnc = $compare['compareFunction'])) {

                $i = 0;

                $needed = $this->getCalculatedStepData($step)[$stepKeys[$i]];
                $inputed = $topic->getTyped($storageKeys[$i]);

                if(!is_array($needed)) {
                    $needed = strtolower($needed);
                    $inputed = strtolower($inputed);
                }

                $stepFine = $fnc($inputed, $needed);
            }
            else {
                for($i = 0; $i < count($storageKeys); $i++) {
                    $needed = $this->getCalculatedStepData($step)[$stepKeys[$i]];
                    $inputed = $topic->getTyped($storageKeys[$i]);

                    if(!is_array($needed)) {
                        $needed = strtolower($needed);
                        $inputed = strtolower($inputed);
                    }

                    $resulting[$storageKeys[$i]] = $inputed;

                    $stepFine = $stepFine && ($needed === $inputed);
                }
            }

//            if($step == 'prefinal')
//                dd($topic->get(Topic::PRACTICE_TYPE), $storageKeys,
//                    $step,
//                    $this->getCalculatedStepData($step),
//                    $resulting);

            $results[$step] = (int)$stepFine;
        }

        return view('practice.aes.results', [
            'topic' => $topic,
            'results' => $results
        ]);
    }
}