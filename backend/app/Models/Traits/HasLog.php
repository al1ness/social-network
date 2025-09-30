<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Log;

trait HasLog
{
    public static function bootHasLog(): void
    {
        static::created(function ($model) {
            Log::create([
                'model_name' => get_class($model),
                'event_name' => 'created',
                'new_fields' => json_encode($model->getDirty(), JSON_UNESCAPED_UNICODE)
            ]);
        });

        static::updated(function ($model) {
            $newFields = $model->getDirty();
            $oldFields = [];

            foreach ($newFields as $field => $newValue) {
                $oldFields[$field] = $model->getOriginal($field);
            }

            Log::create([
                'model_name' => get_class($model),
                'event_name' => 'updated',
                'old_fields' => json_encode($oldFields, JSON_UNESCAPED_UNICODE),
                'new_fields' => json_encode($newFields, JSON_UNESCAPED_UNICODE)
            ]);
        });

        static::deleted(function ($model) {
            Log::create([
                'model_name' => get_class($model),
                'event_name' => 'deleted',
            ]);
        });

        static::retrieved(function ($model) {
            if (!app()->runningInConsole()) {
                Log::create([
                    'model_name' => get_class($model),
                    'event_name' => 'retrieved',
                ]);
            }
        });
    }
}
