# Classe ValidationHelper
## Descrição
Classe que contém métodos auxiliares para ajudar na validação de CPF, CNPJ, CEP, E-mail, Estado, etc.

[![Latest Stable Version](https://poser.pugx.org/bkazuo/common-helper-validator/v/stable)](https://packagist.org/packages/bkazuo/common-helper-validator)
[![Total Downloads](https://poser.pugx.org/bkazuo/common-helper-validator/downloads)](https://packagist.org/packages/bkazuo/common-helper-validator)
[![License](https://poser.pugx.org/bkazuo/common-helper-validator/license)](https://packagist.org/packages/bkazuo/common-helper-validator)
[![Latest Unstable Version](https://poser.pugx.org/bkazuo/common-helper-validator/v/unstable)](https://packagist.org/packages/bkazuo/common-helper-validator)

## Instalação via Composer

Pelo terminal vá até a raiz de seu projeto e lá execute :

```bash
composer require bkazuo/common-helper-validator
``` 
Isso fará com que o SEU arquivo composer.json seja acrescido da dependência de seu projeto.
Esta classe será baixada e colocada na pasta "vendor" e o arquivo autoload.php sejá atualizado.

### Exemplo
```php
require __DIR__.'/vendor/autoload.php';

// Instancia o objeto da classe
$validator = new Helper\ValidationHelper();

// Verifica se CPF é valido
$isCpf = $validator->isCpf('12345678909');
echo $isCpf ? 'CPF é válido' : 'CPF inválido';
```

**Response:**
A resposta de retorno sempre será do tipo True ou False (boolean). Você pode verificar a lista de todos os métodos disponíveis abaixo.

### Lista de métodos disponíveis

```php
require __DIR__.'/vendor/autoload.php';

// Instancia o objeto da classe
$validator = new Helper\ValidationHelper();

// Verifica se CPF é valido
$isCpf = $validator->isCpf('12345678909');

// Verifica se CNPJ é valido
$isCnpj = $validator->isCnpj('12123123000199');

// Verifica se E-mail é valido
$isEmail = $validator->isEmail('contact@email.com');

// Verifica se a variável não é nula
$isNotBlank = $validator->isNotBlank('Jose');

// Verifica se a variável é um número natural positivo
$isPositiveInteger = $validator->isPositiveInteger(5);

// Verifica se a variável é um número natural
$isInteger = $validator->isInteger(5);

// Verifica se a variável é inteiro positivo
$isPositiveFloat = $validator->isPositiveFloat(5);

// Verifica se a variável é inteiro
$isFloat = $validator->isFloat(5);

// Verifica se é uma Data no formato (YYYY-mm-dd)
$isDate = $validator->isDate('2017-03-03');

// Verifica se é uma Data e Hora no formato (YYYY-mm-dd H:i:s)
$isDatetime = $validator->isDateTime('2017-03-03 20:00:00');

// Verifica se é uma Hora no formato (H:i:s)
$isDatetime = $validator->isTime('20:00:00');

// Verifica se é um CEP
$isCep = $validator->isCep('01234999');

// Verifica se é um Telefone com código de cidade
$isPhone= $validator->isCep('11999998888');

// Verifica se é um Estado através das siglas
$isState= $validator->isState('SP');

// Verifica se é o Renavam é valido
$isRenavam= $validator->isRenavam('123456789');
```

## Licença
MIT. Por favor, veja o [Arquivo de Licença](license.txt) para mais informações.
