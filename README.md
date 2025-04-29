# Instructions
To run this application locally:
- Start the application container in Docker.
- In a terminal at the project's source, run 'npm run dev'.

To generate dummy data for the application:
- In a terminal at the project's source, run 'sail artisan migrate:fresh --seed'.

Default login details will be generated with these seeders:
- For an admin account use: username = john@web.com, password = password.
- For a regular user account use: username = slittle@web.com, password = password.