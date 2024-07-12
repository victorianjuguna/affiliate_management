CREATE TABLE affiliates (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
);

CREATE TABLE referral_links (
  id INT PRIMARY KEY AUTO_INCREMENT,
  affiliate_id INT NOT NULL,
  link_code VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (affiliate_id) REFERENCES affiliates(id)
);

CREATE TABLE clicks (
  id INT PRIMARY KEY AUTO_INCREMENT,
  referral_link_id INT NOT NULL,
  clicked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ip_address VARCHAR(255) NOT NULL,
  user_agent VARCHAR(255) NOT NULL,
  FOREIGN KEY (referral_link_id) REFERENCES referral_links(id)
);

CREATE TABLE conversions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  referral_link_id INT NOT NULL,
  converted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  amount DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (referral_link_id) REFERENCES referral_links(id)
);

CREATE TABLE commissions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  conversion_id INT NOT NULL,
  commission_amount DECIMAL(10, 2) NOT NULL,
  paid_at TIMESTAMP,
  FOREIGN KEY (conversion_id) REFERENCES conversions(id)
);