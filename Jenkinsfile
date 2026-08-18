pipeline {
    agent any

    stages {

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Copy Repository to Server 1') {
            steps {
                sh '''
                    ssh ubuntu@172.30.7.144 "mkdir -p /home/ubuntu/jenkins-app3"

                    rsync -av --delete \
                    ./ \
                    ubuntu@172.30.7.144:/home/ubuntu/jenkins-app3/
                '''
            }
        }

        stage('Deploy App3 and PostgreSQL') {
            steps {
                sh '''
                    ssh ubuntu@172.30.7.144 "
                        cd /home/ubuntu/jenkins-app3 &&
                        docker compose pull &&
                        docker compose up -d
                    "
                '''
            }
        }

        stage('Verify Deployment') {
            steps {
                sh '''
                    ssh ubuntu@172.30.7.144 "
                        docker ps
                    "
                '''
            }
        }
    }
}
