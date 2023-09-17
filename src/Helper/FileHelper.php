<?php namespace Akbsit\NovaCardLog\Helper;

class FileHelper
{
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
