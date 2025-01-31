CREATE TABLE Configs (
    ConfigId                       INTEGER   PRIMARY KEY, 
    ConfigCategory                 VARCHAR2, 
    ConfigName                     VARCHAR2, 
    ConfigTranslatable             INTEGER DEFAULT 0, 
    ConfigValue                    TEXT, 
    ConfigCreationDatetime         DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Configs ( ConfigId, ConfigCategory, ConfigName, ConfigTranslatable, ConfigValue ) VALUES ( 1, 'system', 'databaseVersionNumber', 0, 1 );
INSERT INTO Configs ( ConfigId, ConfigCategory, ConfigName, ConfigTranslatable, ConfigValue ) VALUES ( 2, 'display', 'defaultLangCode', 0, 'en' );
INSERT INTO Configs ( ConfigId, ConfigCategory, ConfigName, ConfigTranslatable, ConfigValue ) VALUES ( 3, 'display', 'websiteTitle', 1, null );

