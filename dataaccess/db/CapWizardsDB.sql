DROP DATABASE IF EXISTS CapWizardsDB;
-- Deletes the database if there's one with the same name, that already exists --
CREATE DATABASE CapWizardsDB;
-- DB creation --
USE CapWizardsDB;
-- Will use the DB --

-- Tables creation --
CREATE TABLE Company (
    companyID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    openingHours VARCHAR(100),
    phoneNumber VARCHAR(80),
    compDescription VARCHAR(500)
)ENGINE = InnoDB;

CREATE TABLE News (
    newsID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    newsTitle varchar(100),
    newsText varchar(255),
    newsDate date NULL
)ENGINE = InnoDB;

CREATE TABLE CompanyNews (
    companyID int NOT NULL,
    newsID int NOT NULL,
    PRIMARY KEY (companyID, newsID),
    FOREIGN KEY (companyID) REFERENCES Company (companyID),
    FOREIGN KEY (newsID) REFERENCES News (newsID)
)ENGINE = InnoDB;


CREATE TABLE Category (
    categoryID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(50)
)ENGINE = InnoDB;

CREATE TABLE Subcategory (
    subcategoryID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    subcategoryName VARCHAR(50)
)ENGINE = InnoDB;

CREATE TABLE CategorySubcategory (
    categoryID int NOT NULL,
    subcategoryID  int NOT NULL,
    PRIMARY KEY (categoryID, subcategoryID),
    FOREIGN KEY (categoryID) REFERENCES Category (categoryID),
    FOREIGN KEY (subcategoryID) REFERENCES Subcategory (subcategoryID)
)ENGINE = InnoDB;


CREATE TABLE Product (
    productID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    productName  VARCHAR(50),
    productDescription VARCHAR(255),
    price DECIMAL,
    size int,
    brand varchar(80),
    color varchar(50),
    availability int,
    imgUrl VARCHAR(255),
    altTxt VARCHAR(100),
    material VARCHAR(50),
    FK_categoryID INT NOT NULL,
    FK_subcategoryID INT,
    FOREIGN KEY (FK_categoryID) REFERENCES Category (categoryID),
    FOREIGN KEY (FK_subcategoryID) REFERENCES Subcategory (subcategoryID)
)ENGINE = InnoDB;

CREATE TABLE Account (
    accountID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userName varchar(50),
    password VARCHAR(255),
    role VARCHAR(50)
)ENGINE = InnoDB;

CREATE TABLE Customer (
    customerID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NULL,
    lastName VARCHAR(100) NULL,
    email VARCHAR(80),
    phoneNumber varchar(20) NULL,
    userName VARCHAR(50),
    FK_accountID INT,
    FOREIGN KEY (FK_accountID) REFERENCES Account (accountID)
)ENGINE = InnoDB;

CREATE TABLE Address (
    addressID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(50),
    city VARCHAR(100),
    zipcode VARCHAR(50) NULL,
    street VARCHAR(80),
    houseNumber VARCHAR(10),
    apartmentNumber VARCHAR(10)
)ENGINE = InnoDB;

CREATE TABLE Payment (
    paymentID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    invoice BOOLEAN,
    paymentMethod VARCHAR(100)
)ENGINE = InnoDB;

CREATE TABLE `Order` (
    orderID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    deliveryMethod varchar(50),
    finalPrice DECIMAL,
    FK_customerID INT NOT NULL,
    FK_addressID INT NOT NULL,
    FK_paymentID INT NOT NULL,
    FOREIGN KEY (FK_customerID) REFERENCES Customer (customerID),
    FOREIGN KEY (FK_addressID) REFERENCES Address (addressID),
    FOREIGN KEY (FK_paymentID) REFERENCES Payment (paymentID)
)ENGINE = InnoDB;

CREATE TABLE ProductOrder (
    quantity int,
    price DECIMAL,
    productID int NOT NULL,
    orderID int NOT NULL,
    PRIMARY KEY (productID, orderID),
    FOREIGN KEY (productID) REFERENCES Product (productID),
    FOREIGN KEY (orderID) REFERENCES `Order` (orderID)
)ENGINE = InnoDB;


-- Inserting data into tables --
INSERT INTO Company 
    (companyID, email, openingHours, phoneNumber, compDescription)
