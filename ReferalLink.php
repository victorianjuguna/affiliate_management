<?php
class ReferralLink {
  private $id;
  private $affiliateId;
  private $linkCode;
  private $createdAt;

  public function __construct($id, $affiliateId, $linkCode, $createdAt) {
    $this->id = $id;
    $this->affiliateId = $affiliateId;
    $this->linkCode = $linkCode;
    $this->createdAt = $createdAt;
  }

  public function getId() {
    return $this->id;
  }

  public function getAffiliateId() {
    return $this->affiliateId;
  }

  public function getLinkCode() {
    return $this->linkCode;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }
}
?>