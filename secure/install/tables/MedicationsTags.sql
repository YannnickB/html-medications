CREATE TABLE MedicationsTags (
    MedicationTagId                       INTEGER   PRIMARY KEY, 
    MedicationTag_MedicationId            INTEGER NOT NULL, 
    MedicationTag_TagId                   INTEGER NOT NULL, 
    MedicationTagCreationDatetime         DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_Medication FOREIGN KEY (MedicationTag_MedicationId) REFERENCES Medications(MedicationId) ON DELETE CASCADE
);


INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 1, 1 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 1, 2 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 1, 3 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 2, 4 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 2, 5 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 6, 7 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 6, 8 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 6 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 9 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 10 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 11 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 12 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 13 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 14 );
INSERT INTO MedicationsTags ( MedicationTag_MedicationId, MedicationTag_TagId ) VALUES ( 7, 15 );
