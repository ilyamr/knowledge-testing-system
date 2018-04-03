<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @package App
 *
 * @property Tag[] tags
 */
class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'topic_id', 'type', 'image'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    /**
     * Tags relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tags');
    }
}
