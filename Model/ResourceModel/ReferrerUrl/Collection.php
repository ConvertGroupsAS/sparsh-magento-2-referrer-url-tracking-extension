<?php
namespace Sparsh\ReferrerUrlTracking\Model\ResourceModel\ReferrerUrl;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'domain_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Sparsh\ReferrerUrlTracking\Model\ReferrerUrl',
            'Sparsh\ReferrerUrlTracking\Model\ResourceModel\ReferrerUrl'
        );
    }
}
