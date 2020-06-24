<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    protected $hidden = ['image'];
    protected $fillable = [
        'title','image','typeObjet', 'localisation', 'body','user_id','typeAnnonce'
    ];
}
