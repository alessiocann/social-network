<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomeUtente', 'nome', 'cognome', 'email', 'password', 'immagine'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post(){
        return $this->hasMany("App\Models\Post");
    }

    public function postLikes(){
        return $this->belongsToMany("App\Models\Post", "hw2Likes"); 
    }

    public function follower(){
        return $this->belongsToMany("App\User", "followers", "id", "follower_id");
    }

    public function following(){
        return $this->belongsToMany("App\User", "followers", "id", "following_id");
    }

    /*public function setImmagineAttribute($value){
        $path = Storage::disk("public")->put($value);
        $this->attribute["immagine"] = $path;
    }

    public function getImmagine($value){
        return $value ? Storage::disk("public")->url($value) : asset("default.png"); //Storage serve per recuperare tutto l'url
    }*/
}
