<?php


namespace App\Helpers;


class JedLogger
{
    /**
     * Register exception log
     *
     * @param \Exception $e
     */
    public static function log(\Exception $e)
    {
        logger($e->getMessage(), ['trace' => $e->getTraceAsString(), 'code'=> $e->getCode(), 'file' => $e->getFile()]);
    }
}
