<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'vpnproduct_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Wserbrand\VpnProduct\Model\VpnProduct::class,
            \Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct::class
        );
    }
}

