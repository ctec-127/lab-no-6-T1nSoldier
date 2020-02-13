
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>

    <?php
    // function to calculate converted temperature
    
    function convertTemp($originalTemperature, $originalUnit, $conversionUnit){ 
        
        if ($originalUnit == "celsius") {
            if ($conversionUnit == "celsius") {
                $newtemp = $originalTemperature;
                return $newtemp;
            }
            if ($conversionUnit == "fahrenheit") {
                $newtemp = $originalTemperature * 9/5;
                $newtemp = $newtemp + 32;
                return $newtemp;
            }
            elseif ($conversionUnit == "kelvin") {
                $newtemp = $originalTemperature + 273.15;
                return $newtemp;
            }
        }
        if ($originalUnit == "fahrenheit") {
            if ($conversionUnit == "celsius") {
                    $newtemp = $originalTemperature - 32;
                    $newtemp = $newtemp * 5/9;
                    return $newtemp;
            }
            if ($conversionUnit == "fahrenheit") {
                $newtemp = $originalTemperature;
                return $newtemp;
            }
            if ($conversionUnit == "kelvin") {
                $newtemp = $originalTemperature - 32;
                $newtemp = $newtemp * 5/9;
                $newtemp = $newtemp + 273.15;
                return $newtemp;
            }   
        }
        if ($originalUnit == "kelvin") {
            if ($conversionUnit = "celsius") {
                $newtemp = $originalTemperature - 273.15;
                return $newtemp;
            }
            if ($conversionUnit == "fahrenheit") {
                $newtemp = $originalTemperature - 273.15;
                $newtemp = $newtemp * 9/5;
                $newtemp = $newtemp + 32;
                return $newtemp;
            }
            if ($conversionUnit == "kelvin") {
                $newtemp = $originalTemperature;
                return $newtemp;
            }      
        }      
    } // end function

// Logic to check for POST and grab data from $_POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $originalTemperature = $_POST['originaltemp'];
    $originalUnit = $_POST['originalunit'];
    $conversionUnit = $_POST['conversionunit'];
    $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);
}  

 
?>
<!-- Form starts here -->
<h1>Temperature Converter</h1>
<h4>CTEC 127 - PHP with SQL 1</h4>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <div class="group">
        <label for="temp">Temperature</label>
        <input type="text" value="<?php if (isset($_POST['originaltemp'])){echo $_POST['originaltemp'];}?>" name="originaltemp" size="14" maxlength="7" id="temp">
        <select name="originalunit">
            <option value="--Select--">--Select--</option>
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="kelvin">Kelvin</option>
        </select>
    </div>

    <div class="group">
        <label for="convertedtemp">Converted Temperature</label>
        <input type="text" value="<?php echo isset($convertedTemp) ? $convertedTemp : '' ?>" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" readonly>
        <select name="conversionunit">
            <option value="--Select--">--Select--</option>
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="kelvin">Kelvin</option>
        </select>
    </div>
    <input type="submit" value="Convert" />
</form>
</body>

</html>