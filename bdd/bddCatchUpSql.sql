#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: T_TypeUser
#------------------------------------------------------------

CREATE TABLE T_TypeUser(
        id_typeUser Int  Auto_increment  NOT NULL ,
        nomDuType   Varchar (100) NOT NULL
	,CONSTRAINT T_TypeUser_PK PRIMARY KEY (id_typeUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_User_catch_up
#------------------------------------------------------------

CREATE TABLE T_User_catch_up(
        id_user          Int  Auto_increment  NOT NULL ,
        username         Varchar (100) NOT NULL ,
        password         Varchar (100) NOT NULL ,
        email            Varchar (100) NOT NULL ,
        validation_token Varchar (100) NOT NULL ,
        validation_at    Date NOT NULL ,
        id_typeUser      Int NOT NULL
	,CONSTRAINT T_User_catch_up_PK PRIMARY KEY (id_user)

	,CONSTRAINT T_User_catch_up_T_TypeUser_FK FOREIGN KEY (id_typeUser) REFERENCES T_TypeUser(id_typeUser)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_Articles
#------------------------------------------------------------

CREATE TABLE T_Articles(
        id_article Int  Auto_increment  NOT NULL ,
        titre      Varchar (100) NOT NULL ,
        auteur     Varchar (100) NOT NULL ,
        contenu    Varchar (100) NOT NULL ,
        date       Date NOT NULL ,
        activer    Bool NOT NULL ,
        id_user    Int NOT NULL
	,CONSTRAINT T_Articles_PK PRIMARY KEY (id_article)

	,CONSTRAINT T_Articles_T_User_catch_up_FK FOREIGN KEY (id_user) REFERENCES T_User_catch_up(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_Commentaires
#------------------------------------------------------------

CREATE TABLE T_Commentaires(
        id_Commentaire Int  Auto_increment  NOT NULL ,
        titre          Varchar (100) NOT NULL ,
        auteur         Varchar (100) NOT NULL ,
        contenu        Varchar (100) NOT NULL ,
        date           Date NOT NULL ,
        activer        Bool NOT NULL ,
        id_article     Int NOT NULL ,
        id_user        Int NOT NULL
	,CONSTRAINT T_Commentaires_PK PRIMARY KEY (id_Commentaire)

	,CONSTRAINT T_Commentaires_T_Articles_FK FOREIGN KEY (id_article) REFERENCES T_Articles(id_article)
	,CONSTRAINT T_Commentaires_T_User_catch_up0_FK FOREIGN KEY (id_user) REFERENCES T_User_catch_up(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_Category
#------------------------------------------------------------

CREATE TABLE T_Category(
        id_category Int  Auto_increment  NOT NULL ,
        name        Varchar (100) NOT NULL
	,CONSTRAINT T_Category_PK PRIMARY KEY (id_category)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_images
#------------------------------------------------------------

CREATE TABLE T_images(
        id_article            Int  Auto_increment  NOT NULL ,
        lien_image            Varchar (255) NOT NULL ,
        id_article_T_Articles Int NOT NULL
	,CONSTRAINT T_images_PK PRIMARY KEY (id_article)

	,CONSTRAINT T_images_T_Articles_FK FOREIGN KEY (id_article_T_Articles) REFERENCES T_Articles(id_article)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_Archivage
#------------------------------------------------------------

CREATE TABLE T_Archivage(
        id_archivage Int  Auto_increment  NOT NULL ,
        date         Date NOT NULL ,
        id_user      Int NOT NULL ,
        id_article   Int NOT NULL
	,CONSTRAINT T_Archivage_PK PRIMARY KEY (id_archivage)

	,CONSTRAINT T_Archivage_T_User_catch_up_FK FOREIGN KEY (id_user) REFERENCES T_User_catch_up(id_user)
	,CONSTRAINT T_Archivage_T_Articles0_FK FOREIGN KEY (id_article) REFERENCES T_Articles(id_article)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_ArchivageCom
#------------------------------------------------------------

CREATE TABLE T_ArchivageCom(
        id_archivage_com Int  Auto_increment  NOT NULL ,
        date             Date NOT NULL ,
        id_Commentaire   Int NOT NULL
	,CONSTRAINT T_ArchivageCom_PK PRIMARY KEY (id_archivage_com)

	,CONSTRAINT T_ArchivageCom_T_Commentaires_FK FOREIGN KEY (id_Commentaire) REFERENCES T_Commentaires(id_Commentaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: R_avoir
#------------------------------------------------------------

CREATE TABLE R_avoir(
        id_category Int NOT NULL ,
        id_article  Int NOT NULL
	,CONSTRAINT R_avoir_PK PRIMARY KEY (id_category,id_article)

	,CONSTRAINT R_avoir_T_Category_FK FOREIGN KEY (id_category) REFERENCES T_Category(id_category)
	,CONSTRAINT R_avoir_T_Articles0_FK FOREIGN KEY (id_article) REFERENCES T_Articles(id_article)
)ENGINE=InnoDB;

