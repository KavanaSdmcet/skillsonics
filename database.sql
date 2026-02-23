CREATE DATABASE skillsonics_verify;
USE skillsonics_verify;

CREATE TABLE certificates (
id INT AUTO_INCREMENT PRIMARY KEY,
certificate_id VARCHAR(50) UNIQUE,
candidate_name VARCHAR(100),
course VARCHAR(200),
issue_date DATE,
status VARCHAR(20),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO certificates 
(certificate_id, candidate_name, course, issue_date, status)
VALUES
('SKL-2026-0001','Rahul Sharma','Advanced CNC Programming','2026-01-10','VALID'),
('SKL-2026-0002','Priya Nair','Industrial Automation','2026-01-15','VALID');
