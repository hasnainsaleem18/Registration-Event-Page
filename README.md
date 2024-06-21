### Nutec Event Registration System

This repository contains a simple web application for managing registrations for Nutec'24 events. It consists of two main pages:

1. **Registration Event Page**
   - Allows users to register for events by filling out a form.
   - Data entered here is stored in a MySQL database table named `registrations`.

2. **Registration Record Page**
   - Provides a search interface to retrieve registration records.
   - Users can search by Roll No, Event Name, or Department and view corresponding registration details.

#### Files Included:
- `register_event.php`: Handles event registration form submission and database insertion.
- `view_records.php`: Manages the search functionality and displays registration records.
- `README.md` (this file): Provides an overview of the project and its functionalities.

#### Technologies Used:
- PHP for server-side scripting.
- HTML and CSS for frontend development.
- MySQL for database management.

#### How to Use:
1. Set up a MySQL database named `nutec`.
2. Create a table named `registrations` with appropriate columns.
3. Host the PHP files (`register_event.php` and `view_records.php`) on a server with PHP support.
4. Access `register_event.php` to register for events and `view_records.php` to search for registration records.

Feel free to contribute to improve this project!

