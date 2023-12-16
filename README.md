
<div>
  <a href="https://imgbox.com/JXSrDY5w" target="_blank"><img src="https://thumbs2.imgbox.com/d4/6c/JXSrDY5w_t.jpg" alt="image host"/></a>
</div>

---

Construção de sistema web como parte do teste técnico para a vaga de Desenvolvedor Back-end PHP.

---

#### Requisitos:
* Docker
* Git
* Apache
* MySQL
* PhpMyAdmin
* JavaScript

---

### Screenshots


<div align="center">
  <a href="https://imgbox.com/dol9G70T" target="_blank"><img src="https://thumbs2.imgbox.com/4a/a0/dol9G70T_t.jpg" alt="image host"/></a>
  <a href="https://imgbox.com/wQyIU82j" target="_blank"><img src="https://thumbs2.imgbox.com/83/a6/wQyIU82j_t.jpg" alt="image host"/></a>
  <a href="https://imgbox.com/Qi3W8afq" target="_blank"><img src="https://thumbs2.imgbox.com/f0/19/Qi3W8afq_t.jpg" alt="image host"/></a>
</div>



#### Configuração e execução do projeto
* Clonar o repositório atual para sua máquina local:

    `git clone https://github.com/cebpereira/teste-lif-php`

* Navegar para a pasta do projeto:

    `cd teste-lif-php`

* Executar o comando abaixo no terminal:

    `docker compose up -d`

* Aguarde a execução do comando terminar, em caso de sucesso, os containers estarão ativos e o projeto estará rodando via localhost nas seguintes portas:
    * 8080 -> PhpMyAdmin
    * 3306 -> MySQL
    * 80 -> Apache

* Configure o arquivo 'db_config.php' com seus dados de conexão com o banco, exemplo:

    ` $host = "mysql_db";
      $user = "root";
      $password = "root";
      $db = "mysql-db";`


* Utilizando o phpMyAdmin, crie as tabelas necessárias:

    `CREATE TABLE Setores (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nome VARCHAR(255) NOT NULL
    );`

    `CREATE TABLE Cargos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        setorId INT,
        FOREIGN KEY (setorId) REFERENCES Setores(id)
    );`

    `CREATE TABLE Trabalhadores (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        cargoId INT,
        turno VARCHAR(50) NOT NULL,
        FOREIGN KEY (cargoId) REFERENCES Cargos(id)
    );`
 
* A rota inicial do projeto é a localhost

---
 
> [!NOTE]
> Em caso de sugestões, correções ou dúvidas:
> [LinkedIn](https://www.linkedin.com/in/cebpereira/),
> [Instagram](https://www.instagram.com/c_elandro/)
> ou pelo email c.elandro.bp@gmail.com
