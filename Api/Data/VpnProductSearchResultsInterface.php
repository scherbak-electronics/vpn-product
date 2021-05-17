<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Api\Data;

interface VpnProductSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get VpnProduct list.
     * @return \Wserbrand\VpnProduct\Api\Data\VpnProductInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \Wserbrand\VpnProduct\Api\Data\VpnProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

