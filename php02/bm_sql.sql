SELECT * FROM gs_an_table WHERE id = 1 OR id = 2 OR id = 3;

SELECT * FROM gs_an_table WHERE id >= 4 AND id <= 8;

SELECT * FROM gs_an_table WHERE name LIKE '%w%';

SELECT * FROM gs_an_table ORDER BY indate DESC;

SELECT * FROM gs_an_table WHERE indate LIKE '%-06-%';

SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 5;


SELECT COUNT(*) FROM gs_an_table WHERE name LIKE '%w%';



-- 更新


UPDATE gs_an_table SET name = 'roboryu' WHERE id = 1;

UPDATE gs_an_table SET name = 'robot' WHERE name LIKE '%w%';

UPDATE gs_an_table SET indate = 'SYSDATE()' WHERE id >3 AND id <8;



UPDATE gs_an_table SET naiyou = '未入力' WHERE naiyou ='';
