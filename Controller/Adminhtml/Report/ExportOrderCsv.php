<?php
namespace Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportOrderCsv extends \Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report
{
    /**
     * Export Order Referrer Url Report to CSV format
     * @return ResponseInterface
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $fileName = 'order_referrer_url_report.csv';
        $content = $this->_view->getLayout()->getChildBlock('order_report_grid.grid', 'grid.export');
        return $this->_fileFactory->create($fileName, $content->getCsv(), DirectoryList::VAR_DIR);
    }
}
