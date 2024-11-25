
## **Cahier des charges : Application de gestion des utilisateurs**

### **1. Objectif du projet**

Le but de ce projet est de développer une application web permettant la gestion des utilisateurs avec les fonctionnalités suivantes :
- Inscription des utilisateurs.
- Connexion des utilisateurs.
- Accès à un tableau de bord pour les utilisateurs authentifiés (administrateurs).
- Sécurisation des données sensibles (mot de passe, etc.).
- Gestion des erreurs et des redirections selon les actions (inscription réussie, erreur de connexion, etc.).

### **2. Technologies utilisées**

- **Langages** : PHP, HTML, CSS, JavaScript
- **Base de données** : MySQL/MariaDB
- **Serveur** : Apache (via XAMPP ou autre environnement de développement local)
- **Système de gestion de version** : Git (optionnel, mais recommandé)

### **3. Fonctionnalités**

#### **3.1 Page d'accueil (`index.php`)**
- **Description** : Une page d'accueil avec deux options principales : **Inscription** et **Connexion**.
- **Lien vers l'inscription** : Redirection vers la page `register.php` pour créer un nouveau compte.
- **Lien vers la connexion** : Redirection vers la page `login.php` pour les utilisateurs déjà inscrits.

#### **3.2 Inscription des utilisateurs (`register.php`)**
- **Formulaire d'inscription** :
  - Champs requis : Nom d'utilisateur, Email, Mot de passe.
  - Validation des champs (vérification de l'email, mot de passe minimum, etc.).
  - Hachage du mot de passe avant l'enregistrement dans la base de données.
  - Message de confirmation en cas de succès (redirection vers `index.php`).
  - Message d'erreur si l'email est déjà utilisé.

#### **3.3 Connexion des utilisateurs (`login.php`)**
- **Formulaire de connexion** :
  - Champs requis : Email, Mot de passe.
  - Vérification des informations dans la base de données (comparaison avec le mot de passe haché).
  - Si l'authentification réussit, redirection vers `admin/dashboard.php` pour les administrateurs.
  - Message d'erreur si l'email ou le mot de passe est incorrect.

#### **3.4 Tableau de bord (`admin/dashboard.php`)**
- **Accès réservé** : Seul l'utilisateur authentifié peut accéder à cette page. Si un utilisateur non authentifié tente d'y accéder, il est redirigé vers `login.php`.
- **Contenu** : Bienvenue à l'utilisateur avec la possibilité de voir ses informations et se déconnecter.

#### **3.5 Déconnexion (`logout.php`)**
- **Description** : Permet à l'utilisateur de se déconnecter de son compte. Lors de la déconnexion, la session est détruite, et l'utilisateur est redirigé vers `index.php`.

#### **3.6 Sécurisation**
- **Mot de passe** : Utilisation de `password_hash()` et `password_verify()` pour sécuriser les mots de passe.
- **Protection contre les injections SQL** : Utilisation de requêtes préparées avec `mysqli` pour éviter les attaques par injection SQL.
- **Session** : Utilisation de `session_start()` pour la gestion des sessions utilisateur.

### **4. Structure de la base de données**

La base de données `gestion_utilisateurs` contiendra une table `users` avec les champs suivants :

#### **Table `users`**
- **id** : INT, clé primaire, auto-incrémentée.
- **username** : VARCHAR(50), unique.
- **email** : VARCHAR(100), unique.
- **password** : VARCHAR(255) (stockage du mot de passe haché).
- **created_at** : TIMESTAMP, valeur par défaut `CURRENT_TIMESTAMP`.

Exemple de création de la table :
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### **5. Exigences non fonctionnelles**

- **Performance** : Le site doit être rapide et réactif, notamment pour les opérations de connexion et d'inscription.
- **Sécurisation** : L'application doit garantir la sécurité des informations sensibles (mot de passe) et protéger contre les attaques courantes (injections SQL, attaques XSS, etc.).
- **Responsivité** : L'application doit être compatible avec tous les types d'appareils (ordinateurs, tablettes, smartphones).
- **Accessibilité** : Le site doit être accessible et utilisable par le plus grand nombre d'utilisateurs.

### **6. Déploiement**

L'application sera déployée sur un serveur Apache avec PHP et MySQL. Une fois le développement local terminé, le site sera mis en ligne sur un serveur de production.

### **7. Planification et délais**

- **Phase de conception** : 1 semaine (exigences fonctionnelles et design de la base de données).
- **Phase de développement** : 3 semaines (développement des fonctionnalités principales).
- **Tests et débogage** : 1 semaine.
- **Déploiement** : 1 semaine.

### **8. Maintenance et évolutions futures**

- **Gestion des rôles** : Possibilité d'ajouter plusieurs types d'utilisateurs (administrateur, utilisateur standard, etc.).
- **Mise à jour du profil utilisateur** : Ajout de la possibilité pour l'utilisateur de modifier ses informations (nom, email, mot de passe).
- **Interface d'administration** : Ajouter une interface permettant aux administrateurs de gérer les utilisateurs.

---

### Conclusion

Ce cahier des charges définit les exigences et la structure de l'application de gestion des utilisateurs. Le projet vise à offrir une interface simple et sécurisée pour les utilisateurs souhaitant s'inscrire, se connecter, et accéder à un tableau de bord après authentification.


