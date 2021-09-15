<?php
namespace Sparsh\ReferrerUrlTracking\Controller\Adminhtml;

abstract class Report extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $_fileFactory;

    /**
     * @param \Magento\Backend\App\Action\Context              $context
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory
    ) {
        $this->_fileFactory = $fileFactory;
        parent::__construct($context);
    }

    /**
     * Add reports breadcrumbs
     *
     * @return $this
     */
    public function _initAction()
    {
        $this->_view->loadLayout();
        $this->_addBreadcrumb(__('Referrer Url Reports'), __('Referrer Url Reports'));
        return $this;
    }

    /**
     * Determine if action is allowed for reports module
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        switch ($this->getRequest()->getActionName()) {
            case 'order':
                return $this->_authorization->isAllowed('Sparsh_ReferrerUrlTracking::salesroot_referrer_url');
                break;
            case 'customer':
                return $this->_authorization->isAllowed('Sparsh_ReferrerUrlTracking::customers_referrer_url');
                break;
            default:
                return $this->_authorization->isAllowed('Magento_Reports::report');
                break;
        }
    }
}
