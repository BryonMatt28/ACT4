Create TABLE Manufacturers( 
    manufacturer_id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR (50)
    founding_date DATE,
    specialization VARCHAR (50)
);


Create TABLE Products(
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    manufacturer_id INT,
    product_name VARCHAR (50),
    date_manufactured DATE,
    quantity INT,
    price FLOAT,
    brand VARCHAR(50),
    warranty_period INT
);
