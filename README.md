# 🚀 Desafio 1: Verificador de Maioridade 🆔

> **Curso:** Desenvolvimento de Sistemas  
> **Turma:** 1IDDS  
> **Aluno:** Gustavo Cruz  
> **Linguagem:** PHP  

---

## 📌 Sobre o Projeto

Este projeto consiste em uma aplicação web desenvolvida em **PHP** em página única (*single-page script*). O objetivo principal é verificar a maioridade de um usuário com base no seu ano de nascimento, exibindo mensagens personalizadas de acesso e realizando o registro de logs para usuários pagantes/autorizados.

---

## 🎯 Funcionalidades

- [x] **Formulário de Entrada:** Campos para preenchimento de **Nome** e **Ano de Nascimento**.
- [x] **Cálculo Dinâmico de Idade:** Processamento automático da idade do usuário no backend.
- [x] **Validação de Maioridade:**
  - 🟢 **Maior ou igual a 18 anos:** Exibe *"Acesso permitido, [Nome]!"*
  - 🔴 **Menor de 18 anos:** Exibe *"Acesso negado, [Nome]!"*
- [x] **Sistema de Log (`log_acessos.txt`):** Gravação automática do nome e idade dos usuários que obtiverem acesso permitido.

---

## 🛠️ Tecnologias Utilizadas

* **PHP** (Processamento do formulário e manipulação de arquivos)
* **HTML5** (Estruturação do formulário)
* **CSS3** (Estilização da interface)

---

## 📁 Estrutura de Arquivos

```text
├── index.php          # Código principal (Formulário + Lógica PHP)
└── log_acessos.txt    # Arquivo gerado com os logs de acesso permitido
```

---

## 💻 Exemplo de Código (Lógica Principal)

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $anoNascimento = intval($_POST['ano_nascimento']);
    $anoAtual = date("Y");
    $idade = $anoAtual - $anoNascimento;

    if ($idade >= 18) {
        echo "<p class='sucesso'>Acesso permitido, {$nome}!</p>";
        
        // Salva o log de acesso
        $log = "Nome: {$nome} | Idade: {$idade} anos | Data: " . date("d/m/Y H:i:s") . "
";
        file_put_contents("log_acessos.txt", $log, FILE_APPEND);
    } else {
        echo "<p class='erro'>Acesso negado, {$nome}!</p>";
    }
}
?>
```

---

## 🚀 Como Executar o Projeto

1. Certifique-se de ter um servidor local instalado (ex: **XAMPP**, **WAMP** ou servidor embutido do PHP).
2. Clone ou coloque os arquivos na pasta do servidor web (ex: `htdocs`).
3. Abra o terminal na pasta do projeto e inicie o servidor PHP embutido (caso não use XAMPP):
   ```bash
   php -S localhost:8000
   ```
---

<div align="center">
  <sub>Desenvolvido por <b>Gustavo Cruz</b> (1IDDS)</sub>
</div>
