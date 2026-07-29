--SET DATEFORMAT ymd;
SELECT 
		[ID]			=	stud_id,
		[Студент]		=	FORMATMESSAGE(N'%s %s %s', last_name, first_name, middle_name),
		[Дата рождения]	=	FORMAT(birth_date, N'yyyy-MM-dd'),
		[Группа]		=	group_name,
		[Направление]	=	direction_name

FROM	Students
JOIN	Groups		ON	([group]=group_id)
JOIN	Directions	ON	(direction = direction_id)