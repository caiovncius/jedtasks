<?php

namespace App\Account\Contracts;

use App\Workspace;

interface AccountWorkspaceUpdatable
{
    /**
     * @param Workspace $workspace
     * @param array $data
     * @return Workspace
     * @throws \Exception
     */
    public function update(Workspace $workspace, array $data);
}
