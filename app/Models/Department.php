<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'contact_email',
        'contact_phone',
        'status',
    ];

    /**
     * Get the users associated with the department.
     */
    public function users()
    {
        return $this->hasMany(User::class); // A Department has many Users
    }


    /**
     * Scope a query to only include active departments.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include inactive departments.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)// Returns only the departments that have a status of active.
    {
        return $query->where('status', 'inactive'); // Returns only the departments that are inactive.
    }
}

