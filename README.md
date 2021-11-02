# Power BI Embedded for customers API PHP with parameters

This program allows to create embedded power bi reports, it is developed in PHP and the changes that must be made are in the file procesar.php where the user must be replaced with the email of the user with Power BI PRO license and his credentials to make the consumption of embedded reports. 

The core of the API are the index.php and process.php files where you will find the configuration and the appropriate modifications for each case.

The additional files are created by the power bi library for embedded visualizations and IIS. 

The parameters included in index.php correspond to: 

group: workspace ID.</br>
reports: report ID.</br>
filters: 1-0 to show the filters sidebar in the report.</br>
p: power bi parameters by URL.</br>

I hope I can help with my grain of sand and continue to support projects like these. 
