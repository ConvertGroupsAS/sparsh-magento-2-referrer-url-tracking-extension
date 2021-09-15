<?php

namespace  Sparsh\ReferrerUrlTracking\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var \Sparsh\ReferrerUrlTracking\Helper\Data
     */
    protected $helper;

    /**
     * Index constructor.
     *
     * @param \Magento\Framework\App\Action\Context       $context
     * @param \Magento\Framework\View\Result\PageFactory  $resultPageFactory
     * @param \Sparsh\ReferrerUrlTracking\Helper\Data $helper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Sparsh\ReferrerUrlTracking\Helper\Data $helper
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->helper = $helper;
        parent::__construct($context);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        if ($this->getRequest()->isAjax()) {
            $url = $this->getRequest()->getParam('url');
            if (isset($url)) {
                $referrerUrl = $url;
                $this->helper->getCustomerSession()->setReferrerUrl($referrerUrl);
            }
        }
        return $this->resultPageFactory->create();
    }
}
