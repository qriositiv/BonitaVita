CREATE TABLE order_general (
    order_id INT PRIMARY KEY NOT NULL,
    telephone VARCHAR(255) NOT NULL,
    soap_form VARCHAR(255) NOT NULL,
    soap_color VARCHAR(255) NOT NULL,
    order_details TEXT
);

CREATE TABLE ru_forms (
    form_id VARCHAR(15) PRIMARY KEY,
    form_volume INT NOT NULL,
    form_name VARCHAR(255) NOT NULL,
    form_description VARCHAR(255)
);

CREATE TABLE ru_herbs (
    herb_id VARCHAR(15) PRIMARY KEY,
    herb_name VARCHAR(255) NOT NULL,
    herb_description VARCHAR(1023)
);

CREATE TABLE order_herbs (
    order_id INT,
    herb_id VARCHAR(15),
    FOREIGN KEY (order_id) REFERENCES order_general(order_id),
    FOREIGN KEY (herb_id) REFERENCES ru_herbs(herb_id)
);

CREATE TABLE ru_oils (
    oil_id VARCHAR(15) PRIMARY KEY,
    oil_name VARCHAR(255) NOT NULL,
    oil_description VARCHAR(1023)
);

CREATE TABLE order_oils (
    order_id INT,
    oil_id VARCHAR(15),
    FOREIGN KEY (order_id) REFERENCES order_general(order_id),
    FOREIGN KEY (oil_id) REFERENCES ru_oils(oil_id)
);

CREATE TABLE ru_smells (
    smell_id VARCHAR(15) PRIMARY KEY,
    smell_name VARCHAR(255) NOT NULL,
    smell_description VARCHAR(1023)
);

CREATE TABLE order_smells (
    order_id INT,
    smell_id VARCHAR(15),
    FOREIGN KEY (order_id) REFERENCES order_general(order_id),
    FOREIGN KEY (smell_id) REFERENCES ru_smells(smell_id)
);

CREATE TABLE ru_other (
    other_id INT PRIMARY KEY,
    other_name VARCHAR(255) NOT NULL,
    other_description VARCHAR(1023)
);

CREATE TABLE order_other (
    order_id INT,
    other_id VARCHAR(15),
    FOREIGN KEY (order_id) REFERENCES order_general(order_id),
    FOREIGN KEY (other_id) REFERENCES ru_other(other_id)
);