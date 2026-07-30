  SELECT
            group_id        AS N'ID',
            group_name      AS N'Название группы',
            COUNT(stud_id)  AS N'Количество студентов',
            direction_name  AS N'Направление обучения'
    FROM    Students
    JOIN    Groups          ON ([group]=[group_id])
    JOIN    Directions      ON (direction=direction_id)
    WHERE direction_name = ISNULL(NULL, direction_name)
    GROUP BY    group_id, group_name, direction_name;