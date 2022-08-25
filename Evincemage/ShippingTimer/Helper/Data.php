<?php
declare(strict_types=1);

namespace Evincemage\ShippingTimer\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * @param \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;
    /**
     * @param $_logger
     */
    protected $_logger;
    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;
    /**
     * @param \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;
    /**
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $_timezone;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
    ) {
        $this->_objectManager   = $objectManager;
        $this->_scopeConfig     = $scopeConfig;
        $this->_storeManager    = $storeManager;
        $this->_timezone        = $timezone;
    }

    /**
     * @return array
     */
    public function getConfigData()
    {
        $storeData = [];
        $storeData['isEnable']      = $this->_scopeConfig->getValue('shipping_cutoff/general/isEnable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $storeData['date-from']     = $this->_scopeConfig->getValue('shipping_cutoff/general/shippingCutoffFrom', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $storeData['date-to']       = $this->_scopeConfig->getValue('shipping_cutoff/general/shippingCutoffTo', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $storeData;
    }

    /**
     * @return date
     */
    public function getStoreDateTime(){
        $date = $this->_timezone->formatDate();
        return $date;
    }

    /**
     * @return date
     */
    public function getCurrentDateTime(){
        $date = $this->_timezone->date()->format('m/d/Y H:i:s');
        return $date;
    }
}
