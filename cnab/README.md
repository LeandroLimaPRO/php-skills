## CNAB CLASS

Está classe é responsavel por gerar arquivo no padrão bancário

### Gera  (Até nesse momento)
 - [x] Remessa

### Resources

- apresenta os padões e modelos bancário, usados como esqueleto para geração do cnab.

#### Funcionando:
- [x] Santander
    - [x] Remessa 
        -[x] Header
        -[x] X boletos
        -[x] Triller
    - [x] Gera arquivo `.rem` cnab - 400

### Informações

#### Padrão dos dados para remessa

```php
# header
$header = [
    'atr'=> 'val',
    ...
]
#boletos
$boleto1 = ['atr' => 'val', ...]
$boleto2 = ['atr' => 'val', ...]
#array de boletos
$boletos = [$boleto1,$boleto2]
# Array (header, boletos)
$dadosEmpresa = [$header, $boletos]

```

#### Padrão de remessa
    
```php
 $var = new RemessaSantander ($dadosEmpresa);

```
### Gerar remessa
```php
 $rem = $var->render(); #retorna string:  header,boletos, triller padrão cnab 400

```