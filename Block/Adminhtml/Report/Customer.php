<?php
namespace Sparsh\ReferrerUrlTracking\Block\Adminhtml\Report;

class Customer extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_report_customer';
        $this->_blockGroup = 'Sparsh_ReferrerUrlTracking';
        $this->_headerText = __('Customer Referrer URL Report');
        parent::_construct();
        $this->buttonList->remove('add');
    }
}
