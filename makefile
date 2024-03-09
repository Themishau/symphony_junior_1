# Variables
CONTAINER_NAME=symfony-junior-task-api
IMAGE_NAME=symfony-junior-task-api-image

# Build the Docker image
.PHONY: build
build:
	docker build -t $(IMAGE_NAME) .

# Start the Docker container
.PHONY: run
run:
	docker run -d --name $(CONTAINER_NAME) -p 8080:80 $(IMAGE_NAME)

# Stop the Docker container
.PHONY: stop
stop:
	docker stop $(CONTAINER_NAME)

# Remove the Docker container
.PHONY: rm
rm:
	docker rm $(CONTAINER_NAME)

# Remove the Docker image
.PHONY: rmi
rmi:
	docker rmi $(IMAGE_NAME)

# Rebuild the Docker image and restart the container
.PHONY: rebuild
rebuild: stop rmi build start

# Create Logs 
.PHONY: logs
logs:
	docker logs my-api-project-container
