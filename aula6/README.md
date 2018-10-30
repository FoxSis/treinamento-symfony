# Aula 6

## Lifecycle Calbacks e Entity Constructor

- setando data de abertura
~~~php
// src/Entity/Chamado.php

    // ...

    public function __construct()
    {
        $this->dataAbertura = new \DateTime();
        $this->dataAtualizacao = new \DateTime();
    }
~~~

- setando data de atualização
~~~php
// src/Entity/Chamado.php

/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Chamado
{
    // ...

    /**
     * @ORM\PreUpdate
     */
    public function setDataAtualizacao() : self
    {
        $this->dataAtualizacao = new \DateTime();
        return $this;
    }
}
~~~

## Fixando o conteúdo
- Criar CRUD para a entidade chamado
- Criar método __toString() nas entidades de apoio (Prioridade, Status e Tipo)
- Remover campos de data do formulário (dataAbertura, dataAtualizacao e dataConclusao)
- Setar data de abertura e data de atualização do chamado no método construtor da entidade Chamado
- Setar data de atualização do chamado com lifecycle callback
- Criar fixtures para a tabela chamado (3 registros)

### Fixture - Chamado
Id | Prioridade | Tipo       | Status       | Assunto                          | Descricao
-- | ---------- | ---------- | ------------ | -------------------------------- | ----------------------------------------------
?  | Alta       | Incidente  | Aberto       | Erro no cadastro de prioridade   | Não consigo cadastrar prioridade
?  | Média      | Requisição | Em andamento | Informação ao fechar chamado     | Solicito campo para texto da solução do chamado
?  | Baixa      | Dúvidas    | Fechado      | Abertura de chamados             | Como faço para informar o usuário que abriu o chamado?


## Recomendação de leitura
- [PHP métodos mágicos](http://php.net/manual/pt_BR/language.oop5.magic.php)
- [Lifecycle Callbacks](https://symfony.com/doc/current/doctrine/lifecycle_callbacks.html)
- [Doctrine Lifecycle Events](https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/events.html#lifecycle-events)
- [Stof Doctrine Extentions Bundle](https://github.com/Atlantic18/DoctrineExtensions)