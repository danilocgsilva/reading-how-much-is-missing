# Letcure: how much is still missing?

Helps to understands in how much you are in a current reading.

## How to Build

1. In the root project directory, execute: `docker-compose up -d --build`

2. Then execute: `docker run -tid --name howmuch -v "$(pwd)/app:/app" how-much-is-still-missing_how_much_is_still_missing`

Note: check if the name is already used (`howmuch`). Happens if you run it more than one time. If so, just change the name to anything else.

Check [technical document](tech/README.md).
