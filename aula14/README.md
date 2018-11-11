# Aula 14

## Validations

- instalando dependencias
```
composer require symfony/validator doctrine/annotations
```

- Validação Básica
~~~php
// src/Entity/Chamado.php

// ...
use Symfony\Component\Validator\Constraints as Assert;

class Chamado
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private $assunto;
}
~~~

- Validando método get
~~~php
// src/Entity/Chamado.php

// ...
use Symfony\Component\Validator\Constraints as Assert;

class Chamado
{
    /**
     * @Assert\IsTrue(message="The ticket assunto and descricao can not match")
     */
    public function isChamadoExplicado()
    {
        return $this->assunto != $this->descricao;
    }
}
~~~

- Como usar service validate?
~~~php
// ...
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Chamado;

private $validator;

public function __construct(ValidatorInterface $validator)
{
    $this->validator = $validator;
}

public function validate(Chamado $chamado)
{
    // ... do something to the $chamado object

    $errors = $validator->validate($chamado);

    if (count($errors) > 0) {
        /*
         * Uses a __toString method on the $errors variable which is a
         * ConstraintViolationList object. This gives us a nice string
         * for debugging.
         */
        $errorsString = (string) $errors;

        return $errorsString;
    }

    return true;
}
~~~

## Fixando o conteúdo
- criar método isChamadoExplicado na Entidade Chamado
- validar se assunto e descrição são diferentes
- assunto não pode ser nulo
- descrição deve conter no mínimo 10 caracteres
- criar método add, modify e remove em ChamadoService

## Recomendação de leitura
- [Symfony Validator](https://symfony.com/doc/current/validation.html)
- [Traduzindo validators](https://symfony.com/doc/current/validation/translations.html)