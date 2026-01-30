# 🧙‍♂️ Legend Fighters – Donjons & Monstres (Projet de formation)

Ce **site interactif** propose une **aventure web immersive** dans un univers fantastique.  
Le joueur incarne un héros, explore des donjons dangereux et affronte des **vagues de monstres**, le tout directement depuis le navigateur.

Ce projet a été réalisé dans le cadre de ma formation afin de **consolider mes compétences en développement web interactif** et en logique de jeu.

---

## 🎯 Objectifs du projet

- Créer une expérience interactive en navigateur
- Mettre en place une **logique de jeu**
- Gérer des états grâce à la POO
- Améliorer mes compétences en **JavaScript / PHP** 

---

## 🕹️ Fonctionnalités principales

### 🦸 Choix du héros
- Sélection d’un personnage jouable
- Choix des statistiques

---

### 🏰 Exploration de donjons
- Progression étape par étape
- Boss à chaques fin de donjon

---

### ⚔️ Système de combat
- Affrontement de vagues de monstres
- Tour par tour
  
---

### 🎮 Gameplay interactif
- Actions déclenchées par l’utilisateur
- Retour visuel immédiat
- Expérience fluide et engageante

---

## 🎨 Univers & design

- Thème **fantasy RPG**
- Interface immersive
- Éléments visuels renforçant l’ambiance

## 🚀 Installation du projet Legend Fighter

Suivez ces étapes pour lancer le projet en local :

### 1️⃣ Cloner le projet
dans le temrinal : 
```bash
git clone https://github.com/Meikaziku/poo-combat.git ./
```

### 2️⃣ Installer Tailwind CSS
dans le temrinal : 
```bash
npm install tailwindcss @tailwindcss/cli
```

### 3️⃣ Compiler Tailwind en CSS prêt à l’emploi
dans le temrinal : 
```bash
npx tailwindcss -i ./public/assets/styles/style.css -o ./public/assets/styles/output.css --watch
```

### 4️⃣ Importer la base de données
Ouvrer le dossier du projet, récupérer le fichier **PooCombat.sql** dans le dossier **db** à la racine. 
Creer ensuite une base de données et importez ce fichier.

### 5️⃣ Modifier le fichier /utils/db-connect.php :
```bash
$user = 'user';
$password = 'password';
$dsn = 'mysql:host=localhost;dbname=social_network';
```
Dans le dbname du dsn, entrer le nom de votre base de donnée creer auparavant

