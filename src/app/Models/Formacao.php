<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Formacao extends Model
{
    protected $table = 'formacao';
    protected $fillable = ['link', 'title', 'categoryName', 'kindDisplayName', 'icon', 'formattedDate'];

    protected static function booted(): void
    {
        self::addGlobalScope('ordered', function (Builder $builder) {
            $builder->orderBy('formattedDate', 'desc');
        });
    }
}
