# Laravel Library Management System

## Overview
The Laravel Library Management System is a web application built with Laravel and MySQL, designed to manage a library's book inventory and user borrowings.

## Features
- **Authentication and Authorization:**
  - Users can register, log in, and log out.
  - Two types of users: Librarian and Member.
  - Only Librarian users can add, edit, or delete books.

- **Book Management:**
  - Add new books with details like title, author, genre, ISBN, and total copies.
  - Edit and delete book details.
  - Search functionality by title, author, or genre.

- **Borrowing and Returning:**
  - Members can borrow available books (not the same book multiple times).
  - Track borrowing and due dates.
  - Librarians can mark books as returned.

- **Dashboard:**
  - Librarian Dashboard:
    - Total books, borrowed books, books due today.
    - List of members with overdue books.
  - Member Dashboard:
    - Display borrowed books, their due dates, and any overdue books.

- **API Endpoints:**
  - CRUD operations for books and borrowings.
  - Proper status codes and responses.

## Setup Instructions

### Prerequisites
- PHP (>= 7.3)
- Composer
- MySQL
- Node.js and npm (for frontend, if applicable)

### Installation Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/library-management-system.git

1. Navigate to the project directory:
   ```bash
   cd library-management-system

2. Install PHP dependencies:
    ```bash
    composer install
    
3. Create a copy of the .env.example file and rename it to .env:
    ```bash
    cp .env.example .env

4. Generate the application key:
   ```bash
   php artisan key:generate

5. Configure the database settings in the .env file.
   
6. Run the database migrations:
   ```bash
   php artisan migrate
   
7. (Optional) Seed the database with demo data:
   ```bash
   php artisan db:seed

8. Start the development server:
   ```bash
   php artisan serve

9. Access the application in your browser at http://localhost:8000.

### Any further information please contact Luigi Fernando Barraza Di Filippo at luigibarraza01@gmail.com
