CREATE TABLE Languages (
    LanguageId                       INTEGER   PRIMARY KEY, 
    LanguageCode                     VARCHAR2, 
    LanguageLabel                    VARCHAR2, 
    LanguageCreationDatetime         DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Languages ( LanguageId, LanguageCode, LanguageLabel ) VALUES ( 1, 'en', 'English' );
INSERT INTO Languages ( LanguageId, LanguageCode, LanguageLabel ) VALUES ( 2, 'fr', 'Français' );
INSERT INTO Languages ( LanguageId, LanguageCode, LanguageLabel ) VALUES ( 3, 'es', 'Espanõl' );
