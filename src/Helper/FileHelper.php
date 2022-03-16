<?php namespace Falbar\NovaCardLog\Helper;

/**
 * Class FileHelper
 * @package Falbar\NovaCardLog\Helper
 */
class FileHelper
{
    /**
     * @param int $iBytes
     * @param int $iPrecision
     *
     * @return string
     */
    public static function formatBytes(int $iBytes, int $iPrecision = 2): string
    {
        $arPostSuffixes = [' bytes', ' kb', ' mb', ' gb', ' tb'];
        if ($iBytes > 0) {
            $iBase = log($iBytes) / log(1024);
            $iFloorBase = floor($iBase);

            $sResult = round(pow(1024, $iBase - $iFloorBase), $iPrecision) . $arPostSuffixes[$iFloorBase];
        } else {
            $sResult = $iBytes . reset($arPostSuffixes);
        }

        return $sResult;
    }
}
