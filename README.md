# ascentic-test
ascentic test


IDENTIFIED IMPROVEMENTS TODO:

-Should add indexes in the database after identified most serchable columns to reduce query execution time

-All dropdown values in create pages should retrieve from the database tables

-dropdown values should validate with parent tables before save. eg - should validate country id with countries table before save the perfume product

-ProductCreate Controller should devide into separate classes. Currently there are several methods for each types. We can move these into separate traits or separate classes


-Paginations should implement from the backend. not front end. I had to use bootstrap datatable due to time limitations




front end

added front end vendors with versions

datatable plugin added for support of pagination and search facility

backend

added htaccess to avoid index.php file in url

developed common header and footer for dynamic developments for html section

main methods added to controll form submissions and selling price identification


how to install

change base url in the config.php file

run the database dump

login 
	username - admin
	password - password


  
