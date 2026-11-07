--datbase
CREATE DATABASE evaccination_db;

-- 1. Users Table ( FOR Admin, Parents,$ Hospitals )
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'parent', 'hospital') NOT NULL
);

-- 2. Children Table (for children info by parents)
CREATE TABLE children (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT,
    child_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    grade VARCHAR(50) NOT NULL,
    gender VARCHAR(10),
    FOREIGN KEY (parent_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 3. Hospitals Table (For hospital list)
CREATE TABLE hospitals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_name VARCHAR(150) NOT NULL,
    address TEXT NOT NULL,
    contact_number VARCHAR(20)
);

-- 4. Bookings Table (For vaccination booking )
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT,
    child_id INT,
    hospital_id INT,
    vaccine_name VARCHAR(100),
    appointment_date DATE,
    status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (parent_id) REFERENCES users(id),
    FOREIGN KEY (child_id) REFERENCES children(id),
    FOREIGN KEY (hospital_id) REFERENCES hospitals(id)
);

-- 1.  Fake Data of users table (10 Records: Admins, Parents, Hospitals)
INSERT INTO users (name, email, password, role) VALUES 
('System Administrator', 'admin@evaccination.com', 'admin123', 'admin'),
('Ali Khan', 'ali.parent@gmail.com', 'parent123', 'parent'),
('Ayesha Malik', 'ayesha.parent@gmail.com', 'parent123', 'parent'),
('Muhammad Ahmed', 'ahmed.parent@gmail.com', 'parent123', 'parent'),
('Fatima Noor', 'fatima.parent@gmail.com', 'parent123', 'parent'),
('Zainab Bibi', 'zainab.parent@gmail.com', 'parent123', 'parent'),
('City Children Hospital', 'cityhospital@gmail.com', 'hosp123', 'hospital'),
('Aga Khan Health Centre', 'agakhan@gmail.com', 'hosp123', 'hospital'),
('National Medical Centre', 'nmc@gmail.com', 'hosp123', 'hospital'),
('Indus Hospital', 'indus@gmail.com', 'hosp123', 'hospital');

-- 2. Fake Data of Children Table  (10 Records - School-going children)
INSERT INTO children (parent_id, child_name, age, grade, gender) VALUES 
(2, 'Hassan Ali Khan', 10, '5th Grade', 'Male'),
(2, 'Fatima Ali Khan', 8, '3rd Grade', 'Female'),
(3, 'Zainab Malik', 12, '7th Grade', 'Female'),
(3, 'Umer Malik', 9, '4th Grae', 'Female'),
(6, 'Hamza Bibi', 13, '8th Grade', 'Male'),
(6, 'Khadija Bibi', 6, '1de', 'Male'),
(4, 'Ibrahim Ahmed', 11, '6th Grade', 'Male'),
(4, 'Ayesha Ahmed', 7, '2nd Grade', 'Female'),
(5, 'Bilal Noor', 14, '9th Grade', 'Male'),
(5, 'Maryam Noor', 10, '5th Gradst Grade', 'Female');

-- 3.  Fake Data of Hospitals Table  (5 Records)
INSERT INTO hospitals (hospital_name, address, contact_number) VALUES 
('City Children Hospital', 'Main Rashid Minhas Road, Gulshan, Karachi', '021-111-222-333'),
('Aga Khan Health Centre', 'Stadium Road, Karachi', '021-333-444-555'),
('National Medical Centre', 'NMC Complex, Korangi Road, Karachi', '021-555-666-777'),
('Indus Hospital', 'Crossing Near Korangi, Karachi', '021-777-888-999'),
('Liaquat National Hospital', 'Stadium Road, Karachi', '021-999-000-111');

-- 4.  Fake Data of appointments Table  (10 Records)
INSERT INTO appointments (parent_id, child_id, hospital_id, vaccine_name, appointment_date, status) VALUES 
(2, 1, 1, 'Typhoid & Polio Booster', '2026-11-05', 'Pending'),
(2, 2, 1, 'Tetanus Toxoid (TT)', '2026-11-06', 'Approved'),
(3, 3, 2, 'Typhoid & Polio Booster', '2026-11-10', 'Pending'),
(3, 4, 2, 'Hepatitis B Booster', '2026-11-12', 'Approved'),
(4, 5, 3, 'Measles & Rubella', '2026-11-15', 'Pending'),
(4, 6, 3, 'Typhoid & Polio Booster', '2026-11-18', 'Approved'),
(5, 7, 4, 'Tetanus Toxoid (TT)', '2026-11-20', 'Pending'),
(5, 8, 4, 'Hepatitis B Booster', '2026-11-22', 'Rejected'),
(6, 9, 5, 'Typhoid & Polio Booster', '2026-11-25', 'Approved'),
(6, 10, 5, 'Measles & Rubella', '2026-11-28', 'Pending');


INSERT INTO children (parent_id, child_name, age, gender, grade) VALUES 
(2, 'Ali Jr.', 3, 'Male', 'Nursery'),
(2, 'Alina Ali', 1, 'Female', 'Infant'),
(3, 'Ahmed Malik', 4, 'Male', 'Preschool'),
(3, 'Areeba Malik', 2, 'Female', 'Toddler'),
(4, 'Zayan Ahmed', 5, 'Male', 'Grade 1'),
(4, 'Zohra Ahmed', 2, 'Female', 'Toddler'),
(5, 'Hassan Noor', 3, 'Male', 'Nursery'),
(5, 'Hira Noor', 1, 'Female', 'Infant'),
(6, 'Ibrahim Bibi', 4, 'Male', 'Preschool'),
(6, 'Inaya Bibi', 2, 'Female', 'Toddler'),
(11, 'Rayyan Sundus', 3, 'Male', 'Nursery'),
(11, 'Rania Sundus', 1, 'Female', 'Infant'),
(12, 'Danyal Ali', 4, 'Male', 'Preschool'),
(12, 'Dua Ali', 2, 'Female', 'Toddler'),
(13, 'Hamza Ahsan', 3, 'Male', 'Nursery'),
(13, 'Hania Ahsan', 1, 'Female', 'Infant'),
(14, 'Zubair Faraz', 4, 'Male', 'Preschool'),
(14, 'Zainab Faraz', 2, 'Female', 'Toddler');

--hospital_requests table
CREATE TABLE hospital_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_name VARCHAR(255) NOT NULL,
    hospital_email VARCHAR(255) NOT NULL,
    hospital_location VARCHAR(255) NOT NULL,
    hospital_phone VARCHAR(50) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- admin_messages

CREATE TABLE IF NOT EXISTS admin_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_name VARCHAR(100) NOT NULL,
    sender_email VARCHAR(100) NOT NULL,
    sender_role VARCHAR(50) NOT NULL,
    sender_message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- for password reset
CREATE TABLE password_resets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'Pending'
);

-- password update notice

ALTER TABLE users ADD COLUMN password_updated_notice INT DEFAULT 0;
