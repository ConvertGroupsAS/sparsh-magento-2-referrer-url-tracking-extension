<?php
namespace Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportCustomerCsv extends \Sparsh\ReferrerUrlTracking\Controller\Adminhtml\Report
{
    /**
     * Export Customer Referrer Url Report to CSV format
     * @return ResponseInterface
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $fileName = 'customer_referrer_url_report.csv';
        $content = $this->_view->getLayout()->getChildBlock('customer_report_grid.grid', 'grid.export');
        return $this->_fileFactory->create($fileName, $content->getCsv(), DirectoryList::VAR_DIR);
    }
}
