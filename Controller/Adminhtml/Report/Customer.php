<?php
namespace Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report;

class Customer extends \Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report
{
    /**
     * Customer Referrer Url Report action
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_setActiveMenu('Magento_Reports::report')
        ->_addBreadcrumb(__('Customer Referrer URL Report'), __('Customer Referrer URL Report'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Customer Referrer URL Report'));
        $this->_view->renderLayout();
    }
}
