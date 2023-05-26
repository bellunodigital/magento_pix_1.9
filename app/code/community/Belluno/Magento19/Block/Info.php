<?php

class Belluno_Magento19_Block_Info extends Mage_Payment_Block_Info {
    protected function _construct() {
        parent::_construct();
        $this->setTemplate('magento19/payment/info/belluno.phtml');
    }
}
