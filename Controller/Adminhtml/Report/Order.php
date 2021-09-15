<?php
namespace Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report;

class Order extends \Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report
{
    /**
     * Order Referrer Url Report action
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_setActiveMenu('Magento_Reports::report')
        ->_addBreadcrumb(__('Order Referrer URL Report'), __('Order Referrer URL Report'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Order Referrer URL Report'));
        $this->_view->renderLayout();
    }
}
