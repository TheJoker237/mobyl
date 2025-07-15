#!/bin/bash

# Script d'optimisation des images pour réduire la taille du projet
# Nécessite imagemagick: sudo apt install imagemagick

echo "🔧 Optimisation des images en cours..."

# Fonction pour optimiser les images
optimize_images() {
    local dir=$1
    local quality=$2
    
    if [ -d "$dir" ]; then
        echo "📁 Optimisation du dossier: $dir"
        find "$dir" -name "*.jpg" -o -name "*.jpeg" -o -name "*.png" | while read -r file; do
            echo "🖼️  Optimisation: $file"
            # Sauvegarde originale
            cp "$file" "$file.original"
            # Optimisation
            convert "$file" -quality $quality -strip "$file"
        done
    fi
}

# Optimisation par dossier avec différents niveaux de qualité
optimize_images "img/bg" 75
optimize_images "img/slider" 80
optimize_images "img/gallery" 85
optimize_images "img/blog" 80
optimize_images "img/team" 85
optimize_images "img/service" 80

echo "✅ Optimisation terminée!"
echo "💡 Les fichiers originaux sont sauvegardés avec l'extension .original"

# Afficher la différence de taille
echo "📊 Nouvelle taille du projet:"
du -sh .
