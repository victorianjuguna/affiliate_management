<?php
class Commission {
  private $id;
  private $conversionId;
  private $commissionAmount;
  private $paidAt;

  public function __construct($id, $conversionId, $commissionAmount, $paidAt) {
    $this->id = $id;
    $this->conversionId = $conversionId;
    $this->commissionAmount = $commissionAmount;
    $this->paidAt = $paidAt;
  }

  public function getId() {
    return $this->id;
  }

  public function getConversionId() {
    return $this->conversionId;
  }

  public function getCommissionAmount() {
    return $this->commissionAmount;
  }

  public function getPaidAt() {
    return $this->paidAt;
  }
}
?>