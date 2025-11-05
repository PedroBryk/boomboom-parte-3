Este projeto foi desenvolvido com o objetivo de aplicar padrões de projeto (Design Patterns) e boas práticas de arquitetura de software em um sistema Laravel, respeitando os princípios SOLID e Clean Architecture.

Foram implementadas três principais estruturas arquiteturais:

🏭 Factory Method → no módulo de Professores

🧠 Strategy Pattern → no módulo de Alunos

⚙️ CQRS (Command Query Responsibility Segregation) → no módulo de Treinos

Cada padrão foi aplicado para resolver um problema específico de design, mantendo o código modular, reutilizável, testável e de fácil manutenção.

🧱 Estrutura Geral do Projeto
app/
├── CQRS/
│   ├── Commands/
│   ├── Queries/
│   └── Handlers/
│
├── Http/
│   └── Controllers/
│       ├── AlunoController.php
│       ├── ProfessorController.php
│       └── TreinoController.php
│
├── Interfaces/
│   ├── ProfessorServiceInterface.php
│   └── AlunoStrategyInterface.php
│
├── Models/
│   ├── Aluno.php
│   ├── Professor.php
│   └── Treino.php
│
├── Services/
│   ├── Professor/
│   │   ├── ProfessorFactory.php
│   │   ├── ProfessorService.php
│   │   ├── ProfessorValidator.php
│   │   └── ...
│   └── Aluno/
│       ├── AlunoService.php
│       ├── AlunoNormalStrategy.php
│       ├── AlunoVipStrategy.php
│       └── AlunoStrategyInterface.php
│
└── Tests/
    └── Unit/
        ├── ProfessorServiceTest.php
        ├── AlunoServiceTest.php
        └── TreinoCQRSHandlersTest.php

🏭 Módulo Professor — Factory Method
🧠 Padrão Utilizado

O padrão Factory Method foi utilizado para centralizar a criação de serviços de professor, desacoplando a lógica de validação e persistência do controller.

📂 Estrutura
app/
└── Services/
    └── Professor/
        ├── ProfessorFactory.php
        ├── ProfessorService.php
        ├── ProfessorValidator.php
        └── ...

🧩 Funcionamento

ProfessorFactory cria a instância de ProfessorService injetando dependências como o ProfessorValidator.

ProfessorService contém as regras de negócio (criação, atualização, exclusão).

ProfessorValidator cuida das validações.

O ProfessorController apenas orquestra as chamadas, sem conter lógica de negócio.

✅ Benefícios

Desacoplamento total entre controller e lógica de negócio.

Aplicação do Princípio da Inversão de Dependência (SOLID).

Testabilidade e manutenção facilitadas.

🧠 Módulo Aluno — Strategy Pattern
🧩 Padrão Utilizado

O Strategy Pattern foi aplicado para permitir que alunos tenham comportamentos diferentes no momento do cadastro, dependendo do tipo de cliente.

AlunoNormalStrategy → comportamento padrão.

AlunoVipStrategy → adiciona uma saudação especial.

📂 Estrutura
app/
└── Services/
    └── Aluno/
        ├── AlunoStrategyInterface.php
        ├── AlunoNormalStrategy.php
        ├── AlunoVipStrategy.php
        ├── AlunoService.php

⚙️ Funcionamento

O AlunoController recebe os dados da requisição.

O AlunoService escolhe a estratégia apropriada com base no tipo_cliente.

A estratégia selecionada é executada (normal ou VIP).

Se o aluno for VIP, é adicionada uma mensagem personalizada em saudacao_vip.

💡 Exemplo
$alunoService = new AlunoService();

$aluno = $alunoService->criarAluno($dados, 'vip');
// Resultado: aluno cadastrado com campo 'saudacao_vip' preenchido

✅ Benefícios

Facilita a extensão de novos tipos de aluno sem alterar código existente (OCP – Open/Closed Principle).

Evita condicionais extensas no código.

Garante separação clara de responsabilidades (SRP – Single Responsibility Principle).

⚙️ Módulo Treino — CQRS
🧩 Padrão Utilizado

O CQRS (Command Query Responsibility Segregation) foi aplicado para separar operações de escrita e leitura no CRUD de treinos.

📂 Estrutura
app/
└── CQRS/
    ├── Commands/
    │   ├── CreateTreinoCommand.php
    │   ├── UpdateTreinoCommand.php
    │   └── DeleteTreinoCommand.php
    ├── Queries/
    │   ├── GetAllTreinosQuery.php
    │   └── GetTreinoByIdQuery.php
    └── Handlers/
        ├── CreateTreinoHandler.php
        ├── UpdateTreinoHandler.php
        ├── DeleteTreinoHandler.php
        ├── GetAllTreinosHandler.php
        └── GetTreinoByIdHandler.php

⚙️ Funcionamento

Commands → alteram o estado do sistema (create, update, delete).

Queries → apenas leem dados (getAll, getById).

Handlers → executam a lógica de cada operação.

O Controller apenas instancia o comando/consulta e chama o handler correspondente.

✅ Benefícios

Código extremamente limpo e organizado.

Separação entre leitura e escrita (evita efeitos colaterais).

Facilita escalar o sistema e aplicar caching em consultas.

Permite testes unitários isolados dos handlers.

🧩 Padrões de Projeto e Princípios Aplicados
Princípio / Padrão	Onde foi aplicado	Benefício
Factory Method	Módulo Professor	Criação controlada de serviços com injeção de dependências
Strategy	Módulo Aluno	Permite múltiplos comportamentos de criação de aluno
CQRS	Módulo Treino	Separa escrita e leitura para melhor organização e escalabilidade
Single Responsibility (SRP)	Todos os módulos	Cada classe tem apenas uma responsabilidade
Open/Closed (OCP)	Strategy e CQRS	É possível adicionar novas estratégias e handlers sem modificar o código existente
Dependency Inversion (DIP)	Factory Method	Controladores dependem de abstrações (interfaces)
Interface Segregation (ISP)	Services	Interfaces pequenas e específicas para cada caso
Liskov Substitution (LSP)	Strategy	Estratégias podem ser trocadas sem quebrar o código
🧪 Testes Unitários
Estrutura
tests/Unit/
├── ProfessorServiceTest.php
├── AlunoServiceTest.php
└── TreinoCQRSHandlersTest.php

Objetivo

Garantir que cada serviço, handler e strategy funcione de forma isolada.

Testar as regras de negócio sem necessidade de acessar o controller.

🚀 Conclusão

Este projeto demonstra como é possível organizar um sistema Laravel com arquitetura limpa e escalável, aplicando padrões de projeto clássicos e os princípios SOLID de forma prática.

Essas abordagens tornam o código:

🔹 Mais fácil de manter

🔹 Mais testável

🔹 Mais reutilizável

🔹 E preparado para crescer com o tempo
