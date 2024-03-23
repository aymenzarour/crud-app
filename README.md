#CRUD-APP

#### Overview:

This repository contains the source code for the CRUD (Create, Read, Update, Delete) application along with the Jenkins pipeline configuration for building and pushing Docker images to Docker Hub. The application is built using PHP and MySQL, with Dockerfiles provided for both components. The Jenkins pipeline automates the CI/CD process, ensuring seamless integration and deployment of changes.

#### Project Structure:

-   app/: Contains the PHP application code including scripts for CRUD operations.
-   sql/: Includes SQL scripts and Dockerfile for MySQL database setup.
-   Jenkinsfile: Defines the Jenkins pipeline for building and pushing Docker images.

#### Jenkins Pipeline:

1.  Checkout Source: This stage retrieves the source code from the repository.
2.  Build images: Builds Docker images for both the PHP application and MySQL database using Dockerfiles.
3.  Pushing Images: Pushes the built Docker images to Docker Hub.
4.  Trigger Manifest Update: Triggers the Jenkins job `updatemanifest` to update Kubernetes manifests in the associated repository with the tag of the last builded image.

Kubernetes Manifest Repository: [crud-app-k8s-manifest](https://github.com/aymenzarour/crud-app-k8s-manifest)
