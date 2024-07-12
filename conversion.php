<?php
class Conversion {
  private $id;
  private $referralLinkId;
  private $convertedAt;
  private $amount;

  public function __construct($id, $referralLinkId, $convertedAt, $amount) {
    $this->id = $id;
    $this->referralLinkId = $referralLinkId;
    $this->convertedAt = $convertedAt;
    $this->amount = $amount;
  }

  public function getId() {
    return $this->id;
  }

  public function getReferralLinkId() {
    return $this->referralLinkId;
  }

  public function getConvertedAt() {
    return $this->convertedAt;
  }

  public function getAmount() {
    return $this->amount;
  }
}
?>