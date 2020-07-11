<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Projects
 * @package App
 *
 * @property int $id
 * @property string $name
 */
class Projects extends Model
{
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Получить все задачи
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Tasks', 'project_id');
    }
}
