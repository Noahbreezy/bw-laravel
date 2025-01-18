<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'answer',
    ];

    /**
     * Get the FAQ creation date in a human-readable format.
     *
     * @return string
     */
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('F j, Y, g:i a');
    }

    /**
     * Get the FAQ update date in a human-readable format.
     *
     * @return string
     */
    public function getUpdatedAtFormattedAttribute()
    {
        return $this->updated_at->format('F j, Y, g:i a');
    }
}
