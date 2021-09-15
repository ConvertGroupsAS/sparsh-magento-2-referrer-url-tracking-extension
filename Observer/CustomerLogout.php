<?php

namespace Sparsh\ReferrerUrlTracking\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Sparsh\ReferrerUrlTracking\Helper\Data as CustomerLogoutHelper;

class CustomerLogout implements ObserverInterface
{
    /**
     * @var CustomerLogoutHelper
     */
    protected $customerLogoutHelper;

    /**
     * CustomerLogout constructor.
     *
     * @param CustomerLogoutHelper $customerLogoutHelper
     */
    public function __construct(CustomerLogoutHelper $customerLogoutHelper)
    {
        $this->customerLogoutHelper = $customerLogoutHelper;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $this->customerLogoutHelper->getCustomerSession()->unsReferrerUrl();
    }
}
