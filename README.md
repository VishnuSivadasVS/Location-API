# Location-API
[![Vishnu Sivadas](https://www.vishnusivadas.com/github/codequality.svg?style=flat)](https://github.com/VishnuSivadasVS)
An API in PHP to get the location and some other details related to the location.

## How to use?
First of all download the file LocationDetails.php and place it in your project folder. Now add the file LocationDetails.php to your project file by requiring it.
```
require "LocationDetails.php";
```
Simply create an object for the class LocationDetails.
```
$ob = new LocationDetails();
```
Call the getLocationDetails() and it will return a json arry with details on current location. 
```
$ob->getLocationDetails();
```
Feel free to report any issues related to this.

## Authors

* **Vishnu Sivadas** - *Developer* - [Website](https://www.vishnusivadas.com/)

Check out my other works [@VishnuSivadasVS](https://github.com/VishnuSivadasVS)
