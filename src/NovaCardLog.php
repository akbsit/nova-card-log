<?php namespace Akbsit\NovaCardLog;

use Akbsit\NovaCardLog\Helper\LogHelper;
use Laravel\Nova\Card;

class NovaCardLog extends Card
{
    public $width = '1/3';

    public function component(): string
    {
        $this->setComponentMeta();

        return 'nova-card-log';
    }

    private function setComponentMeta(): void
    {
        $this->withMeta([
            'size' => LogHelper::make()->getTotalSizeFormatted(),
        ]);
    }
}
