SELECT * FROM usuarios

SELECT COUNT(*) FROM usuarios;

SELECT COUNT(*) FROM usuarios /* total de 9 alunos */
WHERE tipo_usuario_fk = 3;

SELECT * FROM cursos;

SELECT AVG(preco) /* média de preço: 267.5*/
FROM cursos;

SELECT MIN(preco) /* preço mínimo: 50 */
FROM cursos;

SELECT MAX(preco) /* preço máximo: 800 */
FROM cursos;

SELECT SUM(preco) /* soma dos valores dos cursos: 1070 */
FROM cursos;

SELECT MIN(preco), MAX(preco), AVG(preco), SUM(preco) /* trazer todos os resultados de uma vez */
FROM cursos;

SELECT MIN(preco) AS 'mínimo',
MAX(preco) AS 'máximo',
AVG(preco) AS 'média',
SUM(preco) AS 'total'
FROM cursos;


SELECT tipo_usuario_fk, COUNT(*)
FROM usuarios
GROUP BY tipo_usuario_fk;

SELECT tipo_usuario_fk FROM usuarios;

/* inner join com Alias */
SELECT u.nome AS usuario, t.nome AS tipo
FROM usuarios AS u
INNER JOIN tipo_usuario AS t
ON u.tipo_usuario_fk = t.id_tipo_usuario; /* conectando tabela A com a tabela B */

select * from cursos;
select * from usuarios;

SELECT cursos.nome AS cursos, usuarios.nome AS professor
FROM cursos
INNER JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario;

/* insert curso sem prof */

INSERT INTO cursos (nome, descricao, preco, tag, image)
VALUES
('Drinks Maneiros',
'Aprenda a fazer drinks sensacionais',
3000,
'drinks',
'happyhour.png');

SELECT * FROM cursos;

SELECT cursos.nome, usuarios.nome
FROM cursos
LEFT JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario;

