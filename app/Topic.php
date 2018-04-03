<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Topic extends Model
{
    use Questionable;

    const THEORY_TYPE = 'theory';
    const PRACTICE_TYPE = 'practice';

    /**
     * Limit of theory questions
     */
    const THEORY_LIMIT = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    /**
     * Get topic identifier
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        if($this->slug) {
            return $this->slug;
        }

        return $this->id;
    }

    /**
     * Find item by slug or by id
     *
     * @param $id
     * @throws ModelNotFoundException
     *
     * @return Topic
     */
    public static function findByIdentifierOrFail($id)
    {
        /** @var Topic $topic */
        $topic = Topic::where('id', '=', $id)
            ->orWhere('slug', '=', $id)
            ->firstOrFail();

        return $topic;
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'topic_id');
    }

    public function getJsonQuestions()
    {
        return $this->questions->map(function($item){
            /** @var $item Question */
            $correct = [];
            if($item->type == 'text') {
                $correct[] = $item->answers[0]->text;
            }
            else {
                $i = 0;
                foreach($item->answers as $answer) {
                    if($answer->is_correct) {
                        $correct[] = $i;
                    }
                    $i++;
                };
            }

            return (object)[
                'id' => $item->id,
                'question' => $item->question,
                'type' => $item->type,
                'image' => $item->image,
                'tags' => $item->tags->map(function($tag){
                    return $tag->title;
                })->toArray(),
                'correct' => $correct,
                'answers' => $item->answers->map(function($answer){
                    return $answer->text;
                })
            ];
        });
    }

    public function getJsonQuestionsResults($ids)
    {
        return $this->questions()
            ->whereIn('id', $ids)
            ->get()
            ->map(function($item){
            /** @var $item Question */
            $correct = [];
            if($item->type == 'text') {
                $correct[] = $item->answers[0]->text;
            }
            else {
                $i = 0;
                foreach($item->answers as $answer) {
                    if($answer->is_correct) {
                        $correct[] = $i;
                    }
                    $i++;
                };
            }

            return (object)[
                'id' => $item->id,
                'question' => $item->question,
                'type' => $item->type,
                'image' => $item->image,
                'tags' => $item->tags->map(function($tag){
                    return $tag->title;
                })->toArray(),
                'correct' => $correct,
                'answers' => $item->answers->map(function($answer){
                    return $answer->text;
                })->toArray()
            ];
        });
    }

    public function updateQuestions($data)
    {
        // delete old questions
        $oldIds = $this->questions->lists('id')->toArray();

        $newIds = [];

        foreach ($data as $item) {
            if($item->id != 0) {
                $newIds[] = $item->id;
            }
        }

        $deleteIds = array_diff($oldIds, $newIds);

        foreach ($deleteIds as $deleteId) {
            if($q = Question::find($deleteId)) {
                $q->delete();
            }
        }

        // add new questions
        foreach ($data as $item) {
            if($item->id == 0) {
                $question = new Question([
                    'question' => $item->question,
                    'type' => $item->type,
                    'image' => $item->image,
                    'topic_id' => $this->id
                ]);
                $question->save();
            }
            else {
                if($question = Question::find($item->id)) {
                    /** @var Question $question */
                    foreach ($question->answers as $answer) {
                        $answer->delete();
                    }

                    $question->fill([
                        'question' => $item->question,
                        'type' => $item->type,
                        'image' => $item->image,
                    ]);

                    $question->save();
                }
            }

            if($item->type != 'text') {
                $i = 0;
                foreach ($item->answers as $answer) {
                    (new Answer([
                        'question_id' => $question->id,
                        'text' => $answer,
                        'is_correct' => in_array($i, $item->correct)
                    ]))->save();
                    $i++;
                }
            }
            else {
                (new Answer([
                    'question_id' => $question->id,
                    'text' => $item->answers[0],
                    'is_correct' => true
                ]))->save();
            }

            $tagIds = [];
            foreach($item->tags as $tagTitle) {
                $tag = Tag::firstOrCreate(['title' => $tagTitle]);
                $tagIds[] = $tag->id;
            }
            $question->tags()->sync($tagIds);
        }
    }
}
