<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'published_at', 'user_id'];

    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
      $query->where('published_at', '>=', Carbon::now());
    }

    public function setPublishedAtAttribute($date)
    {
      $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function tags()
    {
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
