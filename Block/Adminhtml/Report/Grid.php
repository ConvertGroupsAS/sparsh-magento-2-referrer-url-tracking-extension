<?php
namespace Sparsh\ReferrerUrlTracking\Block\Adminhtml\Report;

use Magento\Backend\Block\Widget\Grid as WidgetGrid;

class Grid extends WidgetGrid
{
    /**
     * @return Collection
     */
    protected function _prepareCollection()
    {
        $collection = $this->getCollection();

        if ($this->getRequest()->getActionName()=='order') {
            $collection->addFieldToFilter('main_table.order_count', ['notnull' => true])->setOrder('main_table.order_count', 'DESC');
        }
        if ($this->getRequest()->getActionName()=='customer') {
            $collection->addFieldToFilter('main_table.customer_count', ['notnull' => true])->setOrder('main_table.customer_count', 'DESC');
        }
    
        $this->setCollection($collection);
        
        return parent::_prepareCollection();
    }
}
