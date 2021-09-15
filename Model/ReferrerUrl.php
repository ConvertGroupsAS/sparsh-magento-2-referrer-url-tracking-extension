<?php
namespace Sparsh\ReferrerUrlTracking\Model;

use Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface;

class ReferrerUrl extends \Magento\Framework\Model\AbstractModel implements ReferrerUrlInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Sparsh\ReferrerUrlTracking\Model\ResourceModel\ReferrerUrl');
    }

    /**
     * Get domain id
     *
     * @return int|null
     */
    public function getDomainId()
    {
        return $this->getData(self::DOMAIN_ID);
    }

    /**
     * Get domain_name
     *
     * @return string|null
     */
    public function getDomainName()
    {
        return $this->getData(self::DOMAIN_NAME);
    }

    /**
     * Get order count
     *
     * @return int|null
     */
    public function getOrderCount()
    {
        return $this->getData(self::ORDER_COUNT);
    }

    /**
     * Get customer count
     *
     * @return int|null
     */
    public function getCustomerCount()
    {
        return $this->getData(self::CUSTOMER_COUNT);
    }

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get updated at
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set doamin id
     *
     * @param  int $domain_id
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setDomainId($domain_id)
    {
        return $this->setData(self::DOMAIN_ID, $domain_id);
    }

    /**
     * Set doamin name
     *
     * @param  string $domain_name
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setDomainName($domain_name)
    {
        return $this->setData(self::DOMAIN_NAME, $domain_name);
    }

    /**
     * Set order count
     *
     * @param  string $order_count
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setOrderCount($order_count)
    {
        return $this->setData(self::ORDER_COUNT, $order_count);
    }

    /**
     * Set customer count
     *
     * @param  string $customer_count
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setCustomerCount($customer_count)
    {
        return $this->setData(self::CUSTOMER_COUNT, $customer_count);
    }

    /**
     * Set created at
     *
     * @param  string $created_at
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Set updated at
     *
     * @param  string $updated_at
     * @return \Sparsh\ReferrerUrlTracking\Api\Data\ReferrerUrlInterface
     */
    public function setUpdatedAt($updated_at)
    {
        return $this->setData(self::UPDATED_AT, $updated_at);
    }
}
