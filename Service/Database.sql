CREATE TABLE customer_orders
(
    id               INT AUTO_INCREMENT PRIMARY KEY,
    name_customer    VARCHAR(255)   NOT NULL,
    phone_number     VARCHAR(20)    NOT NULL,
    quantity         INT            NOT NULL,
    price            DECIMAL(10, 2) NOT NULL,
    order_product    VARCHAR(255)   NOT NULL,
    location         VARCHAR(255)   NOT NULL,
    order_date       DATE           NOT NULL,
    take_date        DATE           NOT NULL,
    payment_status   VARCHAR(10)    NOT NULL,
    sell_status      VARCHAR(10)    NOT NULL,
    delivery_details VARCHAR(255)   NOT NULL
);

CREATE TABLE fruit
(
    fruit_id   INT PRIMARY KEY AUTO_INCREMENT,
    fruit_name VARCHAR(255) NOT NULL
);
CREATE TABLE location
(
    location_id   INT PRIMARY KEY AUTO_INCREMENT,
    location_name VARCHAR(255) NOT NULL
);


