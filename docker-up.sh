#!/bin/bash

# Start Docker containers in detached mode
echo "Starting Docker containers..."
docker compose -f compose.dev.yaml up -d

# Check if containers are running
if [ $? -eq 0 ]; then
    echo "Containers started successfully."
    docker ps
else
    echo "Failed to start containers. Please check the logs."
fi
