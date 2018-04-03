<?php

namespace App\Study\Controllers;

use App\Questionable;
use App\Topic;
use Illuminate\Http\Request;
use App\Study\Controller;

class MD5 extends Controller
{
    protected $slug = 'md5';

    /**
     * Available steps (view names are the same)
     *
     * @var array
     */
    protected $steps = [
        'initial' => [
            'validation' => [
                'data' => 'required|min:8|max:55'
            ],
            'afterExists' => true
        ],
        'xinputs' => [
            'validation' => [
                'x0' => 'required',
                'x1' => 'required',
                'x14' => 'required'
            ]
        ],
        'ff' => [
            'preExists' => true,
            'validation' => [
                'f1' => 'required',
                'apop1' => 'required',
                'acycl1' => 'required',
                'aout1' => 'required',
            ]
        ],
        'gg' => [
            'preExists' => true,
            'validation' => [
                'g1' => 'required',
                'apop2' => 'required',
                'acycl2' => 'required',
                'aout2' => 'required',
            ]
        ],
        'hh' => [
            'preExists' => true,
            'validation' => [
                'h1' => 'required',
                'apop3' => 'required',
                'acycl3' => 'required',
                'aout3' => 'required',
            ]
        ],
        'ii' => [
            'preExists' => true,
            'validation' => [
                'i1' => 'required',
                'apop4' => 'required',
                'acycl4' => 'required',
                'aout4' => 'required',
            ]
        ],
        'prefinal' => [
            'preExists' => true,
            'validation' => [
                'a0' => 'required',
                'b0' => 'required',
                'c0' => 'required',
                'd0' => 'required'
            ]
        ],
        'final' => [
            'preExists' => true,
            'validation' => [
                'hash' => 'required'
            ]
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
    protected function calculateHashData(Request $request, Topic $topic)
    {
        $data = $topic->getTyped('data');

        $hasher = new \App\Study\Models\MD5(
            $this,
            $data
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
            'ff' => function($topic){
                extract($this->getCalculatedStepData('ff'));
                $f_calc = '(B and C) or ((not B) and D)';
                return compact('a', 'b', 'c', 'd', 'msg', 'f_calc', 'index', 'K', 's');
            },
            'gg' => function($topic){
                extract($this->getCalculatedStepData('gg'));
                $f_calc = '(D and B) or ((not D) and C)';
                return compact('a', 'b', 'c', 'd', 'msg', 'f_calc', 'index', 'K', 's');
            },
            'hh' => function($topic){
                extract($this->getCalculatedStepData('hh'));
                $f_calc = 'B xor C xor D';
                return compact('a', 'b', 'c', 'd', 'msg', 'f_calc', 'index', 'K', 's');
            },
            'ii' => function($topic){
                $data = $this->getCalculatedStepData('ii');
                extract($data);

                $f_calc = 'C xor (B or (not D))';
                return compact(array_merge(array_keys($data), ['f_calc']));
            },
            'prefinal' => function($topic) {
                $data = $this->getCalculatedStepData('prefinal');
                return is_array($data)?$data:[];
            },
            'final' => function($topic) {
                $data = $this->getCalculatedStepData('final');
//                dd($data);
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
                $this->calculateHashData($request, $topic);
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
            'xinputs' => 0,
            'ff' => 0,
            'gg' => 0,
            'hh' => 0,
            'ii' => 0,
            'prefinal' => 0,
            'final' => 0
        ];

        $data = [
            'xinputs' => [
                'x0', 'x1', 'x14',
            ],
            'ff' => [
                'f1' => 'f',
                'apop1' => 'apop',
                'acycl1' => 'acycl',
                'aout1' => 'aout'
            ],
            'gg' => [
                'g1' => 'f',
                'apop2' => 'apop',
                'acycl2' => 'acycl',
                'aout2' => 'aout'
            ],
            'hh' => [
                'h1' => 'f',
                'apop3' => 'apop',
                'acycl3' => 'acycl',
                'aout3' => 'aout'
            ],
            'ii' => [
                'i1' => 'f',
                'apop4' => 'apop',
                'acycl4' => 'acycl',
                'aout4' => 'aout'
            ],
            'prefinal' => [
                'a0' => 'a0c',
                'b0' => 'b0c',
                'c0' => 'c0c',
                'd0' => 'd0c'
            ],
            'final' => [
                'hash'
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

            for($i = 0; $i < count($storageKeys); $i++) {
                $needed = strtolower($this->getCalculatedStepData($step)[$stepKeys[$i]]);
                $inputed = strtolower($topic->getTyped($storageKeys[$i]));

                $resulting[$storageKeys[$i]] = $inputed;

                $stepFine = $stepFine && ($needed == $inputed);
            }

//            if($step == 'prefinal')
//                dd($topic->get(Topic::PRACTICE_TYPE), $storageKeys,
//                    $step,
//                    $this->getCalculatedStepData($step),
//                    $resulting);

            $results[$step] = (int)$stepFine;
        }

        return view('practice.md5.results', [
            'topic' => $topic,
            'results' => $results
        ]);
    }
}