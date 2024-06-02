<?php
session_start();

// Check if user is logged in
if(isset($_SESSION['user_email'])) {
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>book</title>

        <!--swiper css link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

        <!--font awesome cdn link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <!--custom css file link-->
        <link rel="stylesheet" href="style.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>

    <?php
        // Display SweetAlert
        echo '<script>';
        echo 'setTimeout(function() {';
        echo 'Swal.fire({';
        echo '  title: "Welcome ' . $user_email . '!",';
        echo '  text: "You have successfully logged in.",';
        echo '  icon: "success",';
        echo '  timer: 3000';
        echo '});';
        echo '}, 1000);'; // Delay to ensure SweetAlert triggers after the page loads
        echo '</script>';
                
    ?>
    
<body>

<!--header section starts-->

<section class="header">
       
       <a href="index.php"><image src="LOGO.png" class="logo"></a>
        
       <nav class="navbar">
           <a href="index.php">home</a>
           <a href="about.php">about</a>
           <a href="packages.php">packages</a>
       </nav>

    <div class="icons">
       <i class="fas fa-bars" id="menu-btn"></i>
      
   </div>
   
</section>



<!--header section ends-->






<!--booking section starts-->
<section class="booking">
    <h1 class="heading-title">book your trip!</h1>
    <form method="POST" action="book_form.php" class="book-form">



        <div class="flex">
            <div class="inputBox">
                <span>name :</span>
                <input type="text" id="name" placeholder="enter your name" name="name" required>
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="email" id="email" placeholder="enter your email" name="email" required>
            </div>
            
            <div class="inputBox">
                <span>phone :</span>
                <select id="countrycode" name="countrycode">
                    <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                    <option data-countryCode="US" value="1">USA (+1)</option>
                    <option data-countryCode="PH" value="63">Philippines (+63)</option>
                    <optgroup label="Other countries">
                    <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                    <option data-countryCode="AD" value="376">Andorra (+376)</option>
                    <option data-countryCode="AO" value="244">Angola (+244)</option>
                    <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                    <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                    <option data-countryCode="AR" value="54">Argentina (+54)</option>
                    <option data-countryCode="AM" value="374">Armenia (+374)</option>
                    <option data-countryCode="AW" value="297">Aruba (+297)</option>
                    <option data-countryCode="AU" value="61">Australia (+61)</option>
                    <option data-countryCode="AT" value="43">Austria (+43)</option>
                    <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                    <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                    <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                    <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                    <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                    <option data-countryCode="BY" value="375">Belarus (+375)</option>
                    <option data-countryCode="BE" value="32">Belgium (+32)</option>
                    <option data-countryCode="BZ" value="501">Belize (+501)</option>
                    <option data-countryCode="BJ" value="229">Benin (+229)</option>
                    <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                    <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                    <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                    <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                    <option data-countryCode="BW" value="267">Botswana (+267)</option>
                    <option data-countryCode="BR" value="55">Brazil (+55)</option>
                    <option data-countryCode="BN" value="673">Brunei (+673)</option>
                    <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                    <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                    <option data-countryCode="BI" value="257">Burundi (+257)</option>
                    <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                    <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                    <option data-countryCode="CA" value="1">Canada (+1)</option>
                    <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                    <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                    <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                    <option data-countryCode="CL" value="56">Chile (+56)</option>
                    <option data-countryCode="CN" value="86">China (+86)</option>
                    <option data-countryCode="CO" value="57">Colombia (+57)</option>
                    <option data-countryCode="KM" value="269">Comoros (+269)</option>
                    <option data-countryCode="CG" value="242">Congo (+242)</option>
                    <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                    <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                    <option data-countryCode="HR" value="385">Croatia (+385)</option>
                    <option data-countryCode="CU" value="53">Cuba (+53)</option>
                    <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                    <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                    <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                    <option data-countryCode="DK" value="45">Denmark (+45)</option>
                    <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                    <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                    <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                    <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                    <option data-countryCode="EG" value="20">Egypt (+20)</option>
                    <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                    <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                    <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                    <option data-countryCode="EE" value="372">Estonia (+372)</option>
                    <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                    <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                    <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                    <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                    <option data-countryCode="FI" value="358">Finland (+358)</option>
                    <option data-countryCode="FR" value="33">France (+33)</option>
                    <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                    <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                    <option data-countryCode="GA" value="241">Gabon (+241)</option>
                    <option data-countryCode="GM" value="220">Gambia (+220)</option>
                    <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                    <option data-countryCode="DE" value="49">Germany (+49)</option>
                    <option data-countryCode="GH" value="233">Ghana (+233)</option>
                    <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                    <option data-countryCode="GR" value="30">Greece (+30)</option>
                    <option data-countryCode="GL" value="299">Greenland (+299)</option>
                    <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                    <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                    <option data-countryCode="GU" value="671">Guam (+671)</option>
                    <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                    <option data-countryCode="GN" value="224">Guinea (+224)</option>
                    <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                    <option data-countryCode="GY" value="592">Guyana (+592)</option>
                    <option data-countryCode="HT" value="509">Haiti (+509)</option>
                    <option data-countryCode="HN" value="504">Honduras (+504)</option>
                    <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                    <option data-countryCode="HU" value="36">Hungary (+36)</option>
                    <option data-countryCode="IS" value="354">Iceland (+354)</option>
                    <option data-countryCode="IN" value="91">India (+91)</option>
                    <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                    <option data-countryCode="IR" value="98">Iran (+98)</option>
                    <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                    <option data-countryCode="IE" value="353">Ireland (+353)</option>
                    <option data-countryCode="IL" value="972">Israel (+972)</option>
                    <option data-countryCode="IT" value="39">Italy (+39)</option>
                    <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                    <option data-countryCode="JP" value="81">Japan (+81)</option>
                    <option data-countryCode="JO" value="962">Jordan (+962)</option>
                    <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                    <option data-countryCode="KE" value="254">Kenya (+254)</option>
                    <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                    <option data-countryCode="KP" value="850">Korea North (+850)</option>
                    <option data-countryCode="KR" value="82">Korea South (+82)</option>
                    <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                    <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                    <option data-countryCode="LA" value="856">Laos (+856)</option>
                    <option data-countryCode="LV" value="371">Latvia (+371)</option>
                    <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                    <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                    <option data-countryCode="LR" value="231">Liberia (+231)</option>
                    <option data-countryCode="LY" value="218">Libya (+218)</option>
                    <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                    <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                    <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                    <option data-countryCode="MO" value="853">Macao (+853)</option>
                    <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                    <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                    <option data-countryCode="MW" value="265">Malawi (+265)</option>
                    <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                    <option data-countryCode="MV" value="960">Maldives (+960)</option>
                    <option data-countryCode="ML" value="223">Mali (+223)</option>
                    <option data-countryCode="MT" value="356">Malta (+356)</option>
                    <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                    <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                    <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                    <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                    <option data-countryCode="MX" value="52">Mexico (+52)</option>
                    <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                    <option data-countryCode="MD" value="373">Moldova (+373)</option>
                    <option data-countryCode="MC" value="377">Monaco (+377)</option>
                    <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                    <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                    <option data-countryCode="MA" value="212">Morocco (+212)</option>
                    <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                    <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                    <option data-countryCode="NA" value="264">Namibia (+264)</option>
                    <option data-countryCode="NR" value="674">Nauru (+674)</option>
                    <option data-countryCode="NP" value="977">Nepal (+977)</option>
                    <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                    <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                    <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                    <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                    <option data-countryCode="NE" value="227">Niger (+227)</option>
                    <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                    <option data-countryCode="NU" value="683">Niue (+683)</option>
                    <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                    <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                    <option data-countryCode="NO" value="47">Norway (+47)</option>
                    <option data-countryCode="OM" value="968">Oman (+968)</option>
                    <option data-countryCode="PW" value="680">Palau (+680)</option>
                    <option data-countryCode="PA" value="507">Panama (+507)</option>
                    <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                    <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                    <option data-countryCode="PE" value="51">Peru (+51)</option>
                    <option data-countryCode="PH" value="63">Philippines (+63)</option>
                    <option data-countryCode="PL" value="48">Poland (+48)</option>
                    <option data-countryCode="PT" value="351">Portugal (+351)</option>
                    <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                    <option data-countryCode="QA" value="974">Qatar (+974)</option>
                    <option data-countryCode="RE" value="262">Reunion (+262)</option>
                    <option data-countryCode="RO" value="40">Romania (+40)</option>
                    <option data-countryCode="RU" value="7">Russia (+7)</option>
                    <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                    <option data-countryCode="SM" value="378">San Marino (+378)</option>
                    <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                    <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                    <option data-countryCode="SN" value="221">Senegal (+221)</option>
                    <option data-countryCode="CS" value="381">Serbia (+381)</option>
                    <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                    <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                    <option data-countryCode="SG" value="65">Singapore (+65)</option>
                    <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                    <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                    <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                    <option data-countryCode="SO" value="252">Somalia (+252)</option>
                    <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                    <option data-countryCode="ES" value="34">Spain (+34)</option>
                    <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                    <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                    <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                    <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                    <option data-countryCode="SD" value="249">Sudan (+249)</option>
                    <option data-countryCode="SR" value="597">Suriname (+597)</option>
                    <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                    <option data-countryCode="SE" value="46">Sweden (+46)</option>
                    <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                    <option data-countryCode="SI" value="963">Syria (+963)</option>
                    <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                    <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                    <option data-countryCode="TH" value="66">Thailand (+66)</option>
                    <option data-countryCode="TG" value="228">Togo (+228)</option>
                    <option data-countryCode="TO" value="676">Tonga (+676)</option>
                    <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                    <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                    <option data-countryCode="TR" value="90">Turkey (+90)</option>
                    <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                    <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                    <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                    <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                    <option data-countryCode="UG" value="256">Uganda (+256)</option>
                    <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                    <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                    <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                    <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                    <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                    <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                    <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                    <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                    <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                    <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                    <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                    <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                    <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                    <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                    <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                    <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                    <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                </select>
                <input type="number" placeholder="enter your number" name="phone" required>
               
            </div>





            <div class="inputBox">
                <span>address  :</span>
                <select id="zipcode" name="zipcode" required>
                        <option value="2421">2421 - Malasiqui</option>
                        <option value="Select"> - Select ZIP CODE -</option>
                        <option value="2800">2800 - Bangued</option>
                        <option value="2801">2801 - Dolores</option>
                        <option value="2802">2802 - Lagangilang</option>
                        <option value="2803">2803 - Tayum</option>
                        <option value="2804">2804 - Peñarrubia</option>
                        <option value="2805">2805 - Bucay</option>
                        <option value="2806">2806 - Pidigan</option>
                        <option value="2807">2807 - Langiden</option>
                        <option value="2808">2808 - San Quintin</option>
                        <option value="2809">2809 - San Isidro</option>
                        <option value="2810">2810 - Manabo</option>
                        <option value="2811">2811 - Villaviciosa</option>
                        <option value="2812">2812 - Pilar</option>
                        <option value="2813">2813 - Luba</option>
                        <option value="2814">2814 - Tubo</option>
                        <option value="2815">2815 - Bolineyasdasd</option>
                        <option value="2816">2816 - Daguioman</option>
                        <option value="2817">2817 - Bucloc</option>
                        <option value="2818">2818 - Sallapadan</option>
                        <option value="2819">2819 - Licuan (Baay)</option>
                        <option value="2820">2820 - Malibcong</option>
                        <option value="2821">2821 - Lacub</option>
                        <option value="2822">2822 - Tinegasdasas</option>
                        <option value="2823">2823 - San Juan</option>
                        <option value="8600">8600 - Butuan City</option>
                        <option value="8601">8601 - Buenavista</option>
                        <option value="8602">8602 - Nasipit</option>
                        <option value="8603">8603 - Carmen</option>
                        <option value="8605">8605 - Cabadbaran City</option>
                        <option value="8604">8604 - Magallanes</option>
                        <option value="8606">8606 - Tubay</option>
                        <option value="8607">8607 - Jabonga</option>
                        <option value="8608">8608 - Santiago</option>
                        <option value="8609">8609 - Kitcharao</option>
                        <option value="8610">8610 - Las Nieves</option>
                        <option value="8611">8611 - Remedios T. Romualdez</option>
                        <option value="4509">4509 - Bacacay</option>
                        <option value="4502">4502 - Camalig</option>
                        <option value="4501">4501 - Daraga (Locsin)</option>
                        <option value="4503">4503 - Guinobatan</option>
                        <option value="4515">4515 - Jovellar</option>
                        <option value="4500">4500 - Legazpi City</option>
                        <option value="4507">4507 - Libon</option>
                        <option value="4504">4504 - Ligao City</option>
                        <option value="4510">4510 - Malilipot</option>
                        <option value="4512">4512 - Malinao</option>
                        <option value="4514">4514 - Manito</option>
                        <option value="4505">4505 - Oas</option>
                        <option value="4516">4516 - Pio Duran (Malacbalac)</option>
                        <option value="4506">4506 - Polangui</option>
                        <option value="4517">4517 - Rapu-Rapu</option>
                        <option value="4508">4508 - Santo Domingo</option>
                        <option value="4511">4511 - Tabaco City</option>
                        <option value="4513">4513 - Tiwi</option>
                        <option value="3814">3814 - Calanasan (Bayag)</option>
                        <option value="3807">3807 - Conner</option>
                        <option value="3810">3810 - Flora</option>
                        <option value="3809">3809 - Kabugao</option>
                        <option value="3813">3813 - Luna</option>
                        <option value="3812">3812 - Pudtol</option>
                        <option value="3811">3811 - Santa Marcela</option>
                        <option value="3200">3200 - Baler</option>
                        <option value="3204">3204 - Casiguran</option>
                        <option value="3205">3205 - Dilasag</option>
                        <option value="3206">3206 - Dinalungan</option>
                        <option value="3207">3207 - Dingalan</option>
                        <option value="3203">3203 - Dipaculao</option>
                        <option value="3202">3202 - Maria Aurora</option>
                        <option value="3201">3201 - San Luis</option>
                        <option value="2114">2114 - Abucay</option>
                        <option value="2107">2107 - Bagac</option>
                        <option value="2100">2100 - Balanga City</option>
                        <option value="2106">2106 - Mariveles (Bataan Export Processing Zone)</option>
                        <option value="2110">2110 - Dinalupihan</option>
                        <option value="2111">2111 - Hermosa</option>
                        <option value="2104">2104 - Lamao</option>
                        <option value="2103">2103 - Limay</option>
                        <option value="2105">2105 - Mariveles</option>
                        <option value="2108">2108 - Morong</option>
                        <option value="2112">2112 - Orani</option>
                        <option value="2102">2102 - Orion</option>
                        <option value="2101">2101 - Pilar</option>
                        <option value="2109">2109 - Morong (Refugee Processing Center)</option>
                        <option value="2113">2113 - Samal</option>
                        <option value="3900">3900 - Basco</option>
                        <option value="3905">3905 - Itbayat</option>
                        <option value="3902">3902 - Ivana</option>
                        <option value="3901">3901 - Mahatao</option>
                        <option value="3904">3904 - Sabtang</option>
                        <option value="3903">3903 - Uyugan</option>
                        <option value="4211">4211 - Agoncillo</option>
                        <option value="4205">4205 - Alitagtag</option>
                        <option value="4213">4213 - Balayan</option>
                        <option value="4219">4219 - Balete</option>
                        <option value="4200">4200 - Batangas City</option>
                        <option value="4201">4201 - Bauan</option>
                        <option value="4212">4212 - Calaca</option>
                        <option value="4215">4215 - Calatagan, incl. Punta Baluarte</option>
                        <option value="4222">4222 - Cuenca</option>
                        <option value="4218">4218 - Fernando Airbase</option>
                        <option value="4230">4230 - Ibaan</option>
                        <option value="4221">4221 - Laurel, incl. Diokno Highway</option>
                        <option value="4209">4209 - Lemery</option>
                        <option value="4216">4216 - Lian, incl. Matabungkay</option>
                        <option value="4217">4217 - Lipa City</option>
                        <option value="4229">4229 - Lobo, incl. Laiya</option>
                        <option value="4202">4202 - Mabini</option>
                        <option value="4233">4233 - Malvar</option>
                        <option value="4223">4223 - Mataas na Kahoy</option>
                        <option value="4231">4231 - Nasugbu, incl. Punta Fuego and Calaruega</option>
                        <option value="4224">4224 - Padre Garcia</option>
                        <option value="4225">4225 - Rosario</option>
                        <option value="4227">4227 - San Jose</option>
                        <option value="4226">4226 - San Juan</option>
                        <option value="4210">4210 - San Luis</option>
                        <option value="4207">4207 - San Nicolas</option>
                        <option value="4204">4204 - San Pascual</option>
                        <option value="4206">4206 - Santa Teresita</option>
                        <option value="4234">4234 - Santo Tomas</option>
                        <option value="4208">4208 - Taal</option>
                        <option value="4220">4220 - Talisay</option>
                        <option value="4232">4232 - Tanauan City</option>
                        <option value="4228">4228 - Taysan</option>
                        <option value="4203">4203 - Tingloy</option>
                        <option value="4214">4214 - Tuy</option>
                        <option value="2612">2612 - Atok</option>
                        <option value="2600">2600 - Baguio City</option>
                        <option value="2610">2610 - Bakun</option>
                        <option value="2605">2605 - Bokod</option>
                        <option value="2607">2607 - Buguias</option>
                        <option value="2604">2604 - Itogon</option>
                        <option value="2606">2606 - Kabayan</option>
                        <option value="2613">2613 - Kapangan</option>
                        <option value="2611">2611 - Kibungan</option>
                        <option value="2601">2601 - La Trinidad, including Pico</option>
                        <option value="2609">2609 - Lepanto, Mankayan</option>
                        <option value="2608">2608 - Mankayan</option>
                        <option value="2602">2602 - Philippine Military Academy</option>
                        <option value="2614">2614 - Sablan</option>
                        <option value="2603">2603 - Tuba, including Marcos Highway and Kennon Road</option>
                        <option value="2615">2615 - Tublay</option>
                        <option value="3012">3012 - Angat</option>
                        <option value="3016">3016 - Balagtas (Bigaa)</option>
                        <option value="3006">3006 - Baliuag</option>
                        <option value="3018">3018 - Bocaue</option>
                        <option value="3017">3017 - Bulacan</option>
                        <option value="3007">3007 - Bustos</option>
                        <option value="3003">3003 - Calumpit</option>
                        <option value="3009">3009 - Doña Remedios Trinidad</option>
                        <option value="3015">3015 - Guiguinto</option>
                        <option value="3002">3002 - Hagonoy</option>
                        <option value="3000">3000 - Malolos City</option>
                        <option value="3019">3019 - Marilao</option>
                        <option value="3020">3020 - Meycauayan City</option>
                        <option value="3013">3013 - Norzagaray</option>
                        <option value="3021">3021 - Obando</option>
                        <option value="3014">3014 - Pandi</option>
                        <option value="3001">3001 - Paombong</option>
                        <option value="3004">3004 - Plaridel</option>
                        <option value="3005">3005 - Pulilan</option>
                        <option value="3010">3010 - San Ildefonso</option>
                        <option value="3023">3023 - San Jose del Monte City</option>
                        <option value="3011">3011 - San Miguel</option>
                        <option value="3008">3008 - San Rafael</option>
                        <option value="3022">3022 - Santa Maria</option>
                        <option value="3024">3024 - Sapang Palay, San Jose del Monte City</option>
                        <option value="3517">3517 - Abulug</option>
                        <option value="3507">3507 - Alcala</option>
                        <option value="3523">3523 - Allacapan</option>
                        <option value="3505">3505 - Amulung</option>
                        <option value="3515">3515 - Aparri</option>
                        <option value="3506">3506 - Baggao</option>
                        <option value="3516">3516 - Ballesteros</option>
                        <option value="3511">3511 - Buguey</option>
                        <option value="3520">3520 - Calayan</option>
                        <option value="3510">3510 - Camalaniugan</option>
                        <option value="3519">3519 - Claveria</option>
                        <option value="3501">3501 - Enrile</option>
                        <option value="3508">3508 - Gattaran</option>
                        <option value="3513">3513 - Gonzaga</option>
                        <option value="3504">3504 - Iguig</option>
                        <option value="3509">3509 - Lal-Lo</option>
                        <option value="3524">3524 - Lasam</option>
                        <option value="3522">3522 - Pamplona</option>
                        <option value="3502">3502 - Peñablanca</option>
                        <option value="3527">3527 - Piat</option>
                        <option value="3526">3526 - Rizal</option>
                        <option value="3518">3518 - Sanchez-Mira</option>
                        <option value="3514">3514 - Santa Ana</option>
                        <option value="3521">3521 - Santa Praxedes</option>
                        <option value="3512">3512 - Santa Teresita</option>
                        <option value="3525">3525 - Santo Niño</option>
                        <option value="3503">3503 - Solana</option>
                        <option value="3528">3528 - Tuao</option>
                        <option value="3500">3500 - Tuguegarao City</option>
                        <option value="4608">4608 - Basud</option>
                        <option value="4607">4607 - Capalonga</option>
                        <option value="4600">4600 - Daet</option>
                        <option value="4610">4610 - Imelda / San Lorenzo Ruiz</option>
                        <option value="4606">4606 - Jose Panganiban</option>
                        <option value="4604">4604 - Labo</option>
                        <option value="4601">4601 - Mercedes</option>
                        <option value="4605">4605 - Paracale</option>
                        <option value="4609">4609 - San Vicente</option>
                        <option value="4611">4611 - Santa Elena</option>
                        <option value="4602">4602 - Talisay</option>
                        <option value="4612">4612 - Tulay-na-Lupa</option>
                        <option value="4603">4603 - Vinzons</option>
                        <option value="4432">4432 - Baao</option>
                        <option value="4436">4436 - Balatan</option>
                        <option value="4435">4435 - Bato</option>
                        <option value="4404">4404 - Bombon</option>
                        <option value="4433">4433 - Buhi</option>
                        <option value="4430">4430 - Bula</option>
                        <option value="4406">4406 - Cabusao</option>
                        <option value="4405">4405 - Calabanga</option>
                        <option value="4401">4401 - Camaligan</option>
                        <option value="4402">4402 - Canaman</option>
                        <option value="4429">4429 - Caramoan</option>
                        <option value="4411">4411 - Del Gallego</option>
                        <option value="4412">4412 - Gainza</option>
                        <option value="4428">4428 - Garchitorena</option>
                        <option value="4422">4422 - Goa</option>
                        <option value="4431">4431 - Iriga City</option>
                        <option value="4425">4425 - Lagonoy</option>
                        <option value="4407">4407 - Libmanan</option>
                        <option value="4409">4409 - Lupi</option>
                        <option value="4403">4403 - Magarao</option>
                        <option value="4413">4413 - Milaor</option>
                        <option value="4414">4414 - Minalabac</option>
                        <option value="4434">4434 - Nabua</option>
                        <option value="4400">4400 - Naga City</option>
                        <option value="4419">4419 - Ocampo</option>
                        <option value="4416">4416 - Pamplona</option>
                        <option value="4417">4417 - Pasacao</option>
                        <option value="4418">4418 - Pili</option>
                        <option value="4424">4424 - Presentacion</option>
                        <option value="4410">4410 - Ragay</option>
                        <option value="4421">4421 - Sagnay</option>
                        <option value="4415">4415 - San Fernando</option>
                        <option value="4423">4423 - San Jose</option>
                        <option value="4408">4408 - Sipocot</option>
                        <option value="4427">4427 - Siruma</option>
                        <option value="4420">4420 - Tigaon</option>
                        <option value="4426">4426 - Tinambac</option>
                        <option value="4807">4807 - Bagamanoc</option>
                        <option value="4803">4803 - Baras</option>
                        <option value="4801">4801 - Bato</option>
                        <option value="4808">4808 - Caramoran</option>
                        <option value="4804">4804 - Gigmoto</option>
                        <option value="4809">4809 - Pandan</option>
                        <option value="4806">4806 - Panganiban</option>
                        <option value="4810">4810 - San Andres</option>
                        <option value="4802">4802 - San Miguel</option>
                        <option value="4805">4805 - Viga</option>
                        <option value="4800">4800 - Virac</option>
                        <option value="4133">4133 - Bailen</option>
                        <option value="4123">4123 - Alfonso</option>
                        <option value="4119">4119 - Amadeo</option>
                        <option value="4102">4102 - Bacoor</option>
                        <option value="4116">4116 - Carmona</option>
                        <option value="4100">4100 - Cavite City</option>
                        <option value="4101">4101 - Sangley Point Naval Base</option>
                        <option value="4125">4125 - Corregidor Island</option>
                        <option value="4114">4114 - Dasmariñas</option>
                        <option value="4115">4115 - Dasmarinas Resettlement Area</option>
                        <option value="4124">4124 - General Emilio Aguinaldo (Bailen)</option>
                        <option value="4117">4117 - General Mariano Alvarez</option>
                        <option value="4107">4107 - General Trias</option>
                        <option value="4103">4103 - Imus</option>
                        <option value="4122">4122 - Indang</option>
                        <option value="4104">4104 - Kawit</option>
                        <option value="4113">4113 - Magallanes</option>
                        <option value="4112">4112 - Maragondon</option>
                        <option value="4121">4121 - Mendez (Mendez-Nuñez)</option>
                        <option value="4110">4110 - Naic</option>
                        <option value="4105">4105 - Noveleta</option>
                        <option value="4106">4106 - Rosario</option>
                        <option value="4118">4118 - Silang</option>
                        <option value="4120">4120 - Tagaytay City</option>
                        <option value="4108">4108 - Tanza</option>
                        <option value="4111">4111 - Ternate incl. Caylabne Bay & Puerto Azul</option>
                        <option value="4109">4109 - Trece Martires City</option>
                        <option value="3606">3606 - Aguinaldo</option>
                        <option value="3608">3608 - Alfonso Lista (Potia)</option>
                        <option value="3610">3610 - Asipulo</option>
                        <option value="3601">3601 - Banaue</option>
                        <option value="3607">3607 - Hingyon</option>
                        <option value="3603">3603 - Hungduan</option>
                        <option value="3604">3604 - Kiangan</option>
                        <option value="3600">3600 - Lagawe</option>
                        <option value="3605">3605 - Lamut</option>
                        <option value="3602">3602 - Mayoyao (Mayaoyao)</option>
                        <option value="3609">3609 - Tinoc</option>
                        <option value="2922">2922 - Adams</option>
                        <option value="2916">2916 - Bacarra</option>
                        <option value="2904">2904 - Badoc</option>
                        <option value="2920">2920 - Bangui</option>
                        <option value="2908">2908 - Banna (Espiritu)</option>
                        <option value="2906">2906 - Batac</option>
                        <option value="2918">2918 - Burgos</option>
                        <option value="2911">2911 - Carasi</option>
                        <option value="2903">2903 - Currimao</option>
                        <option value="2913">2913 - Dingras</option>
                        <option value="2921">2921 - Dumalneg</option>
                        <option value="2900">2900 - Laoag City</option>
                        <option value="2907">2907 - Marcos</option>
                        <option value="2909">2909 - Nueva Era</option>
                        <option value="2919">2919 - Pagudpud</option>
                        <option value="2902">2902 - Paoay</option>
                        <option value="2917">2917 - Pasuquin</option>
                        <option value="2912">2912 - Piddig</option>
                        <option value="2905">2905 - Pinili</option>
                        <option value="2901">2901 - San Nicolas</option>
                        <option value="2914">2914 - Sarrat</option>
                        <option value="2910">2910 - Solsona</option>
                        <option value="2915">2915 - Vintar</option>
                        <option value="2716">2716 - Alilem</option>
                        <option value="2708">2708 - Banayoyo</option>
                        <option value="2727">2727 - Bantay</option>
                        <option value="2724">2724 - Burgos</option>
                        <option value="2732">2732 - Cabugao</option>
                        <option value="2710">2710 - Candon City</option>
                        <option value="2702">2702 - Caoayan</option>
                        <option value="2718">2718 - Cervantes</option>
                        <option value="2709">2709 - Galimuyod</option>
                        <option value="2720">2720 - Gregorio del Pilar</option>
                        <option value="2723">2723 - Lidlidda</option>
                        <option value="2730">2730 - Magsingal</option>
                        <option value="2725">2725 - Nagbukel</option>
                        <option value="2704">2704 - Narvacan</option>
                        <option value="2721">2721 - Quirino (Angkaki)</option>
                        <option value="2711">2711 - Salcedo (Baugen)</option>
                        <option value="2722">2722 - San Emilio</option>
                        <option value="2706">2706 - San Esteban</option>
                        <option value="2728">2728 - San Ildefonso</option>
                        <option value="2731">2731 - San Juan (Lapog)</option>
                        <option value="2726">2726 - San Vicente</option>
                        <option value="2703">2703 - Santa</option>
                        <option value="2701">2701 - Santa Catalina</option>
                        <option value="2713">2713 - Santa Cruz</option>
                        <option value="2712">2712 - Santa Lucia</option>
                        <option value="2705">2705 - Santa Maria</option>
                        <option value="2707">2707 - Santiago</option>
                        <option value="2729">2729 - Santo Domingo</option>
                        <option value="2719">2719 - Sigay</option>
                        <option value="2733">2733 - Sinait</option>
                        <option value="2717">2717 - Sugpon</option>
                        <option value="2715">2715 - Suyo</option>
                        <option value="2714">2714 - Tagudin</option>
                        <option value="2700">2700 - Vigan City</option>
                        <option value="3306">3306 - Alicia</option>
                        <option value="3307">3307 - Angadanan</option>
                        <option value="3316">3316 - Aurora</option>
                        <option value="3331">3331 - Benito Soliven</option>
                        <option value="3322">3322 - Burgos</option>
                        <option value="3328">3328 - Cabagan</option>
                        <option value="3315">3315 - Cabatuan</option>
                        <option value="3305">3305 - Cauayan City</option>
                        <option value="3312">3312 - Cordon</option>
                        <option value="3326">3326 - Delfin Albano</option>
                        <option value="3336">3336 - Dinapigui</option>
                        <option value="3335">3335 - Divilacan</option>
                        <option value="3309">3309 - Echague</option>
                        <option value="3301">3301 - Gamu</option>
                        <option value="3300">3300 - Ilagan</option>
                        <option value="3313">3313 - Jones</option>
                        <option value="3304">3304 - Luna</option>
                        <option value="3333">3333 - Maconacon</option>
                        <option value="3323">3323 - Mallig</option>
                        <option value="3302">3302 - Naguillan</option>
                        <option value="3334">3334 - Palanan</option>
                        <option value="3324">3324 - Quezon</option>
                        <option value="3321">3321 - Quirino</option>
                        <option value="3319">3319 - Ramon</option>
                        <option value="3303">3303 - Reina Mercedes</option>
                        <option value="3320">3320 - Roxas</option>
                        <option value="3314">3314 - San Agustin</option>
                        <option value="3308">3308 - San Guillermo</option>
                        <option value="3310">3310 - San Isidro</option>
                        <option value="3317">3317 - San Manuel (Callang)</option>
                        <option value="3332">3332 - San Mariano</option>
                        <option value="3318">3318 - San Mateo</option>
                        <option value="3329">3329 - San Pablo</option>
                        <option value="3330">3330 - Santa Maria</option>
                        <option value="3311">3311 - Santiago City</option>
                        <option value="3327">3327 - Santo Tomas</option>
                        <option value="3325">3325 - Tumauini</option>
                        <option value="4001">4001 - Alaminos</option>
                        <option value="4033">4033 - Bay</option>
                        <option value="4024">4024 - Biñan City</option>
                        <option value="4006">4006 - Botocan, Magdalena</option>
                        <option value="4025">4025 - Cabuyao</option>
                        <option value="4027">4027 - Calamba City</option>
                        <option value="4012">4012 - Calauan</option>
                        <option value="4029">4029 - Camp Vicente Lim</option>
                        <option value="4028">4028 - Canlubang, Calamba City</option>
                        <option value="4013">4013 - Cavinti</option>
                        <option value="4021">4021 - Famy</option>
                        <option value="4015">4015 - Kalayaan</option>
                        <option value="4004">4004 - Liliw</option>
                        <option value="4030">4030 - Los Baños</option>
                        <option value="4032">4032 - Luisiana</option>
                        <option value="4014">4014 - Lumban</option>
                        <option value="4020">4020 - Mabitac</option>
                        <option value="4007">4007 - Magdalena</option>
                        <option value="4005">4005 - Majayjay</option>
                        <option value="4002">4002 - Nagcarlan</option>
                        <option value="4016">4016 - Paete</option>
                        <option value="4008">4008 - Pagsanjan</option>
                        <option value="4017">4017 - Pakil</option>
                        <option value="4018">4018 - Pangil</option>
                        <option value="4010">4010 - Pila</option>
                        <option value="4003">4003 - Rizal</option>
                        <option value="4000">4000 - San Pablo City</option>
                        <option value="4023">4023 - San Pedro</option>
                        <option value="4009">4009 - Santa Cruz</option>
                        <option value="4022">4022 - Santa Maria</option>
                        <option value="4026">4026 - Santa Rosa City</option>
                        <option value="4019">4019 - Siniloan</option>
                        <option value="4031">4031 - University of the Philippines, Los Baños</option>
                        <option value="4011">4011 - Victoria</option>
                        <option value="2504">2504 - Agoo La Union</option>
                        <option value="2503">2503 - Aringay La Union</option>
                        <option value="2515">2515 - Bacnotan La Union</option>
                        <option value="2512">2512 - Bagulin La Union</option>
                        <option value="2517">2517 - Balaoan La Union</option>
                        <option value="2519">2519 - Bangar La Union</option>
                        <option value="2501">2501 - Bauang La Union</option>
                        <option value="2510">2510 - Burgos La Union</option>
                        <option value="2502">2502 - Caba La Union</option>
                        <option value="2507">2507 - Damortis La Union</option>
                        <option value="2518">2518 - Luna La Union</option>
                        <option value="2511">2511 - Naguillan La Union</option>
                        <option value="2508">2508 - Pugo La Union</option>
                        <option value="2506">2506 - Rosario La Union</option>
                        <option value="2500">2500 - San Fernando City La Union</option>
                        <option value="2513">2513 - San Gabriel La Union</option>
                        <option value="2514">2514 - San Juan</option>
                        <option value="2505">2505 - Santo Tomas</option>
                        <option value="2516">2516 - Santol</option>
                        <option value="2520">2520 - Sudepen</option>
                        <option value="2509">2509 - Tubao</option>
                        <option value="4900">4900 - Boac</option>
                        <option value="4901">4901 - Mogpog</option>
                        <option value="4902">4902 - Santa Cruz</option>
                        <option value="4903">4903 - Torrijos</option>
                        <option value="4904">4904 - Buenavista</option>
                        <option value="4905">4905 - Gasan</option>
                        <option value="5414">5414 - Aroroy</option>
                        <option value="5413">5413 - Baleno</option>
                        <option value="5412">5412 - Balud</option>
                        <option value="5415">5415 - Batuan</option>
                        <option value="5421">5421 - Buenavista</option>
                        <option value="5405">5405 - Cataingan</option>
                        <option value="5409">5409 - Cawayan</option>
                        <option value="5419">5419 - Claveria</option>
                        <option value="5403">5403 - Dimasalang</option>
                        <option value="5407">5407 - Esperanza</option>
                        <option value="5411">5411 - Mandaon</option>
                        <option value="5400">5400 - Masbate City</option>
                        <option value="5410">5410 - Milagros</option>
                        <option value="5401">5401 - Mobo</option>
                        <option value="5418">5418 - Monreal</option>
                        <option value="5404">5404 - Palanas</option>
                        <option value="5406">5406 - Pio V. Corpuz</option>
                        <option value="5408">5408 - Placer</option>
                        <option value="5416">5416 - San Fernando</option>
                        <option value="5417">5417 - San Jacinto</option>
                        <option value="5420">5420 - San Pascual</option>
                        <option value="5402">5402 - Uson</option>
                        <option value="2623">2623 - Barlig</option>
                        <option value="2621">2621 - Bauko</option>
                        <option value="2618">2618 - Besao</option>
                        <option value="2616">2616 - Bontoc</option>
                        <option value="2624">2624 - Natonin</option>
                        <option value="2625">2625 - Paracelis</option>
                        <option value="2622">2622 - Sabangan</option>
                        <option value="2617">2617 - Sadanga</option>
                        <option value="2619">2619 - Sagada</option>
                        <option value="2620">2620 - Tadian</option>
                        <option value="3111">3111 - Aliaga</option>
                        <option value="3128">3128 - Bongabon</option>
                        <option value="3100">3100 - Cabanatuan City</option>
                        <option value="3107">3107 - Cabiao</option>
                        <option value="3123">3123 - Carranglan</option>
                        <option value="3120">3120 - Central Luzon State University</option>
                        <option value="3117">3117 - Cuyapo</option>
                        <option value="3130">3130 - Fort Magsaysay</option>
                        <option value="3131">3131 - Gabaldon</option>
                        <option value="3105">3105 - Gapan City</option>
                        <option value="3125">3125 - General M. Natividad</option>
                        <option value="3104">3104 - General Tinio</option>
                        <option value="3115">3115 - Guimba</option>
                        <option value="3109">3109 - Jaen</option>
                        <option value="3129">3129 - Laur</option>
                        <option value="3112">3112 - Licab</option>
                        <option value="3126">3126 - Llanera</option>
                        <option value="3122">3122 - Lupao</option>
                        <option value="3119">3119 - Science City of Muñoz</option>
                        <option value="3116">3116 - Nampicuan</option>
                        <option value="3132">3132 - Palayan City</option>
                        <option value="3124">3124 - Pantabangan</option>
                        <option value="3103">3103 - Peñaranda</option>
                        <option value="3113">3113 - Quezon</option>
                        <option value="3127">3127 - Rizal</option>
                        <option value="3108">3108 - San Antonio</option>
                        <option value="3106">3106 - San Isidro</option>
                        <option value="3121">3121 - San Jose City</option>
                        <option value="3102">3102 - San Leonardo</option>
                        <option value="3101">3101 - Santa Rosa</option>
                        <option value="3133">3133 - Santo Domingo</option>
                        <option value="3114">3114 - Talavera</option>
                        <option value="3118">3118 - Talugtog</option>
                        <option value="3110">3110 - Zaragoza</option>
                        <option value="3714">3714 - Alfonso Castañeda</option>
                        <option value="3701">3701 - Ambaguio</option>
                        <option value="3704">3704 - Aritao</option>
                        <option value="3711">3711 - Bagabag</option>
                        <option value="3702">3702 - Bambang</option>
                        <option value="3700">3700 - Bayombong</option>
                        <option value="3712">3712 - Diadi</option>
                        <option value="3706">3706 - Dupax del Norte</option>
                        <option value="3707">3707 - Dupax Del Sur</option>
                        <option value="3703">3703 - Kasibu</option>
                        <option value="3708">3708 - Kayapa</option>
                        <option value="3714">3714 - Quezon</option>
                        <option value="3709">3709 - Solano</option>
                        <option value="3705">3705 - Santa Fe (Imugan)</option>
                        <option value="3710">3710 - Villa Verde (Ibung)</option>
                        <option value="5108">5108 - Abra de Ilog</option>
                        <option value="5102">5102 - Calintaan</option>
                        <option value="5111">5111 - Looc</option>
                        <option value="5109">5109 - Lubang</option>
                        <option value="5101">5101 - Magsaysay</option>
                        <option value="5106">5106 - Mamburao</option>
                        <option value="5107">5107 - Paluan</option>
                        <option value="5103">5103 - Rizal</option>
                        <option value="5104">5104 - Sablayan</option>
                        <option value="5100">5100 - San Jose</option>
                        <option value="5105">5105 - Santa Cruz</option>
                        <option value="5110">5110 - Tilik</option>
                        <option value="5201">5201 - Baco</option>
                        <option value="5210">5210 - Bansud</option>
                        <option value="5211">5211 - Bongabon</option>
                        <option value="5214">5214 - Bulalacao</option>
                        <option value="5200">5200 - Calapan</option>
                        <option value="5209">5209 - Gloria</option>
                        <option value="5213">5213 - Mansalay</option>
                        <option value="5204">5204 - Naujan</option>
                        <option value="5208">5208 - Pinamalayan</option>
                        <option value="5206">5206 - Pola</option>
                        <option value="5203">5203 - Puerto Galera</option>
                        <option value="5212">5212 - Roxas</option>
                        <option value="5202">5202 - San Teodoro</option>
                        <option value="5207">5207 - Socorro</option>
                        <option value="5205">5205 - Victoria</option>
                        <option value="5300">5300 - Puerto Princesa</option>
                        <option value="5301">5301 - Iwahig Penal Colony</option>
                        <option value="5302">5302 - Aborlan</option>
                        <option value="5303">5303 - Narra (Panacan)</option>
                        <option value="5304">5304 - Quezon</option>
                        <option value="5305">5305 - Brooke's Point</option>
                        <option value="5306">5306 - Bataraza</option>
                        <option value="5307">5307 - Balabac</option>
                        <option value="5308">5308 - Roxas</option>
                        <option value="5309">5309 - San Vicente</option>
                        <option value="5310">5310 - Dumaran</option>
                        <option value="5311">5311 - Araceli</option>
                        <option value="5312">5312 - Taytay</option>
                        <option value="5313">5313 - El Nido (Bacuit)</option>
                        <option value="5314">5314 - Linapacan</option>
                        <option value="5315">5315 - Culion</option>
                        <option value="5316">5316 - Coron</option>
                        <option value="5317">5317 - Busuanga</option>
                        <option value="5318">5318 - Cuyo</option>
                        <option value="5319">5319 - Magsaysay</option>
                        <option value="5320">5320 - Agutaya</option>
                        <option value="5321">5321 - Cagayancillo</option>
                        <option value="5322">5322 - Kalayaan</option>
                        <option value="2016">2016 - Apalit</option>
                        <option value="2012">2012 - Arayat</option>
                        <option value="2001">2001 - Bacolor</option>
                        <option value="2007">2007 - Basa Airbase</option>
                        <option value="2013">2013 - Candaba</option>
                        <option value="2006">2006 - Floridablanca</option>
                        <option value="2003">2003 - Guagua</option>
                        <option value="2005">2005 - Lubao</option>
                        <option value="2010">2010 - Mabalacat</option>
                        <option value="2018">2018 - Macabebe</option>
                        <option value="2011">2011 - Magalang</option>
                        <option value="2017">2017 - Masantol</option>
                        <option value="2021">2021 - Mexico</option>
                        <option value="2019">2019 - Minalin</option>
                        <option value="2008">2008 - Porac</option>
                        <option value="2000">2000 - City of San Fernando</option>
                        <option value="2014">2014 - San Luis</option>
                        <option value="2015">2015 - San Simon</option>
                        <option value="2022">2022 - Santa Ana</option>
                        <option value="2002">2002 - Santa Rita</option>
                        <option value="2020">2020 - Santo Tomas</option>
                        <option value="2004">2004 - Sasmuan</option>
                        <option value="2408">2408 - Agno</option>
                        <option value="2415">2415 - Aguilar</option>
                        <option value="2404">2404 - Alaminos</option>
                        <option value="2425">2425 - Alcala</option>
                        <option value="2405">2405 - Anda</option>
                        <option value="2439">2439 - Asingan</option>
                        <option value="2442">2442 - Balungao</option>
                        <option value="2407">2407 - Bani</option>
                        <option value="2422">2422 - Basista</option>
                        <option value="2424">2424 - Bautista</option>
                        <option value="2423">2423 - Bayambang</option>
                        <option value="2436">2436 - Binalonan</option>
                        <option value="2417">2417 - Binmaley</option>
                        <option value="2406">2406 - Bolinao</option>
                        <option value="2416">2416 - Bugallon</option>
                        <option value="2410">2410 - Burgos</option>
                        <option value="2418">2418 - Calasiao</option>
                        <option value="2400">2400 - Dagupan City</option>
                        <option value="2411">2411 - Dasol</option>
                        <option value="2412">2412 - Infanta</option>
                        <option value="2402">2402 - Labrador</option>
                        <option value="2437">2437 - Laoac</option>
                        <option value="2401">2401 - Lingayen</option>
                        <option value="2409">2409 - Mabini</option>
                        <option value="2421">2421 - Malasiqui</option>
                        <option value="2430">2430 - Manaoag</option>
                        <option value="2432">2432 - Mangaldan</option>
                        <option value="2413">2413 - Mangatarem</option>
                        <option value="2429">2429 - Mapandan</option>
                        <option value="2446">2446 - Natividad</option>
                        <option value="2435">2435 - Pozorrubio</option>
                        <option value="2441">2441 - Rosales</option>
                        <option value="2420">2420 - San Carlos City</option>
                        <option value="2433">2433 - San Fabian</option>
                        <option value="2431">2431 - San Jacinto</option>
                        <option value="2438">2438 - San Manuel</option>
                        <option value="2447">2447 - San Nicolas</option>
                        <option value="2444">2444 - San Quintin</option>
                        <option value="2419">2419 - Santa Barbara</option>
                        <option value="2440">2440 - Santa Maria</option>
                        <option value="2426">2426 - Santo Tomas</option>
                        <option value="2434">2434 - Sison</option>
                        <option value="2403">2403 - Sual</option>
                        <option value="2445">2445 - Tayug</option>
                        <option value="2443">2443 - Umingan</option>
                        <option value="2414">2414 - Urbiztondo</option>
                        <option value="2428">2428 - Urdaneta</option>
                        <option value="2427">2427 - Villasis</option>
                        <option value="4304">4304 - Agdangan</option>
                        <option value="4333">4333 - Alabat</option>
                        <option value="4331">4331 - Atimonan</option>
                        <option value="4320">4320 - Buenavista</option>
                        <option value="4340">4340 - Burdeos</option>
                        <option value="4318">4318 - Calauag</option>
                        <option value="4323">4323 - Candelaria</option>
                        <option value="4311">4311 - Catanauan</option>
                        <option value="4326">4326 - Dolores Quezon</option>
                        <option value="4310">4310 - General Antonio Luna</option>
                        <option value="4338">4338 - General Nakar</option>
                        <option value="4319">4319 - Guinayangan</option>
                        <option value="4307">4307 - Gumaca</option>
                        <option value="4317">4317 - Hondagua</option>
                        <option value="4336">4336 - Infanta</option>
                        <option value="4342">4342 - Jomalig</option>
                        <option value="4316">4316 - Lopez</option>
                        <option value="4328">4328 - Lucban</option>
                        <option value="4301">4301 - Lucena City</option>
                        <option value="4309">4309 - Macalelon</option>
                        <option value="4330">4330 - Mauban</option>
                        <option value="4312">4312 - Mulanay</option>
                        <option value="4303">4303 - Padre Burgos</option>
                        <option value="4302">4302 - Pagbilao</option>
                        <option value="4337">4337 - Panukulan</option>
                        <option value="4341">4341 - Patnanungan</option>
                        <option value="4334">4334 - Perez</option>
                        <option value="4308">4308 - Pitogo</option>
                        <option value="4306">4306 - Plaridel</option>
                        <option value="4339">4339 - Polilio</option>
                        <option value="4332">4332 - Quezon</option>
                        <option value="4300">4300 - Provincial Capitol, Lucena City</option>
                        <option value="4335">4335 - Real</option>
                        <option value="4329">4329 - Sampaloc</option>
                        <option value="4314">4314 - San Andres</option>
                        <option value="4324">4324 - San Antonio</option>
                        <option value="4315">4315 - San Francisco (Aurora)</option>
                        <option value="4313">4313 - San Narciso</option>
                        <option value="4322">4322 - Sariaya</option>
                        <option value="4321">4321 - Tagkawayan</option>
                        <option value="4327">4327 - Tayabas</option>
                        <option value="4325">4325 - Tiaong</option>
                        <option value="4305">4305 - Unisan</option>
                        <option value="3400">3400 - Cabarroguis</option>
                        <option value="3401">3401 - Diffun</option>
                        <option value="3402">3402 - Saguday</option>
                        <option value="3403">3403 - Aglipay</option>
                        <option value="3404">3404 - Maddela</option>
                        <option value="3405">3405 - Nagtipunan (Abbag)</option>
                        <option value="1850">1850 - San Mateo</option>
                        <option value="1860">1860 - Rodriguez</option>
                        <option value="1870">1870 - Antipolo City (formerly Antipolo Rizal)</option>
                        <option value="1880">1880 - Teresa</option>
                        <option value="1900">1900 - Cainta</option>
                        <option value="1910">1910 - Pililla</option>
                        <option value="1920">1920 - Taytay</option>
                        <option value="1930">1930 - Angono</option>
                        <option value="1940">1940 - Binangonan</option>
                        <option value="1950">1950 - Cardona</option>
                        <option value="1960">1960 - Morong</option>
                        <option value="1970">1970 - Baras</option>
                        <option value="1980">1980 - Tanay</option>
                        <option value="1990">1990 - Jalajala</option>
                        <option value="4701">4701 - Bacon</option>
                        <option value="4712">4712 - Barcelona</option>
                        <option value="4706">4706 - Bulan</option>
                        <option value="4704">4704 - Bulusan</option>
                        <option value="4702">4702 - Casiguran</option>
                        <option value="4713">4713 - Castilla</option>
                        <option value="4715">4715 - Donsol</option>
                        <option value="4710">4710 - Gubat</option>
                        <option value="4707">4707 - Irosin</option>
                        <option value="4703">4703 - Juban</option>
                        <option value="4705">4705 - Magallanes</option>
                        <option value="4708">4708 - Matnog</option>
                        <option value="4714">4714 - Pilar</option>
                        <option value="4711">4711 - Prieto Diaz</option>
                        <option value="4709">4709 - Santa Magdalena</option>
                        <option value="4700">4700 - Sorsogon</option>
                        <option value="2310">2310 - Anao</option>
                        <option value="2317">2317 - Bamban</option>
                        <option value="2306">2306 - Camiling</option>
                        <option value="2333">2333 - Capas</option>
                        <option value="2316">2316 - Concepcion</option>
                        <option value="2302">2302 - Gerona</option>
                        <option value="2314">2314 - La Paz</option>
                        <option value="2304">2304 - Mayantoc</option>
                        <option value="2334">2334 - Moncada</option>
                        <option value="2307">2307 - [Paniqui]</option>
                        <option value="2312">2312 - Pura</option>
                        <option value="2311">2311 - Ramos</option>
                        <option value="2305">2305 - San Clemente</option>
                        <option value="2309">2309 - San Manuel</option>
                        <option value="2301">2301 - San Jose</option>
                        <option value="2303">2303 - Santa Ignacia</option>
                        <option value="2300">2300 - Tarlac City</option>
                        <option value="2313">2313 - Victoria</option>
                        <option value="7500">7500 - Bongao</option>
                        <option value="7508">7508 - Mapun (Cagayan de Sulu)</option>
                        <option value="7509">7509 - Languyan</option>
                        <option value="7501">7501 - Panglima Sugala (Balimbing)</option>
                        <option value="7503">7503 - Sapa-Sapa</option>
                        <option value="7505">7505 - Simunul</option>
                        <option value="7506">7506 - Sitangkai</option>
                        <option value="7504">7504 - South Ubian</option>
                        <option value="7507">7507 - Turtle Island (Taganak)</option>
                        <option value="7502">7502 - Tandubas</option>
                        <option value="2202">2202 - Botolan</option>
                        <option value="2203">2203 - Cabangan</option>
                        <option value="2212">2212 - Candelaria</option>
                        <option value="2208">2208 - Castillejos</option>
                        <option value="2201">2201 - Iba</option>
                        <option value="2211">2211 - Masinloc</option>
                        <option value="2200">2200 - Olongapo City</option>
                        <option value="2210">2210 - Palauig & Scarborough Shoal</option>
                        <option value="2206">2206 - San Antonio</option>
                        <option value="2204">2204 - San Felipe</option>
                        <option value="2207">2207 - San Marcelino</option>
                        <option value="2205">2205 - San Narciso</option>
                        <option value="2213">2213 - Santa Cruz</option>
                        <option value="2209">2209 - Subic</option>
                        <option value="2222">2222 - Subic Bay Freeport Zone (Metro Subic)</option>
                        <option value="5616">5616 - Altavas</option>
                        <option value="5614">5614 - Balete</option>
                        <option value="5601">5601 - Banga</option>
                        <option value="5615">5615 - Batan</option>
                        <option value="5609">5609 - Buruanga</option>
                        <option value="5608">5608 - Malay</option>
                        <option value="5606">5606 - Malinao</option>
                        <option value="5607">5607 - Nabas</option>
                        <option value="5610">5610 - New Washington</option>
                        <option value="5604">5604 - Numancia</option>
                        <option value="5612">5612 - Tangalan</option>
                        <option value="5717">5717 - Anini-y</option>
                        <option value="5706">5706 - Barbaza</option>
                        <option value="5701">5701 - Belison</option>
                        <option value="5704">5704 - Bugasong</option>
                        <option value="5711">5711 - Caluya</option>
                        <option value="5708">5708 - Culasi</option>
                        <option value="5715">5715 - Hamtic</option>
                        <option value="5705">5705 - Laua-an</option>
                        <option value="5710">5710 - Libertad</option>
                        <option value="5712">5712 - Pandan</option>
                        <option value="5702">5702 - Patnongon</option>
                        <option value="5700">5700 - San Jose</option>
                        <option value="5714">5714 - San Remigio</option>
                        <option value="5709">5709 - Sebaste</option>
                        <option value="5713">5713 - Sibalom</option>
                        <option value="5707">5707 - Tibiao</option>
                        <option value="5716">5716 - Tobias Fornier (Dao)</option>
                        <option value="5703">5703 - Valderrama</option>
                        <option value="6544">6544 - Almeria</option>
                        <option value="6549">6549 - Biliran</option>
                        <option value="6550">6550 - Cabucgayan</option>
                        <option value="6548">6548 - Caibiran</option>
                        <option value="6547">6547 - Culaba</option>
                        <option value="6545">6545 - Kawayan</option>
                        <option value="6546">6546 - Maripipi</option>
                        <option value="6543">6543 - Naval</option>
                        <option value="6302">6302 - Alburquerque</option>
                        <option value="6314">6314 - Alicia</option>
                        <option value="6311">6311 - Anda</option>
                        <option value="6335">6335 - Antequera</option>
                        <option value="6301">6301 - Baclayon</option>
                        <option value="6342">6342 - Balilihan</option>
                        <option value="6318">6318 - Batuan</option>
                        <option value="6326">6326 - Bien Unido</option>
                        <option value="6317">6317 - Bilar</option>
                        <option value="6333">6333 - Buenavista</option>
                        <option value="6328">6328 - Calape</option>
                        <option value="6312">6312 - Candijay</option>
                        <option value="6346">6346 - Pres. Carlos P. Garcia (Pitogo)</option>
                        <option value="6319">6319 - Carmen</option>
                        <option value="6343">6343 - Catigbian</option>
                        <option value="6330">6330 - Clarin</option>
                        <option value="6337">6337 - Corella</option>
                        <option value="6341">6341 - Cortes</option>
                        <option value="6322">6322 - Dagohoy</option>
                        <option value="6344">6344 - Danao</option>
                        <option value="6339">6339 - Dauis</option>
                        <option value="6305">6305 - Dimiao</option>
                        <option value="6309">6309 - Duero</option>
                        <option value="6307">6307 - Garcia Hernandez Bohol</option>
                        <option value="6310">6310 - Guindulman</option>
                        <option value="6332">6332 - Inabanga</option>
                        <option value="6308">6308 - Jagna</option>
                        <option value="6334">6334 - Jetafe</option>
                        <option value="6304">6304 - Lila</option>
                        <option value="6202">6202 - Loay</option>
                        <option value="6316">6316 - Loboc</option>
                        <option value="6327">6327 - Loon</option>
                        <option value="6313">6313 - Mabini</option>
                        <option value="6336">6336 - Maribojoc</option>
                        <option value="6340">6340 - Panglao</option>
                        <option value="6321">6321 - Pilar</option>
                        <option value="6331">6331 - Sagbayan</option>
                        <option value="6345">6345 - San Isidro</option>
                        <option value="6323">6323 - San Miguel</option>
                        <option value="6347">6347 - Sevilla</option>
                        <option value="6320">6320 - Sierra Bullones</option>
                        <option value="6338">6338 - Sikatuna</option>
                        <option value="6300">6300 - Tagbilaran City</option>
                        <option value="6325">6325 - Talibon</option>
                        <option value="6324">6324 - Trinidad</option>
                        <option value="6329">6329 - Tubigon</option>
                        <option value="6315">6315 - Ubay</option>
                        <option value="6306">6306 - Valencia</option>
                        <option value="5811">5811 - Cuartero</option>
                        <option value="5810">5810 - Dao</option>
                        <option value="5813">5813 - Dumalag</option>
                        <option value="5812">5812 - Dumarao</option>
                        <option value="5805">5805 - Ivisan</option>
                        <option value="5808">5808 - Jamindan</option>
                        <option value="5809">5809 - Ma-ayon</option>
                        <option value="5807">5807 - Mambusao</option>
                        <option value="5801">5801 - Panay</option>
                        <option value="5815">5815 - Panitan</option>
                        <option value="5804">5804 - Pilar</option>
                        <option value="5802">5802 - Pontevedra</option>
                        <option value="5803">5803 - President Roxas</option>
                        <option value="5800">5800 - Roxas City</option>
                        <option value="5806">5806 - Sapian</option>
                        <option value="5816">5816 - Sigma</option>
                        <option value="5814">5814 - Tapaz</option>
                        <option value="6055">6055 - Alcantara</option>
                        <option value="6066">6066 - Alcoy</option>
                        <option value="6077">6077 - Alegria</option>
                        <option value="6088">6088 - Aloguinsan</option>
                        <option value="6099">6099 - Argao</option>
                        <option value="6010">6010 - Asturias</option>
                        <option value="6011">6011 - Badian</option>
                        <option value="6041">6041 - Balamban</option>
                        <option value="6052">6052 - Bantayan</option>
                        <option value="6036">6036 - Barili</option>
                        <option value="6010">6010 - Bogo City</option>
                        <option value="6024">6024 - Boljoon</option>
                        <option value="6008">6008 - Borbon</option>
                        <option value="6019">6019 - Carcar City</option>
                        <option value="6005">6005 - Carmen</option>
                        <option value="6006">6006 - Catmon</option>
                        <option value="6000">6000 - Cebu City</option>
                        <option value="6003">6003 - Compostela</option>
                        <option value="6001">6001 - Consolacion</option>
                        <option value="6017">6017 - Cordova</option>
                        <option value="6013">6013 - Daanbantayan</option>
                        <option value="6022">6022 - Dalaguete</option>
                        <option value="6004">6004 - Danao City</option>
                        <option value="6035">6035 - Dumanjug</option>
                        <option value="6028">6028 - Ginatilan</option>
                        <option value="6015">6015 - Lapu-Lapu City (Opon)</option>
                        <option value="6002">6002 - Liloan</option>
                        <option value="6016">6016 - Mactan Airport</option>
                        <option value="6053">6053 - Madridejos</option>
                        <option value="6029">6029 - Malabuyoc</option>
                        <option value="6014">6014 - Mandaue City</option>
                        <option value="6012">6012 - Medellin</option>
                        <option value="6046">6046 - Minglanilla</option>
                        <option value="6032">6032 - Moalboal</option>
                        <option value="6037">6037 - Naga</option>
                        <option value="6025">6025 - Oslob</option>
                        <option value="6048">6048 - Pilar</option>
                        <option value="6039">6039 - Pinamungahan</option>
                        <option value="6049">6049 - Poro</option>
                        <option value="6034">6034 - Ronda</option>
                        <option value="6027">6027 - Samboan</option>
                        <option value="6018">6018 - San Fernando</option>
                        <option value="6050">6050 - San Francisco</option>
                        <option value="6011">6011 - San Remigio</option>
                        <option value="6047">6047 - Santa Fe</option>
                        <option value="6026">6026 - Santander</option>
                        <option value="6020">6020 - Sibonga</option>
                        <option value="6007">6007 - Sogod</option>
                        <option value="6009">6009 - Tabogon</option>
                        <option value="6044">6044 - Tabuelan</option>
                        <option value="6045">6045 - Talisay City</option>
                        <option value="6038">6038 - Toledo City</option>
                        <option value="6043">6043 - Tuburan</option>
                        <option value="6051">6051 - Tudela</option>
                        <option value="5044">5044 - Buenavista</option>
                        <option value="5045">5045 - Jordan</option>
                        <option value="5046">5046 - Nueva Valencia</option>
                        <option value="5047">5047 - San Lorenzo</option>
                        <option value="5048">5048 - Sibunag</option>
                        <option value="5012">5012 - Ajuy</option>
                        <option value="5028">5028 - Alimodian</option>
                        <option value="5009">5009 - Anilao</option>
                        <option value="5033">5033 - Badiangan</option>
                        <option value="5018">5018 - Balasan</option>
                        <option value="5010">5010 - Banate</option>
                        <option value="5007">5007 - Barotoc Nuevo</option>
                        <option value="5011">5011 - Barotoc Viejo</option>
                        <option value="5016">5016 - Batad</option>
                        <option value="5041">5041 - Bingawan</option>
                        <option value="5031">5031 - Cabatuan</option>
                        <option value="5040">5040 - Calinog</option>
                        <option value="5019">5019 - Carles</option>
                        <option value="5013">5013 - Concepcion</option>
                        <option value="5035">5035 - Dingle</option>
                        <option value="5038">5038 - Duenas</option>
                        <option value="5006">5006 - Dumangas</option>
                        <option value="5005">5005 - New Lucena</option>
                        <option value="5020">5020 - Oton</option>
                        <option value="5037">5037 - Passi City</option>
                        <option value="5001">5001 - Pavia</option>
                        <option value="5008">5008 - Pototan</option>
                        <option value="5015">5015 - San Dionisio</option>
                        <option value="5036">5036 - San Enrique</option>
                        <option value="5024">5024 - San Joaquin</option>
                        <option value="5025">5025 - San Miguel</option>
                        <option value="5039">5039 - San Rafael</option>
                        <option value="5002">5002 - Santa Barbara</option>
                        <option value="5014">5014 - Sara</option>
                        <option value="5021">5021 - Tigbauan</option>
                        <option value="5027">5027 - Tubungan</option>
                        <option value="5004">5004 - Zarraga</option>
                        <option value="5017">5017 - Estancia</option>
                        <option value="5022">5022 - Guimbal</option>
                        <option value="5029">5029 - Igbaras</option>
                        <option value="5000">5000 - Iloilo City</option>
                        <option value="5034">5034 - Janiuay</option>
                        <option value="5042">5042 - Lambunao</option>
                        <option value="5003">5003 - Leganes</option>
                        <option value="5043">5043 - Lemery</option>
                        <option value="5026">5026 - Leon</option>
                        <option value="5030">5030 - Maasin</option>
                        <option value="5023">5023 - Miagao</option>
                        <option value="5032">5032 - Mina</option>
                        <option value="6510">6510 - Abuyog</option>
                        <option value="6517">6517 - Alangalang</option>
                        <option value="6542">6542 - Albuera</option>
                        <option value="6520">6520 - Babatngon</option>
                        <option value="6519">6519 - Barugo</option>
                        <option value="6525">6525 - Bato</option>
                        <option value="6521">6521 - Baybay</option>
                        <option value="6516">6516 - Burauen</option>
                        <option value="6534">6534 - Calubian</option>
                        <option value="6530">6530 - Capoocan</option>
                        <option value="6529">6529 - Carigara</option>
                        <option value="6515">6515 - Dagami</option>
                        <option value="6505">6505 - Dulag</option>
                        <option value="6524">6524 - Hilongos</option>
                        <option value="6523">6523 - Hindang</option>
                        <option value="6522">6522 - Inopacan</option>
                        <option value="6539">6539 - Isabel</option>
                        <option value="6527">6527 - Jaro</option>
                        <option value="6511">6511 - Javier</option>
                        <option value="6506">6506 - Julita</option>
                        <option value="6531">6531 - Kananga</option>
                        <option value="6508">6508 - La Paz</option>
                        <option value="6533">6533 - Leyte</option>
                        <option value="6509">6509 - Macarthur</option>
                        <option value="6512">6512 - Mahaplag</option>
                        <option value="6532">6532 - Matag-ob</option>
                        <option value="6526">6526 - Matalom</option>
                        <option value="6507">6507 - Mayorga</option>
                        <option value="6540">6540 - Merida</option>
                        <option value="6541">6541 - Ormoc City</option>
                        <option value="6501">6501 - Palo</option>
                        <option value="6538">6538 - Palompon</option>
                        <option value="6514">6514 - Pastrana</option>
                        <option value="6535">6535 - San Isidro</option>
                        <option value="6518">6518 - San Miguel</option>
                        <option value="6513">6513 - Santa Fe</option>
                        <option value="6536">6536 - Tabango</option>
                        <option value="6504">6504 - Tabontabon</option>
                        <option value="6500">6500 - Tacloban City</option>
                        <option value="6502">6502 - Tanuan</option>
                        <option value="6503">6503 - Tolosa</option>
                        <option value="6528">6528 - Tunga</option>
                        <option value="6537">6537 - Villaba</option>
                        <option value="6610">6610 - Anahawan</option>
                        <option value="6604">6604 - Bomtoc</option>
                        <option value="6608">6608 - Hinunangan</option>
                        <option value="6609">6609 - Hinundayan</option>
                        <option value="6615">6615 - Libagon</option>
                        <option value="6612">6612 - Liloan</option>
                        <option value="6600">6600 - Maasin</option>
                        <option value="6601">6601 - Macrohon</option>
                        <option value="6603">6603 - Malitbog</option>
                        <option value="6602">6602 - Padre Burgos</option>
                        <option value="6614">6614 - Pintuyan</option>
                        <option value="6613">6613 - San Francisco</option>
                        <option value="6611">6611 - San Juan (Cabalian)</option>
                        <option value="6617">6617 - San Ricardo</option>
                        <option value="6607">6607 - Silago</option>
                        <option value="6606">6606 - Sogod</option>
                        <option value="6616">6616 - St. Bernard</option>
                        <option value="6605">6605 - Tomas Oppus</option>
                        <option value="5414">5414 - Aroroy</option>
                        <option value="5413">5413 - Baleno</option>
                        <option value="5412">5412 - Balud</option>
                        <option value="5415">5415 - Batuan</option>
                        <option value="5421">5421 - Buenavista</option>
                        <option value="5405">5405 - Cataingan</option>
                        <option value="5409">5409 - Cawayan</option>
                        <option value="5419">5419 - Claveria</option>
                        <option value="5403">5403 - Dimasalang</option>
                        <option value="5407">5407 - Esperanza</option>
                        <option value="5411">5411 - Mandaon</option>
                        <option value="5400">5400 - Masbate City</option>
                        <option value="5410">5410 - Milagros</option>
                        <option value="5401">5401 - Mobo</option>
                        <option value="5418">5418 - Monreal</option>
                        <option value="5404">5404 - Palanas</option>
                        <option value="5406">5406 - Pio V. Corpuz</option>
                        <option value="5408">5408 - Placer</option>
                        <option value="5416">5416 - San Fernando</option>
                        <option value="5417">5417 - San Jacinto</option>
                        <option value="5420">5420 - San Pascual</option>
                        <option value="5402">5402 - Uson</option>
                        <option value="6100">6100 - Bacolod City negros occidental</option>
                        <option value="6101">6101 - Bago City</option>
                        <option value="6107">6107 - Binalbagan City</option>
                        <option value="6121">6121 - Cadiz City</option>
                        <option value="6126">6126 - Calatrava</option>
                        <option value="6110">6110 - Candoni</option>
                        <option value="6118">6118 - Enrique Magalona</option>
                        <option value="6124">6124 - Escalante City</option>
                        <option value="6108">6108 - Himamaylan City</option>
                        <option value="6106">6106 - Hinigaran City</option>
                        <option value="6114">6114 - Hinoba-an</option>
                        <option value="6109">6109 - Ilog</option>
                        <option value="6128">6128 - Isabela</option>
                        <option value="6111">6111 - Kabankalan City</option>
                        <option value="6112">6112 - Cauayan</option>
                        <option value="6130">6130 - La Carlota City</option>
                        <option value="6131">6131 - La Castillana</option>
                        <option value="6120">6120 - Manapla</option>
                        <option value="6132">6132 - Moises Padilla</option>
                        <option value="6129">6129 - Murcia</option>
                        <option value="6123">6123 - Paraiso (Fabrica)</option>
                        <option value="6105">6105 - Pontevedra</option>
                        <option value="6102">6102 - Pulupandan</option>
                        <option value="6122">6122 - Sagay City</option>
                        <option value="6127">6127 - San Carlos City</option>
                        <option value="6104">6104 - San Enrique</option>
                        <option value="6116">6116 - Silay City</option>
                        <option value="6117">6117 - Silay Hawaiian Central</option>
                        <option value="6113">6113 - Sipalay City</option>
                        <option value="6115">6115 - Talisay City</option>
                        <option value="6125">6125 - Toboso</option>
                        <option value="6103">6103 - Valladolid</option>
                        <option value="6119">6119 - Victorias City</option>
                        <option value="6203">6203 - Amlan</option>
                        <option value="6210">6210 - Ayungon</option>
                        <option value="6216">6216 - Bacong</option>
                        <option value="6206">6206 - Bais City</option>
                        <option value="6222">6222 - Basay</option>
                        <option value="6221">6221 - Bayawan City</option>
                        <option value="6209">6209 - Bindoy</option>
                        <option value="6223">6223 - Canlaon City</option>
                        <option value="6217">6217 - Dauin</option>
                        <option value="6200">6200 - Dumaguete City</option>
                        <option value="6214">6214 - Guihulngan</option>
                        <option value="6212">6212 - Jimalalud</option>
                        <option value="6213">6213 - La Libertad</option>
                        <option value="6207">6207 - Mabinay</option>
                        <option value="6208">6208 - Manjuyod</option>
                        <option value="6205">6205 - Pamplona</option>
                        <option value="6202">6202 - San Jose</option>
                        <option value="6219">6219 - Siaton</option>
                        <option value="6201">6201 - Sibulan</option>
                        <option value="6220">6220 - Sta. Catalina</option>
                        <option value="6204">6204 - Tanjay City</option>
                        <option value="6211">6211 - Tayasan</option>
                        <option value="6215">6215 - Valencia</option>
                        <option value="6224">6224 - Valle Hermoso</option>
                        <option value="6218">6218 - Zamboanguita</option>
                        <option value="5509">5509 - Alcantara</option>
                        <option value="5515">5515 - Banton (Jones)</option>
                        <option value="5512">5512 - Cajidiocan</option>
                        <option value="5503">5503 - Calatrava</option>
                        <option value="5516">5516 - Concepcion</option>
                        <option value="5514">5514 - Corcuera</option>
                        <option value="5506">5506 - Ferrol</option>
                        <option value="5502">5502 - Imelda</option>
                        <option value="5507">5507 - Looc</option>
                        <option value="5511">5511 - Magdiwang</option>
                        <option value="5505">5505 - Odiongan</option>
                        <option value="5500">5500 - Romblon</option>
                        <option value="5501">5501 - San Agustin</option>
                        <option value="5504">5504 - San Andres</option>
                        <option value="5513">5513 - San Fernando</option>
                        <option value="5510">5510 - San Jose</option>
                        <option value="5508">5508 - Santa Fe</option>
                        <option value="6822">6822 - Arteche</option>
                        <option value="6812">6812 - Balangiga</option>
                        <option value="6801">6801 - Balangkayan</option>
                        <option value="6800">6800 - Borongan</option>
                        <option value="6806">6806 - Can-Avid</option>
                        <option value="6817">6817 - Dolores</option>
                        <option value="6805">6805 - Gen. McArthur</option>
                        <option value="6811">6811 - Giporlos</option>
                        <option value="6809">6809 - Guiuan</option>
                        <option value="6804">6804 - Hernani</option>
                        <option value="6819">6819 - Jipapad</option>
                        <option value="6813">6813 - Lawa-an</option>
                        <option value="6803">6803 - Llorente</option>
                        <option value="6820">6820 - Maslog</option>
                        <option value="6802">6802 - Maydolug</option>
                        <option value="6808">6808 - Mercedes</option>
                        <option value="6818">6818 - Oras</option>
                        <option value="6810">6810 - Quinapondan</option>
                        <option value="6807">6807 - Salcedo</option>
                        <option value="6814">6814 - San Julian</option>
                        <option value="6821">6821 - San Policarpo</option>
                        <option value="6815">6815 - Sulat</option>
                        <option value="6816">6816 - Taft</option>
                        <option value="6405">6405 - Allen</option>
                        <option value="6410">6410 - Biri</option>
                        <option value="6401">6401 - Bobon</option>
                        <option value="6408">6408 - Capul</option>
                        <option value="6400">6400 - Catarman</option>
                        <option value="6418">6418 - Catubig</option>
                        <option value="6422">6422 - Gamay</option>
                        <option value="6420">6420 - La Navas</option>
                        <option value="6411">6411 - Laoang</option>
                        <option value="6423">6423 - Lapineg</option>
                        <option value="6404">6404 - Lavezares</option>
                        <option value="6403">6403 - Lope de Vega</option>
                        <option value="6412">6412 - Mapanas</option>
                        <option value="6417">6417 - Mondragon</option>
                        <option value="6421">6421 - Palapag</option>
                        <option value="6413">6413 - Pambujan</option>
                        <option value="6416">6416 - Rosario</option>
                        <option value="6407">6407 - San Antonio</option>
                        <option value="6409">6409 - San Isidro</option>
                        <option value="6402">6402 - San Jose</option>
                        <option value="6415">6415 - San Roque</option>
                        <option value="6419">6419 - San Vicente</option>
                        <option value="6414">6414 - Silvino Lubos</option>
                        <option value="6406">6406 - Victoria</option>
                        <option value="6724">6724 - Almagro</option>
                        <option value="6720">6720 - Basey</option>
                        <option value="6710">6710 - Calbayog City</option>
                        <option value="6715">6715 - Calbiga</option>
                        <option value="6700">6700 - Catbalogan</option>
                        <option value="6722">6722 - Daram</option>
                        <option value="6706">6706 - Gandara</option>
                        <option value="6713">6713 - Hinbangan</option>
                        <option value="6701">6701 - Jiabong</option>
                        <option value="6721">6721 - Marabut</option>
                        <option value="6708">6708 - Matuguinao</option>
                        <option value="6702">6702 - Motiong</option>
                        <option value="6705">6705 - Pagsanjan</option>
                        <option value="6716">6716 - Pinabacdao</option>
                        <option value="6707">6707 - San Jorge</option>
                        <option value="6723">6723 - San Jose de Bauan</option>
                        <option value="6714">6714 - San Sebastian</option>
                        <option value="6709">6709 - Sta. Margarita</option>
                        <option value="6718">6718 - Sta. Rita</option>
                        <option value="6711">6711 - Sto. Nino</option>
                        <option value="6712">6712 - Tagapulan</option>
                        <option value="6719">6719 - Talarora</option>
                        <option value="6704">6704 - Tarangnan</option>
                        <option value="6717">6717 - Villareal</option>
                        <option value="6703">6703 - Wright</option>
                        <option value="6725">6725 - Zumarraga</option>
                        <option value="6230">6230 - Enrile Villanueva</option>
                        <option value="6226">6226 - Larena</option>
                        <option value="6228">6228 - Lazi</option>
                        <option value="6229">6229 - Maria</option>
                        <option value="6227">6227 - San Juan</option>
                        <option value="6225">6225 - Siquijor</option>
                        <option value="8601">8601 - Buenavista</option>
                        <option value="8600">8600 - Butuan City</option>
                        <option value="8605">8605 - Cabadbaran</option>
                        <option value="8603">8603 - Carmen</option>
                        <option value="8607">8607 - Jabonga</option>
                        <option value="8609">8609 - Kitcharao</option>
                        <option value="8610">8610 - La Nieves</option>
                        <option value="8604">8604 - Magallanes</option>
                        <option value="8602">8602 - Nasipit</option>
                        <option value="8611">8611 - Remedios T. Romualdez</option>
                        <option value="8608">8608 - Santiago</option>                       
                        <option value="8606">8606 - Tubay</option>
                        <option value="8502">8502 - Bayugan</option>
                        <option value="8506">8506 - Bunawan</option>
                        <option value="8513">8513 - Esperanza</option>
                        <option value="8508">8508 - La Paz</option>
                        <option value="8507">8507 - Loreto</option>
                        <option value="8500">8500 - Prosperidad</option>
                        <option value="8504">8504 - Rosario</option>
                        <option value="8501">8501 - San Francisco</option>
                        <option value="8511">8511 - San Luis</option>
                        <option value="8512">8512 - Santa Josefa</option>
                        <option value="8503">8503 - Sibagat</option>
                        <option value="8510">8510 - Talacogon</option>
                        <option value="8505">8505 - Trento</option>
                        <option value="8509">8509 - Veruela</option>
                        <option value="7300">7300 - Isabela City</option>
                        <option value="7301">7301 - Lantawan</option>
                        <option value="7302">7302 - Lamitan City</option>
                        <option value="7303">7303 - Maluso</option>
                        <option value="7304">7304 - Tipo-Tipo</option>
                        <option value="7305">7305 - Sumisip</option>
                        <option value="7306">7306 - Tuburan</option>
                        <option value="7308">7308 - Froilie</option>
                        <option value="8707">8707 - Baungon</option>
                        <option value="8721">8721 - Damulog</option>
                        <option value="8719">8719 - Dangcagan</option>
                        <option value="8712">8712 - Don Carlos</option>
                        <option value="8702">8702 - Impasugong</option>
                        <option value="8723">8723 - Kabanglasan</option>
                        <option value="8713">8713 - Kadingilan</option>
                        <option value="8718">8718 - Kalilangan</option>
                        <option value="8720">8720 - Kibawe</option>
                        <option value="8716">8716 - Kitaotao</option>
                        <option value="8722">8722 - Lantapan</option>
                        <option value="8706">8706 - Libuna</option>
                        <option value="8700">8700 - Malaybalay</option>
                        <option value="8704">8704 - Malitbog</option>
                        <option value="8703">8703 - Manolo Fortich</option>
                        <option value="8714">8714 - Maramag</option>
                        <option value="8710">8710 - Musuan</option>
                        <option value="8717">8717 - Pangantucan</option>
                        <option value="8705">8705 - Philips</option>
                        <option value="8715">8715 - Quezon</option>
                        <option value="8711">8711 - San Fernando</option>
                        <option value="8701">8701 - Sumilao</option>
                        <option value="8708">8708 - Talakag</option>
                        <option value="8709">8709 - Valencia</option>
                        <option value="9104">9104 - Catarman</option>
                        <option value="9102">9102 - Guinsiliban</option>
                        <option value="9101">9101 - Mahinog</option>
                        <option value="9100">9100 - Mambajao</option>
                        <option value="9103">9103 - Sagay</option>
                        <option value="8803">8803 - Compostela</option>
                        <option value="8810">8810 - Laak</option>
                        <option value="8807">8807 - Mabini</option>
                        <option value="8806">8806 - Maco</option>
                        <option value="8808">8808 - Maragusan</option>
                        <option value="8802">8802 - Mawab</option>
                        <option value="8805">8805 - Monkayo</option>
                        <option value="8801">8801 - Montevista</option>
                        <option value="8800">8800 - Nabunturan</option>
                        <option value="8804">8804 - New Bataan</option>
                        <option value="8809">8809 - Pantukan</option>
                        <option value="8102">8102 - Asuncion</option>
                        <option value="8118">8118 - Babak</option>
                        <option value="8101">8101 - Carmen</option>
                        <option value="8113">8113 - Kapalong</option>
                        <option value="8120">8120 - Kaputian</option>
                        <option value="8104">8104 - New Corella</option>
                        <option value="8105">8105 - Panabo</option>
                        <option value="8119">8119 - Samal</option>
                        <option value="8116">8116 - San Mariano</option>
                        <option value="8103">8103 - San Vicente</option>
                        <option value="8112">8112 - Santo Tomas</option>
                        <option value="8100">8100 - Tagum</option>
                        <option value="8005">8005 - Bansalan</option>
                        <option value="8000">8000 - Davao City</option>
                        <option value="8002">8002 - Digos</option>
                        <option value="8013">8013 - Don Marcelino</option>
                        <option value="8006">8006 - Hagunoy</option>
                        <option value="8014">8014 - Jose Abad Santos</option>
                        <option value="8008">8008 - Kiblawan</option>
                        <option value="8004">8004 - Magsaysay</option>
                        <option value="8010">8010 - Malalag</option>
                        <option value="8012">8012 - Malita</option>
                        <option value="8003">8003 - Matanao</option>
                        <option value="8007">8007 - Padada</option>
                        <option value="8001">8001 - Santa Cruz</option>
                        <option value="8011">8011 - Santa Maria</option>
                        <option value="8015">8015 - Sarangani</option>
                        <option value="8204">8204 - Baganga</option>
                        <option value="8208">8208 - Banaybanay</option>
                        <option value="8206">8206 - Boston</option>
                        <option value="8203">8203 - Caraga</option>
                        <option value="8205">8205 - Cateel</option>
                        <option value="8210">8210 - Gov. Generoso</option>
                        <option value="8207">8207 - Lopon</option>
                        <option value="8202">8202 - Manay</option>
                        <option value="8200">8200 - Mati</option>
                        <option value="8209">8209 - San Isidro</option>
                        <option value="8201">8201 - Tarragona</option>
                        <option value="9205">9205 - Bacolod</option>
                        <option value="9217">9217 - Baloi</option>
                        <option value="9210">9210 - Baroy</option>
                        <option value="9200">9211 - Iligan City</option>
                        <option value="9214">9214 - Kapatagan</option>
                        <option value="9215">9215 - Karomatan</option>
                        <option value="9202">9202 - Kauswagan</option>
                        <option value="9207">9207 - Kolambugan</option>
                        <option value="9211">9211 - Lala</option>
                        <option value="9201">9201 - Linamon</option>
                        <option value="9221">9221 - Magsaysay</option>
                        <option value="9206">9206 - Maigo</option>
                        <option value="9203">9203 - Matugao</option>
                        <option value="9219">9219 - Munai</option>
                        <option value="9216">9216 - Nunungan</option> 
                        <option value="9208">9208 - Pantao Ragat</option>
                        <option value="9218">9218 - Pantar</option>
                        <option value="9204">9204 - Poona Piagapo</option>
                        <option value="9212">9212 - Salvador</option>
                        <option value="9213">9213 - Sapad</option>
                        <option value="9222">9222 - Tagoloan</option>
                        <option value="9220">9220 - Tangkal</option>
                        <option value="9209">9209 - Tubod</option>
                        <option value="9316">9316 - Bacolod Grande</option>
                        <option value="9302">9302 - Blabagan</option>
                        <option value="9318">9318 - Balindong</option>
                        <option value="9309">9309 - Bayang</option>
                        <option value="9310">9310 - Binidayan</option>
                        <option value="9320">9320 - Baumbaran</option>
                        <option value="9714">9714 - Buadiposo Buntong</option>
                        <option value="9708">9708 - Bubong</option>
                        <option value="9305">9305 - Butig</option>
                        <option value="9319">9319 - Calanogas</option>
                        <option value="9311">9311 - Ganassi</option>
                        <option value="9709">9709 - Kapal</option>
                        <option value="9703">9703 - Lumba Bayabao</option>
                        <option value="9307">9307 - Lumbatan</option>
                        <option value="9306">9306 - Lumbayanague</option>
                        <option value="9308">9308 - Macador Andong</option>
                        <option value="9315">9315 - Madalum</option>
                        <option value="9314">9314 - Madamba</option>
                        <option value="9715">9715 - Maguing</option>
                        <option value="9300">9300 - Malabang</option>
                        <option value="9303">9303 - Maragong</option>
                        <option value="9711">9711 - Marangtao</option>
                        <option value="9700">9700 - Marawi City</option>
                        <option value="9706">9706 - Masio</option>
                        <option value="9702">9702 - Mulondo</option>
                        <option value="9312">9312 - Pagayawan</option>
                        <option value="9710">9710 - Piagapo</option>
                        <option value="9705">9705 - Poona Bayabao</option>
                        <option value="9313">9313 - Pualas</option>
                        <option value="9713">9713 - Ramain-Ditsaan</option>
                        <option value="9701">9701 - Saguiaran</option>
                        <option value="9303">9303 - Sultan Gumander</option>
                        <option value="9321">9321 - Tagoloan II</option>
                        <option value="9704">9704 - Tamparan</option>
                        <option value="9712">9712 - Taraka</option>
                        <option value="9304">9304 - Tubara</option>
                        <option value="9317">9317 - Tugaya</option>
                        <option value="9716">9716 - Wao</option>
                        <option value="9609">9609 - Ampatuan</option>
                        <option value="9614">9614 - Barira</option>
                        <option value="9615">9615 - Buldon</option>
                        <option value="9616">9616 - Buluan</option>
                        <option value="9600">9600 - Cotabato City</option>
                        <option value="9617">9617 - Datu Paglas</option>
                        <option value="9607">9607 - Datu Piang</option>
                        <option value="9601">9601 - Datu Odin Sinsuat (Dinaig)</option>
                        <option value="9618">9618 - Gen. S. K. Datun</option>
                        <option value="9606">9606 - Kabuntulan</option>
                        <option value="9608">9608 - Maganoy</option>
                        <option value="9613">9613 - Matanog</option>
                        <option value="9610">9610 - Pagalungan</option>
                        <option value="9604">9604 - Parang</option>
                        <option value="9603">9603 - South Upi</option>
                        <option value="9605">9605 - Sultan Kudarat</option>
                        <option value="9611">9611 - Sultan Sa Barongis</option>
                        <option value="9612">9612 - Talayan</option>
                        <option value="9602">9602 - Upi</option>
                        <option value="7206">7206 - Aloran Misamis Occidental</option>
                        <option value="7211">7211 - Baliangao Misamis Occidental</option>
                        <option value="7215">7215 - Bonifacio Misamis Occidental</option>
                        <option value="7210">7210 - Calamba Misamis Occidental</option>
                        <option value="7201">7201 - Clarin Misamis Occidental</option>
                        <option value="7213">7213 - Concepcion Misamis Occidental</option>
                        <option value="7204">7204 - Jimenez Misamis Occidental</option>
                        <option value="7208">7208 - Lopez Jaena Misamis Occidental</option>
                        <option value="7207">7207 - Oroquieta City</option>
                        <option value="7200">7200 - Ozamis City</option>
                        <option value="7205">7205 - Panaon Misamis Occidental</option>
                        <option value="7209">7209 - Plaridel Misamis Occidental</option>
                        <option value="7212">7212 - Sapang Dalaga Misamis Occidental</option>
                        <option value="7203">7203 - Sinacaban Misamis Occidental</option>
                        <option value="7214">7214 - Tangub City</option>
                        <option value="7202">7202 - Tudela Misamis Occidental</option>
                        <option value="9018">9018 - Alubijid</option>
                        <option value="9005">9005 - Balingasag</option>
                        <option value="9011">9011 - Balinguan</option>
                        <option value="9008">9008 - Binuangan</option>
                        <option value="9000">9000 - Cagayan de Oro City</option>
                        <option value="9004">9004 - Claveria</option>
                        <option value="9017">9017 - El Salvador</option>
                        <option value="9014">9014 - Gingoog City</option>
                        <option value="9020">9020 - Gitaum</option>
                        <option value="9022">9022 - Initao</option>
                        <option value="9003">9003 - Jasaan</option>
                        <option value="9010">9010 - Kinogitan</option>
                        <option value="9006">9006 - Lagonglong</option>
                        <option value="9019">9019 - Laguindingan</option>
                        <option value="9021">9021 - Libertad</option>
                        <option value="9025">9025 - Lugait</option>
                        <option value="9015">9015 - Magsaysay</option>
                        <option value="9024">9024 - Manticao</option>
                        <option value="9013">9013 - Medina</option>
                        <option value="9023">9023 - Naawan</option>
                        <option value="9016">9016 - Opol</option>
                        <option value="9007">9007 - Salay</option>
                        <option value="9009">9009 - Sugbongcogon</option>
                        <option value="9001">9001 - Tagoloan</option>
                        <option value="9012">9012 - Talisayan</option>
                        <option value="9002">9002 - Villanueva</option>
                        <option value="9413">9413 - Alamada</option>
                        <option value="9415">9415 - Aleosan</option>
                        <option value="9414">9414 - Antipas</option>
                        <option value="9417">9417 - Arakan</option>
                        <option value="9416">9416 - Banisilan</option>
                        <option value="9408">9408 - Carmen</option>
                        <option value="9407">9407 - Kabacan</option>
                        <option value="9400">9400 - Kidapawan</option>
                        <option value="9411">9411 - Libungan</option>
                        <option value="9404">9404 - Magpet</option>
                        <option value="9401">9401 - Makilala</option>
                        <option value="9406">9406 - Matalam</option>
                        <option value="9410">9410 - Midsayap</option>
                        <option value="9402">9402 - M’lang</option>
                        <option value="9412">9412 - Pigkawayan</option>
                        <option value="9409">9409 - Pikit</option>
                        <option value="9405">9405 - Pres. Roxas</option>
                        <option value="9403">9403 - Tulunan</option>
                        <option value="9501">9501 - Alabel</option>
                        <option value="9517">9517 - Glan</option>
                        <option value="9514">9514 - Kiamba</option>
                        <option value="9502">9502 - Maasim</option>
                        <option value="9515">9515 - Maitum</option>
                        <option value="9516">9516 - Malapatan</option>
                        <option value="9503">9503 - Malungon</option>
                        <option value="9511">9511 - Banga</option>
                        <option value="9500">9500 - Gen. Santos City</option>
                        <option value="9506">9506 - Koronadal</option>
                        <option value="9508">9508 - Norala</option>
                        <option value="9504">9504 - Polomolok</option>
                        <option value="9509">9509 - Santo Nino</option>
                        <option value="9512">9512 - Surallah</option>
                        <option value="9507">9507 - Tampacan</option>
                        <option value="9510">9510 - Tantangan</option>
                        <option value="9513">9513 - T’boli</option>
                        <option value="9505">9505 - Tupi</option>
                        <option value="9810">9810 - Bagumbayan</option>
                        <option value="9801">9801 - Colombio</option>
                        <option value="9806">9806 - Esperanza (Ampatuan)</option>
                        <option value="9805">9805 - Isulan</option>
                        <option value="9808">9808 - Kalamansig</option>
                        <option value="9807">9807 - Lebak (Salaman)</option>
                        <option value="9803">9803 - Lutayan</option>
                        <option value="9802">9802 - Mariano Marcos</option>
                        <option value="9809">9809 - Palimbang</option>
                        <option value="9804">9804 - Pres. Quirino</option>
                        <option value="9811">9811 - Sen. Ninoy Aquino</option>
                        <option value="9800">9800 - Tacurong</option>
                        <option value="7407">7407 - Indanan</option>
                        <option value="7400">7400 - Jolo</option>
                        <option value="7416">7416 - Kalingalan Kalauang</option>
                        <option value="7411">7411 - Lugus</option>
                        <option value="7404">7404 - Luuk</option>
                        <option value="7409">7409 - Maimbung</option>
                        <option value="7413">7413 - Marungas</option>
                        <option value="7402">7402 - Panamao</option>
                        <option value="7415">7415 - Panglima Estino</option>
                        <option value="7414">7414 - Panguntaran</option>
                        <option value="7408">7408 - Parang</option>
                        <option value="7405">7405 - Pata</option>
                        <option value="7401">7401 - Patikul</option>
                        <option value="7412">7412 - Siasi</option>
                        <option value="7403">7403 - Talipao</option>
                        <option value="7410">7410 - Tapul</option>
                        <option value="7406">7406 - Tongkil</option>
                        <option value="8425">8425 - Alegria Surigao Del Norte</option>
                        <option value="8408">8408 - Bacuag Surigao Del Norte</option>
                        <option value="8413">8413 - Basilisa (Rizal)</option>
                        <option value="8424">8424 - Burgos Surigao Del Norte</option>
                        <option value="8411">8411 - Cagdianao Surigao Del Norte</option>
                        <option value="8410">8410 - Claver Surigao Del Norte</option>
                        <option value="8417">8417 - Dapa Surigao Del Norte</option>
                        <option value="8418">8418 - Del Carmen Surigao Del Norte</option>
                        <option value="8412">8412 - Dinagat Surigao Del Norte</option>
                        <option value="8419">8419 - Gen. Luna Surigao Del Norte</option>
                        <option value="8409">8409 - Gigaquit Surigao Del Norte</option>
                        <option value="8414">8414 - Libjo (Albor)</option>
                        <option value="8415">8415 - Loreto Surigao Del Norte</option>
                        <option value="8407">8407 - Mainit Surigao Del Norte</option>
                        <option value="8402">8402 - Malimano Surigao Del Norte</option>
                        <option value="8420">8420 - Pilar Surigao Del Norte</option>
                        <option value="8405">8405 - Placer Surigao Del Norte</option>
                        <option value="8423">8423 - San Benito Surigao Del Norte</option>
                        <option value="8401">8401 - San Francisco Surigao Del Norte</option>
                        <option value="8421">8421 - San Isidro Surigao Del Norte</option>
                        <option value="8427">8427 - San Jose Surigao Del Norte</option>
                        <option value="8422">8422 - Santa Monica Surigao Del Norte</option>
                        <option value="8404">8404 - Sison Surigao Del Norte</option>
                        <option value="8416">8416 - Socorro Surigao Del Norte</option>
                        <option value="8400">8400 - Surigao City</option>
                        <option value="8403">8403 - Tagana-an Surigao Del Norte</option>
                        <option value="8426">8426 - Tubajon Surigao Del Norte</option>
                        <option value="8406">8406 - Tubod Surigao Del Norte</option>
                        <option value="8309">8309 - Barobo Surigao Del Sur</option>
                        <option value="8303">8303 - Bayabas Surigao Del Sur</option>
                        <option value="8311">8311 - Bislig Surigao Del Sur</option>
                        <option value="8311">8311 - Cagwait Surigao Del Sur</option>
                        <option value="8317">8317 - Cantillan Surigao Del Sur</option>
                        <option value="8315">8315 - Carmen Surigao Del Sur</option>
                        <option value="8318">8318 - Carrascal Surigao Del Sur</option>
                        <option value="8313">8313 -  Cortez Surigao Del Sur</option>
                        <option value="8310">8310 - Hinatuan Surigao Del Sur</option>
                        <option value="8314">8314 - Lanuza Surigao Del Sur</option>
                        <option value="8307">8307 - Lianga Surigao Del Sur</option>
                        <option value="8312">8312 - Lingig Surigao Del Sur</option>
                        <option value="8316">8316 - Madrid Surigao Del Sur</option>
                        <option value="8306">8306 - Marihatag Surigao Del Sur</option>
                        <option value="8305">8305 - San Agustin Surigao Del Sur</option>
                        <option value="8301">8301 - San Miguel Surigao Del Sur</option>
                        <option value="8308">8308 - Tagbina Surigao Del Sur</option>
                        <option value="8302">8302 - TagoSurigao Del Sur Surigao Del Sur</option>
                        <option value="8300">8300 - Tandag Surigao Del Sur</option>
                        <option value="7501">7501 - Balimbing</option>
                        <option value="7500">7500 - Bongao</option>
                        <option value="7508">7508 - Cagayan de Sulu</option>
                        <option value="7509">7509 - Languyan</option>
                        <option value="7503">7503 - Sapa-sapa</option>
                        <option value="7505">7505 - Simunol</option>
                        <option value="7506">7506 - Sitangkai</option>
                        <option value="7504">7504 - South Ubian</option>
                        <option value="7507">7507 - Taganak (Turtle Island)</option>
                        <option value="7502">7502 - Tandu Bas</option>
                        <option value="7123">7123 - Baliguian Zamboanga Del Norte</option>
                        <option value="7101">7101 - Dapitan City</option>
                        <option value="7100">7100 - Dipolog City</option>
                        <option value="7108">7108 - Gutalac Zamboanga Del Norte</option>
                        <option value="7111">7111 - Jose Dalman (Ponot)</option>
                        <option value="7124">7124 - Kalawit Zamboanga Del Norte</option>
                        <option value="7109">7109 - Katipunan Zamboanga Del Norte</option>
                        <option value="7117">7117 - Labason Zamboanga Del Norte</option>
                        <option value="7119">7119 - La Libertad Zamboanga Del Norte</option>
                        <option value="7115">7115 - Liloy Zamboanga Del Norte</option>
                        <option value="7110">7110 - Manukan Zamboanga Del Norte</option>
                        <option value="7107">7107 - Mutia Zamboanga Del Norte</option>
                        <option value="7105">7105 - Pinan</option>
                        <option value="7106">7106 - Polanco</option>
                        <option value="7104">7104 - Rizal Zamboanga Del Norte</option>
                        <option value="7102">7102 - Roxas Zamboanga Del Norte</option>
                        <option value="7114">7114 - Salug</option>
                        <option value="7108">7108 - Sergio Osmena Zamboanga Del Norte</option>
                        <option value="7113">7113 - Siayan Zamboanga Del Norte</option>
                        <option value="7122">7122 - Sibuco Zamboanga Del Norte</option>
                        <option value="7103">7103 - Sibutad Zamboanga Del Norte</option>
                        <option value="7112">7112 - Sindangan (Leon B. Postigo)</option>
                        <option value="7120">7120 - Siocon</option>
                        <option value="7121">7121 - Siraway Zamboanga Del Norte</option>
                        <option value="7116">7116 - Tampilisan Zamboanga Del Norte</option>
                        <option value="7020">7020 - Aurora Zamboanga Del Sur</option>
                        <option value="7011">7011 - Bayog Zamboanga Del Sur</option>
                        <option value="7032">7032 - Dimataling Zamboanga Del Sur</option>
                        <option value="7030">7030 - Dinas Zamboanga Del Sur</option>
                        <option value="7022">7022 - Don Mariano Marcos Zamboanga Del Sur</option>
                        <option value="7015">7015 - Dumalinao Zamboanga Del Sur</option>
                        <option value="7028">7028 - Dumingag Zamboanga Del Sur</option>
                        <option value="7042">7042 - Guipos Zamboanga Del Sur</option>
                        <option value="7027">7027 - Josefina Zamboanga Del Sur</option>
                        <option value="7013">7013 - Kumalarang Zamboanga Del Sur</option>
                        <option value="7017">7017 - Labangan Zamboanga Del Sur</option>
                        <option value="7014">7014 - Lakewood Zamboanga Del Sur</option>
                        <option value="7037">7037 - Lapuyan Zamboanga Del Sur</option>
                        <option value="7026">7026 - Mahayag Zamboanga Del Sur</option>
                        <option value="7035">7035 - Margo Sa Tubig Zamboanga Del Sur</option>
                        <option value="7021">7021 - Midsalip Zamboanga Del Sur</option>
                        <option value="7023">7023 - Molave Zamboanga Del Sur</option>
                        <option value="7016">7016 - Pagadian City</option>
                        <option value="7033">7033 - Pitogo Zamboanga Del Sur</option>
                        <option value="7024">7024 - Ramon Magsaysay Zamboanga Del Sur</option>
                        <option value="7029">7029 - San Miguel Zamboanga Del Sur</option>
                        <option value="7031">7031 - San Pablo Zamboanga Del Sur</option>
                        <option value="7034">7034 - Tabina Zamboanga Del Sur</option>
                        <option value="7025">7025 - Tambulig Zamboanga Del Sur</option>
                        <option value="7043">7043 - Tigbad Zamboanga Del Sur</option>
                        <option value="7019">7019 - Tukuran Zamboanga Del Sur</option>
                        <option value="7036">7036 - Vicencio Sagun Zamboanga Del Sur</option>
                        <option value="7000">7000 - Zamboanga City</option>
                        <option value="7040">7040 - Alicia</option>
                        <option value="7009">7009 - Buug</option>
                        <option value="7039">7039 - Diplahan</option>
                        <option value="7007">7007 - Imelda</option>
                        <option value="7001">7001 - Ipil</option>
                        <option value="7005">7005 - Kabasalan</option>
                        <option value="7010">7010 - Mabuhay</option>
                        <option value="7038">7038 - Malangas</option>
                        <option value="7004">7004 - Naga</option>
                        <option value="7041">7041 - Olutanga</option>
                        <option value="7008">7008 - Payao</option>
                        <option value="7002">7002 - Roseller Lim</option>
                        <option value="7006">7006 - Siay</option>
                        <option value="7012">7012 - Talusan</option>
                        <option value="7003">7003 - Titay</option>
                        <option value="7018">7018 - Tungawan</option>
                    </select>
                <input type="text" id="address" placeholder="enter your address" name="address" required>
               
            </div>

            <div class="flex">
            <div class="inputBox">
                <span>Place where to visit:</span>
                <input type="text" placeholder="enter or select place where to visit" id="selectedPlace" name="place" >
                <select id="placewhertovisit" name="placewhertovisit" onchange="updatePlace()">
                            <option value="-SELECT-"  disabled selected hidden>-SELECT-</option>
                            <option value="">HENANN LAGOON RESORT</option>
                            <option value="">PARADISE GARDEN HOTEL AND CONVENTION BORACAY</option>
                            <option value="DZ">7STONES BORACAY</option>
                            <option value="AS">HUNI LIO</option>
                            <option value="AD">LIME RESORT EL NIDO</option>
                            <option value="AO">EL NIDO GARDEN RESORT</option>
                            
                    </select>
                </form>
            </div>
                        
            <script>
                function updatePlace() {
                    var selectBox = document.getElementById("placewhertovisit");
                    var selectedValue = selectBox.options[selectBox.selectedIndex].text;
                    document.getElementById("selectedPlace").value = selectedValue;
                }

                function handleSubmit(event) {
                    event.preventDefault();
                    
                    setTimeout(() => {
                        
                        document.getElementById("bookingForm").reset();
                        document.getElementById("selectedPlace").value = '';
                    }, 1000); 
                }
            </script>

            <div class="inputBox">
                <span>how many :</span>
                <input type="number" id="guest" placeholder="number of guests" name="guest" required>
            </div>
            <div class="inputBox">
                <span>arrivals :</span>
                <input type="date" id="arrival" name="arrival" required>
            </div>
            <div class="inputBox">
                <span>departure :</span>
                <input type="date" id="departure" name="departure" required>
            </div>
        </div>
        <input type="submit" value="submit" class="btn" name="send" >
    </form>


</section>



<!--booking section ends-->
















<!--footer section starts-->
<section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="index.php"><i class="fa fa-angle-right"></i>Home</a>
                <a href="about.php"><i class="fa fa-angle-right"></i>About</a>
                <a href="packages.php"><i class="fa fa-angle-right"></i>Packages</a>
                <a href="inquiries.php"><i class="fa fa-angle-right"></i>Inquiries</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="inquiries.php"><i class="fa fa-angle-right"></i> ask questions</a>
                <a href="about.php"><i class="fa fa-angle-right"></i> about us</a>
                <a href="privacypolicy.php"><i class="fa fa-angle-right"></i> privacy policy</a>
                <a href="termsofuse.php"><i class="fa fa-angle-right"></i> terms of use</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="tel:+34604248290"><i class="fa fa-phone"></i> +34604248290 </a>
                <a href="https://gmail.com"><i class="fa fa-envelope"></i> maritonitravelandtour@gmail.com</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/marita.slns"><i class="fab fa-facebook-f"></i>Marita Ramirez</a>
                <a href="https://www.wcatravel.com/maritas15"><i class="fas fa-link"></i>https://www.wcatravel.com/maritas15</a>
            </div>
        </div>

        <div class="credit"> Created by <span>ABEJUELA AND SALINAS</span> | All rights reserved!</div>
    </section>
<!--footer section ends-->


<!--swiper js link-->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>


<!--custom js file link-->
<script src="script.js"> </script>
</body>
</html>
