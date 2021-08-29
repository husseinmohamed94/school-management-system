<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class student extends Model
{
    use HasTranslations;

    protected $table = 'students';
    protected $guarded = [];
    public $translatable = ['name'];

    public  function gender(){
        return $this->belongsTo('App\Models\Gender','gender_id');
    }
    public  function grade(){
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }
    public  function classroom(){
        return $this->belongsTo('App\Models\Classroom','Classroom_id');
    }
    public  function section(){
        return $this->belongsTo('App\Models\Section','section_id');
    }
    public  function Nationality(){
        return $this->belongsTo('App\Models\Nationalite','nationalitie_id');
    }
    public  function myparent(){
        return $this->belongsTo('App\Models\MyParent','parent_id');
    }
}