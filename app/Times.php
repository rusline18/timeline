<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Times
 * @package App
 *
 * @property int $id
 * @property string $text
 * @property string $time
 * @property float $hours
 * @property int $task_id
 */
class Times extends Model
{
    protected $table = 'times';

    protected $fillable = ['text'];
}
