node{
       stage("SCM Checkout"){
            git 'https://github.com/DevOpsgroup0/ProjectNewRepo.git'
        }
        stage('Build') {
            
            sh 'python3 -m compileall api/linkextractor.py api/main.py'
            
        }
        stage('Test') {
            sh 'pip3 install -r api/requirements.txt'
            sh 'python3 -m pytest --verbose --junit-xml  api/test_python.py'
        }
       
        stage("Build Docker Image"){ 
            
           step([$class: 'DockerComposeBuilder', dockerComposeFile: 'docker-compose.yml', option: [$class: 'StartAllServices'], useCustomDockerComposeFile: true])
        }
        
        stage("Push docker Image"){
            withCredentials([string(credentialsId: 'docker-pwd', variable: 'dockerHubPwd')]){
               sh "docker login -u iccndev -p ${dockerHubPwd}"
            }
            sh "docker-compose push"
        }
        stage('Deploy App'){
            kubernetesDeploy(configs: "deploy.yml", kubeconfigId: "mykubeconfig")
        }
    }
