<?php

namespace App\Webhooks;

use Spatie\WebhookClient\ProcessWebhookJob;
use Illuminate\Support\Facades\Storage;


class WebhooksHandler extends ProcessWebhookJob
{
    public function handle()
    {
        Storage::disk('local')->put('example.txt', 'Banana');
        logger('Aqui');
        logger($this->webhookCall);
    }
}