VALUES (
    NULL,
    "CapWizards@gmail.com",
    "Monday: 9-17
    Tuesday: 9-17
    Wednesday: 9-17
    Thursday: 9-17
    Friday: 9-14
    Saturday: 9-14",
    "+4512345678",
    "Bottle Cap Enthusiasts,
    Magic initiates,
    And Lizard Pioneers of imagination!
    Here at Web Cap Wizards we provide you with collectibles needed for your personal caps collection, 
    a new project or just another game in Caps! Unleash your powers, as did we when brainstorming for a unique web shop, 
    that will not only grant us a passing grade for the semester project, but give another life to the pop-top gems 
    we've assembled during our university journey!"
);

INSERT INTO News (newsID, newsTitle, newsText, newsDate) VALUES 
(NULL, "New soda sealers coming soon!", "Our Gecko Sage Seer foresaw a new set of wonders coming in to our store! With great pleasure we can announce a new drop coming soon! It will include various caps collected form the Christmas bottles within different countries!", "2023-09-13"),
(NULL, "Online shop back on track!", "After recent wave interference we struggled with several issues, but it should bother you no more! All the delayed purchases should be shipped shortly and arrive till the end of November!", "2023-10-05");

INSERT INTO CompanyNews (companyID, newsID) VALUES
(1,1),
(1,2);

INSERT INTO Category (categoryID, categoryName) VALUES 
(NULL, "Alcoholic"),
(NULL, "Non alcoholic");

INSERT INTO Subcategory (subcategoryID, subcategoryName) VALUES 
(NULL, "Cider"),
(NULL, "Beer"),
(NULL, "Shaker"),
(NULL, "Wine"),
(NULL, "Soda"),
(NULL, "Soft drink"),
(NULL, "Water");

INSERT INTO CategorySubcategory (categoryID, subcategoryID) VALUES 
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7);

INSERT INTO Product (productID, productName, productDescription, price, size, brand, color, availability, imgUrl, altTxt, material, FK_categoryID, FK_subcategoryID) VALUES
(NULL, "Coca-Cola Original", "Coca-Cola Original bottle cap crafted with precision and attention to every detail. Characteristic red color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Coca Cola", "Red", "1", "/CapWizards/assets/img/coca-cola/Coca-cola_oryginal.png", "coca-cola original red bottle cap", "metal", "2", NULL),
(NULL, "Coca-Cola Black", "Coca-Cola Black bottle cap crafted with precision and attention to every detail. Characteristic black color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Coca Cola", "Black", "1", "/CapWizards/assets/img/coca-cola/Coca-cola_black.png", "coca-cola black bottle cap", "metal", "2", NULL),
(NULL, "Sprite Original", "Sprite Original bottle cap crafted with precision and attention to every detail. Characteristic green color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Sprite", "Green", "1", "/CapWizards/assets/img/sprite/Sprite_oryginal.png", "sprite original green bottle cap", "metal", "2", NULL),
(NULL, "Sprite Blue", "Sprite blue bottle cap crafted with precision and attention to every detail. Characteristic blue color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Sprite", "Blue", "1", "/CapWizards/assets/img/sprite/Sprite_blue.png", "sprite blue bottle cap", "metal", "2", NULL),
(NULL, "Sprite purple", "Sprite purple bottle cap crafted with precision and attention to every detail. Characteristic purple color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Sprite", "Purple", "1", "/CapWizards/assets/img/sprite/Sprite_purple.png", "sprite purple bottle cap", "metal", "2", NULL),
(NULL, "Breezer Original", "Breezer Original bottle cap crafted with precision and attention to every detail. Characteristic silver color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Breezer", "Silver", "1", "/CapWizards/assets/img/breezer/Breezer_oryginal.png", "breezer original bottle cap", "metal", "1", 3),
(NULL, "Corona Original", "Corona Original bottle cap crafted with precision and attention to every detail. Characteristic navy blue color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Corona", "Navy blue", "1", "/CapWizards/assets/img/corona/Corona_oryginal.png", "Corona original bottle cap", "metal", "1", 2),
(NULL, "Corona Green", "Corona green bottle cap crafted with precision and attention to every detail. Characteristic green color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Corona", "Green", "1", "/CapWizards/assets/img/corona/Corona_green.png", "Corona green bottle cap", "metal", "1", 2),
(NULL, "Corona Red", "Corona red bottle cap crafted with precision and attention to every detail. Characteristic red color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Corona", "Red", "1", "/CapWizards/assets/img/corona/Corona_red.png", "Corona red bottle cap", "metal", "1", 2),
(NULL, "Jul Original", "Jul Original bottle cap crafted with precision and attention to every detail. Characteristic white and red color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Jul", "White/Red", "1", "/CapWizards/assets/img/jul/Jul_oryginal.png", "Jul original bottle cap", "metal", "1", 2),
(NULL, "Jul Blue", "Jul blue bottle cap crafted with precision and attention to every detail. Characteristic blue color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Jul", "Blue", "1", "/CapWizards/assets/img/jul/Jul_blue.png", "Jul blue bottle cap", "metal", "1", 2),
(NULL, "Jul Green", "Jul green bottle cap crafted with precision and attention to every detail. Characteristic green color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Jul", "Green", "1", "/CapWizards/assets/img/jul/Jul_green.png", "Jul green bottle cap", "metal", "1", 2),
(NULL, "Skovlyst Original", "Skovlyst original bottle cap crafted with precision and attention to every detail. Characteristic blue color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Skovlyst", "Blue", "1", "/CapWizards/assets/img/skovlyst/Skovlyst_oryginal.png", "Skovlyst oryginal bottle cap", "metal", "1", 2),
(NULL, "Skovlyst Green", "Skovlyst green bottle cap crafted with precision and attention to every detail. Characteristic green color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Skovlyst", "Green", "1", "/CapWizards/assets/img/skovlyst/Skovlyst_green.png", "Skovlyst green bottle cap", "metal", "1", 2),
(NULL, "Skovlyst Red", "Skovlyst red bottle cap crafted with precision and attention to every detail. Characteristic red color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Skovlyst", "Red", "1", "/CapWizards/assets/img/skovlyst/Skovlyst_red.png", "Skovlyst red bottle cap", "metal", "1", 2),
(NULL, "Tuborg Original", "Tuborg original bottle cap crafted with precision and attention to every detail. Characteristic black color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Tuborg", "Black", "1", "/CapWizards/assets/img/tuborg/Tuborg_oryginal.png", "Tuborg oryginal bottle cap", "metal", "1", 2),
(NULL, "Tuborg Green", "Tuborg green bottle cap crafted with precision and attention to every detail. Characteristic green color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Tuborg", "Green", "1", "/CapWizards/assets/img/tuborg/Tuborg_green.png", "Tuborg green bottle cap", "metal", "1", 2),
(NULL, "Tuborg Red", "Tuborg red bottle cap crafted with precision and attention to every detail. Characteristic red color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Tuborg", "Red", "1", "/CapWizards/assets/img/tuborg/Tuborg_red.png", "Tuborg red bottle cap", "metal", "1", 2),
(NULL, "Tuborg Gron Original", "Tuborg Gron original bottle cap crafted with precision and attention to every detail. Characteristic silver color and standard bottle cap size, a universal fit for most beverage containers and collections. Each cap is in spotless condition.", "100", "32", "Tuborg Gron", "Silver", "1", "/CapWizards/assets/img/tuborg_gron/Tuborg-Gron_oryginal.png", "Tuborg Gron oryginal bottle cap", "metal", "1", 2);

