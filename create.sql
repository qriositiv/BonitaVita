CREATE TABLE status (
    status_id VARCHAR(31) PRIMARY KEY,
    status_image VARCHAR(255)
);

CREATE TABLE elements (
    element_id INT PRIMARY KEY,
    element_name VARCHAR(255) NOT NULL,
    element_description	 VARCHAR(255) NOT NULL,
);

CREATE TABLE order_general (
    order_id INT PRIMARY KEY NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(255) NOT NULL,
    note VARCHAR(1023),
    locale VARCHAR(3) NOT NULL,
    status VARCHAR(31) NOT NULL,
    FOREIGN KEY (status_id) REFERENCES status(status_id)
);

CREATE TABLE order_elements (
    order_id INT NOT NULL,
    element_id INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES order_general(order_id),
    FOREIGN KEY (element_id) REFERENCES elements(element_id)
);

