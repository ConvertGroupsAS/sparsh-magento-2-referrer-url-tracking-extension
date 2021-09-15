<?php
namespace Sparsh\ReferrerUrlTracking\Block;

use Sparsh\ReferrerUrlTracking\Helper\Data;

class ReferrerUrl extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * ReferrerUrl constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param Data                                             $helper
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getReferrerUrl()
    {
        return $this->helper->getCustomerSession()->getReferrerUrl();
    }

    /**
     * @return mixed
     */
    public function isEnableCustomerReferrerUrl()
    {
        return $this->helper->isEnableCustomerReferrerUrl();
    }
}
