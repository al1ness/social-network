<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Logging\LogFormatter\EventLogFormatter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Monolog\Formatter\LineFormatter;

trait LoggableEvents
{
    public static function bootLoggableEvents(): void
    {
        static::created(function (Model $model) {
            self::writeLog($model, 'created', [
                'id' => $model->id,
                'attributes' => $model->getAttributes()
            ]);
        });

        static::retrieved(function (Model $model) {
            self::writeLog($model, 'retrieved', [
                'id' => $model->id
            ]);
        });

        static::updated(function (Model $model) {
            self::writeLog($model, 'updated', [
                'id' => $model->id,
                'original' => $model->getOriginal(),
                'changed' => $model->getChanges()
            ]);
        });

        static::deleted(function (Model $model) {
            self::writeLog($model, 'deleted', [
                'id' => $model->id
            ]);
        });
    }

    protected static function writeLog(Model $model, string $event, array $context): void
    {
        $modelName = strtolower(class_basename($model));
        $logPath = storage_path("logs/{$modelName}/{$event}.log");

        $logger = Log::build([
            'driver' => 'single',
            'path' => $logPath,
            'level' => 'info',
        ]);

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
                '[%datetime%]: %message% %context% %extra%' . PHP_EOL
            ));
        }

        $logger->info("{$modelName} {$event}", $context);
    }
}
