<?php
namespace Sparsh\ReferrerUrlTracking\Block\Adminhtml\Order\View;

use Sparsh\ReferrerUrlTracking\Helper\Data;
use Magento\Sales\Api\OrderRepositoryInterface;

class Custom extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Data
     */
    protected $helper;
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;

    /**
     * Custom constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param Data                                             $helper
     * @param OrderRepositoryInterface                         $orderRepositoryInterface
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Data $helper,
        OrderRepositoryInterface $orderRepositoryInterface,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->orderRepository = $orderRepositoryInterface;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getReferrerUrl()
    {
        $order_id= $this->getRequest()->getParam('order_id');
        $order = $this->orderRepository->get($order_id);
        $referrer_url= $order->getReferrerUrl();
        return $referrer_url;
    }

    /**
     * @return mixed
     */
    public function isEnableOrderReferrerUrl()
    {
        return $this->helper->isEnableOrderReferrerUrl();
    }
}
