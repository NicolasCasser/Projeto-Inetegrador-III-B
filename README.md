# Sistema Escolar - Gerenciamento de Alunos e Professores

Esse Sistema Escolar é uma aplicação web desenvolvida como parte da disciplina de **Projeto Integrador III-B** para gerenciar o cadastro e a listagem de alunos e professores. O projeto foca na aplicação prática dos conceitos de Programação Orientada a Objetos (POO) utilizando PHP, HTML e CSS.

## Tecnologias Utilizadas

*   **PHP:** 
*   **HTML:** 
*   **CSS:** 

## Estrutura do Projeto

O projeto é estruturado em classes PHP para a lógica de negócios e arquivos HTML/CSS para a interface gráfica.

### Classes PHP 

*   **`Pessoa`:**
    *   Representa uma abstração genérica de uma pessoa no sistema.
    *   **Atributos:** `protected $nome;`, `protected $cpf;` (encapsulamento).
    *   **Construtor:** `__construct($nome, $cpf)` (garante consistência na inicialização).
    *   **Métodos Acessores:** `getNome()`, `getCpf()`.
    *   **Método Abstrato:** `abstract public function perfil();` (demonstra polimorfismo, a ser implementado pelas subclasses).

*   **`Aluno`:**
    *   Representa os alunos cadastrados no sistema.
    *   **Atributos Adicionais:** `private $matricula;`, `private $turma;`.
    *   **Construtor:** Chama `parent::__construct()` para herdar dados comuns.
    *   **Métodos Acessores:** `getMatricula()`, `getTurma()`.
    *   **Implementação de `perfil()`:** Retorna uma descrição completa do aluno.

*   **`Professor`:**
    *   Representa os professores da escola.
    *   **Atributo Adicional:** `private $disciplina;`.
    *   **Construtor:** Chama `parent::__construct()` para inicializar dados da superclasse.
    *   **Método Acessor:** `getDisciplina()`.
    *   **Implementação de `perfil()`:** Retorna as informações completas do professor.

### Interface Gráfica (HTML e CSS)

*   **`index.php` (Página Inicial):**
    *   Apresenta quatro opções: cadastrar aluno, cadastrar professor, listar alunos, listar professores.
    *   Navegação intuitiva com ícones e links.
    *   Layout centralizado utilizando Flexbox.

*   **`cadastrar_aluno.php` e `cadastrar_professor.php` (Formulários de Cadastro):**
    *   Padrão visual e estrutural consistente.
    *   Campos de entrada com rótulos claros e preenchimento obrigatório (`required`).
    *   Mensagens de feedback visual (sucesso/erro).

*   **`listar_alunos.php` e `listar_professores.php` (Tabelas de Listagem):**
    *   Exibem os dados dos objetos armazenados na sessão em tabelas HTML.
    *   Estilização para boa legibilidade.
    *   Botão "Voltar ao início" para facilitar a navegação.

### Integração de classes e interface 

*   **Recebimento e Validação de Dados:**
    *   Os dados dos formulários são recebidos via `$_POST`.
    *   Validação para evitar duplicidade de CPF e matrícula (para alunos) antes da criação do objeto.

*   **Criação e Armazenamento de Objetos:**
    *   Se os dados são válidos, um novo objeto (`Aluno` ou `Professor`) é instanciado.
    *   Os objetos criados são armazenados no array `$_SESSION['alunos']` ou `$_SESSION['professores']`.

*   **Exibição de Dados:**
    *   As páginas de listagem (`listar_alunos.php`, `listar_professores.php`) percorrem os arrays na `$_SESSION`.
    *   Os atributos dos objetos são acessados por meio de métodos `get` (respeitando o encapsulamento) e exibidos em tabelas HTML.
