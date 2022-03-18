<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Quiz
 *
 * @property  int $id
 * @property string $title
 * @property string $icon
 */
class Quiz extends Model
{
    use HasFactory;
    
    protected $table = 'quiz';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','title', 'icon'
    ];

    public function question(): HasMany
    {
        // Quiz id is referenced in the Questions' table as 'quid_id' so we specify it here.
        return $this->hasMany('App\Models\Question::class', 'quiz_id');
    }
}
