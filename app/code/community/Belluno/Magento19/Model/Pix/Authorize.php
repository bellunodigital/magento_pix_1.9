<?php

class Belluno_Magento19_Model_Pix_Authorize
{
  /**
   * Function authorize of method payment
   * @param Varien_Object $payment
   * @param $amount
   * @param $info
   */
  public function authorize(Varien_Object $payment, $amount, $info)
  {
    $createRequest = $this->getCreateRequest();
    $data = json_decode($payment->getAdditionalInformation("data"), true);
    $request = $createRequest->createRequest($data, $info);
    $connector = $this->getConnector();
    $response = $connector->doRequest($request, "POST", "/v2/transaction/pix");
    $response = json_decode($response, true);
    $pix = [
      'id' => $response['transaction']['transaction_id'],
      'pix' => $response['transaction']['pix'],
      'url' => $response['transaction']['url']
    ];

    $info->setAdditionalInformation("status", $response['transaction']['status']);
    $info->setAdditionalInformation("pix", json_encode($pix));
  }

  /**Function to return class connector for requests */
  public function getConnector()
  {
    return new Belluno_Magento19_Service_Connector();
  }

  /**Function to return class create request */
  public function getCreateRequest()
  {
    return new Belluno_Magento19_Model_Pix_CreateRequest();
  }
}
