SELECT categorie.id AS categorie_id, categorie.nom AS categorie_nom, sous_categorie.nom AS sous_categorie_nom, sous_categorie.id AS sous_categorie_id FROM categorie JOIN sous_categorie
ON categorie.id = sous_categorie.categorie_id
WHERE categorie.id = 1;

SELECT * FROM categorie JOIN sous_categorie
ON categorie.id = sous_categorie.categorie_id
WHERE categorie.id = 1;

SELECT sous_categorie.nom, sous_categorie.id FROM categorie JOIN sous_categorie
ON categorie.id = sous_categorie.categorie_id
WHERE categorie.id = 1;