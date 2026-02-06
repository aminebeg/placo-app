<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'model_type',
        'model_id',
        'description',
        'properties',
        'ip_address'
    ];

    protected $casts = [
        'properties' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function logAction($action, $description, $model = null, $properties = null)
    {
        return self::create([
            'user_id' => auth()->id() ?? 1, // Default to 1 if system action
            'action' => $action,
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model ? $model->id : null,
            'description' => $description,
            'properties' => $properties,
            'ip_address' => request()->ip()
        ]);
    }
}
