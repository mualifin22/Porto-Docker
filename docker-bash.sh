#!/bin/bash

# Default container name
CONTAINER_NAME=${1:-porto-workspace-1}

# Check if the container is running
if docker ps --filter "name=$CONTAINER_NAME" | grep -q "$CONTAINER_NAME"; then
    echo "Entering bash shell for container: $CONTAINER_NAME"
    docker exec -it $CONTAINER_NAME bash
else
    echo "Container '$CONTAINER_NAME' is not running. Please start it first."
fi
