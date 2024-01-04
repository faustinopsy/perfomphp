# Projeto Mega

O Projeto Mega é uma aplicação PHP destinada a gerenciar inserções de dados numéricos em um banco de dados MySQL de forma eficiente e performática.

## Recursos

- **Xdebug para Profiling**: Utilizamos o Xdebug para profiling, o que nos permite analisar o desempenho da aplicação e identificar gargalos.
- **Composer para Gerenciamento de Dependências**: Inicialize e gerencie as dependências do projeto de maneira simples e eficaz com o Composer.
- **Otimização de Autoload**: Implementamos a otimização de autoload do Composer para melhorar o tempo de resposta da aplicação.
- **Conexões Persistentes com o Banco de Dados**: Ajustamos a conexão com o banco de dados para ser persistente, reduzindo a sobrecarga de conexões em cada operação.
- **Análise de Performance**: Monitoramento contínuo e análise de performance para manter e melhorar a eficiência do projeto.

## Inicialização do Projeto

Para começar a usar o Projeto Mega, você precisa ter o Composer instalado. Se você ainda não tem o Composer, visite [Get Composer](https://getcomposer.org/) para instruções de instalação.

Uma vez que o Composer esteja instalado, clone o repositório e instale as dependências:

```bash
git clone https://github.com/faustinopsy/perfomphp.git
cd pperfomphp
composer install
```

## Xdebug e Profiling
O profiling do Xdebug está configurado para nos ajudar a entender o desempenho da aplicação. Para habilitar o profiling, adicione o parâmetro ?XDEBUG_PROFILE às suas requisições ou configure o php.ini para profiling automático.

Os relatórios de perfil podem ser analisados usando ferramentas como QCacheGrind ou KCacheGrind.

Trecho do PHP.INI
```
[xdebug]
zend_extension ="C:/php/ext/php_xdebug.dll"

xdebug.mode=profile
xdebug.start_with_request=trigger
xdebug.output_dir="C:/Users/DELL/Downloads/OneDrive/Documentos/GitHub/perfomphp/App/tmp"
xdebug.profiler_output_name="cachegrind.out.%t.%p"
;xdebug.mode = coverage
```

## Otimização do Autoload
Executamos o comando composer dump-autoload -o para gerar um mapa de classes otimizado, o que reduz o tempo de carregamento de classes em cada requisição.

## Melhoria na Conexão do Banco de Dados
Para reduzir a latência associada às operações de banco de dados, configuramos nossas conexões PDO para usar o modo persistente, o que permite a reutilização de conexões entre as requisições.

## Análise de Performance
Regularmente avaliamos a performance da aplicação, utilizando tanto o profiling do Xdebug quanto benchmarks e ferramentas de monitoramento. Isso nos permite fazer ajustes proativos e manter o sistema rodando de forma suave e eficiente.

<p align="center"><p>Antes</p>
  <img src="img/antes.png" alt="Antes das Otimizações" width="85%"/>
  <p>Depois</p>
  <img src="img/depois.png" alt="Após as Otimizações" width="85%"/> 
</p>

## Testagem

### Cenário de Teste
Para avaliar o desempenho e a robustez do servidor, foi conduzido um teste de carga que consistiu em realizar 1.000 requisições POST ao servidor rodando localmente. O objetivo era simular um cenário realista onde dois servidores distintos, rodando em portas diferentes, gerenciam cargas de trabalho simultaneamente.

### Metodologia
O teste foi estruturado para gerar 6 números aleatórios por requisição, representando dados que seriam inseridos na base de dados via API REST. Para isso, foi utilizado um script de teste de carga baseado em HTML/JavaScript. O script executava as requisições de forma assíncrona e registrava o progresso em tempo real.

### Script de Teste de Carga
Aqui está o script HTML utilizado para o teste de carga:

```html
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Teste de Carga com Fetch</title>
    <style>
        #count { font-size: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div id="count">0</div>
    <button onclick="iniciarTesteDeCarga()">Iniciar Teste de Carga</button>
    <script>
        function gerarNumeroAleatorio() {
            return Math.floor(Math.random() * 60) + 1;
        }

        async function enviarRequisicao(contador) {
            const url = "http://localhost/app/index.php?XDEBUG_PROFILE";
            const data = {
                num1: gerarNumeroAleatorio(),
                num2: gerarNumeroAleatorio(),
                num3: gerarNumeroAleatorio(),
                num4: gerarNumeroAleatorio(),
                num5: gerarNumeroAleatorio(),
                num6: gerarNumeroAleatorio()
            };

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                if (!response.ok) throw new Error('Erro na requisição');
                document.getElementById("count").innerText = "Requisições enviadas: " + contador;
            } catch (error) {
                console.error('Falha ao enviar requisição:', error);
            }
        }

        function iniciarTesteDeCarga() {
            for (let i = 1; i <= 1000; i++) {
                enviarRequisicao(i);
            }
        }
    </script>
</body>
</html>
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