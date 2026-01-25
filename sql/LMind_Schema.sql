DROP TABLE IF EXISTS evaluations;
DROP TABLE IF EXISTS livrables;
DROP TABLE IF EXISTS brief_skills;
DROP TABLE IF EXISTS briefs;
DROP TABLE IF EXISTS skills;
DROP TABLE IF EXISTS sprints;
DROP TABLE IF EXISTS training_Class;
DROP TABLE IF EXISTS users;

DROP TYPE IF EXISTS User_Role;
DROP TYPE IF EXISTS Brief_Type;
DROP TYPE IF EXISTS mastery_level;
DROP TYPE IF EXISTS skill_category;

CREATE TYPE User_Role as ENUM ('ADMIN','TRAINER','LEARNER');
CREATE TYPE Brief_Type as ENUM ('INDIVIDUAL','COLLECTIVE');
CREATE TYPE mastery_level as ENUM ('IMITATE','ADAPT','TRANSPOSE');
CREATE TYPE skill_category as ENUM ('FRONTEND','BACKEND','DEVOPS','SOFTSKILLS');

-- tables users
CREATE TABLE users (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role User_Role NOT NULL,
    class_id INT
);

-- table training_class
CREATE TABLE training_Class (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    promotion VARCHAR(50) NOT NULL,
    trainer_Id INT REFERENCES users(id) ON DELETE SET NULL
);

-- constraint : if  deletee a class don't delete students
ALTER TABLE users 
ADD CONSTRAINT fk_user_class FOREIGN KEY (class_id) REFERENCES training_Class(id) ON DELETE SET NULL;

-- table sprints
CREATE TABLE sprints (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    order_Sprint INT NOT NULL,
    class_Id INT REFERENCES training_Class(id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- table briefs
CREATE TABLE briefs (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    duration INT NOT NULL, 
    type Brief_Type NOT NULL, 
    sprint_id INT REFERENCES sprints(id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- table skills
CREATE TABLE skills (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    code VARCHAR(10) NOT NULL UNIQUE, 
    description TEXT NOT NULL,
    category skill_category NOT NULL
);

-- table brief_skills
CREATE TABLE brief_skills (
    brief_id INT REFERENCES briefs(id) ON DELETE CASCADE,
    skill_id INT REFERENCES skills(id) ON DELETE CASCADE,
    PRIMARY KEY (brief_id, skill_id)
);

-- table livrable
CREATE TABLE livrables (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    url TEXT NOT NULL,
    learner_id INT REFERENCES users(id) ON DELETE CASCADE,
    brief_id INT REFERENCES briefs(id) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- table evaluationss
CREATE TABLE evaluations (
    id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    learner_id INT REFERENCES users(id) ON DELETE CASCADE,
    brief_id INT REFERENCES briefs(id) ON DELETE CASCADE,
    skill_id INT REFERENCES skills(id) ON DELETE CASCADE,
    level mastery_level NOT NULL, 
    comment TEXT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT unique_evaluation UNIQUE (learner_id, brief_id, skill_id)
);