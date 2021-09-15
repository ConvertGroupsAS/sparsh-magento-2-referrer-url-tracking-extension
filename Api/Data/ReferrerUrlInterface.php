<?php
namespace  Sparsh\ReferrerUrlTracking\Api\Data;

interface ReferrerUrlInterface
{
    /**
    * Constants for keys of data array. Identical to the name of the getter in snake case
    */
    const DOMAIN_ID      = 'domain_id';
    const DOMAIN_NAME    = 'domain_name';
    const ORDER_COUNT    = 'order_count';
    const CUSTOMER_COUNT = 'customer_count';
    const CREATED_AT     = 'created_at';
    const UPDATED_AT     = 'updated_at';

    /**
     * Get domain id
     *
     * @return int|null
     */
    public function getDomainId();

    /**
     * Get domain_name
     *
     * @return string|null
     */
    public function getDomainName();

    /**
     * Get order count
     *
     * @return int|null
     */
    public function getOrderCount();

    /**
     * Get customer count
     *
     * @return int|null
     */
    public function getCustomerCount();

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get updated at
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set doamin id
     *
     * @param  int $domainId
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setDomainId($domainId);

    /**
     * Set doamin name
     *
     * @param  string $domainName
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setDomainName($domainName);

    /**
     * Set order count
     *
     * @param  string $orderCount
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setOrderCount($orderCount);

    /**
     * Set customer count
     *
     * @param  string $customerCount
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setCustomerCount($customerCount);

    /**
     * Set created at
     *
     * @param  string $createdAt
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Set updated at
     *
     * @param  string $updatedAt
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setUpdatedAt($updatedAt);
}
