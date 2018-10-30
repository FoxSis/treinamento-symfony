# Aula 7

## Tratamento de Exceções

- Tratamento de exceções
~~~php
    // ChamadoController.php

    public function encerrarChamado(Chamado $chamado): Response 
    {
        try {
            $manager = $this->getDoctrine()->getManager();

            if ($chamado->getStatus()->getId() === Status::FECHADO) {
                throw new \Exception("Este chamado já está encerrado");
            }
    
            $chamado->setDataConclusao();
            $chamado->setStatus(
                $manager->getRepository(Status::class)->find(Status::FECHADO)
            );
    
            $manager->persist($chamado);
            $manager->flush();
    
            $this->addFlash('success', 'Chamado encerrado com sucesso');
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        return $this->redirectToRoute('chamado_index');
    }
~~~

## Fixando o conteúdo
- Criar método para encerramento de chamado em ChamadoController (encerrarChamado())
- Validar se chamado já está encerrado tratando exceções (try/catch)


## Recomendação de leitura
- [Doctrine Repository](https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository)
- [Repository Pattern in Symfony](https://www.thinktocode.com/2018/03/05/repository-pattern-symfony/)
- [Doctrine Extensions](https://symfony.com/doc/master/bundles/StofDoctrineExtensionsBundle/index.html)