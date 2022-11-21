# MAPA - FRETE POR ESTADO

Section para woocommerce, informação de frete médio por estado. Utilize o Shortcode [frete-por-estado].

## 🚀 Conteúdo

Recursos 		(pasta com detalhes que podem vir a ser uteis para a configuração do plugin)
Install-frete-por-estado.zip 	(instalador do plugin para ser usado no wordpress)
.README
		

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
Dar exemplos
```

### 🔧 Instalação

** Configuração do JetEngine:
		> Instalar primeiramente o plugin JetEngine.

Criação de "Glossarie":
		
 No painel administrativo do WordPress navegar até a opção: JetEngine > JetEngine.
 Na tela de configuração do plugin navegar até a opção "Glossaries".
	- Sua tela provavelmente estará sem Glossario algum configurado. De toda forma você deve selecionar a opção "+ New Glossary"
	- No campo "Name" escreva o nome para a glossario a ser utilizado.
	- Em "Data Source" seleciona a opção - "Get items from uploaded file".
	- Em "File to Get Data From" navegar até a pasta extraida o plugin e em "recursos" enviar o arquivo de nome: "estados.csv"
	- Em "Value Column" deve ser inserido o texto "SIGLA".
	- Em "Label" deve ser inserido o texto "NOME".
	- Após isto clicar em "Save".

Criação de "Page Options":
 No painel administrativo do WordPress navegar até a opção: JetEngine > Options Pages.
 Na parte superior da tela clicar na opção "Add New".
 Na nova tela que será aberta, em "Page Title" pedimos para selecionar "Mapa Dinâmico" como nome.
 O "Page slug" deve ficar "mapa-dinamico"
 Icones e demais configurações da guia "General Settings" ficam ao seu encargo.
		
    
Criação dos Custom Fields
 Na guia de Fields abaixo, criar um campo chamado "Estados" em sua label, em seu tipo escolher a opção "Repeater"
 Seu primeiro campo deve ser chamado de "Estado" (no singular). 
 No campo "Get options from the glossary" selecione o glossario configurado na etapa anterior.
 Adicionar também novo campo dentro do repeater, desta vez do tipo "Texto".
 Campo este que apenas deve ser nomeado como "Frete", tendo seu slug "frete".


Encerramos aqui as configurações relacionadas ao JetEngine.


## 📦 Configuração do Plugin: 

Instalar o arquivo "install-frete-por-estado.zip" 
			
 Agora apenas é necessário popular a option pages com o select do campo "Estado" e frete escrito por "R$ XX,XX" substituindo "X" por números dos valores.
 Abrir alguma página da sua escolha e com o próprio editor do wordpress inserior o shortcode [frete-por-estado]
			
			


## 📄Objetivo

Construído para atender a necessidade de uma interface amigavel para estimativa de preço do frete sem a necessidade do calculo por CEP. Sendo este usado em segundo plano, a intenção é não ter perda de captação de cliente por complexidade na usabilidade.**


