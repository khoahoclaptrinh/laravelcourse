<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    const TABLE = 'posts';
    protected $table = self::TABLE;

    protected $fillable = [
        'status',
        'options',
        'category_id',
        'module_id',
        'views',
        'created_at',
        'updated_at',
        'name',
        'short_description',
        'description',
        'code',
        'code_number',
        'date_of_filing',
        'received_date',
        'deadline',
        'user_id',
        'logo',
    ];
}
