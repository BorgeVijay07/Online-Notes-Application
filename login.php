<!-- Start session -->
<!-- Connect to the database  -->

<!-- Check user inputs -->
    <!-- Define error message  -->
    <!-- Get email and password  -->
    <!-- Store errors in errors variable -->
    <!-- If there are any errors  -->
        <!-- print error message  -->
    <!-- else: No errors  -->
        <!-- Prepare variables for the query -->
        <!-- Run query: Check combination of email & password exists  -->
        <!-- If email & password dont match print error -->
        <!-- else  -->
            <!-- log th user in: Set session variables -->
            <!-- If rember me is not checked  -->
                <!-- print "success" -->
            <!-- else  -->
                <!-- Create two variables $authentificator1 and $authentificator2 -->
                <!-- store them in cookie  -->
                <!-- Run query to store them in remember me table  -->
                <!-- If query unsuccessful  -->
                    <!-- print error -->
                <!-- else  -->
                    <!-- print "success" -->