The Docker image is used exclusively for local development and was 
not created for evaluation.
To start the project please run the commands -

--build and up containers--

docker-compose up -d

--go inside the container--

docker-compose exec -u 1000 app bash

--run migrations--

php artisan migrate

//---------------------------------//

For local testing can use endpoint
http://localhost:8888/api/submit

orl CURL -

curl --location 'http://localhost:8888/api/submit' \
--header 'Accept: application/json' \
--header 'X-CSRF-TOKEN: 61752e58b04a46d060134445ef8e81d51' \
--header 'Content-Type: application/json' \
--data-raw '{
"name": "John Doe",
"email": "john.doe21@example.com",
"message": "This is a test message."
}


