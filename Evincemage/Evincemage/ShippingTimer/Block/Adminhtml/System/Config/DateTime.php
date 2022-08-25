<?php
declare(strict_types=1);

/**
 * Block for Locations page
 *
 * @author Nadeem Khan <khannadeem243@gmail.com>
 *
 */
namespace Evincemage\ShippingTimer\Block\Adminhtml\System\Config;

class DateTime extends \Magento\Config\Block\System\Config\Form\Field
{

    /*
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $timezone;

    /*
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        array $data = []
    ) {
        $this->timezone = $timezone;
        parent::__construct($context, $data);
    }

    /*
     * @var \Magento\Framework\Data\Form\Element\AbstractElement
     * @retrun date
     */
    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->setDateFormat($this->timezone->getDateFormat());
        $element->setTimeFormat('HH:mm:ss');
        $element->setShowsTime(true);
        return parent::render($element);
    }
}