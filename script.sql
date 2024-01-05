CREATE DATABASE IF NOT EXISTS PharmacyDB;
USE PharmacyDB;

-- Create 'users' table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('Admin', 'Patient En Ligne', 'Patient En Magasin') NOT NULL
);

-- Create 'medicaments' table
CREATE TABLE medicaments (
     id INT AUTO_INCREMENT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     description TEXT,
     price INT NOT NULL,
     quantity_in_stock INT NOT NULL
);

-- Create 'ventes' table
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE DEFAULT (CURRENT_DATE),
    patient_id INT NOT NULL,
    medicament_id INT NOT NULL,
    quantity INT NOT NULL,
    sale_type ENUM('En Ligne', 'En Magasin') NOT NULL,
    FOREIGN KEY (patient_id) REFERENCES users(id),
    FOREIGN KEY (medicament_id) REFERENCES medicaments(id)
);

/*-- Insert data into 'users' table
INSERT INTO users (username, email, password, user_type) VALUES
('JohnDoe', 'johndoe@example.com', 'pass123', 'Patient En Ligne'),
('JaneSmith', 'janesmith@example.com', 'pass123', 'Admin'),
('EmmaBrown', 'emmabrown@example.com', 'pass123', 'Patient En Magasin');

-- Insert data into 'medicaments' table
INSERT INTO medicaments (name, description, price, quantity_in_stock) VALUES
('Paracetamol', 'Pain reliever and a fever reducer', 5, 100),
('Amoxicillin', 'Antibiotic used to treat a number of bacterial infections', 8, 50),
('Cetirizine', 'Antihistamine used to treat allergies', 3, 75);


-- Insert data into 'ventes' table (assuming reports have been created)
INSERT INTO sales (patient_id, medicament_id, quantity, sale_type) VALUES
(1, 1, 2, 'En Ligne'),
(3, 2, 1, 'En Magasin');*/


/*
 Another approach would be:
 ALTER TABLE ventes ADD COLUMN vente_type ENUM('En Ligne', 'En Magasin') NOT NULL;
DELIMITER $$

CREATE TRIGGER after_vente_insert_en_ligne
AFTER INSERT ON ventes
FOR EACH ROW
BEGIN
    IF NEW.vente_type = 'En Ligne' THEN
        INSERT INTO vente_en_ligne (vente_id) VALUES (NEW.id);
    END IF;
END$$

CREATE TRIGGER after_vente_insert_en_magasin
AFTER INSERT ON ventes
FOR EACH ROW
BEGIN
    IF NEW.vente_type = 'En Magasin' THEN
        INSERT INTO vente_en_magasin (vente_id) VALUES (NEW.id);
    END IF;
END$$

DELIMITER ;

 */
