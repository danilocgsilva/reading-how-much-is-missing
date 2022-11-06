#!/bin/bash

docker-compose up -d --build

docker run -tid --name howmuch -v "$(pwd)/app:/app" how-much-is-still-missing_how_much_is_still_missing
