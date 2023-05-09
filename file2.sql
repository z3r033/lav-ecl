
CREATE DATABASE if not exists eclairage_public;

USE eclairage_public;
CREATE TABLE IF NOT EXISTS secteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_secteur VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL,
    type_secteur ENUM('résidentiel', 'commercial', 'industriel', 'public') NOT NULL,
    nombre_points_lumineux INT NOT NULL,
    puissance_totale INT NOT NULL,
    type_lampe VARCHAR(50) NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE reclamation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES users(id),
    equipe_id INT,
    FOREIGN KEY (equipe_id) REFERENCES equipe(id),
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    statut ENUM('ouverte', 'en_cours', 'resolue', 'fermee') NOT NULL,
    secteur_id INT,
    source_defaillance VARCHAR(255),
    etat_signalement VARCHAR(255),
    FOREIGN KEY (secteur_id) REFERENCES secteur(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS coffret (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    poste_electrique_id INT,
    FOREIGN KEY (poste_electrique_id) REFERENCES poste_electrique(id),
    type ENUM('primaire', 'secondaire', 'tertiaire') NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    puissance_maximale INT NOT NULL,
    nombre_circuits INT NOT NULL,
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS voie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    secteur_id INT,
    FOREIGN KEY (secteur_id) REFERENCES secteur(id),
    type_voie ENUM('principale', 'secondaire', 'tertiaire') NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    nombre_points_lumineux INT NOT NULL,
    puissance_totale INT NOT NULL,
    type_lampe ENUM('led', 'halogene', 'fluorescente', 'autre') NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    coordonnees_gps VARCHAR(50),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS points_lumineux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    voie_id INT,
    FOREIGN KEY (voie_id) REFERENCES voie(id),
    type_lampe ENUM('led', 'halogene', 'fluorescente', 'autre') NOT NULL,
    puissance INT NOT NULL,
    angle_eclairage INT NOT NULL,
    hauteur_montage FLOAT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    coordonnees_gps VARCHAR(50),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);


/**************************************************/

CREATE TABLE IF NOT EXISTS support (
    id INT AUTO_INCREMENT PRIMARY KEY,
    points_lumineux_id INT,
    FOREIGN KEY (points_lumineux_id) REFERENCES points_lumineux(id),
    type_support ENUM('candelabre', 'poteau', 'mur') NOT NULL,
    hauteur FLOAT NOT NULL,
    diametre FLOAT NOT NULL,
    resistance_vent INT NOT NULL,
    couleur VARCHAR(50),
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    coordonnees_gps VARCHAR(50),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS candelabre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    support_id INT,
    FOREIGN KEY (support_id) REFERENCES support(id),
    hauteur FLOAT NOT NULL,
    diametre FLOAT NOT NULL,
    nombre_lampes INT NOT NULL,
    type_lampes ENUM('led', 'halogene', 'fluorescente', 'autre') NOT NULL,
    puissance INT NOT NULL,
    angle_eclairage INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    coordonnees_gps VARCHAR(50),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS poteau (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hauteur FLOAT NOT NULL,
    support_id INT,
    FOREIGN KEY (support_id) REFERENCES support(id),
    diametre FLOAT NOT NULL,
    materiau ENUM('acier', 'aluminium', 'bois', 'composite', 'autre') NOT NULL,
    resistance_vent INT NOT NULL,
    couleur VARCHAR(50),
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    coordonnees_gps VARCHAR(50),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS mur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hauteur FLOAT NOT NULL,
    support_id INT,
    FOREIGN KEY (support_id) REFERENCES support(id),
    longueur FLOAT NOT NULL,
    epaisseur FLOAT NOT NULL,
    materiau ENUM('beton', 'bois', 'brique', 'pierre', 'autre') NOT NULL,
    couleur VARCHAR(50),
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    coordonnees_gps VARCHAR(50),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS luminaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    points_lumineux_id INT,
    FOREIGN KEY (points_lumineux_id) REFERENCES points_lumineux(id),
    type ENUM('projecteur', 'suspension', 'applique', 'autre') NOT NULL,
    puissance INT NOT NULL,
    flux_lumineux INT NOT NULL,
    angle_eclairage INT NOT NULL,
    couleur_lumiere VARCHAR(50) NOT NULL,
    hauteur FLOAT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat VARCHAR(50) NOT NULL
);
/*==============*/

CREATE TABLE IF NOT EXISTS LED (
    id INT AUTO_INCREMENT PRIMARY KEY,
    luminaire_id INT,
    FOREIGN KEY (luminaire_id) REFERENCES luminaire(id),
    puissance INT NOT NULL,
    flux_lumineux INT NOT NULL,
    temp_couleur INT NOT NULL,
    angle_eclairage INT NOT NULL,
    IRC INT NOT NULL,
    duree_vie INT NOT NULL,
    efficacite_lumineuse INT NOT NULL,
    indice_IP INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS SDP (
    id INT AUTO_INCREMENT PRIMARY KEY,
    LED_id INT,
    FOREIGN KEY (LED_id) REFERENCES LED(id),
    date_adoption DATE NOT NULL,
    ville VARCHAR(255) NOT NULL,
    objectifs TEXT NOT NULL,
    strategies TEXT NOT NULL,
    actions TEXT NOT NULL,
    couts INT NOT NULL,
    echeanciers TEXT NOT NULL,
    responsable VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS DRIVER (
    id INT AUTO_INCREMENT PRIMARY KEY,
    LED_id INT,
    FOREIGN KEY (LED_id) REFERENCES LED(id),
    puissance_entree INT NOT NULL,
    tension_entree INT NOT NULL,
    courant_sortie INT NOT NULL,
    tension_sortie INT NOT NULL,
    efficacite INT NOT NULL,
    facteur_puissance INT NOT NULL,
    indice_protection INT NOT NULL,
    temperature_fonctionnement VARCHAR(50) NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS BLOC_LED (
    id INT AUTO_INCREMENT PRIMARY KEY,
    LED_id INT,
    FOREIGN KEY (LED_id) REFERENCES LED(id),
    puissance INT NOT NULL,
    flux_lumineux INT NOT NULL,
    temp_couleur INT NOT NULL,
    angle_eclairage INT NOT NULL,
    IRC INT NOT NULL,
    duree_vie INT NOT NULL,
    efficacite_lumineuse INT NOT NULL,
    indice_IP INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);
/*==============*/

CREATE TABLE IF NOT EXISTS SHP (
    id INT AUTO_INCREMENT PRIMARY KEY,
    luminaire_id INT,
    FOREIGN KEY (luminaire_id) REFERENCES luminaire(id),
    hauteur_fixation INT NOT NULL,
    puissance_installee INT NOT NULL,
    flux_lumineux_initial INT NOT NULL,
    angle_eclairage INT NOT NULL,
    IRC INT NOT NULL,
    duree_vie INT NOT NULL,
    efficacite_lumineuse INT NOT NULL,
    indice_IP INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL,
    latitude FLOAT(10, 6) NOT NULL,
    longitude FLOAT(10, 6) NOT NULL,
    modele_sph VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Amorceur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    SHP_id INT,
    FOREIGN KEY (SHP_id) REFERENCES SHP(id),
    type VARCHAR(255) NOT NULL,
    puissance INT NOT NULL,
    tension_nominal INT NOT NULL,
    courant_nominal INT NOT NULL,
    indice_IP INT NOT NULL,
    duree_vie INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS ballaste (
    id INT AUTO_INCREMENT PRIMARY KEY,
    SHP_id INT,
    FOREIGN KEY (SHP_id) REFERENCES SHP(id),
    type VARCHAR(255) NOT NULL,
    puissance INT NOT NULL,
    tension_nominal INT NOT NULL,
    courant_nominal INT NOT NULL,
    indice_IP INT NOT NULL,
    duree_vie INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS lampe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    SHP_id INT,
    FOREIGN KEY (SHP_id) REFERENCES SHP(id),
    type VARCHAR(255) NOT NULL,
    puissance INT NOT NULL,
    tension_nominal INT NOT NULL,
    courant_nominal INT NOT NULL,
    indice_IP INT NOT NULL,
    duree_vie INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

CREATE TABLE IF NOT EXISTS douille (
    id INT AUTO_INCREMENT PRIMARY KEY,
    SHP_id INT,
    FOREIGN KEY (SHP_id) REFERENCES SHP(id),
    type VARCHAR(255) NOT NULL,
    puissance_max INT NOT NULL,
    tension_nominal INT NOT NULL,
    courant_nominal INT NOT NULL,
    indice_IP INT NOT NULL,
    date_installation DATE NOT NULL,
    date_derniere_maintenance DATE,
    entreprise_maintenance VARCHAR(255),
    etat ENUM('actif', 'inactif', 'maintenance', 'hors_service') NOT NULL
);

/*********/
CREATE TABLE  if not exists console (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_console VARCHAR(255) NOT NULL,
points_lumineux_id INT,
FOREIGN KEY (points_lumineux_id) REFERENCES points_lumineux(id),
marque VARCHAR(255) NOT NULL,
  modele VARCHAR(255) NOT NULL,
  nombre_canal INT NOT NULL,
  protocole_supporte VARCHAR(255) NOT NULL,
  tension_alimentation INT NOT NULL,
  courant_max INT NOT NULL,
  type_interface VARCHAR(255) NOT NULL,
  adresse_IP VARCHAR(255),
  adresse_MAC VARCHAR(255),
  date_installation DATE NOT NULL,
  date_derniere_maintenance DATE,
  entreprise_maintenance VARCHAR(255),
  etat VARCHAR(50) NOT NULL
);

CREATE TABLE  if not exists table_jupe (
id INT AUTO_INCREMENT PRIMARY KEY,
type_table_jupe VARCHAR(255) NOT NULL,
points_lumineux_id INT,
FOREIGN KEY (points_lumineux_id) REFERENCES points_lumineux(id),
 materiau VARCHAR(255) NOT NULL,
  couleur VARCHAR(255),
  forme VARCHAR(255) NOT NULL,
  dimensions VARCHAR(255) NOT NULL,
  poids VARCHAR(255) NOT NULL,
  indice_IP INT NOT NULL,
  date_installation DATE NOT NULL,
  date_derniere_maintenance DATE,
  entreprise_maintenance VARCHAR(255),
  etat VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS type_article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_nom VARCHAR(255) NOT NULL
);

INSERT INTO type_article (type_nom) VALUES ('candelabre'), ('poteau'), ('mur'), ('LED'), ('SHP'), ('Amorceur'), ('ballaste'), ('lampe'), ('douille');

CREATE TABLE IF NOT EXISTS article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    quantite INT NOT NULL,
    prix DECIMAL(10,2) NOT NULL,
    date_ajout DATE NOT NULL,
    date_mise_a_jour TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    type_article_id INT,
    FOREIGN KEY (type_article_id) REFERENCES type_article(id),
    estDisponible BOOLEAN DEFAULT TRUE,
    imageUrl VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS proprietes_article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    FOREIGN KEY (article_id) REFERENCES article(id),
    nom_propriete VARCHAR(255) NOT NULL,
    valeur_propriete VARCHAR(255) NOT NULL,
    estObligatoire BOOLEAN DEFAULT TRUE
);


CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('admin', 'technicien', 'standardiste','operateur') NOT NULL,
    date_creation DATE NOT NULL,
    date_derniere_connexion DATE
) ENGINE=InnoDB;

CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE user_roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  role_id INT NOT NULL,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);


CREATE TABLE IF NOT EXISTS permissions (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
description TEXT
);

CREATE TABLE IF NOT EXISTS user_permission (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
permission_id INT,
FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS intervention (
    id INT AUTO_INCREMENT PRIMARY KEY,
    technicien_id INT,
    FOREIGN KEY (technicien_id) REFERENCES users(id) ON DELETE CASCADE,
    secteur_id INT,
    FOREIGN KEY (secteur_id) REFERENCES secteur(id) ON DELETE CASCADE,
    poste_electrique_id INT,
    FOREIGN KEY (poste_electrique_id) REFERENCES poste_electrique(id) ON DELETE CASCADE,
    reclamation_id INT,
    FOREIGN KEY (reclamation_id) REFERENCES reclamation(id) ON DELETE CASCADE,
    type_intervention ENUM('maintenance', 'inspection', 'urgence', 'autre') NOT NULL,
    description TEXT,
    date_intervention DATE NOT NULL,
    duree INT NOT NULL,
    statut ENUM('planifié', 'en_cours', 'terminé', 'annulé') NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS rapport (
    id INT AUTO_INCREMENT PRIMARY KEY,
    intervention_id INT,
    FOREIGN KEY (intervention_id) REFERENCES intervention(id) ON DELETE CASCADE,
    contenu TEXT NOT NULL,
    recommandations TEXT,
    date_creation DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE equipe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reclamation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES users(id),
    equipe_id INT,
    FOREIGN KEY (equipe_id) REFERENCES equipe(id),
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    statut ENUM('ouverte', 'en_cours', 'resolue', 'fermee') NOT NULL
);

CREATE TABLE planning (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ordre_intervention (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    FOREIGN KEY (utilisateur_id) REFERENCES users(id),
    equipe_id INT,
    FOREIGN KEY (equipe_id) REFERENCES equipe(id),
    description TEXT NOT NULL,
    statut ENUM('en_attente', 'en_cours', 'termine') NOT NULL
);

CREATE TABLE date_ordre_intervention (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ordre_intervention_id INT,
    FOREIGN KEY (ordre_intervention_id) REFERENCES ordre_intervention(id),
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL
);

CREATE TABLE date_planning (
    id INT AUTO_INCREMENT PRIMARY KEY,
    planning_id INT,
    FOREIGN KEY (planning_id) REFERENCES planning(id),
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL
);