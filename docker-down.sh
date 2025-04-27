#!/bin/bash

# Stop and remove Docker containers
echo "Stopping Docker containers..."
docker compose -f compose.dev.yaml down

# Check if containers are stopped
if [ $? -eq 0 ]; then
    echo "Containers stopped successfully."
else
    echo "Failed to stop containers. Please check the logs."
fi
