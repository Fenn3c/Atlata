-- ПОЛУЧАЕМ ПОЛЬЗОВАТЕЛЕЙ
SELECT * FROM users;

SELECT COUNT(*) FROM users;

-- ПОЛУЧАЕМ МАЛОЛЕТОК
SELECT * from (SELECT
  *,
  (
    (YEAR(CURRENT_DATE) - YEAR(birthday)) -                             /* step 1 */
    (DATE_FORMAT(CURRENT_DATE, '%m%d') < DATE_FORMAT(birthday, '%m%d')) /* step 2 */
  ) AS age
FROM users) as temp WHERE age <18;


SELECT COUNT(*) from (SELECT
  *,
  (
    (YEAR(CURRENT_DATE) - YEAR(birthday)) -                             /* step 1 */
    (DATE_FORMAT(CURRENT_DATE, '%m%d') < DATE_FORMAT(birthday, '%m%d')) /* step 2 */
  ) AS age
FROM users) as temp WHERE age <18;

-- МАКСИМАЛЬНЫЙ РЕЙТИНГ
SELECT *, MAX(rating) as max_rating FROM videos_with_data