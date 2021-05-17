<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Model\Data;

use Wserbrand\VpnProduct\Api\Data\VpnProductInterface;

class VpnProduct extends \Magento\Framework\Api\AbstractExtensibleObject implements VpnProductInterface
{

    /**
     * Get vpnproduct_id
     * @return string|null
     */
    public function getVpnproductId()
    {
        return $this->_get(self::VPNPRODUCT_ID);
    }

    /**
     * Set vpnproduct_id
     * @param string $vpnproductId
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setVpnproductId($vpnproductId)
    {
        return $this->setData(self::VPNPRODUCT_ID, $vpnproductId);
    }

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Wserbrand\VpnProduct\Api\Data\VpnProductExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Wserbrand\VpnProduct\Api\Data\VpnProductExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get copywrite_info
     * @return string|null
     */
    public function getCopywriteInfo()
    {
        return $this->_get(self::COPYWRITE_INFO);
    }

    /**
     * Set copywrite_info
     * @param string $copywriteInfo
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setCopywriteInfo($copywriteInfo)
    {
        return $this->setData(self::COPYWRITE_INFO, $copywriteInfo);
    }

    /**
     * Get vpn
     * @return string|null
     */
    public function getVpn()
    {
        return $this->_get(self::VPN);
    }

    /**
     * Set vpn
     * @param string $vpn
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setVpn($vpn)
    {
        return $this->setData(self::VPN, $vpn);
    }
}

