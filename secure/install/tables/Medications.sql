CREATE TABLE Medications (
    MedicationId                       INTEGER   PRIMARY KEY, 
    MedicationLabel                    VARCHAR2, 
    MedicationDescriptionShort         TEXT, 
    MedicationDescription              TEXT, 
    MedicationLogoRelativePath         TEXT,
    MedicationIsNaturalProduct         INTEGER DEFAULT 0,
    MedicationIsVegetable              INTEGER DEFAULT 0,
    MedicationCreationDatetime         DATETIME DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct ) VALUES ( 1, 'Arnigel', '', 'arnigel.jpg', 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct ) VALUES ( 2, 'Bactiol Duo', 'Complément alimentaire à base de probiotiques, de levure, d''extrait de mûre et de vitamine D, sous forme de gélules. Pour favoriser le transit intestinal normal et la résistance naturelle.', 'bactiol-duo.jpg', 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct ) VALUES ( 3, 'Banane', '', 'banana.jpg', 1 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 4, 'Haricot blanc', '', 'bean_white.webp', 1, 1 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 5, 'Chou cabus (Chou blanc)', '', 'cabbage.webp', 1, 1 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 6, 'Café', 'Anti-oxydant', 'cafe.jpeg', 1, 0 );
INSERT INTO Medications ( MedicationId, MedicationLabel, MedicationDescriptionShort, MedicationDescription, MedicationLogoRelativePath, MedicationIsNaturalProduct, MedicationIsVegetable ) VALUES ( 7, 'Clou de girofle', 'Le clou de girofle possède des propriétés antibactériennes, anesthésiantes et antiseptiques. Il contient de l''eugénol, un composé aromatique.', 'La saveur du clou de girofle favorise la digestion. Ses composés aromatiques permettent de lutter contre les maux d''estomac (ballonnement, aérophagie, gènes gastriques).<br/>Antalgique : cette action est rapide sur les douleurs dentaires', 'clou_de_girofle.jpg', 1, 0 );
