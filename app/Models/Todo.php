<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Nevadskiy\Position\HasPosition;

class Todo extends Model
{
    use HasPosition, HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'position'
    ];


    public function getDueDateAttribute($value)
    {
        return (new Carbon($value))->toFormattedDateString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
