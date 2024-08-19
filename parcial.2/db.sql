CREATE DATABASE checklist_db;

USE checklist_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status ENUM('por hacer', 'en progreso', 'terminada') NOT NULL,
    commitment_date DATE NOT NULL,
    edited_flag BOOLEAN DEFAULT 0,
    responsible VARCHAR(255) NOT NULL,
    task_type VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
