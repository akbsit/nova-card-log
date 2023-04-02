<?php namespace Falbar\NovaCardLog\Helper;

use Illuminate\Support\Facades\File;

class LogHelper
{
    private const BASE_DIR = 'logs';

    public static function make(): self
    {
        return new static();
    }

    public function getTotalSize(): int
    {
        $iResult = 0;

        $sStoragePath = storage_path(self::BASE_DIR);
        if (empty($sStoragePath) || empty(File::exists($sStoragePath))) {
            return $iResult;
        }

        $arFileList = File::allFiles($sStoragePath);
        if (empty($arFileList)) {
            return $iResult;
        }

        foreach ($arFileList as $oFile) {
            $iResult += $oFile->getSize();
        }

        return $iResult;
    }

    public function getTotalSizeFormatted(): string
    {
        return FileHelper::formatBytes($this->getTotalSize());
    }

    public function deleteAll(): void
    {
        $sStoragePath = storage_path(self::BASE_DIR);
        if (empty($sStoragePath) || empty(File::exists($sStoragePath))) {
            return;
        }

        $arFileList = File::allFiles($sStoragePath);
        if (!empty($arFileList)) {
            foreach ($arFileList as $oFile) {
                File::delete($oFile->getRealPath());
            }
        }

        $arDirectoryList = File::directories($sStoragePath);
        if (!empty($arDirectoryList)) {
            foreach ($arDirectoryList as $sDirectory) {
                File::deleteDirectory($sDirectory);
            }
        }
    }
}
