<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Product extends Model
{
    // fillable for MassAssignment (... for security)
    protected $fillable = ['name'];

    // Expresses relationship
    public function review()
    {
        // product [has many] reviews
        return $this->hasMany(Review::class);
    }
}
