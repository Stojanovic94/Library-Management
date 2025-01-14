# Library Management System - PHP and PDO

## Overview
This project aims to create a Library Management System that allows users to register, browse available books, reserve them, track rented books, and return them after usage. The system utilizes PHP and PDO (PHP Data Objects) for interaction with the MySQL database, ensuring secure and efficient data management.

## Features
### 1. **User Registration and Authentication:**
   - Users can register by providing their basic details (name, email, password).
   - A secure login system allows users to access their accounts and track their borrowed books.
   - Passwords are securely stored using hashing techniques.

### 2. **Book Browsing and Reservation:**
   - Users can view a list of available books with details such as title, author, and availability.
   - Users can reserve a book that is available.
   - The system keeps track of which books are currently reserved or rented out by users.

### 3. **Book Renting and Tracking:**
   - Once a book is reserved, users can "rent" it, which updates the book's status in the database.
   - Users can view a list of their rented books along with the rental date and due date for returning the books.

### 4. **Book Return:**
   - Users can return rented books, which updates the book’s status to available in the system.
   - A log of returned books is kept to track the book's usage history.

### 5. **Admin Panel:**
   - Admin users can manage books by adding new books, editing book details, and deleting books from the library.
   - Admin users can view all users and their rented books, along with the status of the books.

## Technologies Used
- **PHP** for server-side scripting and business logic.
- **PDO (PHP Data Objects)** for secure database interaction and query execution.
- **MySQL** for managing the database that stores user, book, and rental data.
- **HTML/CSS** for creating the user interface and styling the website.
- **JavaScript (optional)** for additional interactivity, like real-time updates.
