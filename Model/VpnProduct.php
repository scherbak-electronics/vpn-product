<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Model;

use Magento\Framework\Api\DataObjectHelper;
use Wserbrand\VpnProduct\Api\Data\VpnProductInterface;
use Wserbrand\VpnProduct\Api\Data\VpnProductInterfaceFactory;

class VpnProduct extends \Magento\Framework\Model\AbstractModel
{

    protected $vpnproductDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'wserbrand_vpnproduct_vpnproduct';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param VpnProductInterfaceFactory $vpnproductDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct $resource
     * @param \Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        VpnProductInterfaceFactory $vpnproductDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct $resource,
        \Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct\Collection $resourceCollection,
        array $data = []
    ) {
        $this->vpnproductDataFactory = $vpnproductDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve vpnproduct model with vpnproduct data
     * @return VpnProductInterface
     */
    public function getDataModel()
    {
        $vpnproductData = $this->getData();
        
        $vpnproductDataObject = $this->vpnproductDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $vpnproductDataObject,
            $vpnproductData,
            VpnProductInterface::class
        );
        
        return $vpnproductDataObject;
    }
}

