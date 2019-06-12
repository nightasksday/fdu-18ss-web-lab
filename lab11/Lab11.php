<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here
$conn = mysqli_connect('localhost','root','yyh15570','travel');
if (!$conn){
    die('Fail to connect:'.mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                //Fill this place
                $sqlContinents = 'SELECT * FROM continents';
                $continents = mysqli_query($conn,$sqlContinents);
                //****** Hint ******
                //display the list of continents

                while($row = $continents->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }

                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place
                $sqlCountries = 'SELECT * FROM countries';
                $countries = mysqli_query($conn,$sqlCountries);
                //****** Hint ******
                /* display list of countries */
                while($row2 = $countries->fetch_assoc()) {
                    echo '<option value=' . $row2['ISO'] . '>' . $row2['CountryName'] . '</option>';
                }
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php
            $sqlImage = 'SELECT * FROM imagedetails';
            $image = mysqli_query($conn,$sqlImage);
            $countryValue = $_GET['country'];
            //Fill this place
            if (isset($countryValue)){
                if ($countryValue === '0'){
                    while($row3 = $image->fetch_assoc()) {
                        echo '
            <li>
              <a href="" class="img-responsive">
                <img style="width: 225px;height: 225px;" src="images/square-medium/'.$row3['Path'].'" alt="'.$row3['Title'].'">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>'.$row3['Title'].'</p>
                  </div>
                </div>
              </a>
            </li>      ';
                    }
                }
                else{
                    $selectedImage = "SELECT * FROM imagedetails where CountryCodeISO = '$countryValue'";
                    $specialImage = mysqli_query($conn,$selectedImage);
                    while($row4 = $specialImage->fetch_assoc()) {
                        echo '
            <li>
              <a href="" class="img-responsive">
                <img style="width: 225px;height: 225px;" src="images/square-medium/'.$row4['Path'].'" alt="'.$row4['Title'].'">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>'.$row4['Title'].'</p>
                  </div>
                </div>
              </a>
            </li>      ';
                    }
                }
            }
            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data

            */ 
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>