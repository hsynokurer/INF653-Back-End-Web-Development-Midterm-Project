<?php

// Include the "quotes" class file
include("../class/quotes.php");

// Set response headers to allow cross-origin resource sharing and specify the content type as JSON
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");

// Create an instance of the "quotes" class
$crud = new Crud(); 

// Check if the HTTP request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
  // Create an SQL query to fetch all data from the "quotes" table
  $sql = "select * from quotes";
  
  // Execute the query using the "read" method of the "quotes" class
  $res = $crud->read($sql);

  // Count the number of rows returned by the query
  $count = mysqli_num_rows($res);

  // If there are rows returned, create an array of all the data
  if($count > 0)
  {
    $getdata = array();
	 
    // Loop through each row of the result set and add it to the array
    while($row = mysqli_fetch_array($res))
    { 
      $getdata[] = $row;
    }
    
    // Create a response array with a status of true and the array of data
    $result = array("status" => true , "alldata" => $getdata); 
  }
  else
  {
    // If there are no rows returned, create a response array with a status of false and an error message
    $result = array("status" => false , "message" => 'No quote(s) found...'); 
  }

  // Encode the response array as JSON and output it
  echo json_encode($result);
}
else
{
  // If the HTTP request method is not GET, create a response array with a status of 405
{
	 $error = array("status" => 405 , "message" => 'Method not allowed...');
	 
echo json_encode($error);
}


//quotes based on quotes ID Code
<?php
// Importing the class that contains the CRUD functionality
include("../class/quotes.php");

// Set the response headers to allow cross-domain requests and return JSON data
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json"); 

// Create an instance of the Crud class
$crud = new Crud(); 

// Check if the request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	// Construct the SQL query to fetch the quote with the specified ID
	$sql = "SELECT * FROM quotes WHERE id=".$_GET['quote_id'];

	// Execute the query using the Crud object's read() method
	$res = $crud->read($sql);

	// Get the number of rows returned
	$count = mysqli_num_rows($res);

	// If at least one row was returned
	if($count > 0)
	{
		// Create an empty array to hold the quotes
		$quotes= array();

		// Loop through each row returned by the query and add it to the $quotes array
		while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
		{
			$quotes[] = $row;
		}

		// Create an array to hold the result of the operation
		$result = array("status" => true , "Quote" => $quotes);
	}
	else
	{
		// Create an array to hold the result of the operation
		$result = array("status" => false , "message" => 'Quote not found...');
	}

	// Return the result as a JSON-encoded string
	echo json_encode($result);
}
else
{
	// Create an array to hold the error message
	$error = array("status" => 405 , "message" => 'Method not allowed...');

	// Return the error message as a JSON-encoded string
	echo json_encode($error);
}    

  
//get quotes based on authorId code
<?php
// Importing the class that contains the CRUD functionality
include("../class/quotes.php");

// Set the response headers to allow cross-domain requests and return JSON data
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json"); 

// Create an instance of the Crud class
$crud = new Crud(); 

// Check if the request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	// Construct the SQL query to fetch all quotes for the specified author ID
	$sql = "SELECT * FROM quotes WHERE authorId=".$_GET['author_id'];

	// Execute the query using the Crud object's read() method
	$res = $crud->read($sql);

	// Get the number of rows returned
	$count = mysqli_num_rows($res);

	// If at least one row was returned
	if($count > 0)
	{
		// Create an empty array to hold the quotes
		$quotes= array();

		// Loop through each row returned by the query and add it to the $quotes array
		while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
		{
			$quotes[] = $row;
		}

		// Create an array to hold the result of the operation
		$result = array("status" => true , "Quotes" => $quotes);
	}
	else
	{
		// Create an array to hold the result of the operation
		$result = array("status" => false , "message" => 'Quote not found...');
	}

	// Return the result as a JSON-encoded string
	echo json_encode($result);
}
else
{
	// Create an array to hold the error message
	$error = array("status" => 405 , "message" => 'Method not allowed...');

	// Return the error message as a JSON-encoded string
	echo json_encode($error);
}    


//get quotes based on the categoryId
<?php
// Importing the class that contains the CRUD functionality
include("../class/quotes.php");

// Set the response headers to allow cross-domain requests and return JSON data
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json"); 

// Create an instance of the Crud class
$crud = new Crud(); 

