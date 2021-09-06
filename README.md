Project description

In this project, an integrated control application was created for a courier company. An administrator or a transit-hub employee or a store employee can enter the system. Of course, controlled entry rules apply to the application.

ADMINISTRATOR
----
An administrator can access tables showing information for all stores, transit-hub employees, and store employees.

In either case the administrator can perform some of the following selections.

1) Delete a record
2) Edit an existing record
3) Add a new record

TRANSIT-HUB EMPLOYEE
----
A transit-hub employee scans the qrcode of the package, and so depending on the city where the transit hub is located, the location where the package is located is updated.

** this point of the application does not work because there were problems with scanning the qrcode and updating the database **

STORE EMPLOYEE
----
A store employee can perform 2 functions through a control panel.

1) By entering the track number of a package, the current location of the package is displayed
2) Τhe employee can enter a new package shipment in the system (eg if a customer enters the store). After the import, the duration of the shipment is displayed on the screen (it can be a simple package or express package. In the second case the calculation costs are done through the dijkstra algorithm) and shipping costs.
