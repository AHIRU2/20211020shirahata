<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $table = 'todolists';

    protected $fillable = ['content'];

    public static $rules = array(
        'content' => 'required|min:1|max:20'
    );
}
