<?php
INSERT INTO staff (first_name, last_name, position, hire_date, salary) VALUES
('Олександр', 'Ковальчук', 'Менеджер', '2022-01-15', 25000.00),
('Марія', 'Шевченко', 'Аналітик', '2022-03-22', 22000.00),
('Іван', 'Петренко', 'Розробник', '2022-05-10', 28000.00),
('Оксана', 'Лисенко', 'Менеджер', '2022-07-05', 24500.00),
('Дмитро', 'Мельник', 'Бухгалтер', '2022-09-18', 19500.00);

INSERT INTO work_schedules (employee_id, work_day, shift) VALUES
(1, '2025-04-25', 'Ранкова'),
(1, '2025-04-26', 'Вечірня');

INSERT INTO work_schedules (employee_id, work_day, shift) VALUES
(2, '2025-04-25', 'Ранкова'),
(2, '2025-04-26', 'Вечірня');

INSERT INTO work_schedules (employee_id, work_day, shift) VALUES
(3, '2025-04-25', 'Денна'),
(3, '2025-04-26', 'Денна');

INSERT INTO work_schedules (employee_id, work_day, shift) VALUES
(4, '2025-04-25', 'Ранкова'),
(4, '2025-04-27', 'Денна');

INSERT INTO work_schedules (employee_id, work_day, shift) VALUES
(5, '2025-04-26', 'Ранкова'),
(5, '2025-04-28', 'Ранкова');

INSERT INTO benefits (employee_id, benefit_type, value) VALUES
(1, 'Медичне страхування', 5000.00),
(2, 'Спортзал', 1500.00),
(3, 'Медичне страхування', 5000.00),
(3, 'Навчання', 3500.00),
(4, 'Спортзал', 1500.00);

INSERT INTO evaluations (employee_id, evaluation_date, score) VALUES
(1, '2024-12-15', 90),
(2, '2024-12-16', 85),
(3, '2024-12-17', 95),
(4, '2024-12-18', 88),
(5, '2024-12-19', 82);
UPDATE staff
SET position = 'Старший аналітик'
WHERE id = 2;
UPDATE benefits
SET value = 6000.00
WHERE employee_id = 3 AND benefit_type = 'Медичне страхування';

DELETE FROM staff WHERE id = 5;
SELECT * FROM work_schedules WHERE employee_id = 5;
SELECT * FROM benefits WHERE employee_id = 5;
SELECT * FROM evaluations WHERE employee_id = 5;

SELECT * FROM staff;

SELECT * FROM staff WHERE position = 'Менеджер';

SELECT * FROM staff ORDER BY salary;
SELECT * FROM staff WHERE salary > 20000 ORDER BY hire_date;
?>