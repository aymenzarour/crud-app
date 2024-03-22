pipeline {
    environment {
        dockerimagenameapp = "aymenzarour/phpcrudapp"
        dockerImageapp = ""
        
        dockerimagenamedb = "aymenzarour/mysqldb-mcv"
        dockerImagedb = ""
    }

    agent any

    stages {
        stage('Checkout Source') {
            steps {
                script {
                    checkout([
                        $class: 'GitSCM', 
                        branches: [[name: 'main']],  
                        doGenerateSubmoduleConfigurations: false, 
                        userRemoteConfigs: [[
                            credentialsId: 'github-token', 
                            url: 'https://github.com/aymenzarour/crud-app.git'
                        ]]
                    ])
                }
            }
        }

        stage('Build images') {
            steps {
                script {
                    dockerImageapp = docker.build dockerimagenameapp, "-f app/Dockerfile php-app/app"
                }
                script {
                    dockerImagedb = docker.build dockerimagenamedb, "-f sql/Dockerfile php-app/sql"
                }
            }
        }

        stage('Pushing Images') {
            environment {
                registryCredential = 'dockerhublogin'
            }
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', registryCredential) {
                        dockerImageapp.push("${env.BUILD_NUMBER}")
                    }
                }
                
                script {
                    docker.withRegistry('https://registry.hub.docker.com', registryCredential) {
                        dockerImagedb.push("latest")
                    }
                }
                
            }
        }
        
        stage('Trigger ManifestUpdate') {
            steps {
                echo "triggering updatemanifestjob"
                build job: 'updatemanifest', parameters: [string(name: 'DOCKERTAG', value: env.BUILD_NUMBER)]
            }
        }
    }
}

