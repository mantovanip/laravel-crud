# Innova Connect - Teste Técnico


O teste tem como objetivo acurar as habilidades do candidato em resolver alguns problemas relacionados à lógica de programação, regra de negócio e orientação à objetos.

O mesmo consiste em um cadastro de empresas instaladoras de paineis solares, essas empresas são chamadas de integradores, com os seguintes dados: 

 1. CPF ou CNPJ
 2. Nome do Integrador
 3. Nome da dono
 4. Cidade
 5. Estado
 6. Marcas de painéis fotovoltaicos (Jinko Solar, Trina Solar, Canadian Solar, Ja Solar, Hanwha Q-Cells, GCL-Si) 
 7. Porte da empresa (Pequena, Média, Grande) 


# Requisitos de negócio

 - O usuário deverá ter a possibilidade de cadastrar, editar, e excluir Integradores.
 - O sistema deverá validar CPF e CNPJ digitados incorretamente.
 - Integradores podem trabalhar com mais de uma marca.
 - A plataforma deverá ter um Dashboard que exiba:
   - Gráfico de pizza por estado.
   - Gráfico de pizza por Marcas. 
   - Gráfico de pizza por porte.
     

# Requisitos técnicos

 - O desenvolvedor front-end deverá utilizar [ReactJS](http://reactjs.org). A criação das estruturas de dados "mockados" faz parte da avaliação.
 - O desenvolvedor back-end deve salvar os dados em um banco de dados Postgres usando o NodeJS como layer de Backend, e entregar os endpoints para cadastrar, editar, e excluir integradores, além do endpoint que retorne os totais para o dashboard.  A criação das estruturas de dados "mockados" faz parte da avaliação.
 - O desenvolvedor full-stack deve realizar ambos, e concluir a integração.
 - Não envie a solução como anexo, suba os fontes para seu Github (ou outro repositório) e envie o link para o avaliador. 
