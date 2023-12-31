-- Create Users Table
CREATE TABLE Users (
    UserID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(100),
    Phone VARCHAR(15),
    Create_at DATETIME
);

-- Create Admins Table
CREATE TABLE Admins (
    AdminID INT PRIMARY KEY,
    UserID INT,
    Role VARCHAR(50),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Create Categories Table
CREATE TABLE Categories (
    CategoryID INT PRIMARY KEY,
    Name VARCHAR(50),
    cat_image VARCHAR(255),
    Status INT,
    added_on DATETIME
);

-- Create Menu Items Table
CREATE TABLE MenuItems (
    ItemID INT PRIMARY KEY,
    CategoryID INT,
    Name VARCHAR(100),
    Description TEXT,
    Price DECIMAL(10, 2),
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

-- Create Orders Table
CREATE TABLE Orders (
    OrderID INT PRIMARY KEY,
    UserID INT,
    OrderDate DATE,
    TotalAmount DECIMAL(10, 2),
    DeliveryAddress VARCHAR(255),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Create Order Items Table
CREATE TABLE OrderItems (
    OrderItemID INT PRIMARY KEY,
    OrderID INT,
    ItemID INT,
    Quantity INT,
    Subtotal DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ItemID) REFERENCES MenuItems(ItemID)
);
