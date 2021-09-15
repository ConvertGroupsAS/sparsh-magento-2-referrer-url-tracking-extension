<?php
namespace Sparsh\ReferrerUrlTracking\Block\Adminhtml\Report\Grid;

use Magento\Backend\Block\Widget\Grid\Export as WidgetGridExport;

class Export extends WidgetGridExport
{
    /**
     * @return string
     */
    public function getCsv()
    {
        $csv = '';

        $collection = $this->_getCollection();

        if ($this->getRequest()->getActionName()=='exportOrderCsv') {
            $collection->addFieldToFilter('main_table.order_count', ['notnull' => true])->setOrder('main_table.order_count', 'DESC');
        }
        if ($this->getRequest()->getActionName()=='exportCustomerCsv') {
            $collection->addFieldToFilter('main_table.customer_count', ['notnull' => true])->setOrder('main_table.customer_count', 'DESC');
        }

        $data = [];
        foreach ($this->_getColumns() as $column) {
            if (!$column->getIsSystem()) {
                $data[] = '"' . $column->getExportHeader() . '"';
            }
        }
        $csv .= implode(',', $data) . "\n";

        foreach ($collection as $item) {
            $data = [];
            foreach ($this->_getColumns() as $column) {
                if (!$column->getIsSystem()) {
                    $data[] = '"' . str_replace(
                        ['"', '\\'],
                        ['""', '\\\\'],
                        $column->getRowFieldExport($item)
                    ) . '"';
                }
            }
            $csv .= implode(',', $data) . "\n";
        }

        if ($this->getCountTotals()) {
            $data = [];
            foreach ($this->_getColumns() as $column) {
                if (!$column->getIsSystem()) {
                    $data[] = '"' . str_replace(
                        ['"', '\\'],
                        ['""', '\\\\'],
                        $column->getRowFieldExport($this->_getTotals())
                    ) . '"';
                }
            }
            $csv .= implode(',', $data) . "\n";
        }

        return $csv;
    }
}
