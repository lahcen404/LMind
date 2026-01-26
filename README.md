

# 📘LMind :  Système interne de débriefing pédagogique

## 🧠 Contexte du projet

Dans le cadre de la formation **Web Developer [2023]**, les apprenants réalisent tout au long de l’année des **briefs pédagogiques** organisés par **sprints** et **classes**.  
Chaque brief vise le développement de **compétences précises**, évaluées selon des **niveaux de maîtrise**.

Actuellement, le suivi et le débriefing de ces briefs sont réalisés de manière partiellement manuelle, ce qui rend :

- le suivi pédagogique difficile ;
- l’analyse des progressions complexe ;
- la traçabilité des évaluations limitée.

👉 L’objectif de ce projet est de concevoir et développer un **système interne de débriefing pédagogique**, permettant aux formateurs et à l’administration de **structurer, suivre et analyser** les briefs, les compétences et les niveaux atteints par les apprenants.

---

## 🎯 Objectifs du système

Le système doit permettre :

- la structuration pédagogique de la formation (classes, sprints, briefs) ;
- l’association des compétences à chaque brief ;
- l’évaluation des compétences des apprenants à l’issue d’un brief ;
- la consultation de l’historique des débriefings pédagogiques ;
- la différenciation des rôles utilisateurs.

---

## 👥 Acteurs du système

### 🔹 Admin
- Gère la structure globale du système ;
- Configure les classes, les sprints et les compétences ;
- Supervise l’ensemble des données.

### 🔹 Teacher (Formateur)
- Gère les briefs de sa ou ses classes ;
- Réalise les débriefings pédagogiques ;
- Évalue les compétences des apprenants ;
- Consulte la progression individuelle et collective.

### 🔹 Apprenant
- Consulte ses briefs ;
- Consulte ses évaluations ;
- Suit sa progression par compétence.

---

## 📚 Périmètre fonctionnel

### 1️⃣ Gestion des classes
- Création d’une classe ;
- Affectation des apprenants à une classe ;
- Affectation des formateurs à une classe.

### 2️⃣ Gestion des sprints
- Une classe est organisée en plusieurs sprints ;
- Chaque sprint possède :
  - un nom ;
  - une durée ;
  - un ordre chronologique ;
- Un sprint contient plusieurs briefs.

### 3️⃣ Gestion des briefs
- Un brief appartient à un sprint ;
- Un brief possède :
  - un titre ;
  - une description ;
  - une durée estimée ;
  - un type (individuel ou collectif) ;
- Un brief cible une ou plusieurs compétences.

### 4️⃣ Gestion des compétences
- Une compétence est identifiée par :
  - un code (ex : C1, C2…) ;
  - un libellé ;
- Chaque compétence est évaluée selon un **niveau de maîtrise**.

**Niveaux de maîtrise (ENUM) :**
- `IMITER`
- `S_ADAPTER`
- `TRANSPOSER`

### 5️⃣ Débriefing pédagogique
À la fin d’un brief, le formateur peut :

- sélectionner un brief ;
- sélectionner un apprenant ;
- évaluer chaque compétence liée au brief ;
- associer un niveau de maîtrise à chaque compétence ;
- ajouter un commentaire pédagogique.

➡️ Le système conserve l’historique des débriefings.

### 6️⃣ Consultation & suivi
- Un apprenant peut consulter :
  - ses briefs réalisés ;
  - ses compétences évaluées ;
  - ses niveaux atteints.
- Un formateur peut consulter :
  - la progression d’un apprenant ;
  - la progression globale d’une classe.

---

## 📐 Règles métier

- Un apprenant appartient à **une seule classe** ;
- Une classe possède **plusieurs sprints** ;
- Un sprint contient **plusieurs briefs** ;
- Un brief peut cibler **plusieurs compétences** ;
- Une compétence peut être évaluée dans **plusieurs briefs** ;
- Une évaluation est liée à :
  - un apprenant ;
  - un brief ;
  - une compétence ;
  - un niveau de maîtrise.

---

## 🧱 Conception attendue

### 📘 Conception fonctionnelle
- Diagramme de cas d’utilisation (Use Case) ;
- Description des rôles et interactions.

### ⚙️ Conception technique
- Diagramme de classes UML ;
- Modèle relationnel de la base de données ;
- Dictionnaire de données ;
- Justification des choix techniques (relations et cardinalités).

---

## 🛠️ Technologies utilisées

### Backend
- **PHP 8+**
- Programmation Orientée Objet (POO)
- Architecture **MVC (fait maison)**
- **PDO**
- **BladeOne** (template engine)

### Frontend
- **BladeOne**
- HTML / CSS (sobre et fonctionnel)

### Base de données
- **PostgreSQL**
- **ENUM** pour les niveaux de maîtrise

---

## 🧩 Template Engine : BladeOne

Le projet utilise **BladeOne**, une implémentation standalone du moteur Blade, permettant :

- une séparation claire entre logique métier et affichage ;
- une syntaxe lisible et expressive (`@if`, `@foreach`, `@include`, etc.) ;
- la création de layouts et vues réutilisables ;
- une intégration légère dans une architecture MVC personnalisée.



## UMLs

### Class Diagram
![Class Diagram](image.png)

### Use Case Diagram
<img width="1092" height="799" alt="image" src="https://github.com/user-attachments/assets/e928dec7-8b5b-4b0c-a47e-0aaa84e64644" />
<img width="1095" height="824" alt="image" src="https://github.com/user-attachments/assets/93955ede-fa0a-45a5-a72d-fa7fcf91f3f9" />

### ER Diagram
<img width="1264" height="1548" alt="ERD LMind" src="https://github.com/user-attachments/assets/67a91649-b6df-4695-8091-552e3a24551c" />


