<?php

/*
    EXERCICE COMPLET SUR L'HÉRITAGE, GETTERS, SETTERS

    - Classe parent : CompteBancaire
        - propriétés privées : titulaire, solde
        - getters / setters
        - méthode afficherInfos()

    - Classe enfant : CompteEpargne (hérite de CompteBancaire)
        - propriété privée : tauxInteret
        - utilise les GETTERS du parent pour lire les propriétés privées
        - utilise les SETTERS du parent pour modifier les propriétés privées
        - méthode appliquerInterets()

    - En bas du fichier : quelques tests
*/


/**
 * Classe parent
 */
class CompteBancaire
{
    // Propriétés privées (NON accessibles directement dans l'enfant)
    private string $titulaire;
    private float $solde;

    public function __construct(string $titulaire, float $soldeInitial)
    {
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;
    }

    // ─────────────── GETTERS (lecture) ───────────────

    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    // ─────────────── SETTERS (modification) ───────────────

    public function setTitulaire(string $titulaire): void
    {
        $this->titulaire = $titulaire;
    }

    public function setSolde(float $nouveauSolde): void
    {
        // Ici, on peut mettre une petite validation
        if ($nouveauSolde < 0) {
            throw new \InvalidArgumentException("Le solde ne peut pas être négatif.");
        }

        $this->solde = $nouveauSolde;
    }

    // Méthodes "métier" de base

    public function deposer(float $montant): void
    {
        if ($montant <= 0) {
            throw new \InvalidArgumentException("Le montant du dépôt doit être positif.");
        }

        // On utilise le setter pour modifier le solde
        $this->setSolde($this->getSolde() + $montant);
    }

    public function retirer(float $montant): void
    {
        if ($montant <= 0) {
            throw new \InvalidArgumentException("Le montant du retrait doit être positif.");
        }

        $nouveauSolde = $this->getSolde() - $montant;

        if ($nouveauSolde < 0) {
            throw new \RuntimeException("Solde insuffisant.");
        }

        $this->setSolde($nouveauSolde);
    }

    public function afficherInfos(): void
    {
        echo "Titulaire : " . $this->getTitulaire() . "<br>";
        echo "Solde : " . $this->getSolde() . " €<br>";
    }
}


/**
 * Classe enfant qui HÉRITE de CompteBancaire
 */
class CompteEpargne extends CompteBancaire
{
    // Propriété privée spécifique à l'enfant
    private float $tauxInteret; // ex : 0.02 = 2 %

    public function __construct(string $titulaire, float $soldeInitial, float $tauxInteret)
    {
        // On appelle le constructeur du parent
        parent::__construct($titulaire, $soldeInitial);

        $this->tauxInteret = $tauxInteret;
    }

    // GETTER / SETTER du taux d'intérêt

    public function getTauxInteret(): float
    {
        return $this->tauxInteret;
    }

    public function setTauxInteret(float $tauxInteret): void
    {
        if ($tauxInteret < 0) {
            throw new \InvalidArgumentException("Le taux d'intérêt ne peut pas être négatif.");
        }

        $this->tauxInteret = $tauxInteret;
    }

    /**
     * Méthode spécifique à l'enfant :
     * applique les intérêts sur le solde.
     *
     * Ici, ON UTILISE :
     *  - getSolde() du parent → pour LIRE le solde (propriété privée dans le parent)
     *  - setSolde() du parent → pour MODIFIER le solde (toujours propriété privée dans le parent)
     */
    public function appliquerInterets(): void
    {
        // Lecture du solde du parent via GETTER
        $soldeActuel = $this->getSolde();

        // Calcul des intérêts
        $interets = $soldeActuel * $this->getTauxInteret();

        // Nouveau solde = solde + intérêts
        $nouveauSolde = $soldeActuel + $interets;

        // Écriture dans la propriété privée du parent via SETTER
        $this->setSolde($nouveauSolde);
    }

    /**
     * On peut aussi surcharger la méthode d'affichage pour ajouter le taux
     */
    public function afficherInfos(): void
    {
        // On récupère les infos du parent via getter
        echo "<strong>Compte Épargne</strong><br>";
        echo "Titulaire : " . $this->getTitulaire() . "<br>";
        echo "Solde : " . $this->getSolde() . " €<br>";
        echo "Taux d'intérêt : " . ($this->getTauxInteret() * 100) . " %<br>";
    }
}


/* ─────────────────────────────────────────────
   ZONE DE TEST (EXERCICE)
   Tu peux exécuter le fichier dans le navigateur
   ou en ligne de commande : php exercice_heritage.php
────────────────────────────────────────────── */

echo "<h2>Test du CompteBancaire (classe parent)</h2>";

$compte = new CompteBancaire("Salia", 1000);
$compte->afficherInfos();

echo "<br>→ Dépôt de 200 €<br>";
$compte->deposer(200);
$compte->afficherInfos();

echo "<br>→ Retrait de 150 €<br>";
$compte->retirer(150);
$compte->afficherInfos();


echo "<hr>";

echo "<h2>Test du CompteEpargne (classe enfant)</h2>";

// Création d'un compte épargne
$epargne = new CompteEpargne("Salia", 1000, 0.05); // 5 % d'intérêt
$epargne->afficherInfos();

echo "<br>→ Application des intérêts<br>";
$epargne->appliquerInterets();
$epargne->afficherInfos();

echo "<br>→ Modification du titulaire via le SETTER (hérité du parent)<br>";
$epargne->setTitulaire("S. BEN"); // setter du parent utilisé sur l'enfant
$epargne->afficherInfos();
