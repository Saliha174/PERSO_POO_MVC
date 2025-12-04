<?php 

/*
Dans une architecture MVC, quel composant interagit directement avec la base de données ?

a) La Vue
b) Le Contrôleur
c) Le Modèle
d) Le Routeur
Reponse C :Le Model contient les requêtes SQL et gère les données.


Le rôle principal de la Vue dans le modèle MVC est :

a) Gérer les requêtes de l'utilisateur
b) Appliquer la logique métier
c) Afficher les données et interagir avec l'utilisateur
d) Modifier les données dans la base de données
Reponse C: Afficher les données et interagir avec l'utilisateur
 La Vue = affichage HTML, pas de logique métier.

Quel est un des principaux avantages de la séparation entre la Vue et le Modèle ?

a) Réduction du nombre de fichiers dans le projet
b) Amélioration de la sécurité de la base de données
c) Réutilisabilité de la logique métier et testabilité plus facile
d) Moins de validation de données

✔ c) Réutilisabilité de la logique métier et testabilité plus facile
➡ Le code métier reste indépendant de l’interface.

Dans MVC, le Modèle doit principalement :

a) Recevoir et traiter les requêtes utilisateur
b) Gérer l'affichage des données
c) Stocker et manipuler les données
d) Interagir avec l'interface utilisateur

✔ c) Stocker et manipuler les données
➡ Le Model gère les données, les CRUD, la logique métier.

Comment le Contrôleur obtient-il les données nécessaires à l'affichage d'une Vue ?

a) Il les récupère directement depuis la Vue
b) Il les demande au Modèle
c) Il les stocke dans des variables globales
d) Il interroge directement l'utilisateur

✔ b) Il les demande au Modèle
➡ Le Controller fait le lien entre Model et View.

Dans MVC, le Contrôleur fait souvent appel à :

a) La Vue uniquement
b) Le Modèle uniquement
c) Le Modèle et la Vue
d) La base de données uniquement

✔ c) Le Modèle et la Vue
➡ Controller = chef d’orchestre → il demande au Model, puis envoie à la View.

Dans le modèle MVC, le Modèle retourne généralement des données sous quelle forme au Contrôleur ?

a) HTML
b) JSON
c) Tableau ou objet
d) Requête SQL

✔ c) Tableau ou objet
➡ Les données ne sont pas du HTML, mais des objets/arrays.


Quelle est l'une des responsabilités du Contrôleur ?

a) Gérer les requêtes HTTP entrantes
b) Valider la logique métier
c) Stocker les données
d) Gérer l'affichage des données

✅ 8) Une responsabilité du Contrôleur :

✔ a) Gérer les requêtes HTTP entrantes
➡ Le Controller reçoit GET, POST, etc.

Lorsqu'une nouvelle fonctionnalité doit être ajoutée à une application MVC, laquelle des parties est le plus souvent modifiée ?

a) Le Modèle
b) La Vue
c) Le Contrôleur
d) Le Routeur

✔ c) Le Contrôleur
➡ C’est lui qui reçoit les nouveaux comportements et actions.

Quel est l'impact du modèle MVC sur les tests unitaires ?

a) Il complique les tests unitaires
b) Il facilite la séparation des composants testables
c) Il rend impossible le test des Vues
d) Il empêche le test des modèles

✔ b) Il facilite la séparation des composants testables
➡ Chaque couche est indépendante → tests plus simples.

Dans une application MVC, quel composant doit contenir la logique métier la plus complexe ?

a) Le Modèle
b) Le Contrôleur
c) La Vue
d) La Base de données

✔ a) Le Modèle
➡ Le Controller ne doit pas contenir la logique métier.

Quelle est une bonne pratique pour gérer les dépendances entre Modèle, Vue et Contrôleur dans une architecture MVC ?

a) Les composants doivent être couplés étroitement
b) Les dépendances doivent être injectées via des paramètres ou des services
c) Le Modèle doit dépendre de la Vue
d) Le Contrôleur doit avoir accès direct à la base de données

✔ b) Les dépendances doivent être injectées via des paramètres ou des services
➡ Ex : injecter un Model dans un Controller proprement.

Dans un environnement web, qu'est-ce qui se passe généralement après qu'une requête utilisateur a été traitée par le Contrôleur ?

a) Le Contrôleur envoie une requête à la base de données
b) Le Contrôleur met à jour la base de données
c) Le Contrôleur transmet les données à la Vue pour l'affichage
d) Le Contrôleur appelle un autre contrôleur pour traiter la suite

✔ c) Le Contrôleur transmet les données à la Vue pour l'affichage
➡ C’est la suite logique du flux MVC.

Quel est un risque potentiel si le Contrôleur commence à inclure de la logique métier directement ?

a) La base de données pourrait être corrompue
b) La Vue pourrait ne plus fonctionner correctement
c) Le code devient plus difficile à maintenir et à tester
d) Le Modèle devient obsolète

✔ c) Le code devient plus difficile à maintenir et à tester
➡ Couplage → chaos → impossible à tester.


Dans une architecture MVC bien conçue, comment les données passent-elles du Modèle à la Vue ?

a) Directement via un appel de méthode dans la Vue
b) En passant par le Contrôleur
c) Par des variables globales
d) Via un fichier de configuration

✔ b) En passant par le Contrôleur
➡ Model → Controller → View
➡ La Vue n’appelle JAMAIS le Model directement.
*/