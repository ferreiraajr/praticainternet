# Projeto de Gerenciamento de Notícias
Este projeto é um sistema simples de gerenciamento de notícias, onde os usuários podem visualizar, adicionar, editar e excluir notícias. Além disso, os visitantes podem deixar comentários nas notícias. O sistema foi desenvolvido usando PHP puro e MySQL.

## Funcionalidades
- Cadastro de Notícias: Permite adicionar novas notícias com título e conteúdo.
- Edição de Notícias: Possibilita a atualização das informações de uma notícia existente.
- Exclusão de Notícias: Permite a remoção de notícias do sistema.
- Visualização de Notícias: As notícias são exibidas em uma lista paginada, com 6 notícias por página.
- Busca: Os usuários podem buscar notícias por título.
- Comentários: Qualquer visitante pode deixar um comentário em uma notícia, informando seu nome e o texto do comentário.

### Tecnologias Utilizadas
- PHP: Para a lógica de backend.
- MySQL: Para o armazenamento de dados.
- HTML: Para a estrutura das páginas.
- CSS : Para o design e a responsividade.

## Estrutura do Projeto

````
/praticainternet
│
├── /config
│   └── db.php                        # Configuração da conexão com o banco de dados
│
├── /pages
│   ├── /admin
│   │   ├── admin.php                 # Painel de administração
│   │   ├── processa_noticia.php      # Lógica para processar notícias
│   │   ├── editar_noticia.php        # Página de edição de notícias
│   │   ├── excluir_noticia.php       # Página de exclusão de notícias
│   │
│   ├── /blog
│   │   ├── blog-detalhe.php          # Página de detalhes da notícia
│   │   ├── processa-comentario.php   # Lógica para processar comentários
│   │
│   └── index.php                     # Página inicial do site
│
├── .htaccess                         # Configurações do Apache
└── README.md                         # Este arquivo
````

### Instalação

#### Clone o repositório:
```
git clone https://github.com/ferreiraajr/praticainternet
```
#### Configure o Banco de Dados:

- Crie um banco de dados MySQL chamado clinicmais.
- Execute o arquivo SQL (sql-clinicmais) para criar as tabelas noticias e comentarios.

#### Configuração do Ambiente:

- Configure o arquivo db.php com suas credenciais do banco de dados.

#### Inicie o Servidor:

1. Use o XAMPP ou um servidor web compatível com PHP para rodar o projeto.
Acesse o projeto pelo navegador em http://localhost/praticainternet/.
Uso
2. Acesse o painel de administração em http://localhost/praticainternet/admin para gerenciar as notícias.
3. As notícias podem ser visualizadas na página inicial, onde os usuários podem deixar comentários.
Contribuição


# Futuro Desenvolvimento

- Pretendo migrar todo o projeto para Laravel, utilizando Inertia.js e Vue.js. Essa transição permitirá a criação de uma interface moderna e responsiva, oferecendo uma série de vantagens:

- Desempenho Aprimorado: A combinação de Laravel e Vue.js permitirá um carregamento mais rápido das páginas, melhorando a experiência do usuário final.

- Desenvolvimento de SPA (Single Page Application): Com Inertia.js, o projeto será estruturado como uma SPA, onde a navegação entre as páginas será fluida e sem recarregamentos completos, proporcionando uma experiência de usuário mais dinâmica.

- Interface Interativa: O uso de Vue.js facilitará a implementação de componentes interativos e reativos, como formulários dinâmicos, modais e outros elementos da interface do usuário, melhorando a usabilidade.

- Organização do Código: Laravel oferece uma estrutura de código organizada e robusta, o que facilitará a manutenção e a escalabilidade do projeto. Além disso, a utilização de um ORM (Eloquent) simplificará o gerenciamento de banco de dados.

- Sistema de Autenticação: Com Laravel, será mais fácil implementar um sistema de autenticação seguro, caso venha a ser necessário, permitindo a criação de diferentes níveis de acesso para usuários, administradores e moderadores.

- Testes e Qualidade: A estrutura de testes integrada do Laravel facilitará a criação de testes automatizados, garantindo a qualidade do código e a funcionalidade do sistema ao longo do tempo.

- Melhorias na Área Administrativa: A nova arquitetura permitirá a implementação de recursos mais avançados na área administrativa, como relatórios, estatísticas em tempo real e funcionalidades adicionais para a gestão de conteúdo.

- Essa migração representa um passo significativo na evolução do projeto, permitindo não apenas uma melhoria estética, mas também um desenvolvimento mais eficiente e uma melhor experiência geral para os usuários.

## Link do Projeto feito em Laravel 
https://github.com/ferreiraajr/lara-clinic 