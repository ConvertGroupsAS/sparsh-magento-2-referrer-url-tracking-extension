<?php
namespace Sparsh\ReferrerUrlTracking\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Sales\Model\Order;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{
    /**
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var \Magento\Eav\Model\Config
     */
    private $eavConfig;
    /**
     * @var \Magento\Customer\Model\ResourceModel\Attribute
     */
    private $attributeResource;
    /**
     * @var \Magento\Sales\Setup\SalesSetupFactory
     */
    private $salesSetupFactory;

    /**
     * InstallData constructor.
     *
     * @param \Magento\Eav\Setup\EavSetupFactory              $eavSetupFactory
     * @param \Magento\Eav\Model\Config                       $eavConfig
     * @param \Magento\Customer\Model\ResourceModel\Attribute $attributeResource
     * @param \Magento\Sales\Setup\SalesSetupFactory          $salesSetupFactory
     */
    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Customer\Model\ResourceModel\Attribute $attributeResource,
        \Magento\Sales\Setup\SalesSetupFactory $salesSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->attributeResource = $attributeResource;
        $this->salesSetupFactory = $salesSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        //Customer Attribute
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->removeAttribute(Customer::ENTITY, "referrer_url");

        $attributeSetId = $eavSetup->getDefaultAttributeSetId(Customer::ENTITY);
        $attributeGroupId = $eavSetup->getDefaultAttributeGroupId(Customer::ENTITY);

        $eavSetup->addAttribute(
            Customer::ENTITY,
            'referrer_url',
            [
                'type' => 'varchar',
                'label' => 'Referrer URL',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'position' => 150,
                'system' => 0,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => true,
                'is_searchable_in_grid' => true,
            ]
        );

        $attribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'referrer_url');
        $attribute->setData('attribute_set_id', $attributeSetId);
        $attribute->setData('attribute_group_id', $attributeGroupId);

        $attribute->setData(
            'used_in_forms',
            [
                'adminhtml_customer',
                'customer_account_create',
                'customer_account_edit'
            ]
        );

        $this->attributeResource->save($attribute);

        //Order Attribute
        $salesSetup = $this->salesSetupFactory->create(['resourceName' => 'sales_setup', 'setup' => $setup]);

        $salesSetup->removeAttribute(Order::ENTITY, "referrer_url");

        $salesSetup->addAttribute(
            Order::ENTITY,
            'referrer_url',
            [
                'type' => 'varchar',
                'length'=> 255,
                'visible' => true,
                'nullable' => true,
                'label' => 'Referrer URL'
            ]
        );
    }
}
