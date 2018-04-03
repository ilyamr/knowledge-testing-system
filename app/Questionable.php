<?php

namespace App;
use Illuminate\Support\Facades\Auth;


/**
 * Class Questionable
 * @package App
 *
 * Store data to session
 */
trait Questionable
{
    private $intelligence = true;

    /**
     * Start typed session
     *
     * @param $type
     */
    public function startTypedSession($type)
    {
        $this->set('type', $type);

        $this->set($type . '.answers', []);
        $this->set($type . '.i', 0);
        $this->set($type . '.destiny', null);
        $this->set($type . '.questions', null);
    }

    public function getAnsweredId($type)
    {
        return $this->getDestiny($type)[$this->getIter($type)];
    }

    /**
     * Submit answer
     *
     * @param $type
     * @param $answer
     */
    public function submitQuestion($type, $answer)
    {
        $this->intelligence = Auth::check() && Auth::user()->intellectual;

        $questionId = $this->getAnsweredId($type);
        $question = Question::find($questionId);

        $answers = $this->get($type . '.answers');
        $answers[] = $answer;
        $this->set($type . '.answers', $answers);

        /*
         * Remove answered from tags-questions list
         */
        $tagsQuestions = $this->get($type . '.tagsQuestions');
        $questionTags = $question->tags->pluck('id')->toArray();

        foreach($questionTags as $tagId) {
            $tagsQuestions[$tagId] = array_values(array_diff($tagsQuestions[$tagId], [$questionId]));
        }
        $this->set($type . '.tagsQuestions', $tagsQuestions);

        /*
         * Count incorrect hits for tags
         */
        $failedTags = $this->get($type . '.failedTags');
        if(!$this->isCorrectAnswer($question, $answer)) {
            foreach($questionTags as $tagId) {
                $failedTags[$tagId]++;
            }
            $this->set($type . '.failedTags', $failedTags);
        }

        $iter = $this->getIter($type);
        $destiny = $this->getDestiny($type);

        if($this->intelligence && ($iter != count($destiny) - 1)) {
            /*
             * Change destiny magic
             */
            $totalFails = 0;
            foreach($failedTags as $tagId => $failed) {
                $totalFails += $failed;
            }

            if($totalFails){
                /*
                 * Change it here
                 */

                $randPossibility = [];

                $base = 50/$totalFails;
                $left = 100;
                $leftP = 100 - (count(array_keys($failedTags)) * $base);

                foreach($failedTags as $tagId => $failed) {
                    $randPossibility[$tagId] = $base;
                    $left -= $base;
                }

                if($left > 0) {
                    foreach($failedTags as $tagId => $failed) {
                        $randPossibility[$tagId] += ($failed / $totalFails) * $leftP;
                    }
                }

                foreach($randPossibility as $tagId => $possibility) {
                    $randPossibility[$tagId] = $possibility / 100;
                }

                $worstTag = $this->getRand($randPossibility);
                $questions = $tagsQuestions[$worstTag];

                if(!count($questions)) {
                    $nextQuestion = 0;
                }
                else {
                    $nextQuestion = $questions[array_rand($questions)];
                }

                if(in_array($nextQuestion, $destiny)) {
                    /*
                     * Question already in destiny
                     */
                    for($i = 0; $i < count($destiny); $i++) {
                        if($destiny[$i] == $nextQuestion) {
                            list($destiny[$i],$destiny[$iter + 1]) = array($destiny[$iter + 1],$destiny[$i]);
                            break;
                        }
                    }
                    $this->generateDestiny($type, $destiny);
                }
                else {
                    /*
                     * Question NOT in destiny
                     */
                    for($i = 0; $i < count($questions); $i++) {
                        try {
                            if($questions[$i] == $nextQuestion) {
                                list($questions[$i], $destiny[$iter + 1]) = array($destiny[$iter + 1], $questions[$i]);
                                break;
                            }
                        }
                        catch(\Exception $e) {
                            var_dump('error',
                                $this->get($type . '.tagsQuestions'),
                                $nextQuestion,
                                $questions,
                                $this->getIter($type),
                                app()->request->session()->get('questionable.' . $this->id));die;

                        }

                    }
                    $this->generateDestiny($type, $destiny);
                    $this->set($type . '.tagsQuestions.' . $worstTag, $questions);
                }
            }
//            var_dump($this->get($type . '.tagsQuestions'),
//                $nextQuestion,
//                $questions,
//                $this->getIter($type),
//                app()->request->session()->get('questionable.' . $this->id));die;
        }

        $this->set($type . '.i', $this->getIter($type) + 1);
    }

    private function isCorrectAnswer(Question $question, $ans)
    {
        $correct = [];
        if($question->type == 'text') {
            $correct[] = $question->answers[0]->text;
        }
        else {
            $i = 0;
            foreach($question->answers as $answer) {
                if($answer->is_correct) {
                    $correct[] = $i;
                }
                $i++;
            };
        }

        if(is_numeric($ans)) $ans = (int)$ans;
        if(!is_array($ans)) {
            $ans = [$ans];
        }
        else {
            for($i = 0; $i < count($ans); $i++) {
                if(is_numeric($ans[$i])) $ans[$i] = (int)$ans[$i];
            }
        }
        $answers = $ans;

        return $correct == $answers;
    }

    /**
     * Check session is started
     *
     * @param $type
     * @return mixed
     */
    public function typedSessionExists($type)
    {
        return $this->has($type);
    }

