# Projet d'Authentification Laravel

Ce projet est une application d'exercice développée avec **Laravel** et **Laravel Fortify** pour gérer l'inscription, la vérification des comptes utilisateurs, l'authentification, la réinitialisation des mots de passe, et bien plus encore.

## 🚀 Fonctionnalités

- **Inscription des utilisateurs** : Formulaire personnalisé avec Bootstrap.
- **Vérification de l'adresse e-mail** :
  - Envoi d'un e-mail de confirmation via **PHPMailer** (configuré avec Mailtrap).
  - L'utilisateur peut vérifier son compte en cliquant sur un lien ou en saisissant un code de vérification aléatoire.
- **Renvoi de lien/code de vérification** :
  - Possibilité de demander un nouveau lien ou code si l'ancien a expiré.
- **Connexion sécurisée** :
  - Seuls les comptes vérifiés peuvent se connecter.
- **Réinitialisation du mot de passe** :
  - Envoi d'un lien sécurisé pour définir un nouveau mot de passe.
- **Déconnexion de l'utilisateur**.
- **Changement d'adresse e-mail** :
  - L'utilisateur peut mettre à jour son adresse e-mail après authentification.

## ⚙️ Technologies utilisées

- **Laravel 10**
- **Laravel Fortify**
- **PHP 8**
- **MySQL**
- **PHPMailer** (pour l'envoi d'e-mails)
- **Bootstrap 5** (pour le design des formulaires)
- **Mailtrap** (pour le test des e-mails en environnement de développement)

## 📦 Installation

1. Clonez le projet :
   ```bash
   git clone https://github.com/ton-utilisateur/nom-du-projet.git
   cd nom-du-projet
   ```

2. Installez les dépendances :
   ```bash
   composer install
   npm install && npm run dev
   ```

3. Configurez votre fichier `.env` :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configurez la base de données dans `.env` :
   ```env
   DB_DATABASE=nom_de_la_base
   DB_USERNAME=utilisateur
   DB_PASSWORD=mot_de_passe
   ```

5. Exécutez les migrations :
   ```bash
   php artisan migrate
   ```

6. Lancez le serveur :
   ```bash
   php artisan serve
   ```

## 📧 Configuration de Mailtrap

Dans le fichier `.env` :
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=ton_username_mailtrap
MAIL_PASSWORD=ton_password_mailtrap
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=exemple@domaine.com
MAIL_FROM_NAME="Nom du Projet"
```

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :

1. Fork le projet.
2. Créer une nouvelle branche (`git checkout -b feature-nouvelle-fonctionnalite`).
3. Commitez vos modifications (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`).
4. Poussez votre branche (`git push origin feature-nouvelle-fonctionnalite`).
5. Ouvrez une Pull Request.

## 📄 Licence

Ce projet est à but d'apprentissage. Vous pouvez l'utiliser et le modifier à votre convenance. ✅

---


