# CUMC-CO — Centre d'Urgence Médico-Chirurgical Clotilde Okinda

Application web de la clinique CUMC-CO : site vitrine public + espace d'administration pour la gestion des médecins, des demandes de rendez-vous et des actualités.

---

## Sommaire

- [Présentation](#présentation)
- [Technologies](#technologies)
- [Prérequis](#prérequis)
- [Installation en local](#installation-en-local)
- [Architecture du projet](#architecture-du-projet)
- [Fonctionnalités](#fonctionnalités)
- [Rôles et comptes](#rôles-et-comptes)
- [Déploiement](#déploiement)
- [Points d'attention / évolutions possibles](#points-dattention--évolutions-possibles)

---

## Présentation

Le site se compose de deux parties :

- **Le site public** : présentation de la clinique, informations patients, actualités, et un formulaire de prise de rendez-vous en ligne.
- **L'espace d'administration** (accès authentifié) : gestion des médecins, traitement des demandes de rendez-vous, et publication d'actualités.

Les données saisies dans l'administration (médecins, actualités) alimentent directement le site public : il n'y a qu'une seule source de vérité (la base de données).

---

## Technologies

- **Laravel 13** (framework PHP)
- **PHP 8.3+**
- **Blade** (moteur de templates)
- **Tailwind CSS v4** (styles, via `@theme`)
- **Alpine.js** (interactions légères côté navigateur)
- **Laravel Breeze** (authentification)
- **Base de données** : MySQL en production, SQLite en local
- **Vite** (compilation des assets CSS/JS)

---

## Prérequis

- PHP 8.3 ou supérieur
- Composer
- Node.js 18+ et npm
- Une base de données (SQLite suffit en local, MySQL en production)

---

## Installation en local

```bash
# 1. Cloner le dépôt
git clone git@github.com:dhermin002-tech/cumcco_ga.git
cd cumcco_ga

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances front + compiler les assets
npm install
npm run build      # ou "npm run dev" pour le développement avec rechargement auto

# 4. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 5. Base de données (SQLite en local — le plus simple)
#    Dans le fichier .env, mettre :
#    DB_CONNECTION=sqlite
#    (et commenter/supprimer les autres lignes DB_*)
touch database/database.sqlite

# 6. Créer les tables
php artisan migrate

# 7. Créer le lien de stockage (pour les images uploadées)
php artisan storage:link

# 8. Lancer le serveur de développement
php artisan serve
```

Le site est alors accessible sur `http://127.0.0.1:8000`.

### Créer un premier compte administrateur (en local)

```bash
php artisan tinker
```

```php
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@test.com',
    'password' => bcrypt('motdepasse123'),
    'role' => 'admin',
]);
```

---

## Architecture du projet

Organisation des dossiers principaux (structure Laravel standard) :

```
app/
  Http/Controllers/
    MedecinController.php      → CRUD médecins + filtres
    RendezVousController.php   → réception RDV + gestion des statuts
    ActualiteController.php    → CRUD actualités (admin) + page article (public)
  Models/
    User.php                  → utilisateurs (avec colonne "role")
    Medecin.php
    RendezVous.php
    Actualite.php             → contient imageUrl() (gère URL externe ou fichier uploadé)
  Mail/
    RendezVousAccepte.php     → mail de confirmation envoyé au patient

resources/views/
  pages/                      → pages publiques (accueil, actualités, article, infos)
  components/booking.blade.php → formulaire de prise de rendez-vous
  admin/
    medecins/                 → vues CRUD médecins
    rendezvous/               → liste et gestion des RDV
    actualites/               → vues CRUD actualités
  emails/                     → gabarits des e-mails
  layouts/navigation.blade.php → barre de navigation de l'admin

routes/web.php                → toutes les routes (publiques + admin)
database/migrations/          → structure des tables
```

### Points d'architecture notables

- **Rôles utilisateurs** : chaque utilisateur a une colonne `role` (`admin` ou `accueil`). Les actions sensibles (suppression de médecin, gestion des actualités) sont réservées à l'`admin` via `abort_unless(auth()->user()->role === 'admin', 403)`.
- **Formulaire public dynamique** : la liste des médecins et des spécialités du formulaire de RDV est générée depuis la base (médecins actifs uniquement). Le choix d'une spécialité filtre dynamiquement les médecins proposés (Alpine.js).
- **Statuts des rendez-vous** : chaque demande a un statut (`en_attente`, `accepte`, `refuse`, `annule`). L'acceptation déclenche l'envoi d'un e-mail de confirmation au patient.
- **Règle des 72h** : une demande de RDV doit être faite au moins 3 jours à l'avance, sauf pour les urgences (contrôle côté navigateur ET côté serveur).
- **Images des actualités** : possibilité d'uploader un fichier (stocké dans `storage/app/public/actualites`) ou d'utiliser une URL externe. La méthode `imageUrl()` du modèle `Actualite` gère les deux cas de façon transparente.

---

## Fonctionnalités

### Site public
- Page d'accueil avec présentation et formulaire de prise de rendez-vous
- Formulaire RDV : filtrage des médecins par spécialité, règle des 72h (hors urgence)
- Page actualités (liste) + page article dédiée pour chaque actualité
- Page informations patients

### Espace d'administration
- **Médecins** : ajouter, modifier, suspendre/réactiver, supprimer + filtres (statut, spécialité, recherche par nom)
- **Rendez-vous** : consulter les demandes, les accepter / refuser / annuler (avec e-mail de confirmation au patient à l'acceptation), pagination
- **Actualités** : créer, modifier, supprimer des articles (avec upload d'image)

---

## Rôles et comptes

Deux rôles existent :

| Rôle | Droits |
|------|--------|
| **admin** | Accès complet : médecins (dont suppression), rendez-vous, actualités |
| **accueil** | Médecins (sauf suppression), rendez-vous. **Pas** d'accès aux actualités |

### Comptes de développement (local uniquement)

> ⚠️ Ces comptes sont des comptes de test pour le développement local.
> **Ils ne doivent pas être utilisés en production** : créer de vrais comptes avec des mots de passe forts lors du déploiement.

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| admin | admin@test.com | motdepasse123 |
| accueil | accueil@test.com | motdepasse123 |

> Note : l'inscription publique (`/register`) est **désactivée** pour des raisons de sécurité (il s'agit d'un back-office : le public ne doit pas pouvoir créer de compte). Les comptes du personnel se créent manuellement via `tinker` (voir l'exemple ci-dessus). Il n'existe pas d'interface de gestion des utilisateurs dans l'application : c'est une évolution possible.

---

## Déploiement

La procédure complète de mise en production (serveur, clé de déploiement, base MySQL, configuration, migrations, etc.) est décrite dans un document dédié :

➡️ **Voir [DEPLOYMENT.md](DEPLOYMENT.md)**

En résumé, le déploiement consiste à : récupérer le code (`git pull`), installer les dépendances (`composer install`, `npm run build`), configurer le `.env` de production (base MySQL), lancer les migrations, créer le lien de stockage, créer un compte administrateur et optimiser les caches.

---

## Points d'attention / évolutions possibles

- **E-mails à l'équipe** : l'envoi d'un e-mail au service / au médecin concerné lors d'une nouvelle demande de RDV est prévu mais nécessite les adresses e-mail correspondantes (à ajouter, éventuellement via une colonne `email` sur les médecins).
- **Rappel automatique 24h avant** : envisagé comme évolution ; nécessite une tâche planifiée (Laravel Scheduler + cron).
- **Gestion des disponibilités en temps réel** : le formulaire ne vérifie pas les créneaux réellement disponibles par médecin (les horaires ne sont pas encore exploités pour piloter les créneaux). La validation reste manuelle par l'administration, ce qui joue le rôle de filtre.
- **Interface de gestion des utilisateurs** : les comptes du personnel se créent actuellement en ligne de commande (`tinker`). Une interface d'administration permettant à un admin de créer / modifier / supprimer les comptes (avec choix du rôle) serait un ajout confortable.
- **Spécialités** : elles sont générées à partir des médecins existants. Veiller à une saisie cohérente (même orthographe) pour éviter les doublons dans les filtres.

---

*Projet développé dans le cadre d'un stage chez KAY TECHNOLOGIE (Libreville).*