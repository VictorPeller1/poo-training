<?php

class Teacher
{
    private string $firstname;
    private string $lastname;
    private array $topics = [];
    private ?string $school;

    public function __construct(string $firstname, string $lastname, array $topics = [], ?string $school = null)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->topics = $topics;
        $this->school = $school;
    }

    // ----------------------
    // Getters and Setters
    // ----------------------

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setSchool(string $school): void
    {
        $this->school = $school;
    }

    public function getSchool(): string
    {
        return $this->school;
    }

    public function setTopics(array $topics): void
    {
        $this->topics = $topics;
    }

    public function getTopics(): array
    {
        return $this->topics;
    }


    // ----------------------
    // Methods
    // ----------------------

    public function addTopic(string $topic): array
    {
        array_push($this->topics, $topic);
        return $this->topics;
    }

    public function deleteTopic(string $topic): array
    {
        $index = array_search($topic, $this->topics);
        if ($index !== false) {
            unset($this->topics[$index]);
        }
        return $this->topics;
    }

    public function displayTopics(): string
    {
        return implode(' ', $this->topics);
    }

    public function __toString(): string
    {
        return "Bonjour, je m'appelle {$this->firstname} {$this->lastname} et j'enseigne à l'école {$this->school} les matières suivantes : {$this->displayTopics()}.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>POO - Des professeurs</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Programmation Orientée Objet - Des professeurs</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="index.php" class="main-nav-link">Des élèves</a></li>
                    <li><a href="exo2.php" class="main-nav-link active">Des profs</a></li>
                    <li><a href="exo3.php" class="main-nav-link">On s'organise</a></li>
                    <li><a href="exo4.php" class="main-nav-link">Des écoles</a></li>
                    <li><a href="exo5.php" class="main-nav-link">Des vues</a></li>
                </ul>
            </nav>
        </header>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">
                Créer une classe permettant de créer des professeurs ayant un nom, un prénom, une liste des matières qu'il enseigne et le nom de l'école où il enseigne.
                <br>
                Définir toutes les propriétés à l'instanciation en rendant la liste des matières et le nom de lécole faculative.
                <br>
                Créer 2 professeurs différents.
            </p>
            <div class="exercice-sandbox">
                <?php

                $clement = new Teacher('Clément', 'Dupond', ['Maths', 'Français'], 'Jules Verne');

                $zora = new Teacher('Zora', 'Djebari');

                var_dump($clement, $zora);
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">
                Créer les getters et les setters permettant de gérer toutes les propriétés des professeurs.
                <br>
                Modifier les écoles des 2 professeurs.
                <br>
                Afficher les écoles des 2 professeurs.
            </p>
            <div class="exercice-sandbox">
                <?php
                $clement->setSchool('Jean Guehenno');
                $zora->setSchool('Ecole de la rue');
                echo $clement->getSchool() . '<br>';
                echo $zora->getSchool() . '<br>';
                ?>
            </div>
        </section>


        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">
                Créer les méthodes permettant d'ajouter une matière, de retirer une matière et d'afficher la liste des matières d'un prof.
                <br>
                Tester l'ajout, la suppression et l'affichage sur chacun des profs.
            </p>
            <div class="exercice-sandbox">
                <?php
                $clement->addTopic('Sport');

                var_dump($clement->displayTopics());

                var_dump($clement->deleteTopic('Maths'));

                var_dump($clement->displayTopics());
                ?>

            </div>
        </section>


        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">
                Donner la possibilité aux professeurs de se présenter en affichant la phrase suivante :<br>
                "Bonjour, je m'appelle XXX XXX et j'enseigne à l'école XXX les matières suivantes : XXX, XXX, XXX.".
                <br>
                Afficher la phrase de présentation des 2 profs.
            </p>
            <div class="exercice-sandbox">
                <?php
                echo $clement . '<br>';
                echo $zora;
                ?>
            </div>
        </section>

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2023 - DWWM</div>
</body>

</html>