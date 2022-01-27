
# Retail Store Backend

This is the microservices-based e-commerce solution that customers can register to the system and he or she can buy retails product from the store. the Store admin can manage the products, orders, and the customer.

This e-commerce system consist of the three main microservices.

 1. Customer Service
 2. Product Service
 3. Order Service
 
 
#### Architecture Diagram

 ![enter image description here](https://github.com/Dilshan97/Retail-e-commerce-Backend/raw/master/diagram.png)


## Setup Local Environment

 1. Clone the repository 
		 `https://github.com/Dilshan97/Retail-e-commerce-Backend`
 
 2. Change the project directory.
		`cd Retail-e-commerce-Backend`
		
 3. Install dependencies for each Micro Services using the following command.
		`composer install` 
	
 4. Create env file using the following command.
	 `copy .env.example .env`
	 
 5. Generate App Key using the following command.
	 `php artisan key:generate`
	 
 6. Create a three database for each of the microservice.
 
 7. Fill in all the required credentials env and setup the database.
	 
 8. Link the storage  using the following command.
	 `php artisan storage:link`
	
 9. Create database tables and add dummy data using the following command.
	 `php artisan migrate --seed` 
 
		
## Development server

You can run these three microservices using two ways.

 1. Using artisan serve `php artisan serve`
	 *hint: if you want to the artisan serve with different port, you can use `php artisan serve --port=8001` command* 
	
 2. Virtual host [this article may be helpfull for create virtual-host](https://medium.com/@ajtech.mubasheer/configure-a-virtual-host-for-laravel-project-in-xampp-for-windows-10-d3f0068e7e1b)

## API Documentation
[Retail E-commerce Documentation](https://documenter.getpostman.com/view/15417642/TzJrCzGe)

## External libraries that used

 1. [laravel passport](https://github.com/laravel/passport)

Stay Home | Stay Safe | Happy Coding! ❤️💻👨‍🎓😷
  