INSERT INTO Customer (customerID, firstName, lastName, email, phoneNumber, userName) VALUES
(NULL, 'Haskell', 'Llop', 'hllop0@live.com', '+850 249 585 2080', 'hllop0'),
(NULL, 'Rriocard', 'Darrell', 'rdarrell1@feedburner.com', '+380 569 999 7483', 'rdarrell1'),
(NULL, 'Jeth', 'Goldhill', 'jgoldhill2@illinois.edu', '+420 235 220 1526', 'jgoldhill2'),
(NULL, 'George', 'Dowthwaite', 'gdowthwaite3@biglobe.ne.jp', '+62 404 663 8402', 'gdowthwaite3'),
(NULL, 'Duky', 'Dundredge', 'ddundredge4@gmpg.org', '+52 581 379 1949', 'ddundredge4'),
(NULL, 'Delmar', 'Dring', 'ddring5@businesswire.com', '+62 881 251 6422', 'ddring5'),
(NULL, 'Alfonse', 'Colcutt', 'acolcutt6@ezinearticles.com', '+1 804 411 8923', 'acolcutt6'),
(NULL, 'Gerick', 'Camois', 'gcamois7@squarespace.com', '+60 479 302 0574', 'gcamois7'),
(NULL, 'Zsazsa', 'Scoggin', 'zscoggin8@google.co.uk', '+86 362 276 3956', 'zscoggin8'),
(NULL, 'Esme', 'Canepe', 'ecanepe9@w3.org', '+995 731 521 6482', 'ecanepe9'),
(NULL, 'Maurie', 'Brusby', 'mbrusbya@cnbc.com', '+31 639 367 0460', 'mbrusbya'),
(NULL, 'Lonnie', 'Benedidick', 'lbenedidickb@artisteer.com', '+852 135 168 3759', 'lbenedidickb'),
(NULL, 'Sanders', 'Vlasenkov', 'svlasenkovc@narod.ru', '+86 833 792 0653', 'svlasenkovc'),
(NULL, 'Kathleen', 'McClymond', 'kmcclymondd@reverbnation.com', '+57 409 152 4398', 'kmcclymondd'),
(NULL, 'Danya', 'Emnoney', 'demnoneye@bigcartel.com', '+98 177 144 1009', 'demnoneye'),
(NULL, 'Natassia', 'Hars', 'nharsf@angelfire.com', '+86 506 692 9612', 'nharsf'),
(NULL, 'Robena', 'Herkess', 'rherkessg@census.gov', '+62 281 348 3079', 'rherkessg'),
(NULL, 'Cameron', 'Blaymires', 'cblaymiresh@sakura.ne.jp', '+86 620 754 9461', 'cblaymiresh'),
(NULL, 'Josey', 'Lusk', 'jluski@wp.com', '+687 542 476 5739', 'jluski'),
(NULL, 'Guillaume', 'Flaonier', 'gflaonierj@nature.com', '+62 932 714 0352', 'gflaonierj');

