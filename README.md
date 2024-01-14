
# Laravel Quiz Project

This Laravel project is a simple quiz platform where users can create, edit, and take quizzes. Authentication is required to create and edit quizzes.

## Getting Started

Follow the steps below to set up and run the project on your local machine:

### Prerequisites

Make sure you have the following installed on your machine:

- [PHP](https://www.php.net/) (>= 8.1)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [npm](https://www.npmjs.com/)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/xHacka/PHP.git
    ```

2. Navigate to the project directory:

    ```bash
    cd PHP
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies:

    ```bash
    npm install
    ```

5. Create a copy of the `.env.example` file and rename it to `.env`. Update the database and other relevant configurations.
	* To use SQLite: `DB_CONNECTION=sqlite`
	* For different database fill this variables: `DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD`

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Run database migrations and seed the database:

    ```bash
    php artisan migrate
    ```

8. Compile assets:

    ```bash
    npm run build
    ```

### Running the Application

To start the Laravel development server, run:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser to access the application.

## Usage

### Authentication

To access the quiz creation and editing features, users must be authenticated. You can register for an account using the registration page or use the provided login functionality.

### Available Routes

- **Home:** `/` or `/home` - Displays the list of quizzes. Requires authentication.

- **Quizzes:**
  - View all quizzes: `/quizzes`
  - Create a quiz: `/quizzes/create`
  - Edit a quiz: `/quizzes/edit/{quiz}`
  - Delete a quiz: `/quizzes/delete/{quiz}`
  - View quiz details: `/quizzes/{quiz}`
  - Start a quiz: `/quizzes/{quiz}/start`

- **Questions:**
  - Create a question: `/questions/create`
  - Edit a question: `/questions/edit/{quiz}/{question}`
  - Check answer: `/questions/check-answer`
  - Get questions for a quiz: `/questions/get/{quiz}`
  - Store a question: `/questions/store`
  - Update a question: `/questions/update/{quiz}/{questionId}`
  - Delete a question: `/questions/destroy/{quiz}/{question}`

- **Authentication:**
  - Login: `/login`
  - Logout: `/logout`
  - Register: `/register`
  
Refer to the respective controllers and routes for more details on functionality. 

## License

This project is open-sourced under the [MIT license](LICENSE).

<!-- Design Is Very Human -->
