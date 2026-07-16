# Guide de déploiement — CUMC-CO

Procédure de mise en production de l'application CUMC-CO sur le serveur (VPS).

> ⚠️ **Serveur multi-sites** : ce serveur héberge plusieurs sites (assg, kaytech, tontine, etc.).
> Toutes les opérations décrites ici concernent **uniquement** le dossier de CUMC-CO.
> Ne jamais modifier la configuration ou les dossiers des autres sites.

---

## Sommaire

- [Contexte serveur](#contexte-serveur)
- [Étape 1 — Accès Git depuis le serveur (clé de déploiement)](#étape-1--accès-git-depuis-le-serveur-clé-de-déploiement)
- [Étape 2 — Base de données MySQL](#étape-2--base-de-données-mysql)
- [Étape 3 — Récupération et installation du code](#étape-3--récupération-et-installation-du-code)
- [Étape 4 — Configuration du fichier .env](#étape-4--configuration-du-fichier-env)
- [Étape 5 — Base de données et stockage](#étape-5--base-de-données-et-stockage)
- [Étape 6 — Optimisation et permissions](#étape-6--optimisation-et-permissions)
- [Étape 7 — Compte administrateur](#étape-7--compte-administrateur)
- [Étape 8 — Configuration des e-mails](#étape-8--configuration-des-e-mails)
- [Vérifications après déploiement](#vérifications-après-déploiement)
- [Mises à jour ultérieures](#mises-à-jour-ultérieures)
- [Dépannage](#dépannage)

---

## Contexte serveur

| Élément | Valeur |
|---------|--------|
| Dossier du projet | `/var/www/cumcco.com/public_html` |
| Racine web (Nginx) | `/var/www/cumcco.com/public_html/public` |
| Serveur web | Nginx (config : `/etc/nginx/sites-enabled/`) |
| Base de données | MySQL |
| Dépôt Git | `git@github.com:dhermin002-tech/cumcco_ga.git` |
| Branche déployée | `main` |
| Version PHP requise | 8.3+ |

---

## Étape 1 — Accès Git depuis le serveur (clé de déploiement)

Le serveur doit pouvoir récupérer le code depuis GitHub via SSH.

### Vérifier la connexion actuelle

```bash
ssh -T git@github.com
```

- Si la réponse est `Hi ... You've successfully authenticated`, l'accès fonctionne → passer à l'étape 2.
- Si la réponse est `Permission denied (publickey)`, la clé de déploiement doit être ajoutée au dépôt (ci-dessous).

### Ajouter la clé de déploiement au dépôt GitHub

Une clé de déploiement existe déjà sur le serveur : `~/.ssh/id_ed25519` (nommée `deploy-cumcco-serveur`).

**Récupérer la clé publique** :
```bash
cat ~/.ssh/id_ed25519.pub
```

**L'ajouter sur GitHub** (nécessite un accès administrateur au dépôt `dhermin002-tech/cumcco_ga`) :

1. Ouvrir le dépôt sur GitHub
2. **Settings** → **Deploy keys** → **Add deploy key**
3. **Title** : `Serveur production CUMC-CO`
4. **Key** : coller le contenu de `~/.ssh/id_ed25519.pub`
5. Cocher **Allow write access** (si des push depuis le serveur sont nécessaires)
6. Valider

**Re-tester** :
```bash
ssh -T git@github.com
```

---

## Étape 2 — Base de données MySQL

L'application nécessite une base de données MySQL **dédiée** (le site actuel n'en utilise pas ; `DB_CONNECTION` est à `null`).

Se connecter à MySQL (avec un compte disposant des droits de création) :
```bash
mysql -u root -p
```

Créer la base et l'utilisateur dédiés :
```sql
CREATE DATABASE cumcco CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'cumcco_user'@'localhost' IDENTIFIED BY 'MOT_DE_PASSE_FORT';
GRANT ALL PRIVILEGES ON cumcco.* TO 'cumcco_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

> Noter précieusement le nom de la base, l'utilisateur et le mot de passe : ils seront renseignés dans le `.env` à l'étape 4.

---

## Étape 3 — Récupération et installation du code

```bash
# Se placer dans le dossier du site
cd /var/www/cumcco.com/public_html

# Récupérer le code à jour depuis GitHub
git pull origin main

# Installer les dépendances PHP (mode production)
composer install --no-dev --optimize-autoloader

# Installer les dépendances front et compiler les assets
npm install
npm run build
```

---

## Étape 4 — Configuration du fichier .env

Éditer le fichier `.env` à la racine du projet :
```bash
nano .env
```

Renseigner au minimum :
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://www.cumcco.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cumcco
DB_USERNAME=cumcco_user
DB_PASSWORD=MOT_DE_PASSE_FORT
```

> `APP_ENV=production` et `APP_DEBUG=false` sont essentiels en production
> (ne jamais laisser `APP_DEBUG=true` en ligne : cela exposerait des informations sensibles).

Générer la clé d'application si elle n'existe pas encore :
```bash
php artisan key:generate
```

---

## Étape 5 — Base de données et stockage

```bash
# Créer les tables
php artisan migrate --force

# Créer le lien symbolique pour les images uploadées
php artisan storage:link
```

> `--force` est nécessaire pour lancer les migrations en environnement de production.
> `storage:link` rend accessibles les images des actualités uploadées depuis l'administration.

---

## Étape 6 — Optimisation et permissions

```bash
# Mettre en cache la configuration, les routes et les vues
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Donner les droits d'écriture aux dossiers concernés
chmod -R 775 storage bootstrap/cache
```

> Selon la configuration du serveur, il peut être nécessaire d'ajuster le propriétaire
> des dossiers (par exemple `chown -R www-data:www-data storage bootstrap/cache`).

---

## Étape 7 — Compte administrateur

L'inscription publique étant désactivée, le premier compte admin se crée manuellement :

```bash
php artisan tinker
```
```php
App\Models\User::create([
    'name' => 'Administrateur',
    'email' => 'ADRESSE_ADMIN',
    'password' => bcrypt('MOT_DE_PASSE_FORT'),
    'role' => 'admin',
]);
```

Rôles disponibles : `admin` (accès complet) ou `accueil` (accès limité, sans les actualités ni la suppression de médecins).

---

## Étape 8 — Configuration des e-mails

En local, les e-mails sont écrits dans les logs (`MAIL_MAILER=log`). En production, configurer un vrai service SMTP dans le `.env` pour que les e-mails de confirmation de rendez-vous soient réellement envoyés aux patients :

```env
MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_PORT=...
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS=...
MAIL_FROM_NAME="CUMC-CO"
```

---

## Vérifications après déploiement

Une fois le déploiement terminé, parcourir cette liste pour confirmer que tout fonctionne en conditions réelles (sur le serveur, avec la base MySQL). C'est un test manuel de bout en bout.

- [ ] **Le site répond** : ouvrir `https://www.cumcco.com` → la page d'accueil s'affiche (pas d'erreur 500, pas de page blanche).
- [ ] **Les styles et scripts sont chargés** : le site est bien mis en forme (Tailwind) et les onglets du formulaire de RDV réagissent au clic (Alpine.js). Un site "cassé" sans styles indique un problème de compilation des assets (`npm run build`).
- [ ] **La base de données répond** : ouvrir `/actualites` ou le formulaire de RDV (qui liste les médecins). Si les données s'affichent, la connexion MySQL fonctionne. Sinon, vérifier les identifiants `DB_*` du `.env`.
- [ ] **L'administration est accessible** : aller sur `/login`, se connecter avec le compte admin créé en production → le tableau de bord s'affiche.
- [ ] **L'écriture en base fonctionne** : créer un médecin dans l'administration → vérifier qu'il apparaît ensuite dans le formulaire public.
- [ ] **L'upload d'image fonctionne** : créer une actualité avec une image → vérifier qu'elle s'affiche sur la page publique (valide `storage:link` et les permissions).
- [ ] **Les e-mails partent** : accepter une demande de RDV → vérifier que l'e-mail de confirmation est bien envoyé (une fois le SMTP configuré).
- [ ] **Les restrictions par rôle fonctionnent** : se connecter avec un compte `accueil` → l'accès aux actualités doit renvoyer une erreur 403.
- [ ] **Pas d'erreurs dans les logs** : consulter `storage/logs/laravel.log` pour repérer d'éventuelles erreurs silencieuses.

Si l'un de ces points échoue, se reporter à la section [Dépannage](#dépannage).



Pour déployer une nouvelle version après le premier déploiement :

```bash
cd /var/www/cumcco.com/public_html

git pull origin main
composer install --no-dev --optimize-autoloader
npm install && npm run build
php artisan migrate --force

# Rafraîchir les caches
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## Dépannage

**`Permission denied (publickey)` lors du `git pull`**
→ La clé de déploiement n'est pas (ou plus) autorisée sur le dépôt. Voir l'étape 1.

**Erreur de connexion à la base de données**
→ Vérifier les identifiants `DB_*` dans le `.env`, que la base existe et que l'utilisateur a les droits. Après modification du `.env`, relancer `php artisan config:cache`.

**Les images uploadées ne s'affichent pas**
→ Vérifier que `php artisan storage:link` a bien été exécuté et que le dossier `storage` a les bonnes permissions.

**Une modification du `.env` ne semble pas prise en compte**
→ Le cache de configuration est actif. Relancer `php artisan config:cache` (ou `php artisan config:clear` en cas de doute).

**Page blanche ou erreur 500 après déploiement**
→ Vérifier les permissions de `storage` et `bootstrap/cache`, et consulter `storage/logs/laravel.log`. Ne pas activer `APP_DEBUG` en production pour diagnostiquer : consulter plutôt les logs.

---

*Document de déploiement — projet CUMC-CO, stage KAY TECHNOLOGIE (Libreville).*