<?php

namespace App\Models;

use AnswerKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Question
 *
 * @property  int $id
 * @property int $quiz_id
 * @property string $description
 * @property AnswerKey $answer_key
 * @property string $option_a
 * @property string $option_b
 * @property string $option_c
 * @property string $option_d
 * @property string $option_e
 * @property Quiz $quiz
 */
class Question extends Model
{
    use HasFactory;
    
    protected $table = 'question';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'description', 'answer_key', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e'
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo('App\Models\Quiz::class');
    }
}
