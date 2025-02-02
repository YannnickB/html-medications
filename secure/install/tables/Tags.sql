CREATE TABLE Tags (
    TagId                       INTEGER   PRIMARY KEY, 
    TagLabel                    VARCHAR2, 
    TagDescriptionShort         TEXT, 
    TagDescription              TEXT, 
    TagIllustrationRelativePath TEXT,
    TagCreationDatetime         DATETIME DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 1, 'Echymoses' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 2, 'Contusions' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 3, 'Fatigure musculaire' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 4, 'transit' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 5, 'intestinal' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 6, 'Digestion' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 7, 'Anti-oxidant' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 8, 'Café' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 9, 'Antiseptique' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 10, 'Antifongique' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 11, 'Antiparasitaire' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 12, 'Stomachique' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 13, 'Antalgique' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 14, 'Dents' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 15, 'Estomac' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 16, 'Vitamine' );
INSERT INTO Tags ( TagId, TagLabel ) VALUES ( 17, 'C' );
