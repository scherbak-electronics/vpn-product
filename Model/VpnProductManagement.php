<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Model;

class VpnProductManagement implements \Wserbrand\VpnProduct\Api\VpnProductManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getVpnProduct($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

