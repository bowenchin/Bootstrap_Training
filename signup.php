<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Sign Up - KEEP</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/keep.css">
  <link rel="stylesheet" href="css/signup.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
</head>

<!-- Nav bar -->
<nav class="navbar navbar-default navbar-background">
  <div class="container container-narrow">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="brand" class="navbar-brand" href="/keep.html"><b>KEEP</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">About</a></li>
        <li><a href="#">News & Events</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
      <!--<ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
        <li><a href="#"><span id="sign-up">Sign Up</span></a></li>
        <li><a href=""><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>-->
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<body>

  <div id="form">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <h2>Register for a new account</h2>

          <?php
            require('connect.php');

              // If the values are posted, insert them into the database.
              if (isset($_POST['email']) && isset($_POST['password']) ){
                  $salutation = $_POST['salutation'];
                  $first_name = $_POST['first_name'];
                  $last_name = $_POST['last_name'];
                  $affiliation = $_POST['affiliation'];
                  $position = $_POST['position'];
                  $email = $_POST['email'];
                  $password = $_POST['password'];
                  $phone_number = $_POST['phone_number'];
                  $fax_number = $_POST['fax_number'];
                  $website = $_POST['website'];
                  $address = $_POST['address'];
                  $city = $_POST['city'];
                  $state = $_POST['state'];
                  $postal = $_POST['postal'];
                  $region = $_POST['region'];


                  $query = "INSERT INTO `login` (salutation, first_name, last_name, affiliation, position, email, password, phone_number, fax_number, website, address, city, state, postal, region) VALUES ('$salutation', '$first_name', '$last_name', '$affiliation', '$position','$email','$password','$phone_number','$fax_number','$website','$address','$city','$state','$postal','$region')";
                  $result = mysqli_query($connection, $query);
                  if($result){
                      $smsg = "User account created successfully.";
                  }else if(!$result && !isset($_POST["region"])){
                      $fmsg ="User Registration failed, please try again or contact the administrator.";
                  }
              }
          ?>

          <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
          <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

          <form id="signUpForm" data-toggle="validator" role="form" name="signUpForm" method="POST">

            <div id="personal-info" class="card">
              <h3>Personal Information</h3>

              <!-- Required! -->
              <div id="sal" class="form-group required">
                <label name="sal" for="senderSal" class="control-label">Salutation</label>
                <select name="salutation" class="form-control" id="selection_salutation" data-error="Please select the appropriate salutation above" required>
                  <option disabled selected value>Please select your salutation...</option>
                  <option>Mr.</option>
                  <option>Ms.</option>
                  <option>Miss.</option>
                  <option>Mrs.</option>
                  <option>Prof.</option>
                  <option>Dr.</option>
                </select>
                <div class="help-block"></div>
              </div>

              <!-- Required! -->
              <div id="sname" class="form-group required">
                <label for="name" class="control-label">Given Name</label>
                <input name="first_name" id="name" type="text" class="form-control" placeholder="Given name" data-error="Please fill in your given name..." required>
                <div class="help-block with-errors"></div>
              </div>

              <!-- Required! -->
              <div id="sname" class="form-group required">
                <label for="surname" class="control-label">Surname</label>
                <input name="last_name" type="text" class="form-control" id="senderName" placeholder="Surname" data-error="Please fill in your surname..." required>
                <div class="help-block with-errors"></div>
              </div>

              <!-- Required! -->
              <div id="sname" class="form-group required">
                <label for="affiliation" class="control-label">Affiliation Name</label>
                <input name="affiliation" type="text" class="form-control" id="senderName" placeholder="Affiliation name" data-error="Please fill in your affiliation's name..." required>
                <div class="help-block with-errors"></div>

              </div>

              <!-- Required! -->
              <div id="sname" class="form-group required">
                <label for="position" class="control-label">Job title/position</label>
                <input name="position" type="text" class="form-control" id="senderName" placeholder="Title/position" data-error="Please fill in your title or position..." required>
                <div class="help-block with-errors"></div>

              </div>
            </div>

            <div id="account-info" class="card">
              <h3>Account Information</h3>
              <!-- Required! -->
              <div class="form-group required">
                <label for="email" class="control-label">Email Address</label>
                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Please input a valid email..." required>
                <div class="help-block with-errors"></div>
              </div>

              <!-- Required! -->
              <div class="form-group required">
                <label class="control-label">Retype Email Address</label>
                <input type="email" class="form-control" id="senderEmail" placeholder="Retype email" data-match="#inputEmail" data-match-error="Whoops, this doesn't match with the above field" required>
                <div class="help-block with-errors"></div>

              </div>

              <!-- Required! -->
              <div class="form-group required">
                <label for="password" class="control-label">Password</label>
                <input name="password" id="inputPassword" type="password" class="form-control" placeholder="Password" data-minlength="6" required>
                <div class="help-block">Minimum of 6 characters</div>
              </div>

              <!-- Required! -->
              <div class="form-group required">
                <label class="control-label">Retype Password</label>
                <input id="password" type="password" class="form-control" placeholder="Confirm password" data-match="#inputPassword" data-match-error="Whoops, this doesn't match with the above field" required>
                <div class="help-block with-errors"></div>
              </div>
            </div>

            <!-- Contact Info -->
            <div id="contact-info" class="card">
              <h3>Contact Information</h3>
              <div class="form-group">
                <label for="userPhone">Phone Number</label>
                <input name="phone_number" type="phoneNumber" class="form-control" id="userPhone" placeholder="Phone" data-error="Please fill in your phone number...">
                <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
                <label for="userFax">Fax Number</label>
                <input name="fax_number" type="phoneNumber" class="form-control" id="userFax" placeholder="Fax">
              </div>

              <div class="form-group">
                <label>Website</label>
                <input name="website" type="text" class="form-control" id="senderEmail" placeholder="Website">
                <div id="alert-email" class="alert alert-danger hide"><strong>Alert: </strong>Please fill in your website...</div>
              </div>

              <!-- Required! -->
              <div class="form-group required">
                <label class="control-label">Address</label>
                <textarea name="address" row="3" type="text" class="form-control" id="senderEmail" placeholder="Address" data-error="Please fill in your address..." required></textarea>
                <div class="help-block with-errors"></div>
              </div>

              <!-- Required! -->
              <div class="form-group required">
                <label class="control-label">City</label>
                <input name="city" type="text" class="form-control" id="inputCity" placeholder="City" required>
                <div id="alert-email" class="alert alert-danger hide"><strong>Alert: </strong>Please fill in your city...</div>
              </div>

              <div class="form-group">
                <label>State/Province</label>
                <input name="state" type="text" class="form-control" id="senderEmail" placeholder="State/Province">
              </div>


              <div id="semail" class="form-group">
                <label>Zip/Postal Code</label>
                <input name="postal" type="postalCode" class="form-control" id="senderEmail" placeholder="Postal code">
                <div id="alert-email" class="alert alert-danger hide"><strong>Alert: </strong>Please fill in your postal code...</div>
              </div>

              <!-- Required! -->
              <div id="inputCountry" class="form-group required">
                <label for="country" class="control-label">Region</label>
                <select name="region" class="form-control" id="select_region" data-error="Please select your region/country" required>
                  <option disabled selected value>Please select your region...</option>
                  	<option value="AFG">Afghanistan</option>
                  	<option value="ALA">Åland Islands</option>
                  	<option value="ALB">Albania</option>
                  	<option value="DZA">Algeria</option>
                  	<option value="ASM">American Samoa</option>
                  	<option value="AND">Andorra</option>
                  	<option value="AGO">Angola</option>
                  	<option value="AIA">Anguilla</option>
                  	<option value="ATA">Antarctica</option>
                  	<option value="ATG">Antigua and Barbuda</option>
                  	<option value="ARG">Argentina</option>
                  	<option value="ARM">Armenia</option>
                  	<option value="ABW">Aruba</option>
                  	<option value="AUS">Australia</option>
                  	<option value="AUT">Austria</option>
                  	<option value="AZE">Azerbaijan</option>
                  	<option value="BHS">Bahamas</option>
                  	<option value="BHR">Bahrain</option>
                  	<option value="BGD">Bangladesh</option>
                  	<option value="BRB">Barbados</option>
                  	<option value="BLR">Belarus</option>
                  	<option value="BEL">Belgium</option>
                  	<option value="BLZ">Belize</option>
                  	<option value="BEN">Benin</option>
                  	<option value="BMU">Bermuda</option>
                  	<option value="BTN">Bhutan</option>
                  	<option value="BOL">Bolivia, Plurinational State of</option>
                  	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
                  	<option value="BIH">Bosnia and Herzegovina</option>
                  	<option value="BWA">Botswana</option>
                  	<option value="BVT">Bouvet Island</option>
                  	<option value="BRA">Brazil</option>
                  	<option value="IOT">British Indian Ocean Territory</option>
                  	<option value="BRN">Brunei Darussalam</option>
                  	<option value="BGR">Bulgaria</option>
                  	<option value="BFA">Burkina Faso</option>
                  	<option value="BDI">Burundi</option>
                  	<option value="KHM">Cambodia</option>
                  	<option value="CMR">Cameroon</option>
                  	<option value="CAN">Canada</option>
                  	<option value="CPV">Cape Verde</option>
                  	<option value="CYM">Cayman Islands</option>
                  	<option value="CAF">Central African Republic</option>
                  	<option value="TCD">Chad</option>
                  	<option value="CHL">Chile</option>
                  	<option value="CHN">China</option>
                  	<option value="CXR">Christmas Island</option>
                  	<option value="CCK">Cocos (Keeling) Islands</option>
                  	<option value="COL">Colombia</option>
                  	<option value="COM">Comoros</option>
                  	<option value="COG">Congo</option>
                  	<option value="COD">Congo, the Democratic Republic of the</option>
                  	<option value="COK">Cook Islands</option>
                  	<option value="CRI">Costa Rica</option>
                  	<option value="CIV">Côte d'Ivoire</option>
                  	<option value="HRV">Croatia</option>
                  	<option value="CUB">Cuba</option>
                  	<option value="CUW">Curaçao</option>
                  	<option value="CYP">Cyprus</option>
                  	<option value="CZE">Czech Republic</option>
                  	<option value="DNK">Denmark</option>
                  	<option value="DJI">Djibouti</option>
                  	<option value="DMA">Dominica</option>
                  	<option value="DOM">Dominican Republic</option>
                  	<option value="ECU">Ecuador</option>
                  	<option value="EGY">Egypt</option>
                  	<option value="SLV">El Salvador</option>
                  	<option value="GNQ">Equatorial Guinea</option>
                  	<option value="ERI">Eritrea</option>
                  	<option value="EST">Estonia</option>
                  	<option value="ETH">Ethiopia</option>
                  	<option value="FLK">Falkland Islands (Malvinas)</option>
                  	<option value="FRO">Faroe Islands</option>
                  	<option value="FJI">Fiji</option>
                  	<option value="FIN">Finland</option>
                  	<option value="FRA">France</option>
                  	<option value="GUF">French Guiana</option>
                  	<option value="PYF">French Polynesia</option>
                  	<option value="ATF">French Southern Territories</option>
                  	<option value="GAB">Gabon</option>
                  	<option value="GMB">Gambia</option>
                  	<option value="GEO">Georgia</option>
                  	<option value="DEU">Germany</option>
                  	<option value="GHA">Ghana</option>
                  	<option value="GIB">Gibraltar</option>
                  	<option value="GRC">Greece</option>
                  	<option value="GRL">Greenland</option>
                  	<option value="GRD">Grenada</option>
                  	<option value="GLP">Guadeloupe</option>
                  	<option value="GUM">Guam</option>
                  	<option value="GTM">Guatemala</option>
                  	<option value="GGY">Guernsey</option>
                  	<option value="GIN">Guinea</option>
                  	<option value="GNB">Guinea-Bissau</option>
                  	<option value="GUY">Guyana</option>
                  	<option value="HTI">Haiti</option>
                  	<option value="HMD">Heard Island and McDonald Islands</option>
                  	<option value="VAT">Holy See (Vatican City State)</option>
                  	<option value="HND">Honduras</option>
                  	<option value="HKG">Hong Kong</option>
                  	<option value="HUN">Hungary</option>
                  	<option value="ISL">Iceland</option>
                  	<option value="IND">India</option>
                  	<option value="IDN">Indonesia</option>
                  	<option value="IRN">Iran, Islamic Republic of</option>
                  	<option value="IRQ">Iraq</option>
                  	<option value="IRL">Ireland</option>
                  	<option value="IMN">Isle of Man</option>
                  	<option value="ISR">Israel</option>
                  	<option value="ITA">Italy</option>
                  	<option value="JAM">Jamaica</option>
                  	<option value="JPN">Japan</option>
                  	<option value="JEY">Jersey</option>
                  	<option value="JOR">Jordan</option>
                  	<option value="KAZ">Kazakhstan</option>
                  	<option value="KEN">Kenya</option>
                  	<option value="KIR">Kiribati</option>
                  	<option value="PRK">Korea, Democratic People's Republic of</option>
                  	<option value="KOR">Korea, Republic of</option>
                  	<option value="KWT">Kuwait</option>
                  	<option value="KGZ">Kyrgyzstan</option>
                  	<option value="LAO">Lao People's Democratic Republic</option>
                  	<option value="LVA">Latvia</option>
                  	<option value="LBN">Lebanon</option>
                  	<option value="LSO">Lesotho</option>
                  	<option value="LBR">Liberia</option>
                  	<option value="LBY">Libya</option>
                  	<option value="LIE">Liechtenstein</option>
                  	<option value="LTU">Lithuania</option>
                  	<option value="LUX">Luxembourg</option>
                  	<option value="MAC">Macao</option>
                  	<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                  	<option value="MDG">Madagascar</option>
                  	<option value="MWI">Malawi</option>
                  	<option value="MYS">Malaysia</option>
                  	<option value="MDV">Maldives</option>
                  	<option value="MLI">Mali</option>
                  	<option value="MLT">Malta</option>
                  	<option value="MHL">Marshall Islands</option>
                  	<option value="MTQ">Martinique</option>
                  	<option value="MRT">Mauritania</option>
                  	<option value="MUS">Mauritius</option>
                  	<option value="MYT">Mayotte</option>
                  	<option value="MEX">Mexico</option>
                  	<option value="FSM">Micronesia, Federated States of</option>
                  	<option value="MDA">Moldova, Republic of</option>
                  	<option value="MCO">Monaco</option>
                  	<option value="MNG">Mongolia</option>
                  	<option value="MNE">Montenegro</option>
                  	<option value="MSR">Montserrat</option>
                  	<option value="MAR">Morocco</option>
                  	<option value="MOZ">Mozambique</option>
                  	<option value="MMR">Myanmar</option>
                  	<option value="NAM">Namibia</option>
                  	<option value="NRU">Nauru</option>
                  	<option value="NPL">Nepal</option>
                  	<option value="NLD">Netherlands</option>
                  	<option value="NCL">New Caledonia</option>
                  	<option value="NZL">New Zealand</option>
                  	<option value="NIC">Nicaragua</option>
                  	<option value="NER">Niger</option>
                  	<option value="NGA">Nigeria</option>
                  	<option value="NIU">Niue</option>
                  	<option value="NFK">Norfolk Island</option>
                  	<option value="MNP">Northern Mariana Islands</option>
                  	<option value="NOR">Norway</option>
                  	<option value="OMN">Oman</option>
                  	<option value="PAK">Pakistan</option>
                  	<option value="PLW">Palau</option>
                  	<option value="PSE">Palestinian Territory, Occupied</option>
                  	<option value="PAN">Panama</option>
                  	<option value="PNG">Papua New Guinea</option>
                  	<option value="PRY">Paraguay</option>
                  	<option value="PER">Peru</option>
                  	<option value="PHL">Philippines</option>
                  	<option value="PCN">Pitcairn</option>
                  	<option value="POL">Poland</option>
                  	<option value="PRT">Portugal</option>
                  	<option value="PRI">Puerto Rico</option>
                  	<option value="QAT">Qatar</option>
                  	<option value="REU">Réunion</option>
                  	<option value="ROU">Romania</option>
                  	<option value="RUS">Russian Federation</option>
                  	<option value="RWA">Rwanda</option>
                  	<option value="BLM">Saint Barthélemy</option>
                  	<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                  	<option value="KNA">Saint Kitts and Nevis</option>
                  	<option value="LCA">Saint Lucia</option>
                  	<option value="MAF">Saint Martin (French part)</option>
                  	<option value="SPM">Saint Pierre and Miquelon</option>
                  	<option value="VCT">Saint Vincent and the Grenadines</option>
                  	<option value="WSM">Samoa</option>
                  	<option value="SMR">San Marino</option>
                  	<option value="STP">Sao Tome and Principe</option>
                  	<option value="SAU">Saudi Arabia</option>
                  	<option value="SEN">Senegal</option>
                  	<option value="SRB">Serbia</option>
                  	<option value="SYC">Seychelles</option>
                  	<option value="SLE">Sierra Leone</option>
                  	<option value="SGP">Singapore</option>
                  	<option value="SXM">Sint Maarten (Dutch part)</option>
                  	<option value="SVK">Slovakia</option>
                  	<option value="SVN">Slovenia</option>
                  	<option value="SLB">Solomon Islands</option>
                  	<option value="SOM">Somalia</option>
                  	<option value="ZAF">South Africa</option>
                  	<option value="SGS">South Georgia and the South Sandwich Islands</option>
                  	<option value="SSD">South Sudan</option>
                  	<option value="ESP">Spain</option>
                  	<option value="LKA">Sri Lanka</option>
                  	<option value="SDN">Sudan</option>
                  	<option value="SUR">Suriname</option>
                  	<option value="SJM">Svalbard and Jan Mayen</option>
                  	<option value="SWZ">Swaziland</option>
                  	<option value="SWE">Sweden</option>
                  	<option value="CHE">Switzerland</option>
                  	<option value="SYR">Syrian Arab Republic</option>
                  	<option value="TWN">Taiwan, Province of China</option>
                  	<option value="TJK">Tajikistan</option>
                  	<option value="TZA">Tanzania, United Republic of</option>
                  	<option value="THA">Thailand</option>
                  	<option value="TLS">Timor-Leste</option>
                  	<option value="TGO">Togo</option>
                  	<option value="TKL">Tokelau</option>
                  	<option value="TON">Tonga</option>
                  	<option value="TTO">Trinidad and Tobago</option>
                  	<option value="TUN">Tunisia</option>
                  	<option value="TUR">Turkey</option>
                  	<option value="TKM">Turkmenistan</option>
                  	<option value="TCA">Turks and Caicos Islands</option>
                  	<option value="TUV">Tuvalu</option>
                  	<option value="UGA">Uganda</option>
                  	<option value="UKR">Ukraine</option>
                  	<option value="ARE">United Arab Emirates</option>
                  	<option value="GBR">United Kingdom</option>
                  	<option value="USA">United States</option>
                  	<option value="UMI">United States Minor Outlying Islands</option>
                  	<option value="URY">Uruguay</option>
                  	<option value="UZB">Uzbekistan</option>
                  	<option value="VUT">Vanuatu</option>
                  	<option value="VEN">Venezuela, Bolivarian Republic of</option>
                  	<option value="VNM">Viet Nam</option>
                  	<option value="VGB">Virgin Islands, British</option>
                  	<option value="VIR">Virgin Islands, U.S.</option>
                  	<option value="WLF">Wallis and Futuna</option>
                  	<option value="ESH">Western Sahara</option>
                  	<option value="YEM">Yemen</option>
                  	<option value="ZMB">Zambia</option>
                  	<option value="ZWE">Zimbabwe</option>
                  </select>
                <div class="help-block"></div>
              </div>


            <button id="submit-btn" type="submit" class="btn btn-primary btn-lg center">Sign Up</button>
          </form><br/>

          <div id="confirm-sent" class="alert alert-success hide">
            <strong>Success!</strong> Your message has been sent.
          </div>

        </div>
      </div>

    </div>
  </div>

</body>

</html>
