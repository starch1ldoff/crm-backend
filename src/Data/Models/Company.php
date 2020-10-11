<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * Employees.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
