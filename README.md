# Dragon Dream Prod — Site Laravel Bootstrap

Bienvenue dans le dépôt du site web de l'association **Dragon Dream Production**.

## 🚀 Fonctionnalités principales

### 🎨 Interface
- Design responsive en **Bootstrap 5**
- Barre de navigation translucide qui devient noire au survol
- Footer interactif avec copyright, contact, et bouton "haut de page"

### 📝 Formulaire d'inscription
- Organisation verticale, moderne et responsive
- Champs : nom, prénom, email, téléphone (avec indicatif), ville, code postal, pays
- ✅ Validation :
  - HTML5 (`pattern`, `required`)
  - Bootstrap (`is-invalid`, `invalid-feedback`)
  - Laravel serveur (`@error`, `old()`)
- 🧠 Auto-complétion intelligente :
  - Ville/code postal/pays liés (France, Belgique, Suisse, Luxembourg)
- 🔐 Sécurité des entrées et format contrôlé

### 📁 Stockage des inscriptions
- Sauvegarde en base de données pendant 1 mois
- Génération d'un fichier Excel chaque semaine (à venir)
- Purge automatique des anciens enregistrements (via Scheduler à venir)

## 🛠️ Technologies
- Laravel 11 (PHP)
- Bootstrap 5 (Frontend)
- Blade (moteur de templates)
- JavaScript natif (validation dynamique)

## 📦 Installation locale
```bash
# Cloner le projet
git clone git@github.com:Ginuis/dragon_dream_prod_site.git
cd dragon_dream_prod_site

# Installer les dépendances
composer install
npm install && npm run dev

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Configurer la base de données
php artisan migrate

# Lancer le serveur
php artisan serve
```

## 📌 Prochaines étapes
- Espace admin (authentification, export Excel, suppression manuelle...)
- Galerie photo/vidéo (YouTube intégrée)
- Mise en ligne (hébergement Laravel/Apache ou Forge)

---

© 2025 — Dragon Dream Production