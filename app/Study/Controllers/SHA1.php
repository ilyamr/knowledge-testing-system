<?php

namespace App\Study\Controllers;

use App\Questionable;
use App\Topic;
use Illuminate\Http\Request;
use App\Study\Controller;

class SHA1 extends Controller
{
    protected $slug = 'sha1';

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
                'x15' => 'required'
            ]
        ],
        'i0' => [
            'preExists' => true,
            'validation' => [
                'f1' => 'required',
                'acycl1' => 'required',
                'a1' => 'required',
            ]
        ],
        'i20' => [
            'preExists' => true,
            'validation' => [
                'f2' => 'required',
                'acycl2' => 'required',
                'a2' => 'required',
            ]
        ],
        'i40' => [
            'preExists' => true,
            'validation' => [
                'f3' => 'required',
                'acycl3' => 'required',
                'a3' => 'required',
            ]
        ],
        'i60' => [
            'preExists' => true,
            'validation' => [
                'f4' => 'required',
                'acycl4' => 'required',
                'a4' => 'required',
            ]
        ],
        'prefinal' => [
            'preExists' => true,
            'validation' => [
                'h0' => 'required',
                'h1' => 'required',
                'h2' => 'required',
                'h3' => 'required',
                'h4' => 'required',
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

        $hasher = new \App\Study\Models\SHA1(
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
            'i0' => function($topic){
                $data = $this->getCalculatedStepData('i0');
                extract($data);
                $f_calc = '(B and C) or ((not B) and D)';
                return compact(array_merge(array_keys($data), ['f_calc']));
            },
            'i20' => function($topic){
                $data = $this->getCalculatedStepData('i20');
                extract($data);
                $f_calc = 'b xor c xor d';
                return compact(array_merge(array_keys($data), ['f_calc']));
            },
            'i40' => function($topic){
                $data = $this->getCalculatedStepData('i40');
                extract($data);
                $f_calc = '(b and c) or (b and d) or (c and d)';
                return compact(array_merge(array_keys($data), ['f_calc']));
            },
            'i60' => function($topic){
                $data = $this->getCalculatedStepData('i60');
                extract($data);
                $f_calc = 'b xor c xor d';
                return compact(array_merge(array_keys($data), ['f_calc']));
            },
            'prefinal' => function($topic) {
                $data = $this->getCalculatedStepData('prefinal');
                return is_array($data)?$data:[];
            },
            'final' => function($topic) {
                $data = $this->getCalculatedStepData('final');
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
            'i0' => 0,
            'i20' => 0,
            'i40' => 0,
            'i60' => 0,
            'prefinal' => 0,
            'final' => 0
        ];

        $data = [
            'xinputs' => [
                'x0', 'x1', 'x15',
            ],
            'i0' => [
                'f1' => 'f',
                'acycl1' => 'acycl',
                'a1' => 'a'
            ],
            'i20' => [
                'f2' => 'f',
                'acycl2' => 'acycl',
                'a2' => 'a'
            ],
            'i40' => [
                'f3' => 'f',
                'acycl3' => 'acycl',
                'a3' => 'a'
            ],
            'i60' => [
                'f4' => 'f',
                'acycl4' => 'acycl',
                'a4' => 'a'
            ],
            'prefinal' => [
                'h0', 'h1', 'h2', 'h3', 'h4'
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

        return view('practice.sha1.results', [
            'topic' => $topic,
            'results' => $results
        ]);
    }
}