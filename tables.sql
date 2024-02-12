CREATE TABLE soap (
    soap_id INT PRIMARY KEY NOT NULL,
    soap_name VARCHAR(255) NOT NULL,
    soap_cost FLOAT NOT NULL,
    soap_weight INT NOT NULL,
    is_new_soap BOOLEAN NOT NULL,
    is_favorite BOOLEAN NOT NULL
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
    smells_like VARCHAR(1023)
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



INSERT INTO soap VALUES 
    (1, "OLIVE", 6, 110, 1),
    (3, "INNER CRYSTAL", 12, 110, 0);

INSERT INTO ru_ingredients VALUES
    ("OLIV", "Оливковое масло "),
    ("VITE", "Витамин Е"),
    ("GOAT", "Козье молоко "),
    ("SESA", "Морская соль"),
    ("GDLF", "Золотая фольга"), 
    ("GLIT", "Глиттер");

INSERT INTO soap_ingredients VALUES
    (1, "OLIV"),
    (1, "VITE"),
    (3, "VITE"),
    (3, "GOAT"),
    (3, "SESA"),
    (3, "GDLF"),
    (3, "GLIT");

INSERT INTO ru_categories VALUES
    ("SESA", "С морской солью"),
    ("PUF", "На пуфике");

INSERT INTO soap_categories VALUES
    (3, "SESA"),
    (1, "PUF"); 

INSERT INTO ru_description VALUES
    (1, "ru: description of soap 1"),
    (3, "ru: description of soap 3");