// Check if the request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
	// Construct the SQL query to fetch all quotes for the specified category ID
	$sql = "SELECT * FROM quotes WHERE categoryId=".$_GET['category_id'];

	// Execute the query using the Crud object's read() method
	$res = $crud->read($sql);

	// Get the number of rows returned
	$count = mysqli_num_rows($res);

	// If at least one row was returned
	if($count > 0)
	{
		// Create an empty array to hold the quotes
		$quotes= array();

		// Loop through each row returned by the query and add it to the $quotes array
		while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
		{
			$quotes[] = $row;
		}

		// Create an array to hold the result of the operation
		$result = array("status" => true , "Quotes" => $quotes);
	}
	else
	{
		// Create an array to hold the result of the operation
		$result = array("status" => false , "message" => 'Quote not found...');
	}

	// Return the result as a JSON-encoded string
	echo json_encode($result);
}
else
{
	// Create an array to hold the error message
	$error = array("status" => 405 , "message" => 'Method not allowed...');

	// Return the error message as a JSON-encoded string
	echo json_encode($error);
}    


//Fetch quotes based on Category ID and Author ID
<?php
include("../class/quotes.php");

// Set the headers to allow cross-origin resource sharing and specify the response content type as JSON
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json"); 

// Create a new Crud object to interact with the database
$crud = new Crud(); 

if($_SERVER["REQUEST_METHOD"] == "GET")
{
  // Build the SQL query to fetch quotes with the specified category and author IDs
  $sql = "SELECT * FROM quotes WHERE categoryId=".$_GET['category_id']." AND authorId=".$_GET['author_id'];
  
  // Execute the query and get the result set
  $res = $crud->read($sql);

  // Count the number of rows returned from the query
  $count = mysqli_num_rows($res);

  if($count > 0)
  {
    // Create an array to hold the fetched quotes
    $quotes= array();

    // Loop through each row in the result set and add it to the quotes array
    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
    {
      $quotes[] = $row;
    }
 
    // Build the result array with a success status and the fetched quotes
    $result = array("status" => true , "Quotes" => $quotes);
  }
  else
  {
    // Build the result array with a failure status and an error message
    $result = array("status" => false , "message" => 'Quote not found...');
  }
  
  // Encode the result array as a JSON string and output it to the client
  echo json_encode($result);
}
else
{
  // Build an error array with an HTTP status code and an error message
  $error = array("status" => 405 , "message" => 'Method not allowed...');
  
  // Encode the error array as a JSON string and output it to the client
  echo json_encode($error);
}  



//creating a qoute
<?php
// Include the quotes.php class file and set appropriate headers
include("../class/quotes.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");
 
// Create an instance of the CRUD class
$crud = new Crud();

// Check if the request method is POST
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    // Parse the data sent in the request
    $data = array();
    parse_str(file_get_contents('php://input'),$data); 

    // Extract the necessary fields from the parsed data
    $id = $data["id"]; 
    $quote = $data["quote"]; 
    $authorId= $data["authorId"]; 
    $categoryId = $data["categoryId"];

    // Construct the SQL query to insert the quote data into the database
    $sql = "INSERT INTO quotes (id, quote, authorId, categoryId) VALUES ('$id', '$quote', '$authorId', '$categoryId')";
    
    // Execute the SQL query using the create method of the CRUD class
    $res = $crud->create($sql); 

    // Check if the SQL query was successful
    if ($res)
    {
        // If successful, create a result array with success status and message
        $result = array("status" => true , "message" => "Quote Added Successfully...");
    }
    else
    {
        // If unsuccessful, create a result array with failure status and message
        $result = array("status" => false , "message" => "Something went wrong...");
    }

    // Encode the result array into JSON and send the response
    echo json_encode($result);
}
else
{
    // If the request method is not POST, create an error array with appropriate status and message
    $error = array("status" => 405 , "message" => 'Method not allowed...');
    
    // Encode the error array into JSON and send the response
    echo json_encode($error);
} 



//update quote
<?php
include("../class/quotes.php");

// set headers to allow cross-origin resource sharing and specify content type as form data
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");
 
