<?php

namespace Website\Countdown\Block\Product;

class View extends \Magento\Catalog\Block\Product\View
{
    
    public function isCountdownEnabled()
    {
        return $this->getProduct()->getData('countdown_enabled');
    }
    public function getTile()
    {
       return $this->_scopeConfig->getValue('countdown/general/title');
    }

    public function getCountdownStartDate(){
        return $this->getProduct()->getSpecialFromDate();
    }

    public function getCountdownEndDate(){
        return  $this->getProduct()->getSpecialToDate();
    }

    public function getPriceCountDown(){
        if($this->_scopeConfig->getValue('countdown/general/enabled')){
            $currentDate =  date('d-m-Y');
            $todate      =  $this->getProduct()->getSpecialToDate();
            $fromdate    =  $this->getProduct()->getSpecialFromDate();
            if($this->getProduct()->getSpecialPrice() != 0 || $this->getProduct()->getSpecialPrice()) {
                if($this->getProduct()->getSpecialToDate() != null) {
                    if(strtotime($todate) >= strtotime($currentDate) && strtotime($fromdate) <= strtotime($currentDate)){
                        return true;
                    }   
                }
            }
        }
        return false;
    }
}