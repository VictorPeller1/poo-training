<?php

class Student
{
    private string $firstname;
    private string $lastname;
    private DateTime $birthdate;
    private string $grade;
    private string $schoolName;

    public function __construct(string $firstname, string $lastname, DateTime $birthdate, string $grade)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->grade = $grade;
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

    public function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }

    public function setGrade(string $grade): void
    {
        $this->grade = $grade;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function getSchoolName(): string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): void
    {
        $this->schoolName = $schoolName;
    }


    // ----------------------
    // Methods
    // ----------------------
    

    public function __toString(): string
    {
        return 'Bonjour, je m\'appelle ' . $this->firstname . ' ' . $this->lastname . ', j\'ai ' . $this->getAge() . ' ans et je vais à l\'école ' . $this->schoolName . ' en class de ' . $this->grade . '.';
    }

    public function getAge(): int
    {
        return $this->birthdate->diff(new DateTime)->y;
        // return $this->birthdate->diff(new DateTime)->format('%y');
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
    <title>POO - Des élèves</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Programmation Orientée Objet - Des élèves</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="index.php" class="main-nav-link active">Des élèves</a></li>
                    <li><a href="exo2.php" class="main-nav-link">Des profs</a></li>
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
                Créer une classe permettant de créer des élèves ayant un nom, un prénom, un age et un niveau scolaire.
                <br>
                Définir toutes les propriétés à l'instanciation.
                <br>
                Créer 2 étudiants différents.
            </p>
            <div class="exercice-sandbox">
                <?php
                $michel = new Student('Michel', 'Samba', new DateTime('2000-11-22'), '6ème');

                var_dump($michel);

                $maurice = new Student('Maurice', 'Poisson', new DateTime('1998-11-28'), '2nde');
                var_dump($maurice);

                ?>
            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">
                Créer les getters et les setters permettant de manipuler toutes les propriétés des élèves.
                <br>
                Modifier le niveau scolaire des 2 élèves et les afficher.
            </p>
            <div class="exercice-sandbox">
                <?php
                $michel->setGrade('3ème');
                $maurice->setGrade('CP');
                echo $michel->getFirstname() . ' : ' . $michel->getGrade() . '<br>';
                echo $maurice->getFirstname() . ' : ' . $maurice->getGrade() . '<br>';
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">
                Remplacer la propriété d'âge par la date de naissance de l'élève.
                <br>
                Mettez à jour l'instanciation des 2 élèves et afficher leur date de naissance.
            </p>
            <div class="exercice-sandbox">
                <?php
                echo $maurice->getBirthdate()->format('Y-m-d') . '<br>';
                echo $michel->getBirthdate()->format('Y-m-d');
                ?>
            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">
                Donner la possibilité aux élèves de donner leur âge.
                <br>
                Afficher l'âge des 2 élèves.
            </p>
            <div class="exercice-sandbox">
                <?php
                echo $michel->getFirstname() . ' : ' . $michel->getAge() . ' ans<br>';
                echo $maurice->getFirstname() . ' : ' . $maurice->getAge() . ' ans<br>';
                ?>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">
                On veut aussi savoir le nom de l'école où va un élève.
                <br>
                Ajouter la propriété et ajouter la donnée sur les élèves.
            </p>
            <div class="exercice-sandbox">
                <?php

                $michel->setSchoolName('Michel Drucker');
                $maurice->setSchoolName('Guillaume Belleuvre');

                var_dump($michel, $maurice);

                ?>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">
                Donner la possibilité aux élèves de se présenter en affichant la phrase suivante :<br>
                "Bonjour, je m'appelle XXX XXX, j'ai XX ans et je vais à l'école XXX en classe de XXX.".
                <br>
                Afficher la phrase de présentation des 2 élèves.
            </p>
            <div class="exercice-sandbox">
                <?php
                echo $michel . '<br>';
                echo $maurice;

                ?>
            </div>
        </section>

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2023 - DWWM</div>
</body>

</html>