# Ambiente de Desenvolvimento Web 'Dockerizado'

Este é um projeto dockerizado que utiliza os serviços do MariaDB, PHP-FPM e Apache para criar um ambiente de desenvolvimento web. O projeto possui a seguinte estrutura:

```
.
├── _docker/
│ ├── certs/
│ │ ├── server.local.crt
│ │ └── server.local.key
│ ├── config/
│ │ ├── 99-xdebug.ini
| | |── errors.ini 
│ │ └── opcache.ini
│ └── vhosts/
│   └── server.local.conf
└── app/
  ├── index.php
  ├── source/
  ├── .htaccess
  ├── composer.json
  ├── docker-compose.yml
  └── Dockerfile
```

## Pré-requisitos

Certifique-se de ter os seguintes requisitos em seu sistema:

- Docker
- Docker Compose
- WSL2 (Windows Subsystem for Linux 2)
- Git

### Configuração do Banco de Dados

O serviço do MariaDB está configurado no arquivo `docker-compose.yml` com as seguintes informações:

- Nome do contêiner: servermdb
- Imagem utilizada: mariadb:latest
- Porta mapeada: 3306
- Senha de root do MySQL: root

### Configuração do PHP-FPM

O serviço do PHP-FPM está configurado no arquivo `docker-compose.yml` com as seguintes informações:

- Nome do contêiner: serverphpfpm
- Imagem utilizada: bitnami/php-fpm:latest
- Porta mapeada: 9000
- Volumes montados:
  - Diretório local do projeto: `/app`
  - Arquivo de configuração do Xdebug: `/opt/bitnami/php/etc/conf.d/99-xdebug.ini`
  - Arquivo de configuração do Display: `/opt/bitnami/php/etc/conf.d/errors.ini`
  - Arquivo de configuração do Opcache: `/opt/bitnami/php/etc/conf.d/opcache.ini`

### Configuração do Apache

O serviço do Apache está configurado no arquivo `docker-compose.yml` com as seguintes informações:

- Nome do contêiner: serverapache
- Imagem utilizada: bitnami/apache:latest
- Portas mapeadas: 80 (HTTP) e 443 (HTTPS)
- Volumes montados:
  - Diretório local do projeto: `/app`
  - Diretório de certificados SSL/TLS: `/certs`
  - Arquivo de configuração do ambiente de desenvolvimento: `/vhosts/server.local.conf`

## Estrutura do Projeto

- O código-fonte do projeto está localizado na pasta `app/`.
- O arquivo `app/index.php` é o ponto de entrada da aplicação.
- Os arquivos de configuração do ambiente Docker estão localizados na pasta `_docker/`.
- O arquivo `Dockerfile` contém as instruções para construir a imagem do PHP-FPM.
- O arquivo `docker-compose.yml` define os serviços e configurações do ambiente Docker.

## Pontos Importantes

- O pacote `unzip` é necessário para descompactar os pacotes do Composer. Certifique-se de que ele esteja especificado no Dockerfile.

- O uso da opção `network: host` no arquivo `docker-compose.yml` é importante para corrigir a falha temporária de conexão com o repositório `deb.debian.org`.

- Os arquivos de autoridade SSL precisam ser gerados (recomenda-se usar o MKcerts) e renomeados conforme a estrutura especificada (server.crt e server.key). Caso algum erro SSL seja reportado, será necessário incluí-los nos "Certificados Autorizados" do Windows, para isso siga as instruções abaixo:

 - Pressione as teclas "Windows+R" para abrir a caixa de diálogo "Executar".
 - Digite "MMC" e pressione "OK".
 - No menu "Arquivo", selecione "Adicionar/Remover snap-in...".
 - Clique em "Certificados" e depois em "Adicionar".
 - Selecione "Conta de Computador" e clique em "Avançar".
 - Escolha "Computador Local" e clique em "Concluir".
 - Clique em "OK" e feche a janela "Adicionar ou Remover Snap-in".
 - Clique em "Autoridades de Certificação Raiz Confiáveis" no painel esquerdo.
 - Clique com o botão direito do mouse em "Certificados" e selecione "Todas as tarefas" e depois "Importar".
 - Selecione "Máquina Local" e clique em "Avançar".
 - Procure o arquivo gerado pelo MKCert renomeado para "server.crt" e siga as etapas restantes até concluir a importação.
 - Adicione a linha `127.0.0.1 server.local` ao arquivo de hosts do seu sistema. Você pode encontrá-lo em `Windows\System32\drivers\etc\hosts`. Utilize o Bloco de Notas para fazer essa modificação.

## Executando o Projeto

Para executar o projeto, siga as etapas a seguir:

1. Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina. (Esse ambiente foi testado utilizando o WSL2 no Windows 11)
2. Clone este repositório em sua máquina local.
3. Navegue até o diretório do projeto no terminal (/app).
4. Execute o comando `docker-compose up -d` para iniciar os serviços do Docker.
5. O ambiente estará acessível em `https://server.local` no navegador.
6. Ppara instalar as dependências do Composer: `docker-compose exec -it composer update`.