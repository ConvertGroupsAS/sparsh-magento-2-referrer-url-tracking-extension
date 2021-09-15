<?php
namespace Sparsh\ReferrerUrlTracking\Block\Adminhtml\Report;

class Order extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_report_order';
        $this->_blockGroup = 'Sparsh_ReferrerUrlTracking';
        $this->_headerText = __('Order Referrer URL Report');
        parent::_construct();
        $this->buttonList->remove('add');
    }
}
