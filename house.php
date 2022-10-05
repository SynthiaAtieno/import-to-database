<?php
session_start();
require 'connection.php';
require '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

if(isset($_POST['submit']))
{
    $filename = $_FILES['import_file']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed_ext = ['xls','csv','xlsx'];


    if(in_array($file_ext, $allowed_ext))
    {

        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = '0';
        foreach($data as $row)
        {

            if($count > '0')
            {

                $rent_date = $row['0'];
                $house_id =$row['1'];
                $door_no= $row['2'];

                $plot_name = $row['3'];
                $tenant_name =$row['4'];
                $rent_amount= $row['5'];

                $amount_paid = $row['6'];
                $balance =$row['7'];
            
                $tenants =  "INSERT INTO tenants (
                    rent_date, house_id,door_no, plot_name, 
                    tenant_name, rent_amount, amount_paid,
                    balance) VALUES('$rent_date', '$house_id','$door_no', '$plot_name',
                    '$tenant_name', '$rent_amount', '$amount_paid',
                    '$balance')";

                    $query = mysqli_query($conn, $tenants);
                    $msg = true;
                }
            else{
                $count = '1';
            }

        }

        if(isset($msg))
        {
            $_SESSION['message'] = 'Successsfully imported';
            header('Location: impot.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = 'Failed to import the file';
            header('Location: impot.php');
            exit(0);
        }
    }
    else{
        $_SESSION['message'] = "Please input a valid file with xls, csv and xlsx extensions";
        header('Location: import.php');
        exit(0);
    }
}
?>