$crud = new Crud();

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    // extract data from the POST request
    $data = array();
    parse_str(file_get_contents('php://input'),$data); 

    // assign variables to extracted data
    $id = $data["id"]; 
    $quote = $data["quote"]; 
    $authorId= $data["authorId"]; 
    $categoryId = $data["categoryId"]; 

    // build SQL query to update quote data for the given quote ID
    $sql = "UPDATE quotes SET quote = '$quote', authorId = '$authorId', categoryId = '$categoryId' WHERE id = '$id'";
    $res = $crud->update($sql); 

    if ($res)
    {
        // if update was successful, return success status and message
        $result = array("status" => true , "message" => "Quote Updated Successfully...");
    }
    else
    {
        // if update failed, return failure status and message
        $result = array("status" => false , "message" => "Quote With ID not Found");
    }

    // encode result as JSON and return it to the client
    echo json_encode($result);
}
else
{
    // if request method is not POST, return error status and message
    $error = array("status" => 405 , "message" => 'Method not allowed...');
    echo json_encode($error);
}  



//Deleting a Quote with Id
<?php
// Import the Quotes class
include("../class/quotes.php");

// Set the headers for CORS and content type
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json"); 

// Instantiate the Crud class
$crud = new Crud();

// Check if the request method is DELETE
if($_SERVER["REQUEST_METHOD"] == "DELETE")
{
    // Construct the SQL query to delete a quote by ID
    $sql = "DELETE FROM quotes WHERE id=".$_GET['id'];
    // Execute the query using the Crud object
    $res = $crud->deletes($sql); 

    // Check if the query was successful
    if ($res)
    {
        // Construct a success response
        $result = array("status" => true , "message" => "Quote deleted successfully.");
    }
    else
    {
        // Construct an error response for a non-existent quote
        $result = array("status" => false , "message" => "Quote not found.");
    }

    // Return the response as JSON
    echo json_encode($result);
}
else
{
    // Construct an error response for a non-DELETE request
    $error = array("status" => 405 , "message" => 'Method not allowed.');
    // Return the response as JSON
    echo json_encode($error);
} 



//Fetch all Authors
<?php
// Include the necessary files
include("../class/quotes.php");

// Set the appropriate headers
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");

// Create a new Crud object
$crud = new Crud(); 

// If the request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
  // Construct the SQL query to retrieve all authors
  $sql = "SELECT * FROM authors";
  
  // Execute the query
  $res = $crud->read($sql);

  // Get the number of rows returned
  $count = mysqli_num_rows($res);

  // If there are rows returned
  if($count > 0)
  {
    // Initialize an empty array to hold the data
    $getdata = array();
	 
    // Loop through each row and append it to the array
    while($row = mysqli_fetch_array($res))
    { 
      $getdata[] = $row;
    }

    // Construct the response array
    $result = array("status" => true , "alldata" => $getdata); 
  }
  else
  {
    // If there are no rows returned, set the response accordingly
    $result = array("status" => false , "message" => 'No Author(s) found...'); 
  }

  // Return the response as a JSON string
  echo json_encode($result);
}
else
{
  // If the request method is not GET, set the error response accordingly
  $error = array("status" => 405 , "message" => 'Method not allowed...');

  // Return the error response as a JSON string
  echo json_encode($error);
}


//Get author based on ID
include("../class/quotes.php");

// set header to allow cross-origin resource sharing
header("Access-Control-Allow-Origin: *");

// set content type to JSON
header("Content-type:application/json");

// create a new instance of Crud class
$crud = new Crud(); 

// check if request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    // get the author ID from the query string
    $authorId = $_GET['id'];

    // select all quotes from the authors table with the given ID
    $sql = "SELECT * FROM authors WHERE id=".$authorId;
    $res = $crud->read($sql);

    // get the number of rows returned
    $count = mysqli_num_rows($res);

    // check if there's at least one row returned
    if($count > 0)
    {
        // create an array to store the quotes
        $quotes= array();

        // loop through the rows and add them to the quotes array
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
        {
            $quotes[] = $row;
        }
        
        // create a success response with the quotes
        $result = array("status" => true , "Quotes" => $quotes);
    }
    else
    {
        // create an error response if no rows are returned
        $result = array("status" => false , "message" => 'Author not found...');
    }
    
    // return the response as JSON
    echo json_encode($result);
}
else
{
    // create an error response if the request method is not GET
    $error = array("status" => 405 , "message" => 'Method not allowed...');
    
    // return the response as JSON
    echo json_encode($error);
}



//Insert Author
<?php
// Include necessary files and set response headers
include("../class/quotes.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");
 
// Create new Crud object
$crud = new Crud();

