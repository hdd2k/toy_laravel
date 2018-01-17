<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // fillable for MassAssignment (... for seeding) ...?
    protected $fillable = ['name'];

    // Expresses relationship
    public function review()
    {
        // product [has many] reviews
        return $this->hasMany(Review::class);
    }
}
