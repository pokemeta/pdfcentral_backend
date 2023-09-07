<?php

require('connection.php');

//$conn

$userid = $_POST["userid"];

$area = $_POST["area"];

$uploadedfiles = $_FILES["pdffiles"];

$errors = array();

for($i = 0; $i < count($uploadedfiles); $i++){

    if(isset($uploadedfiles["name"][$i])){
        $filename = $uploadedfiles["name"][$i];
        $filedir = null;
        //$filedir = 'pdfs/'.$filename;

        if(!is_dir("./pdfs/$area/")){

            mkdir("./pdfs/$area/", 0777, true);

        }

        $filedir = "pdfs/$area/".$filename;

        if($uploadedfiles['type'][$i] == "application/pdf"){

            if(!file_exists($filedir)){

                if($uploadedfiles['size'][$i] <= 20000000){

                    $filenamestring = trim($filename, ".pdf");
                    $countstring = strlen($filenamestring);
    
                    if($countstring < 40){
    
    
    
                    }
                    else{
    
                        array_push($errors, array("error" => "$filename filename is too long"));
    
                    }
    
                }
                else{
    
                    array_push($errors, array("error" => "$filename exceeds file size limit"));
    
                }

            }
            else{
    
                array_push($errors, array("error" => "$filename already exists"));
    
            }

        }
        else{

            array_push($errors, array("error" => "$filename is not a pdf file"));

        }

    }

}

if(!$errors){

    for($i = 0; $i < count($uploadedfiles); $i++){

        if(isset($uploadedfiles["name"][$i])){
            $filename = $uploadedfiles["name"][$i];
            $filedir = "pdfs/$area/".$filename;
            $db_name_extension = null;
            //$filedir = 'pdfs/'.$filename;

            $file = $uploadedfiles["tmp_name"][$i];

            $query = "INSERT INTO files_$area(filename, iduser) VALUES('$filename', '$userid')";
            $statement = $conn->prepare($query);
            $statement->execute();

            move_uploaded_file($file, $filedir);

        }

    }


    echo json_encode("files have been correct!");

}
else{

    echo json_encode($errors);

}
?>