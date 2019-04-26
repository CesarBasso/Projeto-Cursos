INSERT INTO tipo_usuario (nome)
VALUES ('admin'); 

INSERT INTO tipo_usuario (nome)
VALUES ('professor'), ('aluno');

SELECT * FROM tipo_usuario;

INSERT INTO usuarios (nome, email, senha, CPF, foto, tipo_usuario_fk)
				VALUES ('Cesar', 'cesar@mail.com', '123', 99999999999, 'foto.png', 2);
                
ALTER TABLE usuarios
CHANGE cpf cpf BIGINT(12);

INSERT INTO usuarios (nome, email, senha, CPF, foto, tipo_usuario_fk)
				VALUES ('Cesar', 'cesar@mail.com', '123', 99999999999, 'foto.png', 2);
                
 SELECT * FROM usuarios;     
 
 
 INSERT INTO usuarios (nome, email, senha, CPF, foto, tipo_usuario_fk)
				VALUES ('CesarBasso', 'cesarbasso@mail.com', '123', 10918273745, 'foto.png', 3);
                
 INSERT INTO usuarios (nome, email, senha, CPF, foto, tipo_usuario_fk)
				VALUES ('Junior', 'junior@mail.com', '123', 22222224443, 'foto.jpg', 3);
                
 INSERT INTO usuarios (nome, email, senha, CPF, foto, tipo_usuario_fk)
				VALUES ('Antonio', 'antonio@mail.com', '123', 64646575647, 'foto.jpg', 1);

SELECT nome, email, tipo_usuario_fk FROM usuarios;

SELECT * FROM usuarios 
WHERE tipo_usuario_fk = 2;

SELECT * FROM usuarios
WHERE nome LIKE 'A%';

SELECT * FROM usuarios
WHERE nome LIKE 'c%' OR tipo_usuario_fk = 2;

SELECT * FROM usuarios
WHERE nome IN ('Cesar', 'Maria', 'Antonio');

SELECT nome, email FROM usuarios
WHERE tipo_usuario_fk = 3
ORDER BY nome ASC;


SELECT * FROM usuarios
WHERE tipo_usuario_fk = 3
ORDER BY nome DESC;

UPDATE usuarios
SET email = 'cesar.a@mail.com'
WHERE nome = 'Cesar';

SET sql_safe_updates = 0; /* desabilitar o modo de segurança */

UPDATE usuarios
SET foto = 'nicolascage.png'
WHERE tipo_usuario_fk = 3;

DELETE FROM usuarios
WHERE nome = 'Antonio';

DELETE FROM usuarios
WHERE tipo_usuario_fk = 2;

INSERT INTO `projeto_cursos`.`usuarios`
(`nome`,
`email`,
`senha`,
`cpf`,
`foto`,
`tipo_usuario_fk`)
VALUES
('Joao',
'joao@mail.com',
123,
12345678909,
'fotos.png',
3);


