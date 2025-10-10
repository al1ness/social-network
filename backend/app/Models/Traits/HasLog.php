<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;

trait HasLog
{
    public static function bootHasLog(): void
    {
        static::created(function (Model $model) {
            Log::create([
                'model' => get_class($model),
                'event' => 'created',
                'new_fields' => json_encode($model->getDirty(), JSON_UNESCAPED_UNICODE)
            ]);
        });

        static::updated(function (Model $model) {
            $newFields = $model->getDirty();
            $oldFields = [];

            foreach ($newFields as $field => $newValue) {
                $oldFields[$field] = $model->getOriginal($field);
            }

            Log::create([
                'model' => get_class($model),
                'event' => 'updated',
                'old_fields' => json_encode($oldFields, JSON_UNESCAPED_UNICODE),
                'new_fields' => json_encode($newFields, JSON_UNESCAPED_UNICODE)
            ]);
        });

        static::deleted(function (Model $model) {
            Log::create([
                'model' => get_class($model),
                'event' => 'deleted',
            ]);
        });

        static::retrieved(function (Model $model) {
            if (!app()->runningInConsole()) {
                Log::create([
                    'model' => get_class($model),
                    'event' => 'retrieved',
                ]);
            }
        });
    }
}
