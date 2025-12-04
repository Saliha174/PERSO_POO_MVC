<?php

/*
    EXERCICE HÉRITAGE 2 : Personne / Employé / Manager

    Objectifs :
    - Classe parent Personne avec propriétés privées + getters/setters
    - Classe Employe qui hérite de Personne + propriétés en plus
    - Classe Manager qui hérite de Employe + propriétés en plus
    - Utiliser depuis les enfants :
        - les GETTERS du parent pour lire les propriétés privées
        - les SETTERS du parent pour les modifier
    - Un petit "script de test" à la fin
*/


/**
 * Classe parent : Personne
 */
class Personne
{
    private string $nom;
    private string $prenom;
    private int $age;

    public function __construct(string $nom, string $prenom, int $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }

    // ─────────────── GETTERS ───────────────

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    // ─────────────── SETTERS ───────────────

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setAge(int $age): void
    {
        if ($age < 0) {
            throw new \InvalidArgumentException("L'âge ne peut pas être négatif.");
        }
        $this->age = $age;
    }

    // Méthode d'affichage générique
    public function afficherIdentite(): void
    {
        echo "Personne : " . $this->getPrenom() . " " . $this->getNom() . " (" . $this->getAge() . " ans)" . "<br>";
    }
}


/**
 * Classe enfant : Employe
 * Hérite de Personne
 */
class Employe extends Personne
{
    private string $poste;
    private float $salaire; // mensuel

    public function __construct(string $nom, string $prenom, int $age, string $poste, float $salaire)
    {
        // On initialise les propriétés héritées via le constructeur du parent
        parent::__construct($nom, $prenom, $age);

        $this->poste = $poste;
        $this->salaire = $salaire;
    }

    // GETTERS / SETTERS spécifiques à Employe

    public function getPoste(): string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): void
    {
        $this->poste = $poste;
    }

    public function getSalaire(): float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): void
    {
        if ($salaire < 0) {
            throw new \InvalidArgumentException("Le salaire ne peut pas être négatif.");
        }
        $this->salaire = $salaire;
    }

    // Méthode d'affichage : on enrichit l'identité de la personne
    public function afficherInfos(): void
    {
        echo "<strong>Employé</strong><br>";
        echo "Nom : " . $this->getPrenom() . " " . $this->getNom() . "<br>";
        echo "Âge : " . $this->getAge() . " ans<br>";
        echo "Poste : " . $this->getPoste() . "<br>";
        echo "Salaire : " . $this->getSalaire() . " €<br>";
    }
}


/**
 * Classe enfant de Employe : Manager
 * Hérite donc indirectement de Personne aussi
 */
class Manager extends Employe
{
    private int $tailleEquipe; // nombre de personnes dans l'équipe

    public function __construct(
        string $nom,
        string $prenom,
        int $age,
        string $poste,
        float $salaire,
        int $tailleEquipe
    ) {
        // on appelle le constructeur d'Employe
        parent::__construct($nom, $prenom, $age, $poste, $salaire);

        $this->tailleEquipe = $tailleEquipe;
    }

    public function getTailleEquipe(): int
    {
        return $this->tailleEquipe;
    }

    public function setTailleEquipe(int $tailleEquipe): void
    {
        if ($tailleEquipe < 0) {
            throw new \InvalidArgumentException("La taille de l'équipe ne peut pas être négative.");
        }
        $this->tailleEquipe = $tailleEquipe;
    }

    /**
     * Exemple : augmentation en fonction de la taille d'équipe
     * Ici, on utilise :
     *  - getSalaire() et setSalaire() (venant d'Employe)
     *  - getNom(), getPrenom() (venant de Personne)
     */
    public function appliquerPrimeManager(): void
    {
        // On lit le salaire actuel (propriété privée d'Employe) via le getter
        $salaireActuel = $this->getSalaire();

        // Bonus = 100€ par personne dans l'équipe
        $prime = $this->getTailleEquipe() * 100;

        // On écrit le nouveau salaire via le setter (toujours propriété privée)
        $this->setSalaire($salaireActuel + $prime);
    }

    // On surcharge l'affichage pour ajouter des infos
    public function afficherInfos(): void
    {
        echo "<strong>Manager</strong><br>";
        echo "Nom : " . $this->getPrenom() . " " . $this->getNom() . "<br>";
        echo "Âge : " . $this->getAge() . " ans<br>";
        echo "Poste : " . $this->getPoste() . "<br>";
        echo "Salaire : " . $this->getSalaire() . " €<br>";
        echo "Taille de l'équipe : " . $this->getTailleEquipe() . " personnes<br>";
    }
}


/* ─────────────────────────────────────────────
   ZONE DE TEST
────────────────────────────────────────────── */

echo "<h2>Test de la classe Personne</h2>";

$personne = new Personne("Dupont", "Marie", 30);
$personne->afficherIdentite();

echo "<br>→ On modifie l'âge via le setter<br>";
$personne->setAge(31);
$personne->afficherIdentite();

echo "<hr>";


echo "<h2>Test de la classe Employe</h2>";

$employe = new Employe("Durand", "Alex", 28, "Développeur PHP", 2500);
$employe->afficherInfos();

echo "<br>→ On change le poste et le salaire via les setters<br>";
$employe->setPoste("Développeur Senior");
$employe->setSalaire(3200);
$employe->afficherInfos();

echo "<hr>";


echo "<h2>Test de la classe Manager</h2>";

$manager = new Manager("Ben", "Salia", 35, "Lead Dev", 4000, 5);
$manager->afficherInfos();

echo "<br>→ On applique la prime de manager (100€ par personne de l'équipe)<br>";
$manager->appliquerPrimeManager();
$manager->afficherInfos();

echo "<br>→ On change le nom du manager via un SETTER du parent Personne<br>";
$manager->setNom("SB");
$manager->afficherInfos();
