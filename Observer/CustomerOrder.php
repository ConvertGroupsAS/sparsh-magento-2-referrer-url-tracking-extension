<?php
namespace Sparsh\ReferrerUrlTracking\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Sparsh\ReferrerUrlTracking\Helper\Data as CustomerOrderHelper;
use Sparsh\ReferrerUrlTracking\Model\ReferrerUrlFactory;

class CustomerOrder implements ObserverInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    protected $orderRepository;
    /**
     * @var CustomerOrderHelper
     */
    protected $customerOrderHelper;
    /**
     * @var ReferrerUrlFactory
     */
    protected $referrerUrlFactory;

    /**
     * CustomerOrder constructor.
     *
     * @param OrderRepositoryInterface    $orderRepositoryInterface
     * @param CustomerOrderHelper         $customerOrderHelper
     * @param ReferrerUrlFactory          $referrerUrlFactory
     */
    public function __construct(
        OrderRepositoryInterface $orderRepositoryInterface,
        CustomerOrderHelper $customerOrderHelper,
        ReferrerUrlFactory $referrerUrlFactory
    ) {
        $this->orderRepository = $orderRepositoryInterface;
        $this->customerOrderHelper = $customerOrderHelper;
        $this->referrerUrlFactory = $referrerUrlFactory;
    }

    /**
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $referrer_url= $this->customerOrderHelper->getCustomerSession()->getReferrerUrl();
        $isEnableOrderReferrerUrl = $this->customerOrderHelper->isEnableOrderReferrerUrl();

        if ($referrer_url && $isEnableOrderReferrerUrl) {
            $url_domain = parse_url($referrer_url)['host'];
            $order_id = $observer->getEvent()->getOrderIds()[0];
            $order = $this->orderRepository->get($order_id);
            $order->setReferrerUrl($referrer_url);
            $this->orderRepository->save($order);

            $referrerUrlModel = $this->referrerUrlFactory->create();

            $collection = $referrerUrlModel->load($url_domain, 'domain_name')->getData();

            if ($collection) {
                $domain_id = $collection['domain_id'];
                $order_count = $collection['order_count'];
                if ($order_count) {
                    $order_count++;
                } else {
                    $order_count = 1;
                }
                $referrerUrlModel->load($domain_id);
                $referrerUrlModel->setOrderCount($order_count);
            } else {
                $referrerUrlModel->setDomainName($url_domain);
                $referrerUrlModel->setOrderCount(1);
            }
            $referrerUrlModel->save();
        }
    }
}
