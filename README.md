# Site Manager 360

_Site Manager 360_ was my university dissertation project, developed in collaboration with a local construction company. The goal of the application was to improve the efficiency of the company's workflow through a tailored web-based management system.

The project involved close collaboration with the clients to gather and refine requirements, following agile methodology to remain flexible and responsive to change. The application was built using the **Laravel** web framework and demonstrated a full-stack approach to project design and development.

Although the dissertation version was not fully completed, the work led to a post-university partnership with the same company. As a result, I have since developed and deployed an evolved version of the application using Vite/React for the front-end and Node.js/Express for the back-end. This new app is now actively used across the company to manage its entire warehouse inventory.

# Run Instructions
To run this application locally:
- Start the application container in Docker.
- In a terminal at the project's source, run 'npm run dev'.

To generate dummy data for the application:
- In a terminal at the project's source, run 'sail artisan migrate:fresh --seed'.

Default login details will be generated with these seeders:
- For an admin account use: username = john@web.com, password = password.
- For a regular user account use: username = slittle@web.com, password = password.