// Check if request method is POST
if($_SERVER["REQUEST_METHOD"] === "POST")
{
  // Parse the request body into an array
  $data = array();
  parse_str(file_get_contents('php://input'),$data); 

  // Get the id and author from the parsed data
  $id= $data["id"]; 
  $author= $data["author"]; 

  // Prepare the SQL query to insert the author into the database
  $sql = "insert into products (id,author) values ('$id','$author')";
  
  // Execute the query using the create method from the Crud object
  $res = $crud->create($sql); 

  // Check if the query was successful
  if ($res)
  {
    // Create a success response with a message
    $result = array("status" => true , "message" => "Author Added Successfully...");
  }
  else
  {
    // Create an error response with a message
    $result = array("status" => false , "message" => "Something went wrong...");
  }

  // Send the response back in JSON format
  echo json_encode($result);
}
else
{
  // Create an error response if the request method is not POST
  $error = array("status" => 405 , "message" => 'Method not allowed...');
  echo json_encode($error);
}



//Update Author
<?php
include("../class/quotes.php");

// Allow access from any origin
header("Access-Control-Allow-Origin: *");
// Set response content type
header("Content-Type: application/x-www-form-urlencoded");
 
$crud = new Crud();

// Check if request method is POST
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    // Parse form data from request body
    $data = array();
    parse_str(file_get_contents('php://input'),$data); 

    // Get author ID and quote from form data
    $id = $data["id"]; 
    $author = $data["author"]; 

    // Update the author's quote in the database
    $sql = "update author set quote= '$author' where id='$id'";
    $res = $crud->create($sql); 

    // Create response based on result of update query
    if ($res)
    {
        $result = array("status" => true , "message" => "Author Updated Successfully...");
    }
    else
    {
        $result = array("status" => false , "message" => "Author With ID not Found");
    }

    // Send JSON response
    echo json_encode($result);
}
else
{
    // Send error response for non-POST request method
    $error = array("status" => 405 , "message" => 'Method not allowed...');
    echo json_encode($error);
} 


//Delete Author
<?php
// Include the quotes.php file which contains the Crud class
include("../class/quotes.php");

// Set the response headers
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");

// Create a new instance of the Crud class
$crud = new Crud();

// Check if the HTTP request method is DELETE
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Get the ID of the author to be deleted from the query string
    $id = $_GET['id'];
    
    // Prepare the SQL statement to delete the author with the given ID
    $sql = "DELETE FROM author WHERE id = $id";
    
    // Execute the SQL statement and store the result
    $res = $crud->deletes($sql);

    // Check if the author was deleted successfully
    if ($res) {
        // If the author was deleted successfully, create a success response
        $result = array("status" => true , "message" => "Author deleted successfully.");
    } else {
        // If the author was not found, create an error response
        $result = array("status" => false , "message" => "Author not found.");
    }

    // Send the response as JSON
    echo json_encode($result);
} else {
    // If the HTTP request method is not DELETE, create an error response
    $error = array("status" => 405 , "message" => 'Method not allowed.');
    
    // Send the error response as JSON
    echo json_encode($error);
} 


//Fetch all Category
<?php
// Include the quotes.php file that defines the Crud class.
include("../class/quotes.php");

// Allow cross-origin resource sharing and set content type to JSON.
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");

// Create a new instance of the Crud class.
$crud = new Crud();

// If the HTTP request method is GET.
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    // Build the SQL query to select all rows from the "category" table.
    $sql = "select * from category";
    
    // Execute the SQL query using the read() method of the Crud class.
    $res = $crud->read($sql);

    // Count the number of rows returned by the SQL query.
    $count = mysqli_num_rows($res);

    // If there is at least one row returned.
    if($count > 0)
    {
        // Create an array to hold the data.
        $getdata = array();

        // Loop through the rows returned by the SQL query.
        while($row = mysqli_fetch_array($res))
        { 
            // Add the row data to the array.
            $getdata[] = $row;
        }
        
        // Create a success response JSON object containing the data.
        $result = array("status" => true , "alldata" => $getdata); 
    }
    else
    {
        // Create an error response JSON object.
        $result = array("status" => false , "message" => 'No Category(s) found...'); 
    }

    // Return the JSON response.
    echo json_encode($result);
}
else
{
    // Create an error response JSON object if the HTTP request method is not GET.
    $error = array("status" => 405 , "message" => 'Method not allowed...');

    // Return the JSON response.
    echo json_encode($error);
}



//Fetch Category based on ID
<?php
// Include the necessary class file and set the HTTP headers
include("../class/quotes.php");
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json"); 

// Create a new instance of the CRUD class
$crud = new Crud(); 

