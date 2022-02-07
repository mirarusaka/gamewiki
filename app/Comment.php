<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = array('id');

    public static $rules = array(
        'comment' => 'required',
    );

    public function getData()
    {
        return $this->comment;
    }
}
