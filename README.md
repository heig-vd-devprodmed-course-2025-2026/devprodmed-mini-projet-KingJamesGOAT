# HEIG VD DevProdMed Course Mini Project

Ce depot contient le mini projet a realiser dans le cadre du cours Developpement de produit media.

## Auteur
Steve Benjamin

## Objectif du projet

L'objectif de ce projet est de creer un reseau social simple en utilisant le framework Laravel. Les utilisateurs pourront s'inscrire, se connecter, creer des publications et interagir avec les autres membres.

## Pre requis

Afin de lancer ce projet, une stack compatible avec Laravel est requise.

- PHP >= 8.0
- Composer
- Node.js et npm
- Base de donnees SQLite
- Serveur web (Laravel Herd)

## Developpement local

Pour developper et tester le projet en local, voici les etapes a suivre:

1. Cloner ce depot sur votre machine locale:
   git clone https://github.com/heig-vd-devprodmed-course-2025-2026/devprodmed-mini-projet-KingJamesGOAT.git
   cd devprodmed-mini-projet-KingJamesGOAT

2. Installer les dependances avec npm et Composer:
   npm install && npm run build
   composer install

3. Copier le fichier de configuration:
   copy .env.example .env

4. Generer la cle d'application Laravel:
   php artisan key:generate

5. Creer la base de donnees et executer les migrations:
   php artisan migrate

6. Demarrer le serveur de developpement Laravel:
   composer run dev
