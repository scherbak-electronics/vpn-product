<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Api\Data;

interface VpnProductInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ENTITY_ID = 'entity_id';
    const COPYWRITE_INFO = 'copywrite_info';
    const VPN = 'vpn';
    const VPNPRODUCT_ID = 'vpnproduct_id';

    /**
     * Get vpnproduct_id
     * @return string|null
     */
    public function getVpnproductId();

    /**
     * Set vpnproduct_id
     * @param string $vpnproductId
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setVpnproductId($vpnproductId);

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setEntityId($entityId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Wserbrand\VpnProduct\Api\Data\VpnProductExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Wserbrand\VpnProduct\Api\Data\VpnProductExtensionInterface $extensionAttributes
    );

    /**
     * Get copywrite_info
     * @return string|null
     */
    public function getCopywriteInfo();

    /**
     * Set copywrite_info
     * @param string $copywriteInfo
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setCopywriteInfo($copywriteInfo);

    /**
     * Get vpn
     * @return string|null
     */
    public function getVpn();

    /**
     * Set vpn
     * @param string $vpn
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     */
    public function setVpn($vpn);
}

