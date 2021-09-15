<?php
namespace Sparsh\ReferrerUrlTracking\Model\ResourceModel;

class ReferrerUrl extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize main table and identifier field. Set main entity table name and primary key field name.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('sparsh_referrer_url_report', 'domain_id');
    }
}
