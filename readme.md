# Projeto Mega

O Projeto Mega é uma aplicação PHP destinada a gerenciar inserções de dados numéricos em um banco de dados MySQL de forma eficiente e performática para fins educacionais.

## Recursos


- **Composer para Gerenciamento de Dependências**: Inicialize e gerencie as dependências do projeto de maneira simples e eficaz com o Composer.
- **Otimização de Autoload**: Implementamos a otimização de autoload do Composer para melhorar o tempo de resposta da aplicação.
- **Conexões Persistentes com o Banco de Dados**: Ajustamos a conexão com o banco de dados para ser persistente, reduzindo a sobrecarga de conexões em cada operação.


## Inicialização do Projeto

Para começar a usar o Projeto Mega, você precisa ter o Composer instalado. Se você ainda não tem o Composer, visite [Get Composer](https://getcomposer.org/) para instruções de instalação.

Uma vez que o Composer esteja instalado, clone o repositório e instale as dependências:

```bash
git clone https://github.com/faustinopsy/perfomphp.git
cd pperfomphp
composer install
```


## Banco de Dados

Para armazenamento e gerenciamento de dados, utilizamos o MySQL devido à sua robustez e eficiência em ambientes de produção. O MySQL serve como a espinha dorsal do nosso sistema de armazenamento, lidando com operações de inserção de dados em alta velocidade e garantindo a integridade e recuperação dos dados.

### Tabela `mega`

A tabela `mega` foi projetada para armazenar sequências numéricas geradas aleatoriamente. Cada registro representa uma sequência única e é identificado por um `id` autoincremental. Abaixo está o script SQL para criar a tabela `mega`:

```sql
CREATE TABLE `mega` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num1` char(2) DEFAULT NULL,
  `num2` char(2) DEFAULT NULL,
  `num3` char(2) DEFAULT NULL,
  `num4` char(2) DEFAULT NULL,
  `num5` char(2) DEFAULT NULL,
  `num6` char(2) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```