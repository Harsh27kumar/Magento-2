<?php

namespace Harsh\Customoverride\Block\Product\Renderer;

class Configurable extends \Magento\Swatches\Block\Product\Renderer\Configurable {
    protected function getRendererTemplate() {
      return $this->isProductHasSwatchAttribute ?
      self::SWATCH_RENDERER_TEMPLATE : 'Harsh_Customoverride::product/view/type/options/configurable.phtml';
   }
}