INSERT INTO Address (addressID, country, city, zipcode, street, houseNumber, apartmentNumber) values 
(NULL, 'Tanzania', 'Kondoa', "089", 'Jenifer', 471, 159),
(NULL, 'Indonesia', 'Benger', "31654", 'Londonderry', 382, 362),
(NULL, 'Egypt', 'Tanda', "635", 'Golf', 397, 297),
(NULL, 'Peru', 'Tembladera', "355-09", 'Crowley', 228, 561),
(NULL, 'Portugal', 'Limeiras', "22-222", 'Westerfield', 192, 515),
(NULL, 'Russia', 'Otradnyy', "7800", 'Buell', 70, 104),
(NULL, 'China', 'Zhulan', "5345", 'Summit', 438, 166),
(NULL, 'Indonesia', 'Akarakar', "63535", 'North', 298, 253),
(NULL, 'France', 'Antony', "25-00", 'Dakota', 425, 115),
(NULL, 'Croatia', 'Marčelji', "6788", 'Badeau', 467, 366),
(NULL, 'China', 'Nanjie', "3099", 'Namekagon', 163, 441),
(NULL, 'Ethiopia', 'Deder', "8989", 'Muir', 536, 479),
(NULL, 'Poland', 'Nowe', "34565", 'New Castle', 327, 440);

INSERT INTO Payment (paymentID, invoice, paymentMethod) VALUES 
(NULL, 0, "card"),
(NULL, 0, "Mobilepay"),
(NULL, 1, "Card"),
(NULL, 1, "Card"),
(NULL, 1, "Card"),
(NULL, 0, "Mobilepay"),
(NULL, 1, "Card"),
(NULL, 1, "Mobilepay"),
(NULL, 0, "Card"),
(NULL, 1, "Mobilepay"),
(NULL, 0, "Card"),
(NULL, 0, "Card"),
(NULL, 1, "Mobilepay"),
(NULL, 0, "Card"),
(NULL, 0, "Card");

INSERT INTO `Order` (orderID, deliveryMethod, finalPrice, FK_customerID, FK_addressID, FK_paymentID) VALUES 
(NULL, "UPS", 78, 15, 11, 4),
(NULL, "Post Nord", 106, 14, 13, 6),
(NULL, "DPD", 84, 2, 1, 2),
(NULL, "UPS", 108, 19, 7, 10),
(NULL, "UPS", 104, 1, 13, 11),
(NULL, "DPD", 101, 13, 2, 12),
(NULL, "UPS", 111, 19, 1, 10),
(NULL, "Post Nord", 64, 7, 1, 13),
(NULL, "Post Nord", 99, 2, 11, 3),
(NULL, "Post Nord", 54, 8, 7, 11),
(NULL, "DPD", 52, 1, 5, 12),
(NULL, "UPS", 70, 10, 13, 3),
(NULL, "DPD", 59, 17, 7, 12);

INSERT INTO ProductOrder (quantity, price, productID, orderID) VALUES 
(3, 29, 13, 8),
(3, 60, 15, 5),
(3, 85, 15, 9),
(3, 68, 15, 3),
(2, 66, 5, 7),
(2, 2, 8, 4),
(2, 54, 5, 2),
(2, 69, 4, 1),
(5, 51, 8, 11),
(3, 68, 10, 10),
(1, 94, 4, 13),
(1, 12, 10, 2),
(4, 25, 10, 12);