# [Amazon.com Clone](https://www.amazon.com/)

This project is a clone of Amazon.com, created using **HTML**, **CSS**, and **PHP**. 


# SQL QUERY 
Run this while running in sql admin:
 
### 1. Create the `users` Table

Run this SQL query to create the `users` table:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);
```

Use the following SQL query to create the necessary `cart` table:

```sql
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(50) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
