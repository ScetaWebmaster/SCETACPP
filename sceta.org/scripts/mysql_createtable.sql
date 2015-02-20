USE db142557_parts;
CREATE TABLE RegularParts(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    price_member INT NOT NULL DEFAULT '0',
    price_regular INT NOT NULL DEFAULT '0',
    status INT NOT NULL DEFAULT '1'
);