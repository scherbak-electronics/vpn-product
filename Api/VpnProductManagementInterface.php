<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Api;

interface VpnProductManagementInterface
{

    /**
     * GET for VpnProduct api
     * @param string $param
     * @return string
     */
    public function getVpnProduct($param);
}

