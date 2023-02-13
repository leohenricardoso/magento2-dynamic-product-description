# Dynamic Product Description

## Resumo
Módulo criado para deixar dinâmico o nome, descrição curta e descrição do produto quando uma configuração é selecionada na página do produto.

Funciona para produtos do tipo configurável, é preciso preencher o nome, descrição curta e descrição nos produtos simples que pertencem a esse produto configurável, da forma como deseja que o conteúdo apareça quando o cliente selecionar a configuração específica.

## Como funciona
Vamos utilizar esse produto Radiant Tee (SKU: WS12) como exemplo, a screenshot abaixo mostra o conteúdo do produto configurável, note que a descrição está da forma como é apresentado no momento em que entramos na página do produto (sem ainda ter selecionado nenhuma configuração). 
![configurable-admin](https://user-images.githubusercontent.com/43687466/218550817-5cd3aa91-9bf7-44fa-9a46-28578603b422.png)

Forma que é apresentado a descrição do produto configurável na Página do Produto:
![configurable-frontend](https://user-images.githubusercontent.com/43687466/218550824-0a9c051d-24ae-4ef4-b07c-4d19e5e3e266.png)

A screenshot a seguir mostra a configuração de conteúdo do produto simples (SKU: WS12-XS-Blue - que pertence ao produto configurável do exemplo).
Podemos notar que foi cadastrado uma descrição diferente da que está cadastrado no produto configurável.
![simple-admin](https://user-images.githubusercontent.com/43687466/218550844-b2a763c7-64e1-4795-aab1-158f8f3d54ab.png)

Ao selecionar as configurações respectivas ao produto simples que configuramos na screenshot anterior, podemos notar que houve a troca dinâmica do nome e descrição, e para cada produto simples pertencenta a esse produto configurável é possível adicionar nome, descrição curta e descrição customizada e específica, tornando a experiência do usuário mais agradável ao poder ter detalhes específicos de acordo com a configuração que escolher.
![simple-frontend](https://user-images.githubusercontent.com/43687466/218550854-190badba-88ab-4d3c-8391-215e56181bc5.png)

## Configuração
Para acessar as configurações disponíveis nesse módulo, é preciso acessar: Stores -> Configuration -> Leonardo Henrique -> Dynamic Product Description.
![settings-module](https://user-images.githubusercontent.com/43687466/218550785-98833bf4-b0db-4ace-8ab9-1c02856fa24a.png)

1 - Ativa ou desativa o módulo

2 - Ativa a funcionalidade de tornar dinâmico (NOME)

3 - Seletor unico do elemento na Página do produto que recebe o valor desejado (NOME)

4 - Ativa a funcionalidade de tornar dinâmico (DESCRIÇÂO)

5 - Seletor unico do elemento na Página do produto que recebe o valor desejado (DESCRIÇÂO)

6 - Ativa a funcionalidade de tornar dinâmico (DESCRIÇÂO CURTA)

7 - Seletor unico do elemento na Página do produto que recebe o valor desejado (DESCRIÇÂO CURTA)

### Como obter o seletor unico para configurar corretamente
Vamos usar por exemplo o campo da descrição para obter o seletor que deve ser configurado no admin.

Obs: Caso o tema for personalizado, pode ser colocado um id em cada um desses campos para facilitar a configuração.

1 - Inspecionar o conteúdo da descrição para ter acesso ao código HTML

2 - Verificar se o elemento possui id declarado ou não, caso tenha o id declarado, pode ser configurado dessa forma (#id_do_elemento), caso o elemento não tenha id,
podemos identificar ele através de outros atributos do elemento (Deve ser identificado de forma que seja unico na página).

3 - Na screenshot a seguir mostra como obtive o seletor unico do elemento que recebe a descrição.
![inspect-element-selector](https://user-images.githubusercontent.com/43687466/218550877-146a4eca-c34a-4838-a123-0b7f61342a99.png)

