# website-server
A webserver ran by ReactPHP

# Running

Install packages
```shell
docker-compose -f docker-compose.build.yml run --rm composer
```

Run the app
```shell
docker-compose up
```

Testing the app (Requires the previous command for this to be successful)
```shell
docker-compose -f docker-compose.test.yml run --rm test
```