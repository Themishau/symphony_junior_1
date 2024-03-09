# Variables
CONTAINER_NAME=symfony-junior-task-api
IMAGE_NAME=symfony-junior-task-api-image

# Build the Docker image
build:
	docker build -t $(IMAGE_NAME) .

# Start the Docker container
start:
	docker run -d --name $(CONTAINER_NAME) -p 8080:80 $(IMAGE_NAME)

# Stop the Docker container
stop:
	docker stop $(CONTAINER_NAME)

# Remove the Docker container
rm:
	docker rm $(CONTAINER_NAME)

# Remove the Docker image
rmi:
	docker rmi $(IMAGE_NAME)

# Rebuild the Docker image and restart the container
rebuild: stop rmi build start
