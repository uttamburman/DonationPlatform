

<?php

class createConnection //create a class for make connection

{

    var $host="35.154.152.44";//"localhost";

    var $username="uttam"; //"root";   // specify the sever details for mysql

    var $password="Utt@m241816";//"tiger";

    var $database="TESTEXERCISE";//"infadb";

	//var $host="localhost";

//    var $username="root";   // specify the sever details for mysql

//    var $password="tiger";

//    var $database="helpinen_hdbase";

    var $myconn;



    function connectToDatabase() // create a function for connect database

    {

        $conn= new mysqli($this->host,$this->username,$this->password);



        if(!$conn)// testing the connection

        {

            die ("Cannot connect to the database");

        }

        else

        {

            $this->myconn = $conn;

        }

        return $this->myconn;

    }



    function selectDatabase() // selecting the database.

    {

        mysqli_select_db($this->myconn,$this->database);  //use php inbuild functions for select database



        if(!mysqli_select_db($this->myconn,$this->database)) // if error occured display the error message

        {

            echo("Error description: " . mysqli_error(myconn));

        }     

    }

	function selectTable($query){

		$result = $this->myconn->query($query);

		return $result;

		}

	function db_query($query) {



    // Query the database

    $result = mysqli_query($this->myconn,$query);



    return $result;

}

    function closeConnection() // close the connection

    {

        mysqli_close($this->myconn);

    }



}

?>