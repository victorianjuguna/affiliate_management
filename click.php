<?php
class Click {
  private $id;
  private $referralLinkId;
  private $clickedAt;
  private $ipAddress;
  private $userAgent;

  public function __construct($id, $referralLinkId, $clickedAt, $ipAddress, $userAgent) {
    $this->id = $id;
    $this->referralLinkId = $referralLinkId;
    $this->clickedAt = $clickedAt;
    $this->ipAddress = $ipAddress;
    $this->userAgent = $userAgent;
  }

  public function getId() {
    return $this->id;
  }

  public function getReferralLinkId() {
    return $this->referralLinkId;
  }

  public function getClickedAt() {
    return $this->clickedAt;
  }

  public function getIpAddress() {
    return $this->ipAddress;
  }

  public function getUserAgent() {
    return $this->userAgent;
  }
}
?>