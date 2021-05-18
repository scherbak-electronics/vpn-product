<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wserbrand\VpnProduct\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Wserbrand\VpnProduct\Api\Data\VpnProductInterfaceFactory;
use Wserbrand\VpnProduct\Api\Data\VpnProductSearchResultsInterfaceFactory;
use Wserbrand\VpnProduct\Api\VpnProductRepositoryInterface;
use Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct as ResourceVpnProduct;
use Wserbrand\VpnProduct\Model\ResourceModel\VpnProduct\CollectionFactory as VpnProductCollectionFactory;

class VpnProductRepository implements VpnProductRepositoryInterface
{
    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $vpnProductCollectionFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $dataVpnProductFactory;

    protected $vpnProductFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;

    /**
     * @param ResourceVpnProduct $resource
     * @param VpnProductFactory $vpnProductFactory
     * @param VpnProductInterfaceFactory $dataVpnProductFactory
     * @param VpnProductCollectionFactory $vpnProductCollectionFactory
     * @param VpnProductSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceVpnProduct $resource,
        VpnProductFactory $vpnProductFactory,
        VpnProductInterfaceFactory $dataVpnProductFactory,
        VpnProductCollectionFactory $vpnProductCollectionFactory,
        VpnProductSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->vpnProductFactory = $vpnProductFactory;
        $this->vpnProductCollectionFactory = $vpnProductCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataVpnProductFactory = $dataVpnProductFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Wserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
    ) {
        /* if (empty($vpnProduct->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $vpnProduct->setStoreId($storeId);
        } */

        $vpnProductData = $this->extensibleDataObjectConverter->toNestedArray(
            $vpnProduct,
            [],
            \Wserbrand\VpnProduct\Api\Data\VpnProductInterface::class
        );

        $vpnProductModel = $this->vpnProductFactory->create()->setData($vpnProductData);

        try {
            $this->resource->save($vpnProductModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the vpnProduct: %1',
                $exception->getMessage()
            ));
        }
        return $vpnProductModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($vpnProductId)
    {
        $vpnProduct = $this->vpnProductFactory->create();
        $this->resource->load($vpnProduct, $vpnProductId);
        if (!$vpnProduct->getId()) {
            throw new NoSuchEntityException(__('VpnProduct with id "%1" does not exist.', $vpnProductId));
        }
        return $vpnProduct->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->vpnProductCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Wserbrand\VpnProduct\Api\Data\VpnProductInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Wserbrand\VpnProduct\Api\Data\VpnProductInterface $vpnProduct
    ) {
        try {
            $vpnProductModel = $this->vpnProductFactory->create();
            $this->resource->load($vpnProductModel, $vpnProduct->getVpnproductId());
            $this->resource->delete($vpnProductModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the VpnProduct: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($vpnProductId)
    {
        return $this->delete($this->get($vpnProductId));
    }
}
