<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['user_logged'])) {
    header('location: ../../user_login.php');
}

$user_email = $_SESSION['user_email'];
$user_id;

// Hotel Admin Info Fetching 
$sql_user = "SELECT * FROM user WHERE user_email = '$user_email'";
$q_result = mysqli_query($con, $sql_user);

while ($row = mysqli_fetch_assoc($q_result)) {
    $user_id = $row['user_id'];
}

// Propety Query
$sql_propety = "SELECT * FROM rental WHERE user_id = '$user_id'";
$rental_result = mysqli_query($con, $sql_propety);
$rental_count = mysqli_num_rows($rental_result);
?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User | Dashboard</title>
        <meta name="description" content="inyofa.com | In your favor">
        <meta name="type" content="website">
        <meta name="keywords" content="inyofa.com , In your favor, inyofa, booking, hotels, rentals">
        <meta name="author" content="Omishtu-Joy AgTech Engineering, Abdiwak Bekele Aga, Melkam Technology">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="../../images/Logo-Icons.png" />
        <link rel="stylesheet" type="text/css" href="../../icon/svg-with-js/css/fa-svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>

    <body>
        <!------ Header --------->
        <header id="top-header" class="bg-primary">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
                        <!-- <label id="l1">e-learning</label> -->
                    </div>
                </ul>
            </div>
        </header>


        <div class="wrapper d-flex align-items-stretch">

            <!------ Left Drawer --------->
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <br>
                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="../user_dashboard.php"><i class="fas fa-list"></i> Dashboard</a>
                        </li>
                        <li><a href="rental_list.php" class="text-warning"><i class="fas fa-home"></i>
                                Your Rental</a>
                        </li>
                        <li><a href="../hotel_property/hotel_list.php"><i class="fas fa-building"></i> Your Hotel</a>
                        </li>
                        <li><a href="../hotel_admin/user_admin_list.php"><i class="fas fa-users"></i> Hotel Admins</a>
                        </li>

                        <li><a href="../update_profile.php"> <i class="fa fa-user" aria-hidden="true"></i> User
                                Profile</a>
                        </li>

                        <li><a href="../logout_user.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
                        </li>
                    </ul>

                    <div class="footer">
                        INYOFA | In Your Favor &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | Designed By Omishtu-Joy
                    </div>
                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">

                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                    <div class="container">

                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fas fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>

                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div class="card bg-light col-md mt-1" style="border-style: none;">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-tachometer-alt"></i>
                                                <strong> Properties</strong>
                                                </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>

                <!-- Content -->
                <div class="col-sm-12 col-md-8 offset-md-2">

                    <!------ New Rental Form ------->
                    <form class="was-validated bg-light border shadow p-3" action="add_user_rental.php" method="POST"
                        enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php

                        if (isset($_POST['Submit'])) {
                            $rental_type = $_POST['rental_type'];
                            $rental_country = $_POST['rental_country'];
                            $rental_city = $_POST['rental_city'];
                            $rental_subcity = $_POST['rental_subcity'];

                            $rental_price = $_POST['rental_price'];
                            $rental_contact_address = $_POST['rental_contact_address'];
                            $rental_area = $_POST['rental_area'];
                            $rental_bed_no = $_POST['rental_bed_no'];
                            $rental_kitchen_no = $_POST['rental_kitchen_no'];
                            $rental_bath_no = $_POST['rental_bath_no'];
                            $rental_detail =  $_POST['rental_detail'];

                            // Rental Image 1 
                            $temp_rental_img1 = $_FILES['rental_picture1']['name'];
                            $target_dir = "../../rental_image/";
                            $target_file = $target_dir . basename($_FILES["rental_picture1"]["name"]);

                            // Select file type
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            // Valid file extensions
                            $extensions_arr = array("jpg", "jpeg");

                            // Rental Image 2  
                            $temp_rental_img2 = $_FILES['rental_picture2']['name'];
                            $target_dir = "../../rental_image/";
                            $target_file2 = $target_dir . basename($_FILES["rental_picture2"]["name"]);

                            // Select file type
                            $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
                            // Valid file extensions
                            $extensions_arr2 = array("jpg", "jpeg");

                            // Rental Image 3 
                            $temp_rental_img3 = $_FILES['rental_picture3']['name'];
                            $target_dir = "../../rental_image/";
                            $target_file3 = $target_dir . basename($_FILES["rental_picture3"]["name"]);

                            // Select file type
                            $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
                            // Valid file extensions
                            $extensions_arr3 = array("jpg", "jpeg");

                            //Check extension
                            if (in_array($imageFileType, $extensions_arr) && in_array($imageFileType2, $extensions_arr2) && in_array($imageFileType3, $extensions_arr3)) {

                                //*************** Upload file1 *************/
                                move_uploaded_file($_FILES['rental_picture1']['tmp_name'], $target_dir . $temp_rental_img1);
                                
                                //*************** Upload file2 *************/
                                move_uploaded_file($_FILES['rental_picture2']['tmp_name'], $target_dir . $temp_rental_img2);
                                

                                //*************** Upload file3 *************/
                                move_uploaded_file($_FILES['rental_picture3']['tmp_name'], $target_dir . $temp_rental_img3);
                                

                                $query = "INSERT INTO rental (user_id ,rental_type, rental_country, rental_city, rental_subcity, rental_price, rental_contact, rental_area, rental_bed_no, rental_kitchen_no, rental_bath_no, rental_detail, rental_image1, rental_image2, rental_image3)
                                                        VALUES ('$user_id', '$rental_type', '$rental_country', '$rental_city', '$rental_subcity', '$rental_price', '$rental_contact_address', '$rental_area',  '$rental_bed_no', '$rental_kitchen_no', '$rental_bath_no', '$rental_detail',  '$temp_rental_img1',  '$temp_rental_img2',  '$temp_rental_img3' )";

                                if (mysqli_query($con, $query)) {
                                    $msg = "<div class='alert alert-success' > You have Successfully Registered a new Rental!</div>";
                                    echo $msg;
                                } else {
                                    $msg = "<div class='alert alert-danger' > Error Registoring new rental </div>";
                                    echo $msg;
                                }
                                
                            } else {
                                // File selection is not correct
                                $msg = "File selection isn't correct, ";
                                echo ' <div class="alert alert-danger" style="text-align: center"> ' . $msg . '</div> ';
                            }
                        }

                        ?>

                        <!-- Rental Type | Rental City | Rental Subcity -->
                        <div class="row mt-3">
                            <!-- Rental Type -->
                            <div class="form-group col-md">
                                <label for="rental_type" class="form-label">
                                    <h6><b><i class="fas fa-house"></i> Rental Type</b></h6>
                                </label>
                                <select class="form-control" name="rental_type" id="rental_type" required>
                                    <option value="_"> Choose... </option>
                                    <option value="Apartment"> Apartment </option>
                                    <option value="Condominium"> Condominium </option>
                                    <option value="Double"> Double </option>
                                    <option value="Studio"> Studio </option>
                                </select>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Rental Country -->
                            <div class="form-group col-md">
                                <label for="rental_country" class="form-label">
                                    <h6><b><i class="fas fa-house"></i> Rental Country</b></h6>
                                </label>
                                <select name="rental_country" class="form-control" id="rental_country" required>
                                    <option value="0" selected="selected">Select Country...
                                    </option>
                                    <optgroup id="country-optgroup-Africa" label="Africa">
                                        <option value="DZ" label="Algeria">Algeria</option>
                                        <option value="AO" label="Angola">Angola</option>
                                        <option value="BJ" label="Benin">Benin</option>
                                        <option value="BW" label="Botswana">Botswana</option>
                                        <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                        <option value="BI" label="Burundi">Burundi</option>
                                        <option value="CM" label="Cameroon">Cameroon</option>
                                        <option value="CV" label="Cape Verde">Cape Verde</option>
                                        <option value="CF" label="Central African Republic">Central African Republic
                                        </option>
                                        <option value="TD" label="Chad">Chad</option>
                                        <option value="KM" label="Comoros">Comoros</option>
                                        <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                        <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                        <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                        <option value="DJ" label="Djibouti">Djibouti</option>
                                        <option value="EG" label="Egypt">Egypt</option>
                                        <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="ER" label="Eritrea">Eritrea</option>
                                        <option value="ET" label="Ethiopia">Ethiopia</option>
                                        <option value="GA" label="Gabon">Gabon</option>
                                        <option value="GM" label="Gambia">Gambia</option>
                                        <option value="GH" label="Ghana">Ghana</option>
                                        <option value="GN" label="Guinea">Guinea</option>
                                        <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="KE" label="Kenya">Kenya</option>
                                        <option value="LS" label="Lesotho">Lesotho</option>
                                        <option value="LR" label="Liberia">Liberia</option>
                                        <option value="LY" label="Libya">Libya</option>
                                        <option value="MG" label="Madagascar">Madagascar</option>
                                        <option value="MW" label="Malawi">Malawi</option>
                                        <option value="ML" label="Mali">Mali</option>
                                        <option value="MR" label="Mauritania">Mauritania</option>
                                        <option value="MU" label="Mauritius">Mauritius</option>
                                        <option value="YT" label="Mayotte">Mayotte</option>
                                        <option value="MA" label="Morocco">Morocco</option>
                                        <option value="MZ" label="Mozambique">Mozambique</option>
                                        <option value="NA" label="Namibia">Namibia</option>
                                        <option value="NE" label="Niger">Niger</option>
                                        <option value="NG" label="Nigeria">Nigeria</option>
                                        <option value="RW" label="Rwanda">Rwanda</option>
                                        <option value="RE" label="Réunion">Réunion</option>
                                        <option value="SH" label="Saint Helena">Saint Helena</option>
                                        <option value="SN" label="Senegal">Senegal</option>
                                        <option value="SC" label="Seychelles">Seychelles</option>
                                        <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                        <option value="SO" label="Somalia">Somalia</option>
                                        <option value="ZA" label="South Africa">South Africa</option>
                                        <option value="SD" label="Sudan">Sudan</option>
                                        <option value="SZ" label="Swaziland">Swaziland</option>
                                        <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                        <option value="TZ" label="Tanzania">Tanzania</option>
                                        <option value="TG" label="Togo">Togo</option>
                                        <option value="TN" label="Tunisia">Tunisia</option>
                                        <option value="UG" label="Uganda">Uganda</option>
                                        <option value="EH" label="Western Sahara">Western Sahara</option>
                                        <option value="ZM" label="Zambia">Zambia</option>
                                        <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                    </optgroup>
                                    <optgroup id="country-optgroup-Americas" label="Americas">
                                        <option value="AI" label="Anguilla">Anguilla</option>
                                        <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="AR" label="Argentina">Argentina</option>
                                        <option value="AW" label="Aruba">Aruba</option>
                                        <option value="BS" label="Bahamas">Bahamas</option>
                                        <option value="BB" label="Barbados">Barbados</option>
                                        <option value="BZ" label="Belize">Belize</option>
                                        <option value="BM" label="Bermuda">Bermuda</option>
                                        <option value="BO" label="Bolivia">Bolivia</option>
                                        <option value="BR" label="Brazil">Brazil</option>
                                        <option value="VG" label="British Virgin Islands">British Virgin Islands
                                        </option>
                                        <option value="CA" label="Canada">Canada</option>
                                        <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                        <option value="CL" label="Chile">Chile</option>
                                        <option value="CO" label="Colombia">Colombia</option>
                                        <option value="CR" label="Costa Rica">Costa Rica</option>
                                        <option value="CU" label="Cuba">Cuba</option>
                                        <option value="DM" label="Dominica">Dominica</option>
                                        <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                        <option value="EC" label="Ecuador">Ecuador</option>
                                        <option value="SV" label="El Salvador">El Salvador</option>
                                        <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                        <option value="GF" label="French Guiana">French Guiana</option>
                                        <option value="GL" label="Greenland">Greenland</option>
                                        <option value="GD" label="Grenada">Grenada</option>
                                        <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                        <option value="GT" label="Guatemala">Guatemala</option>
                                        <option value="GY" label="Guyana">Guyana</option>
                                        <option value="HT" label="Haiti">Haiti</option>
                                        <option value="HN" label="Honduras">Honduras</option>
                                        <option value="JM" label="Jamaica">Jamaica</option>
                                        <option value="MQ" label="Martinique">Martinique</option>
                                        <option value="MX" label="Mexico">Mexico</option>
                                        <option value="MS" label="Montserrat">Montserrat</option>
                                        <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="NI" label="Nicaragua">Nicaragua</option>
                                        <option value="PA" label="Panama">Panama</option>
                                        <option value="PY" label="Paraguay">Paraguay</option>
                                        <option value="PE" label="Peru">Peru</option>
                                        <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                        <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                        <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                        <option value="MF" label="Saint Martin">Saint Martin</option>
                                        <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                        </option>
                                        <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and
                                            the
                                            Grenadines</option>
                                        <option value="SR" label="Suriname">Suriname</option>
                                        <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands
                                        </option>
                                        <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                        <option value="US" label="United States">United States</option>
                                        <option value="UY" label="Uruguay">Uruguay</option>
                                        <option value="VE" label="Venezuela">Venezuela</option>
                                    </optgroup>
                                    <optgroup id="country-optgroup-Asia" label="Asia">
                                        <option value="AF" label="Afghanistan">Afghanistan</option>
                                        <option value="AM" label="Armenia">Armenia</option>
                                        <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                        <option value="BH" label="Bahrain">Bahrain</option>
                                        <option value="BD" label="Bangladesh">Bangladesh</option>
                                        <option value="BT" label="Bhutan">Bhutan</option>
                                        <option value="BN" label="Brunei">Brunei</option>
                                        <option value="KH" label="Cambodia">Cambodia</option>
                                        <option value="CN" label="China">China</option>
                                        <option value="GE" label="Georgia">Georgia</option>
                                        <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                        <option value="IN" label="India">India</option>
                                        <option value="ID" label="Indonesia">Indonesia</option>
                                        <option value="IR" label="Iran">Iran</option>
                                        <option value="IQ" label="Iraq">Iraq</option>
                                        <option value="IL" label="Israel">Israel</option>
                                        <option value="JP" label="Japan">Japan</option>
                                        <option value="JO" label="Jordan">Jordan</option>
                                        <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                        <option value="KW" label="Kuwait">Kuwait</option>
                                        <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="LA" label="Laos">Laos</option>
                                        <option value="LB" label="Lebanon">Lebanon</option>
                                        <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                        <option value="MY" label="Malaysia">Malaysia</option>
                                        <option value="MV" label="Maldives">Maldives</option>
                                        <option value="MN" label="Mongolia">Mongolia</option>
                                        <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                        <option value="NP" label="Nepal">Nepal</option>
                                        <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                        <option value="KP" label="North Korea">North Korea</option>
                                        <option value="OM" label="Oman">Oman</option>
                                        <option value="PK" label="Pakistan">Pakistan</option>
                                        <option value="PS" label="Palestinian Territories">Palestinian Territories
                                        </option>
                                        <option value="YD" label="People's Democratic Republic of Yemen">People's
                                            Democratic
                                            Republic of Yemen</option>
                                        <option value="PH" label="Philippines">Philippines</option>
                                        <option value="QA" label="Qatar">Qatar</option>
                                        <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                        <option value="SG" label="Singapore">Singapore</option>
                                        <option value="KR" label="South Korea">South Korea</option>
                                        <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                        <option value="SY" label="Syria">Syria</option>
                                        <option value="TW" label="Taiwan">Taiwan</option>
                                        <option value="TJ" label="Tajikistan">Tajikistan</option>
                                        <option value="TH" label="Thailand">Thailand</option>
                                        <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                        <option value="TR" label="Turkey">Turkey</option>
                                        <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                        <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                        <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                        <option value="VN" label="Vietnam">Vietnam</option>
                                        <option value="YE" label="Yemen">Yemen</option>
                                    </optgroup>
                                    <optgroup id="country-optgroup-Europe" label="Europe">
                                        <option value="AL" label="Albania">Albania</option>
                                        <option value="AD" label="Andorra">Andorra</option>
                                        <option value="AT" label="Austria">Austria</option>
                                        <option value="BY" label="Belarus">Belarus</option>
                                        <option value="BE" label="Belgium">Belgium</option>
                                        <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina
                                        </option>
                                        <option value="BG" label="Bulgaria">Bulgaria</option>
                                        <option value="HR" label="Croatia">Croatia</option>
                                        <option value="CY" label="Cyprus">Cyprus</option>
                                        <option value="CZ" label="Czech Republic">Czech Republic</option>
                                        <option value="DK" label="Denmark">Denmark</option>
                                        <option value="DD" label="East Germany">East Germany</option>
                                        <option value="EE" label="Estonia">Estonia</option>
                                        <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                        <option value="FI" label="Finland">Finland</option>
                                        <option value="FR" label="France">France</option>
                                        <option value="DE" label="Germany">Germany</option>
                                        <option value="GI" label="Gibraltar">Gibraltar</option>
                                        <option value="GR" label="Greece">Greece</option>
                                        <option value="GG" label="Guernsey">Guernsey</option>
                                        <option value="HU" label="Hungary">Hungary</option>
                                        <option value="IS" label="Iceland">Iceland</option>
                                        <option value="IE" label="Ireland">Ireland</option>
                                        <option value="IM" label="Isle of Man">Isle of Man</option>
                                        <option value="IT" label="Italy">Italy</option>
                                        <option value="JE" label="Jersey">Jersey</option>
                                        <option value="LV" label="Latvia">Latvia</option>
                                        <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                        <option value="LT" label="Lithuania">Lithuania</option>
                                        <option value="LU" label="Luxembourg">Luxembourg</option>
                                        <option value="MK" label="Macedonia">Macedonia</option>
                                        <option value="MT" label="Malta">Malta</option>
                                        <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                        <option value="MD" label="Moldova">Moldova</option>
                                        <option value="MC" label="Monaco">Monaco</option>
                                        <option value="ME" label="Montenegro">Montenegro</option>
                                        <option value="NL" label="Netherlands">Netherlands</option>
                                        <option value="NO" label="Norway">Norway</option>
                                        <option value="PL" label="Poland">Poland</option>
                                        <option value="PT" label="Portugal">Portugal</option>
                                        <option value="RO" label="Romania">Romania</option>
                                        <option value="RU" label="Russia">Russia</option>
                                        <option value="SM" label="San Marino">San Marino</option>
                                        <option value="RS" label="Serbia">Serbia</option>
                                        <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="SK" label="Slovakia">Slovakia</option>
                                        <option value="SI" label="Slovenia">Slovenia</option>
                                        <option value="ES" label="Spain">Spain</option>
                                        <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                        </option>
                                        <option value="SE" label="Sweden">Sweden</option>
                                        <option value="CH" label="Switzerland">Switzerland</option>
                                        <option value="UA" label="Ukraine">Ukraine</option>
                                        <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet
                                            Socialist Republics</option>
                                        <option value="GB" label="United Kingdom">United Kingdom</option>
                                        <option value="VA" label="Vatican City">Vatican City</option>
                                        <option value="AX" label="Åland Islands">Åland Islands</option>
                                    </optgroup>
                                    <optgroup id="country-optgroup-Oceania" label="Oceania">
                                        <option value="AS" label="American Samoa">American Samoa</option>
                                        <option value="AQ" label="Antarctica">Antarctica</option>
                                        <option value="AU" label="Australia">Australia</option>
                                        <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                        <option value="IO" label="British Indian Ocean Territory">British Indian Ocean
                                            Territory</option>
                                        <option value="CX" label="Christmas Island">Christmas Island</option>
                                        <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands
                                        </option>
                                        <option value="CK" label="Cook Islands">Cook Islands</option>
                                        <option value="FJ" label="Fiji">Fiji</option>
                                        <option value="PF" label="French Polynesia">French Polynesia</option>
                                        <option value="TF" label="French Southern Territories">French Southern
                                            Territories
                                        </option>
                                        <option value="GU" label="Guam">Guam</option>
                                        <option value="HM" label="Heard Island and McDonald Islands">Heard Island and
                                            McDonald Islands</option>
                                        <option value="KI" label="Kiribati">Kiribati</option>
                                        <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                        <option value="FM" label="Micronesia">Micronesia</option>
                                        <option value="NR" label="Nauru">Nauru</option>
                                        <option value="NC" label="New Caledonia">New Caledonia</option>
                                        <option value="NZ" label="New Zealand">New Zealand</option>
                                        <option value="NU" label="Niue">Niue</option>
                                        <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                        <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands
                                        </option>
                                        <option value="PW" label="Palau">Palau</option>
                                        <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                        <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                        <option value="WS" label="Samoa">Samoa</option>
                                        <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                        <option value="GS" label="South Georgia and the South Sandwich Islands">South
                                            Georgia and the South Sandwich Islands</option>
                                        <option value="TK" label="Tokelau">Tokelau</option>
                                        <option value="TO" label="Tonga">Tonga</option>
                                        <option value="TV" label="Tuvalu">Tuvalu</option>
                                        <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                            Islands
                                        </option>
                                        <option value="VU" label="Vanuatu">Vanuatu</option>
                                        <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                    </optgroup>
                                </select>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                        </div>

                        <div class="row mt-3">

                            <!-- Rental City -->
                            <div class="form-group col-md">
                                <label for="rental_city" class="form-label">
                                    <h6><b><i class="fas fa-house"></i> Rental City</b></h6>
                                </label>

                                <input type="text" class="form-control" name="rental_city" id="rental_city"
                                    placeholder="Rental City" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>


                            <!-- Rental Subcity -->
                            <div class="form-group col-md">
                                <label for="rental_subcity" class="form-label">
                                    <h6><b><i class="fas fa-house"></i> Rental Subcity</b></h6>
                                </label>

                                <input type="text" class="form-control" name="rental_subcity" id="rental_subcity"
                                    placeholder="Rental Subcity" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>


                        </div>

                        <!-- Rental Picture * 3 -->
                        <div class="row mt-3">

                            <!-- Rental Picture 1 -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="rental_picture1" class="form-label">
                                    <h6><b><i class="fa fa-camera"></i> Rental Picture 1</b></h6>
                                </label>
                                <input type="file" class="form-control" name="rental_picture1" for="rental_picture1"
                                    placeholder="Enter upload the rental picture  " required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Rental Picture 2 -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="rental_picture2" class="form-label">
                                    <h6><b><i class="fas fa-camera"></i> Rental Picture 2</b></h6>
                                </label>
                                <input type="file" class="form-control" name="rental_picture2" for="rental_picture2"
                                    placeholder="Enter upload the rental picture" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Rental Picture 3 -->
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="rental_picture3" class="form-label">
                                    <h6><b><i class="fas fa-camera"></i> Rental Picture 3</b></h6>
                                </label>
                                <input type="file" class="form-control" name="rental_picture3" for="rental_picture3"
                                    placeholder="Enter upload the rental picture" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                        </div>

                        <!-- Price | Contact Address -->
                        <div class="row mt-3">
                            <!-- Rental Price -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="rental_price">
                                    <h6><b><i class="fa fa-credit-card"></i> Rental Price / Month</b></h6>
                                </label>
                                <input type="number" class="form-control" name="rental_price" id="rental_price"
                                    placeholder="Enter Rental Price" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Rental Contant Address -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="rental_contact_address" class="form-label">
                                    <h6><b><i class="fas fa-phone"></i> Contact Address</b></h6>
                                </label>
                                <input type="phone" class="form-control" name="rental_contact_address"
                                    for="rental_contact_address" placeholder="Rental Contact Address" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <!-- Square Area | BedRoom No -->
                        <div class="row mt-3">
                            <!-- Rental Area -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="rental_area">
                                    <h6><b><i class="fa fa-area-chart"></i> Rental Area / Sq.Meter</b></h6>
                                </label>
                                <input type="number" class="form-control" name="rental_area" id="rental_area"
                                    placeholder="Enter Rental Square area" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- No of Bed Rooms -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="rental_bed_no" class="form-label">
                                    <h6><b><i class="fa fa-bed"></i> No of bed rooms</b></h6>
                                </label>
                                <input type="phone" class="form-control" name="rental_bed_no" for="rental_bed_no"
                                    placeholder="No of bed rooms" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <!-- Kitchen | bathroom -->
                        <div class="row mt-3">
                            <!-- No of Kitchen -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="rental_kitchen_no">
                                    <h6><b><i class="fa fa-fire"></i> No of Kitchen</b></h6>
                                </label>
                                <input type="number" class="form-control" name="rental_kitchen_no"
                                    id="rental_kitchen_no" placeholder="Enter Rental Square area" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- No of Bathroomn -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="rental_bath_no" class="form-label">
                                    <h6><b><i class="fa fa-shower"></i> No of Bathroomn </b></h6>
                                </label>
                                <input type="phone" class="form-control" name="rental_bath_no" for="rental_bath_no"
                                    placeholder="No of Bath room" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <!-- Rental Detail -->
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="rental_detail" class="form-label">
                                    <h6><b><i class="fas fa-house"></i> Rental Detail</b></h6>
                                </label>
                                <textarea class="form-control" rows="10" name="rental_detail" id="rental_detail"
                                    placeholder="Enter Rental Detail" required></textarea>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-3 mb-3">
                                <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-12"
                                    value="Submit">Add New Rental</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <script src="../../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/app/main.js"></script>
    </body>

</html>