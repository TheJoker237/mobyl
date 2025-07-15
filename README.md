# Mobyl - Site Web d'Entreprise

## Description
Site web d'entreprise développé en PHP avec architecture MVC simple.

## Structure du Projet
```
├── index.php           # Point d'entrée principal
├── db.php             # Configuration base de données
├── fonctions.php      # Fonctions utilitaires
├── models/            # Modèles de données
├── views/             # Vues/Templates
├── css/              # Feuilles de style
├── js/               # Scripts JavaScript
├── img/              # Images et ressources
└── fontawesome/      # Icônes FontAwesome
```

## Installation

1. Cloner le repository
```bash
git clone https://github.com/[votre-username]/mobyl.git
```

2. Configurer la base de données
   - Copier `db.php.example` vers `db.php`
   - Modifier les paramètres de connexion

3. Démarrer un serveur local
```bash
php -S localhost:8000
```

## Pages Disponibles
- Accueil (`?page=home`)
- À propos (`?page=about`)
- Services (`?page=services`)
- Contact (`?page=contact`)
- Et bien d'autres...

## Technologies Utilisées
- PHP
- HTML/CSS
- JavaScript
- Bootstrap
- FontAwesome
- jQuery

## Licence
Tous droits réservés.
