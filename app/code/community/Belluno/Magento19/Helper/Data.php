<?php

class Belluno_Magento19_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function decode($code){
        if($code)
        return base64_decode($code);
    }
}
