CREATE TABLE soap (
    soap_id INT PRIMARY KEY NOT NULL,
    soap_name VARCHAR(255) NOT NULL,
    soap_cost FLOAT NOT NULL,
    soap_weight INT NOT NULL,
    is_new_soap BOOLEAN NOT NULL,
    is_favorite BOOLEAN NOT NULL,
    is_visible BOOLEAN NOT NULL
);

CREATE TABLE ru_ingredients (
    ingredient_id VARCHAR(15) PRIMARY KEY,
    ingredient_name VARCHAR(255)
);

CREATE TABLE ru_categories (
    category_id VARCHAR(15) PRIMARY KEY,
    category_name VARCHAR(255)
);

CREATE TABLE ru_description (
    soap_id INT PRIMARY KEY,
    description_name VARCHAR(4095),
    smells_like VARCHAR(1023),
    FOREIGN KEY (soap_id) REFERENCES soap(soap_id)
);

CREATE TABLE soap_ingredients (
    soap_id INT,
    ingredient_id VARCHAR(15),
    PRIMARY KEY (soap_id, ingredient_id),
    FOREIGN KEY (soap_id) REFERENCES soap(soap_id),
    FOREIGN KEY (ingredient_id) REFERENCES ru_ingredients(ingredient_id)
);

CREATE TABLE soap_categories (
    soap_id INT,
    category_id VARCHAR(15),
    PRIMARY KEY (soap_id, category_id),
    FOREIGN KEY (soap_id) REFERENCES soap(soap_id),
    FOREIGN KEY (category_id) REFERENCES ru_categories(category_id)
);
