# Contacts CRUD Application

This is a Laravel-based CRUD application for managing contacts with a bulk XML import functionality. The application uses the latest Laravel version, Blade templates, and Bootstrap for the UI.

## Features

- **CRUD Operations:** Create, read, update, and delete contacts.
- **Bulk XML Import:** Import contacts from a plain text XML file. Each line should be in the format:
    Name+CountryCode PhoneNumber
    Example: 'KöktenAdal+90 333 8859342'

- **Search & Scrollable List:** Easily search for contacts and navigate through a scrollable contacts list.

## Requirements

- PHP (compatible with the latest Laravel version)
- Composer
- A supported database (e.g., MySQL, PostgreSQL)
- Git

> **Note:** Testers are expected to have their development environment (PHP, Composer, database) already set up.

## Installation

Follow these steps to set up the project locally:

1. **Clone the Repository:**
 
    git clone https://github.com/yourusername/contacts-crud.git
    cd contacts-crud

2. **Install Dependencies**:

    composer install

3. **Environment Setup**:

    Copy the .env.example to .env:
    cp .env.example .env

4. **Generate the Application Key**:

    php artisan key:generate

5. **Run Database Migrations**:

    php artisan migrate

## Usage

1. **Start the Development Server**:

    php artisan serve

2. **Access the Application**:

    > Open your browser and navigate to http://localhost:8000.

3. **Test the Features**:
    
    > *Contacts List & Search*: View, search, and scroll through contacts.
    > *CRUD Operations*: Add, edit, or delete contacts.
    > *Bulk XML Import*: Use the provided import form to upload an XML file containing contacts in the specified format.

# License

*This project is open source and free to use.*


