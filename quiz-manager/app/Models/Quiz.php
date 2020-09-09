<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quiz
 *
 * @property  int $id
 * @property string $title
 * @property string $icon
 */
class Quiz extends Model
{
    protected $table = 'quiz';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'icon'
    ];
}
