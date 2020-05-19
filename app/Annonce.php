<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    //
    protected $fillable = [
        'title','image','typeObjet', 'localisation', 'body','user_id','typeAnnonce'
    ];
}
