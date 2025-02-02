CREATE TABLE Medications (
    MedicationId                       INTEGER   PRIMARY KEY, 
    MedicationLabel                    VARCHAR2, 
    MedicationDescriptionShort         TEXT, 
    MedicationDescription              TEXT, 
    MedicationLogoRelativePath         TEXT,
    MedicationIsNaturalProduct         INTEGER DEFAULT 0,
    MedicationIsVegetable              INTEGER DEFAULT 0,
    MedicationBenefits                 TEXT,
    MedicationIngredients              TEXT,
    MedicationNutritionalValue         TEXT,
    MedicationWarning                  TEXT,
    MedicationAdministeringMethod      TEXT,
    MedicationCreationDatetime         DATETIME DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct ) VALUES ( 1, 'Arnigel', '', 'arnigel.jpg', 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct ) VALUES ( 2, 'Bactiol Duo', 'Complément alimentaire à base de probiotiques, de levure, d''extrait de mûre et de vitamine D, sous forme de gélules. Pour favoriser le transit intestinal normal et la résistance naturelle.', 'bactiol-duo.jpg', 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationAdministeringMethod ) VALUES ( 3, 'Banane', '', 'banana.jpg', 1, 'Piqure moustique - Appliquer la face intérieure de la pellure sur la piqure' );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable, MedicationBenefits, MedicationNutritionalValue ) VALUES ( 4, 'Haricot blanc', '', 'bean_white.webp', 1, 1, 'Facile à digérer. Riche en protéines et en glucides. Faible en calories.', 'Le haricot blanc est une légumineuse qui se caractérise par des teneurs élevées en protéines et glucides complexes mais aussi en fibres, vitamines, minéraux. Ils se consomment frais ou secs mais toujours cuits.<br/><br/>Le haricot blanc contient des proportions importantes de protéines et de glucides. Ces derniers sont essentiellement composés de glucides complexes, à l''inverse des légumes frais, qui renferment une majorité de sucres simples.<br/><br/>Il constitue une bonne source de vitamines C,B1, B3 et B9 ; et fournit une quantité intéressante de fer, de potassium, de calcium et de magnésium, zinc, manganèse.<br/><br/>Ses fibres atteignent plus de 5 grammes aux 100 grammes, tandis que la moyenne des légumes frais se situe entre 2 et 3 grammes pour 100 grammes. Elles sont composées de celluloses, d''hémicelluloses et de pectines.' );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 5, 'Chou cabus (Chou blanc)', '', 'cabbage.webp', 1, 1 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 6, 'Café', 'Anti-oxydant', 'cafe.jpeg', 1, 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationDescription, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 7, 'Clou de girofle', 'Le clou de girofle possède des propriétés antibactériennes, anesthésiantes et antiseptiques. Il contient de l''eugénol, un composé aromatique.', 'La saveur du clou de girofle favorise la digestion. Ses composés aromatiques permettent de lutter contre les maux d''estomac (ballonnement, aérophagie, gènes gastriques).<br/>Antalgique : cette action est rapide sur les douleurs dentaires', 'clou_de_girofle.jpg', 1, 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationDescription, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable, MedicationIngredients, MedicationWarning ) VALUES ( 8, 'C-Will', 'Traitement des carences en vitamine C', 'Faire une cure 1x par an', 'c-will-box.png', 0, 0, 'Par capsule : acide ascorbique 500mg, sphères de sucre, gomme laque, acide tartrique, talc, eau purifiée, ethanol à 96%, jaune de quinoléine, titane dioxyde, gélatine', 'Si vous réagissez de manière allergique à l''une ou plusieurs des substances contenues dans le produit, vous ne devez plus prendre de C-will.' );
