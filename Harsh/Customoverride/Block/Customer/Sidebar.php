<?php
namespace Harsh\Customoverride\Block\Customer;
 
class Sidebar extends \Magento\Wishlist\Block\Customer\Sidebar
{
     
    
    public function getTitle()
    {
        //return __('My Wish List');
        return __('Wish List');
    }
     
     
}