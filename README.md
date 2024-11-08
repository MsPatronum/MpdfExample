# MPDF

O que é?
- Uma biblioteca gratuíta disponivel para PHP.
Onde baixo?
- Você pode baixar ele pelo composer 
```php
composer require mpdf/mpdf
```
Para verificar se o seu PHP é compatível com a versão do Mpdf, vocês podem olhar no Packagist, que é um portal onde são armazenados todas as bibliotecas e pacotes disponíveis para download via composer.
- [Packagist - Mpdf](https://packagist.org/packages/mpdf/mpdf)
- A versão do Mpdf v8.2.4 está disponível para uso nas versões ^5.6 || ^7.0 || ~8.0.0 || ~8.1.0 || ~8.2.0 || ~8.3.0 do PHP.

## USO
O uso do Mpdf é bem simples, ele aceita um input de um HTML, seja ele em formato de string ou através de um arquivo.

### Como string:
```php
# Primeiro precisamos adicionar o autoload do composer, 
# que irá carregar todas as bibliotecas e pacotes necessários
  
require_once __DIR__ . '/vendor/autoload.php';

# depois precisamos criar uma instância da classe 
# a instância serve para criar um objeto para ser utilizado
# durante seu desenvolvimento
#O objeto poderá ser chamado e suas funções serão carregadas

$mpdf = new \Mpdf\Mpdf();

# nesse caso criamos uma variável que irá armazenar o objeto Mpdf

# chamamos então o nosso objeto Mpdf e lhe dizemos para armazenar 
# o código HTML para usarmos depois

$mpdf->WriteHTML('<h1>Olá mundo!</h1>');

#depois dizemos para o Mpdf realizar o output desse HTML em um
#arquivo PDF diretamente no navegador

$mpdf->Output();

```

### Como arquivo:
Para usar o Mpdf com um arquivo, mudamos algumas partes, dessa forma:

```php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

# agora criamos uma variável que irá armazenar os conteúdos de um arquivo HTML
$arquivo = file_get_contents('seu_arquivo.html');

# Essa variável é então enviada para o mpdf da mesma forma
$mpdf->WriteHTML($arquivo);

$mpdf->Output();
```
Infelizmente o MPDF não tem suporte para Bootstrap em sua totalidade, então será necessário criar uma folha de estilos (Stylesheet/CSS) para que fique bonito.

Mas existem alternativas, como:
- [CSS da extensão yii2-mpdf](https://github.com/kartik-v/yii2-mpdf/blob/master/src/assets/kv-mpdf-bootstrap.css)

Ou podem criar os seus próprios arquivos CSS e personalizar sua experiência!


# DICA!
Caso seu projeto não precise do XAMPP e você tenha apenas o PHP instalado, pode ir até a pasta do seu projeto e digitar o comando `php -S localhost:8081` que o seu projeto rodará no link [localhost:8081](localhost:8081)
**OBS**: isso **NÃO** funcionará se utilizar o XAMPP.
