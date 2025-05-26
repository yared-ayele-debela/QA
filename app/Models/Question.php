<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Parsedown;

class Question extends Model
{
    //
    use HasFactory;
    protected  $fillable=['title','body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public  function getUrlAttribute(){

        return route('questions.show',$this->slug);
    }

    public function getBodyHtmlAttribute(){
        $parsedown = new Parsedown();

        return $parsedown->text($this->body);

    }
}
