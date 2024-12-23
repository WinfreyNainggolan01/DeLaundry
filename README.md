# DeLaundry Website

Welcome to the DeLaundry project! This website is a part of the Web Programming and Testing course, specifically designed to streamline the laundry process for IT Del campus students and administrators. It offers features tailored to enhance user experience and operational efficiency.

![DeLaundry Banner](https://github.com/WinfreyNainggolan01/DeLaundry/blob/main/public/img/Logo-DeLaundry.png)

## Features

### For Students

- 🧺 **Order:** Place laundry requests seamlessly.
- 🚨 **Complaint:** Submit and track complaints related to laundry services.
- 💰 **Finance:** View and manage payment details.
- 📍 **Tracking:** Monitor the status of your laundry in real-time.
- 👤 **Profile:** Manage personal information and preferences.

### For Admins

- 🎓 **Control Student:** Manage student accounts and details.
- 🛠️ **Control Complaint:** Handle and resolve complaints efficiently.
- 📦 **Control Orders:** Oversee and manage all laundry orders.

## Project Structure

### Controllers

- **AdminController:** Handles administrative functionalities like managing students, complaints, and orders.
- **FrontendController:** Manages student-facing features including order placement, complaint submission, and profile updates.

## Getting Started

### Prerequisites

- PHP 8.x
- Laravel Framework 10.x
- MySQL Database
- A web server like Apache or Nginx

### Installation Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/WinfreyNainggolan01/DeLaundry.git
   ```
2. Navigate to the project directory:
   ```bash
   cd DeLaundry
   ```
3. Install dependencies:
   ```bash
   composer install
   ```
4. Configure the environment file:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database credentials.
5. Run migrations to set up the database:
   ```bash
   php artisan migrate
   ```
6. Serve the application:
   ```bash
   php artisan serve
   ```

### Usage

- Access the student portal at `http://localhost:8000`.
- Admin functionalities are available at `http://localhost:8000/admin`.

## Contribution

Contributions are welcome! If you have suggestions or improvements, feel free to submit a pull request.

🌟 **Check the Repository:** [GitHub](https://github.com/WinfreyNainggolan01/DeLaundry)

## License

This project is licensed under the MIT License.

## Acknowledgements

- Thanks to all contributors and supporters of this project.

Enjoy using DeLaundry! If you encounter any issues, please reach out via the issue tracker.

