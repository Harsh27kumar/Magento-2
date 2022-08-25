<?php 

namespace Store\ImageUploader\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Image extends AbstractDb {
  protected function _construct () {
    return $this->_init('Store_images', 'image_id');
  }
}