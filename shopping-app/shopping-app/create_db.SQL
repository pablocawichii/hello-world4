DROP DATABASE IF EXISTS shopping_app;

CREATE DATABASE shopping_app;

USE shopping_app;

CREATE TABLE items (
    item_id INT NOT NULL,
    title text NOT NULL,
    `description` text NOT NULL,
    price INT NOT NULL,
    picture_url text NOT NULL
);

ALTER TABLE items
  ADD PRIMARY KEY (item_id),
  MODIFY item_id int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO items (title, `description`, price, picture_url)
VALUES 
("Shoes", "The best shoes", 35.55, "https://live.staticflickr.com/6211/6323122529_141eafd004.jpg"),
("Jacket", "This Jacket is sick", 50.00, "https://live.staticflickr.com/7418/12272519276_b92d85e742.jpg"),
("Hat", "What about that hat?", 19.99, "https://live.staticflickr.com/4137/4859331582_536dda6e29.jpg");

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT,
  ADD UNIQUE KEY `username` (`username`);

CREATE TABLE `account_receipts` (
  receipt_id int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `address` VARCHAR(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `account_receipts`
  ADD PRIMARY KEY (receipt_id),
  MODIFY receipt_id int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `receipts_items` (
  receipt_items_id int(11) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `title` VARCHAR(50) NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL
);

ALTER TABLE `receipts_items`
  ADD PRIMARY KEY (receipt_items_id),
  MODIFY receipt_items_id int(11) NOT NULL AUTO_INCREMENT,
  ADD CONSTRAINT `receipt_FK` FOREIGN KEY (`receipt_id`) REFERENCES `account_receipts` (`receipt_id`);





