<?php namespace Falbar\NovaCardLog;

use Falbar\NovaCardLog\Helper\LogHelper;
use Laravel\Nova\Card;

/**
 * Class NovaCardLog
 * @package Falbar\NovaCardLog
 */
class NovaCardLog extends Card
{
    /* @inheritDoc */
    public $width = '1/3';

    /* @inheritDoc */
    public function component()
    {
        $this->setComponentMeta();

        return 'nova-card-log';
    }

    /* @return NovaCardLog */
    private function setComponentMeta()
    {
        return $this->withMeta([
            'size' => LogHelper::getTotalSize(),
        ]);
    }
}
