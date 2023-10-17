
-----------------------------------------------------------------------
-- products
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [products];

CREATE TABLE [products]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [product_name] VARCHAR(255) NOT NULL,
    [product_code] VARCHAR(24) NOT NULL,
    [price] FLOAT NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- users
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [users];

CREATE TABLE [users]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [first_name] VARCHAR(128) NOT NULL,
    [last_name] VARCHAR(128) NOT NULL,
    [user_name] VARCHAR(128) NOT NULL,
    [password] VARCHAR(128) NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- baskets
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [baskets];

CREATE TABLE [baskets]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [user_id] INTEGER NOT NULL,
    [product_code] VARCHAR(24) NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- delivery_costs
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [delivery_costs];

CREATE TABLE [delivery_costs]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [delivery_name] VARCHAR(128) NOT NULL,
    [operator] VARCHAR(128) NOT NULL,
    [threshold] FLOAT NOT NULL,
    [cost] FLOAT NOT NULL,
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- special_offers
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [special_offers];

CREATE TABLE [special_offers]
(
    [id] INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    [offer_name] VARCHAR(128) NOT NULL,
    [offer_code] VARCHAR(128) NOT NULL,
    UNIQUE ([id])
);
