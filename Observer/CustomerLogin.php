<?php

namespace Sparsh\ReferrerUrlTracking\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Sparsh\ReferrerUrlTracking\Helper\Data as CustomerLoginHelper;
use Sparsh\ReferrerUrlTracking\Model\ReferrerUrlFactory;

class CustomerLogin implements ObserverInterface
{
    /**
     * @var CustomerLoginHelper
     */
    protected $customerLoginHelper;
    /**
     * @var ReferrerUrlFactory
     */
    protected $referrerUrlFactory;

    /**
     * CustomerLogin constructor.
     *
     * @param CustomerLoginHelper $customerLoginHelper
     * @param ReferrerUrlFactory  $referrerUrlFactory
     */
    public function __construct(CustomerLoginHelper $customerLoginHelper, ReferrerUrlFactory $referrerUrlFactory)
    {
        $this->customerLoginHelper = $customerLoginHelper;
        $this->referrerUrlFactory = $referrerUrlFactory;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $referrer_url = $this->customerLoginHelper->getCustomerSession()->getReferrerUrl();
        $isEnableCustomerReferrerUrl = $this->customerLoginHelper->isEnableCustomerReferrerUrl();

        if ($referrer_url && $isEnableCustomerReferrerUrl) {
            $url_domain = parse_url($referrer_url)['host'];
            $referrerUrlModel = $this->referrerUrlFactory->create();

            $collection = $referrerUrlModel->load($url_domain, 'domain_name')->getData();

            if ($collection) {
                $domain_id = $collection['domain_id'];
                $customer_count = $collection['customer_count'];
                if ($customer_count) {
                    $customer_count++;
                } else {
                    $customer_count = 1;
                }
                $referrerUrlModel->load($domain_id);
                $referrerUrlModel->setCustomerCount($customer_count);
            } else {
                $referrerUrlModel->setDomainName($url_domain);
                $referrerUrlModel->setCustomerCount(1);
            }
            $referrerUrlModel->save();
        }
    }
}
