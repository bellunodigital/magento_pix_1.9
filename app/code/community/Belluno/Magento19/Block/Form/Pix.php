<?php

class Belluno_Magento19_Block_Form_Pix extends Mage_Payment_Block_Form {

  protected function _construct() {
    parent::_construct();
    $this->setTemplate('magento19/form/pix.phtml');
  }

  public function getFieldCaptureTax() {
    $captureTax = Mage::getStoreConfig('payment/belluno_pixpayment/capture_tax');
    if ($captureTax == true) {
      return true;
    } else {
      return false;
    }
  }
}
