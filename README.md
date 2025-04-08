# Hekkensluiter

A prison management system for the Arrestantencomplex Houten, a detention facility in the Netherlands. This was developed as a school project.

![Hekkensluiter Welcome Screen](/resources/assets/welcome-screenshot.png)

## Overview

Hekkensluiter is a Laravel-based web application designed to manage prisoners, cells, incidents, and related data in a detention facility. The system provides a comprehensive solution for prison staff to track inmates, cell assignments, and maintain records of incidents and daily logs.

## Features

- **Prisoner Management**: Track prisoner information including personal details, arrival/departure dates, and profile pictures
- **Cell Management**: Organize cell assignments and track cell history
- **Incident Reporting**: Document and manage incidents involving prisoners
- **Prisoner Logs**: Maintain daily logs for prisoners
- **User Management**: Role-based access control with three levels:
  - Bewaker (Guard): Basic access
  - Coordinator Bewaker (Coordinator Guard): Enhanced permissions
  - Directeur (Director): Administrative access with full system control

## Technology Stack

- **Backend**: PHP 8.2 with Laravel framework
- **Database**: MySQL 8.0
- **Frontend**: Bootstrap, CSS, JavaScript
- **Development Environment**: Docker containerization

## Installation Requirements

1. Docker and Docker Compose
2. PHP 8.2+
3. Composer
4. MySQL 8.0

## Setup Instructions

1. Clone the repository
2. Configure your `.env` file with database credentials
3. Run `docker-compose up -d` to start the containers
4. Access the application at http://localhost
5. For database administration, PhpMyAdmin is available at http://localhost:8080

## System Architecture

The application follows the standard Laravel MVC architecture:
- **Models**: Prisoner, Cell, CellHistory, Incident, PrisonerLog, User
- **Controllers**: Handle business logic for all resources
- **Views**: Blade templates for the user interface
- **Middleware**: Includes role-based access control and read-only mode

## Security

- Authentication system with user roles
- Role-based access restrictions
- CSRF protection
- Protected routes requiring authentication

## About the Facility

The Arrestantencomplex Houten is a modern police detention facility featuring:
- 105 detention cells
- 10 intake cells
- 20 interrogation rooms
- 2 digital interrogation studios
- Supporting facilities including attorney rooms and family rooms