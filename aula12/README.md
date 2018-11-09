# Aula 12

## Security

- Instalação
```
composer require symfony/security-bundle
```

- User Class (Usuario, yes, email, yes, yes)
```
php bin/console make:user
```

- User Entity (Usuario, nome)
```
php bin/console make:entity
```

- Atualizar banco de dados
```
php bin/console doctrine:schema:update --force
```

- Encoders
~~~yml
# config/packages/security.yaml
security:
    encoders:
        App\Entity\Usuario:
            algorithm: argon2i
~~~

- Encodando senha manualmente
```
php bin/console security:encode-password
```

- Criando formulário de login
```
php bin/console make:auth
```

## Fixando o conteúdo
- Criar user class via make:user
- Configurar encoder para utilização do bcrypt
- Criar fixture para a classe Usuario (usuário default)
- Criar formulário de login
- Bloquear acesso sem autenticacao

- cola
~~~php
// src/DataFixtures/UsuarioFixture.php

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
// ...

class UsuarioFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $usuario = new Usuario();
        // ...

        $usuario->setPassword($this->passwordEncoder->encodePassword(
            $usuario,
            '123456'
        ));

        // ...
    }
}
~~~

## Recomendação de leitura
- [Symfony Security](https://symfony.com/doc/current/security.html)
- [Create form login](https://symfony.com/doc/current/security/form_login_setup.html)
- [Symfony Configuration](https://symfony.com/doc/current/best_practices/configuration.html#application-related-configuration)
- [Argon2](https://en.wikipedia.org/wiki/Argon2)