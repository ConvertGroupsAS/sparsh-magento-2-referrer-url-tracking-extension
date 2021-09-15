<?php
namespace  Sparsh\ReferrerUrlTracking\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var Context
     */
    protected $context;
    /**
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * Data constructor.
     *
     * @param Context $context
     */
    public function __construct(Context $context, CustomerSession $customerSession)
    {
        $this->context = $context;
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    /**
     * @return CustomerSession
     */
    public function getCustomerSession()
    {
        return $this->customerSession;
    }

    /**
     * @return mixed
     */
    public function isEnableCustomerReferrerUrl()
    {
        return $this->scopeConfig->getValue('referrer_url/general/customer', ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function isEnableOrderReferrerUrl()
    {
        return $this->scopeConfig->getValue('referrer_url/general/order', ScopeInterface::SCOPE_STORE);
    }
}
