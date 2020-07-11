<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tasks
 * @package App
 *
 * @property int $id
 * @property string $name
 * @property int $project_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Times $times
 */
class Tasks extends Model
{
    /** @var int|Times $start */
    private $start;

    protected $table = 'tasks';

    protected $fillable = ['name'];

    /**
     * Получить время
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function times()
    {
        return $this->hasMany('App\Times', 'task_id');
    }

    /**
     * Проверка на активной заадчи
     * @param bool $count
     * @return Times|int|null
     */
    public function isStart(bool $count = false)
    {
        if ($this->start) {
            return $this->start;
        }
        $query = $this->times()->whereNull(['time', 'hours']);
        $this->start = $count ? $query->count() : $query->first();
        return $this->start;
    }
}
