<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface VpnProductRepositoryInterface
{

    /**
     * Save VpnProduct
     * @param \Wserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Wserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
    );

    /**
     * Retrieve VpnProduct
     * @param string $vpnproductId
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($vpnproductId);

    /**
     * Retrieve VpnProduct matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete VpnProduct
     * @param \Wserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Wserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
    );

    /**
     * Delete VpnProduct by ID
     * @param string $vpnproductId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($vpnproductId);
}

