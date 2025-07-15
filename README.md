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

## Optimisations

Ce projet a été optimisé pour réduire sa taille :

### 🚀 CDN utilisés
- **FontAwesome** : Chargé via CDN au lieu des fichiers locaux (15M économisés)
- **jQuery** : Version CDN avec fallback local
- **Bootstrap** : Version CDN avec fallback local
- **Swiper** : Version CDN avec fallback local

### 📦 Fichiers exclus du repository
- `fontawesome/` (15M) - remplacé par CDN
- Scripts JS majeurs - remplacés par CDN
- `img/favicon.zip` - fichier de sauvegarde inutile

### 🛠️ Script d'optimisation
Lancez `./optimize_images.sh` pour compresser les images et réduire davantage la taille.

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
