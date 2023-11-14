# Comandos SQL para operações de dados (CRUD)

## Resumo

- C: CREATE (INSERT) -> usado para inserir dados
- R: READ (SELECT) -> usado para ler/consultar dados
- U: UPDATE (UPDATE) -> usando para atualizar dados
- D: DELETE (DELETE) -> usado para excluir dados

# Exemplos

### INSERT na tabela de usuarios

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES(
    'Jumento soares dias ',
    'giusepe002@gmail.com',
    '12387',
    'admin'
);

INSERT INTO usuarios(nome, email, senha, tipo)
VALUES(
    'Fulano da Silva',
    'fulano@gmail.com',
    '456'
    'editor'
), (
    'Beltrano Soares',
    'beltrano@msn.com',
   ' 000penha',
   'admin'
), (
    'Chapolin Colorado',
    'chapolin@vingadores',
    'marreta',
    'editor'
);

# SELECT na tabela de usuários

SELECT * FROM usuarios;
SELECT nome, email FROM usuarios;

SELECT nome, email FROM usuarios WHERE tipo = 'admin';

### UPDATE em dados da tabela de usuários


UPDATE usuarios SET tipo = 'admin';
WHERE id = 4;


-- obs: NUNCA ESQUEÇA DE PASSAR CONDIÇÃO PARA O DELETE

### DELETE em dados da tabela de usuários

DELETE FROM usuarios WHERE id = 2;


# INSERT na tabela de noticias 


INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUE(
    'Nova versão do VSCODE',
    'Recentemente o VSCode foi atualizado...',
    'A Microsoft trouxe recursos de Inteligência Artificial',
    'vscode.jpg',
    1
);











INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUE(
    'Descoberto oxigenio em Vênus',
    'Recentemente o telescopio no Havaí a sonda XYZ encotrou traços de oxigênio no 
    planeta',
    'A produção havia sido encerrada em 2021, voltando a ser fabricado um ano depois e, agora, recebe uma reestilização, apresentada no Tokyo Auto Salon.',
    'venus.jpg',
    4
);


INSERT INTO noticias (titulo, texto, resumo, imagem, usuario_id)
VALUE(
    'Onda de calor',
    'Temperaturas muito acima da media...',
    'Efeitos do aquecimento global estão prejudicando a vida',
    'sol.jpg',
    1
);




#### SELECT COM JOIN(CONSULTA COM JUNÇÃO DE TABELAS)





### Objetivo: consulta que mostre a data e o titulo da noticia e o nome do autor desta noticia.

-- Especificamos o nome da coluna junto com o nome da tabela 
SELECT data, titulo, nome FROM noticias;

SELECT
    noticias.data,
    noticias.titulo,
    usuarios.nome

    FROM noticias JOIN usuarios

-- Criterio para o JOIN funcionar
-- fazemos uma comparação entre a chave estrageira (FK)
-- com a chave primaria (PK)
    ON noticias.usuario_id = usuarios.id

-- opcional (ordenaçâo/classificação pela data)
-- DESC indica ordem decrescente (mais recente vem primeiro)
ORDER BY data DESC;
