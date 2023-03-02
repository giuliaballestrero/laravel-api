<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

        //aggiungo i valori fillable
        protected $fillable = ['name', 'slug', 'text_color', 'bg_color'];

        //definisco la relazione many to many con i projects
        public function projects() {
            return $this->belongsToMany(Project::class);
        }

}
