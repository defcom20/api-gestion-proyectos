<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProyectTask extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'proyect_member_id' => 'integer',
        'task_id' => 'integer',
        'role_id' => 'integer',
        'priority_id' => 'integer',
        'due_date' => 'date',
        'type_state_id' => 'integer',
    ];

    public function proyectMember(): BelongsTo
    {
        return $this->belongsTo(ProyectMember::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function typeState(): BelongsTo
    {
        return $this->belongsTo(TypeState::class);
    }
}
