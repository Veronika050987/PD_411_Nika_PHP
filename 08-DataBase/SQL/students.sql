SELECT 
    s.stud_id, 
    s.last_name, 
    s.first_name, 
    s.middle_name, 
    s.birth_date, 
    g.group_name,
    d.direction_name
FROM Students s
JOIN Groups g ON s.[group] = g.group_id
JOIN Directions d ON g.direction = d.direction_id;