<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
protected $fillable = [
    'user_id', 'category_id', 'type',
    'title', 'description', 'location',
    'contact_number', 'date_occurred',
    'status', 'is_approved',
];
    
    protected $casts = [
        'date_occurred' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(ItemPhoto::class);
    }

    public function firstPhoto()
    {
        return $this->hasOne(ItemPhoto::class);
    }
}