    /**
     * Reset topic results by given type
     *
     * @param $type
     */
    public function resetTypeSession($type)
    {
        $this->set('type', null);
        $this->set($type, null);
    }

    /**
     * Get topic results by test type
     *
     * @param $type
     * @return mixed
     */
    public function getResults($type)
    {
        return $this->get($type);
    }

    public function generateDestiny($type, $data = false)
    {
        $key = $type . '.destiny';
        if(!$data) {
            $limit = Topic::THEORY_LIMIT;
            $all = $this->questions->count();
            $amount = $all > $limit? $limit : $all;

            $data = $this->questions()->orderByRaw("RAND()")->limit($amount)->get()->pluck('id')->toArray();
            shuffle($data);

            $tagsQuestions = [];
            $failedTags = [];

            foreach ($this->questions as $question) {
                foreach($question->tags as $tag) {
                    if(!array_key_exists($tag->id, $tagsQuestions)) {
                        $tagsQuestions[$tag->id] = [];
                    }
                    $tagsQuestions[$tag->id][] = $question->id;

                    if(!array_key_exists($tag->id, $failedTags)) {
                        $failedTags[$tag->id] = 0;
                    }
                }
            }

            $this->set($type . '.tagsQuestions', $tagsQuestions);
            $this->set($type . '.failedTags', $failedTags);
        }

        $this->set($key, $data);
    }

    /**
     * Start session of given type if it not exists
     *
     * @param $type
     */
    public function startTypedSessionIfNotExists($type)
    {
        if(!$this->typedSessionExists($type)) {
            $this->startTypedSession($type);
            $this->generateDestiny($type);
        }
    }

    /**
     * All questions is answered
     *
     * @param $type
     * @return bool
     */
    public function fullyAnswered($type)
    {
        return $this->typedSessionExists($type) &&
        (count($this->getDestiny($type))
            == count($this->getAnswers($type)));
    }

    public function getDestiny($type)
    {
        $key = $type . '.destiny';
        return $this->get($key);
    }

    public function getAnswers($type)
    {
        $key = $type . '.answers';
        return $this->get($key);
    }

    public function getIter($type)
    {
        $key = $type . '.i';
        return $this->get($key);
    }

    public function collectSubmittedQuestions()
    {
        $questions = $this->getJsonQuestionsResults(
            $this->getDestiny(Topic::THEORY_TYPE)
        )->toArray();

        $sortedTemp = [];
        foreach($questions as $question) {
            $sortedTemp[$question->id] = $question;
        }

        $sortedQuestions = [];
        foreach($this->getDestiny(Topic::THEORY_TYPE) as $id) {
            $sortedQuestions[$id] = $sortedTemp[$id];
        }

        $answers = [];
        foreach($this->getAnswers(Topic::THEORY_TYPE) as $ans) {
            if(is_numeric($ans)) $ans = (int)$ans;
            if(!is_array($ans)) {
                $ans = [$ans];
            }
            else {
                for($i = 0; $i < count($ans); $i++) {
                    if(is_numeric($ans[$i])) $ans[$i] = (int)$ans[$i];
                }
            }
            $answers[] = $ans;
        }

        $j = 0;
        foreach($sortedQuestions as $question) {
            $question->submitted = $answers[$j];
            $j++;
        }

        $this->set(Topic::THEORY_TYPE.'.results', $sortedQuestions);
    }

    public function hasQuestionsResults()
    {
        return $this->has(Topic::THEORY_TYPE.'.results');
    }

    public function getQuestionsResults()
    {
        return $this->get(Topic::THEORY_TYPE.'.results');
    }

    /**
     * @param $key
     * @param $value
     *
     * Keys: 'i', 'answers' reserved
     */
    public function set($key, $value)
    {
        $request = app()->request;
        $key = 'questionable.' . $this->id . '.' . $key;

        $request->session()->set($key, $value);
    }

    /**
     * @param $key
     * @param $value
     *
     * Keys: 'i', 'answers' reserved
     */
    public function setTyped($key, $value)
    {
        $this->set($this->get('type') . '.' . $key, $value);
    }

    public function get($key, $default = null)
    {
        $request = app()->request;
        $key = 'questionable.' . $this->id . '.' . $key;

        return $request->session()->get($key, function() use ($default) {
            return $default;
        });
    }

    public function getTyped($key, $default = null)
    {
        return $this->get($this->get('type') . '.' . $key, $default);
    }

    public function has($key)
    {
        $request = app()->request;
        $key = 'questionable.' . $this->id . '.' . $key;

        return $request->session()->has($key);
    }

    /**
     * Get random element from array with probability.
     * If no probability passed method return element from array
     * with equal probability.
     *
     * @param array $set
     * @param int $length
     * @return int|null|string
     */
    private function getRand(array $set, $length=10000)
    {
        if(array_keys($set) === range(0, count($set) - 1)) {
            $newSet = [];
            foreach($set as $word) {
                $newSet[$word] = 1/count($set);
            }
            $set = $newSet;
        }
        $left = 0;
        foreach($set as $num=>$right)
        {
            $set[$num] = $left + $right*$length;
            $left = $set[$num];
        }
        $test = mt_rand(1, $length);
        $left = 1;
        foreach($set as $num=>$right)
        {
            if($test>=$left && $test<=$right)
            {
                return $num;
            }
            $left = $right;
        }
        return array_keys($set)[array_rand(array_keys($set))];//debug, no event realized
    }
}