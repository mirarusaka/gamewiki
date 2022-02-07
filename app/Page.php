<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use cebe\markdown\Markdown as Markdown;

class Page extends Model
{
    protected $table = 'pages';
    protected $guarded = array('id');

    public static $rules = array(

        'title' => 'required|unique:pages',
        'dl' => 'required|url',
        'tool' => 'required|min:1',
        'creater'  => 'required',
        'janru' => 'required|min:1',
        'body'  => 'required',
        'titlegamen'  => 'required',
    );

    public function getData()
    {
        return $this->title;
    }

    public function url()
    {
        return route('pages.show', $this->title);
    }

    public function getUrlAttribute()
    {
        return $this->url();
    }

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function scopeNameSerch($query, $str)
    {
        return $query->where('title', 'like', "$str");
    }

    public function scopeCategorySerch($query, $str)
    {
        return $query->where('title', 'like', "$str");
    }

        public function parse()
    {
        $parser = new Markdown();

        return $parser->parse($this->body);
    }

        public function getMarkdownBodyAttribute()
    {
        return $this->parse();
    }
}
