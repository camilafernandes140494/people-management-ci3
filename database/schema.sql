CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE people (
    id SERIAL PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    birth_date DATE,
    phone VARCHAR(20)
);

CREATE TABLE person_role_history (
    id SERIAL PRIMARY KEY,
    person_id INTEGER NOT NULL,
    role_id INTEGER NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,

    CONSTRAINT fk_person
        FOREIGN KEY (person_id)
        REFERENCES people (id)
        ON DELETE CASCADE,

    CONSTRAINT fk_role
        FOREIGN KEY (role_id)
        REFERENCES roles (id)
        ON DELETE RESTRICT
);

CREATE INDEX idx_person_role_active
    ON person_role_history (person_id)
    WHERE end_date IS NULL;
