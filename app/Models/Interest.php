<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Interest
 * @package App\Models
 * @property string interest
 */
class Interest extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'interest'
    ];

    /**
     * @var array
     */
    protected $guarded = [];
}
