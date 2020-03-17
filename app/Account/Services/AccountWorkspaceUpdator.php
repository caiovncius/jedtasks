<?php


namespace App\Account\Services;


use App\Account\Contracts\AccountWorkspaceUpdatable;
use App\Helpers\JedLogger;
use App\Workspace;

class AccountWorkspaceUpdator implements AccountWorkspaceUpdatable
{
    /**
     * @param Workspace $workspace
     * @param array $data
     * @return Workspace
     * @throws \Exception
     */
    public function update(Workspace $workspace, array $data)
    {
        try {
            $workspace->fill($data);
            $workspace->save();
            return $workspace;

        } catch (\Exception $exception) {
            JedLogger::log($exception);
            throw $exception;
        }
    }
}
