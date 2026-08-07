  SELECT
            group_id        AS N'ID',
            group_name      AS N'Название группы',
            direction_name  AS N'Направление обучения'
    FROM    Students
    JOIN    Groups          ON ([group]=[group_id])
    JOIN    Directions      ON (direction=direction_id) 