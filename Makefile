start: docker-build docker-run

docker-run:
	docker run -it --rm --name running-app php-app

docker-build:
	docker build -t php-app .