CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  last_name VARCHAR(100) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  age SMALLINT CHECK (age >= 0) DEFAULT 0,
  phone_number VARCHAR(20) NOT NULL UNIQUE,
  email VARCHAR(255)  DEFAULT 'Non defini',
  address VARCHAR(255) DEFAULT 'Non defini',
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  role VARCHAR(20) CHECK (role IN ('admin', 'user', 'artisant')) DEFAULT 'user'
  );
  -- products_categories
  CREATE TABLE IF NOT EXISTS products_categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    img_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

  -- insert into products_categories

  -- products
  CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT CHECK (stock >= 0),
    category_id INT NOT NULL,
    img_id INT NOT NULL,
    dimensions VARCHAR(50) DEFAULT 'N/A',
    origin VARCHAR(100) DEFAULT 'N/A',
    author_id INT NOT NULL,
    material VARCHAR(100) DEFAULT 'N/A',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES products_categories(id),
    FOREIGN KEY (author_id) REFERENCES users(id)
  );

  -- insert 10 products

-- Authors
CREATE TABLE IF NOT EXISTS authors (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL UNIQUE,
  bio TEXT,
  website VARCHAR(255),
  social_media_links JSONB DEFAULT '[]',
  key_words TEXT[],
  is_verified BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  photo_url VARCHAR(255) DEFAULT '',
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE uploads (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author_id INTEGER NOT NULL,
    file_url TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 1) Table des commandes
CREATE TABLE IF NOT EXISTS commandes (
  id                SERIAL        PRIMARY KEY,
  user_id           INTEGER       NOT NULL
                                REFERENCES users(id)
                                  ON DELETE CASCADE,
  date_commande     DATE          NOT NULL
                                DEFAULT CURRENT_DATE,
  statut            VARCHAR(30)   NOT NULL
                                CHECK (statut IN (
                                  'En attente','Payée','Expédiée','Livrée','Annulée'
                                )),
  total             NUMERIC(12,2) NOT NULL
                                CHECK (total >= 0),
  adresse_livraison TEXT
);

-- 2) Table des lignes de commande
CREATE TABLE IF NOT EXISTS ligne_commandes (
  id               SERIAL        PRIMARY KEY,
  commande_id      INTEGER       NOT NULL
                                REFERENCES commandes(id)
                                  ON DELETE CASCADE,
  product_id       INTEGER       NOT NULL
                                REFERENCES products(id)
                                  ON DELETE RESTRICT,
  quantite         INTEGER       NOT NULL
                                CHECK (quantite > 0),
  prix_unitaire    NUMERIC(10,2) NOT NULL
                                CHECK (prix_unitaire >= 0),
  montant          NUMERIC(14,2) GENERATED ALWAYS AS (
                      quantite * prix_unitaire
                    ) STORED
);

CREATE TABLE IF NOT EXISTS comments (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    product_id INTEGER NOT NULL REFERENCES products(id) ON DELETE CASCADE,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

