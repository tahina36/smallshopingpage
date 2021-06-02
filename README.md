# Test rue du commerce

## Features

- Create a product with a description, brand, name, price and images
- list products 
- edit products
- remove products
- show a list of product and their product page in the front


## Deployement

First you need to have docker and composer installed on your computer.Once docker is installed and running do the following

Step 1:

```sh
git clone https://github.com/tahina36/smallshopingpage.git on your computer 
```

Step 2:

```sh
cd smallshopingpage/demo-app
```

Step 3:

```sh
cp .env_demo .env
```

Step 4:

```sh
composer install
```

Step 5:

```sh
./vendor/bin/sail up
```

Step 6:

```sh
When the images are created and running, got to : http://localhost/ on your browser
```

