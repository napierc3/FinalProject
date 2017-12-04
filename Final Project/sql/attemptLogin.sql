SELECT *
FROM store_customers
WHERE
	`username` = ':username' AND
    `password` = ':password'
	