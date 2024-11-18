<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Formacao extends Model
{
    use HasFactory;

    protected $table = 'formacao';
    protected $fillable = ['link', 'title', 'categoryName','icon', 'dateRemoved'];

    protected static function booted(): void
    {
        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('dateRemoved', 'desc');
        });
    }
}
