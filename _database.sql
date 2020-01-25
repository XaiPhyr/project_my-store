/* Jan 22, 2020 */
CREATE DATABASE IF NOT EXISTS store;

CREATE TABLE IF NOT EXISTS store.accounts (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(45) DEFAULT NULL,
    `password` varchar(45) DEFAULT NULL,
    `email` varchar(45) DEFAULT NULL,
    `image` varchar(45) DEFAULT NULL,
    `status` varchar(15) DEFAULT NULL,
    `user_id` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.accounts AUTO_INCREMENT = 00001;

CREATE TABLE IF NOT EXISTS store.user_header (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `first_name` varchar(45) DEFAULT NULL,
    `last_name` varchar(45) DEFAULT NULL,
    `dob` datetime DEFAULT NULL,
    `image` varchar(45) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.user_header AUTO_INCREMENT = 10001;

CREATE TABLE IF NOT EXISTS store.user_address (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` varchar(15) DEFAULT NULL,
    `address` varchar(45) DEFAULT NULL,
    `city` varchar(45) DEFAULT NULL,
    `country` varchar(45) DEFAULT NULL,
    `postal` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.user_contacts (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` varchar(15) DEFAULT NULL,
    `area_code` varchar(15) DEFAULT NULL,
    `number` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.customer_header (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `first_name` varchar(45) DEFAULT NULL,
    `last_name` varchar(45) DEFAULT NULL,
    `dob` datetime DEFAULT NULL,
    `image` varchar(45) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.customer_header AUTO_INCREMENT = 20001;

CREATE TABLE IF NOT EXISTS store.customer_address (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `customer_id` varchar(15) DEFAULT NULL,
    `address` varchar(45) DEFAULT NULL,
    `city` varchar(45) DEFAULT NULL,
    `country` varchar(45) DEFAULT NULL,
    `postal` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.customer_contacts (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `customer_id` varchar(15) DEFAULT NULL,
    `area_code` varchar(15) DEFAULT NULL,
    `number` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.company_header (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `company_name` varchar(45) DEFAULT NULL,
    `image` varchar(45) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.company_header AUTO_INCREMENT = 30001;

CREATE TABLE IF NOT EXISTS store.company_address (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `company_id` varchar(15) DEFAULT NULL,
    `address` varchar(45) DEFAULT NULL,
    `city` varchar(45) DEFAULT NULL,
    `country` varchar(45) DEFAULT NULL,
    `postal` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.company_contacts (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `company_id` varchar(15) DEFAULT NULL,
    `area_code` varchar(15) DEFAULT NULL,
    `number` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.product_header (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_name` varchar(45) DEFAULT NULL,
    `image` varchar(45) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.product_header AUTO_INCREMENT = 40001;

CREATE TABLE IF NOT EXISTS store.product_details (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_id` varchar(15) DEFAULT NULL,
    `product_desc` varchar(500) DEFAULT NULL,
    `refnum` varchar(15) DEFAULT NULL,
    `category` varchar(15) DEFAULT NULL,
    `stocks` int DEFAULT NULL,
    `price` float DEFAULT NULL,
    `user_id` varchar(15) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.orders (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `customer_id` varchar(15) DEFAULT NULL,
    `date_purchased` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.orders AUTO_INCREMENT = 50001;

CREATE TABLE IF NOT EXISTS store.sales (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `order_id` varchar(15) DEFAULT NULL,
    `product_id` varchar(15) DEFAULT NULL,
    `qty` int DEFAULT NULL,
    `cost` float DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.stocks (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_id` varchar(15) DEFAULT NULL,
    `company_id` varchar(15) DEFAULT NULL,
    `qty` int DEFAULT NULL,
    `created` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.session_token (
    `Id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `session_id` varchar(150) DEFAULT NULL,
    `admin_id` varchar(15) DEFAULT NULL,
    `started` datetime DEFAULT NULL,
    `ended` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS store.category (
    `Id` int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `category_name` varchar(45) DEFAULT NULL,
    `category_desc` varchar(45) DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `flag` int(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
ALTER TABLE store.category AUTO_INCREMENT = 60001;

/* Update Jan 26, 2020 */
ALTER TABLE store.sales ADD COLUMN `product_name` varchar(45) AFTER `product_id`;
ALTER TABLE store.sales ADD COLUMN `date_purchased` datetime;
ALTER TABLE store.orders ADD COLUMN `flag` int(1) DEFAULT 0;
ALTER TABLE store.sales ADD COLUMN `flag` int(1) DEFAULT 0;