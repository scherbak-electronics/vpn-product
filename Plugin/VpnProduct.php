<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Plugin;

class VpnProduct
{
    public function afterLoad(
        \Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct $subject,
        $result
    ) {
        //Your plugin code
        return $result;
    }
}