// Check if the HTTP request method is GET
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    // Build the SQL query to select the category with the specified ID
    $sql = "select * from category where id=".$_GET['id'];
    
    // Execute the query and retrieve the results
    $res = $crud->read($sql);
    
    // Get the number of rows returned by the query
    $count = mysqli_num_rows($res);

    // If there is at least one row, retrieve the quotes associated with the category
    if($count > 0)
    {
        $quotes= array();

        // Loop through each row and add the associated quote to the quotes array
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
        {
            $quotes[] = $row;
        }

        // Build the result array with a success status and the retrieved quotes
        $result = array("status" => true , "Quotes" => $quotes);
    }
    else
    {
        // Build the result array with a failure status and an error message
        $result = array("status" => false , "message" => 'Category not found...');
    }

    // Encode the result array as JSON and output it to the client
    echo json_encode($result);
}
else
{
    // Build an error result array if the HTTP method is not allowed
    $error = array("status" => 405 , "message" => 'Method not allowed...');

    // Encode the error array as JSON and output it to the client
    echo json_encode($error);
}



//Insert Category
// Include the quotes.php file which contains the Crud class
include("../class/quotes.php");

// Set the HTTP response headers to allow access from any domain and set the content type to application/x-www-form-urlencoded
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");
 
// Create a new instance of the Crud class
$crud = new Crud();

// Check if the HTTP request method is POST
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    // Retrieve the POST data and store it in an array
    $data = array();
    parse_str(file_get_contents('php://input'),$data); 

    // Get the id and category values from the data array
    $id = $data["id"]; 
    $category = $data["category"]; 

    // Build the SQL query to insert the new category into the database
    $sql = "INSERT INTO category (id, category) VALUES ('$id', '$category')";
    
    // Call the create method of the Crud object to execute the query
    $res = $crud->create($sql); 

    // Check if the query was executed successfully and create a response accordingly
    if ($res)
    {
        $result = array("status" => true , "message" => "Category Added Successfully...");
    }
    else
    {
        $result = array("status" => false , "message" => "Something went wrong...");
    }

    // Encode the result array as a JSON object and send
echo json_encode($result);
}
else
{
	 $error = array("status" => 405 , "message" => 'Method not allowed...');
	 
echo json_encode($error);
} 


//Update Category
<?php
// Include the Quotes class file
include("../class/quotes.php");

// Set the response headers to allow cross-origin requests and specify content type
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded");

// Create a new instance of the Crud class
$crud = new Crud();

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Parse the request body as an array
    $data = array();
    parse_str(file_get_contents('php://input'), $data);

    // Extract the category and id from the data array
    $id = $data["id"];
    $category = $data["category"];

    // Build an SQL query to update the category by id
    $sql = "UPDATE category SET category = '$category' WHERE id='$id'";

    // Execute the SQL query using the create method of the Crud class
    $res = $crud->create($sql);

    // Check if the SQL query was successful
    if ($res) {
        // Create a success response
        $result = array("status" => true, "message" => "Category Updated Successfully...");
    } else {
        // Create an error response if the quote with the given id was not found
        $result = array("status" => false, "message" => "Quote With ID not Found");
    }

    // Encode the response as a JSON string and send it to the client
    echo json_encode($result);
} else {
    // Create an error response if the request method is not POST
    $error = array("status" => 405, "message" => 'Method not allowed...');

    // Encode the response as a JSON string and send it to the client
    echo json_encode($error);
}


//Delete Category
<?php
// Include the Quotes class file
include("../class/quotes.php");

// Set the response headers to allow cross-origin requests and specify content type as JSON
header("Access-Control-Allow-Origin: *");
header("Content-type:application/json");

// Create a new instance of the Crud class
$crud = new Crud();

// Check if the request method is DELETE
if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Build an SQL query to delete the category by id
    $sql = "DELETE FROM category WHERE id=".$_GET['id'];

    // Execute the SQL query using the deletes method of the Crud class
    $res = $crud->deletes($sql);

    // Check if the SQL query was successful
    if ($res) {
        // Create a success response
        $result = array("status" => true , "message" => "Category deleted Successfully...");
    } else {
        // Create an error response if the category with the given id was not found
        $result = array("status" => false , "message" => "Category Not Found");
    }

    // Encode the response as a JSON string and send it to the client
    echo json_encode($result);
} else {
    // Create an error response if the request method is not DELETE
    $error = array("status" => 405 , "message" => 'Method not allowed...');

    // Encode the response as a JSON string and send it to the client
    echo json_encode($error);
}
