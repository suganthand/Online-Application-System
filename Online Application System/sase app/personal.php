<?php
require_once "session.php";
require_once "dbcontroller.php";
$username = $_SESSION["username"];
$select = "SELECT first_name, middle_name, last_name, phone, email, applicant_id FROM users where email='$username'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);
$firstname = $row['first_name'];
$middlename = $row['middle_name'];
$lastname = $row['last_name'];
$phone = $row['phone'];
$email = $row['email'];
$appid = $row['applicant_id'];
$flag = 0;
if(isset($_POST['sex']))
{
    $sex = mysql_escape_string($_POST['sex']);
    $date = mysql_escape_string($_POST['date']);
    $month = mysql_escape_string($_POST['month']);
    $byear = mysql_escape_string($_POST['byear']);
    $dob = $byear . '-' . $month . '-' . $date;
    $aline1 = mysql_escape_string($_POST['aline1']);
    $aline2 = mysql_escape_string($_POST['aline2']);
    $city = mysql_escape_string($_POST['city']);
    $state = mysql_escape_string($_POST['state']);
    $pincode = mysql_escape_string($_POST['pincode']);
}
if(isset($_POST['mcity']))
{
    $maline1 = mysql_escape_string($_POST['maline1']);
    $maline2 = mysql_escape_string($_POST['maline2']);
    $mcity = mysql_escape_string($_POST['mcity']);
    $mstate = mysql_escape_string($_POST['mstate']);
    $mpincode = mysql_escape_string($_POST['mpincode']);
}

$select = "SELECT email FROM personal_details WHERE email='$username'";
$result = mysql_query($select) or die('Query error '.mysql_error());
$rows = mysql_num_rows($result);

if(isset($_POST['sex']))
{
    if ($rows)
    {
        if (isset($_POST['mcity']))
        {
            $update = "UPDATE personal_details SET applicant_id='$appid', date_of_birth='$dob', gender='$sex',
p_address_line1='$aline1', p_address_line2='$aline2', p_address_city='$city',p_address_state='$state', p_address_pincode='$pincode',
m_address_line1='$maline1', m_address_line2='$maline2', m_address_city='$mcity', m_address_state='$mstate',m_address_pincode='$mpincode'
WHERE email = '$email'";
        }

        else {
            $update = "UPDATE personal_details SET applicant_id='$appid', date_of_birth='$dob', gender='$sex',
p_address_line1='$aline1', p_address_line2='$aline2', p_address_city='$city',p_address_state='$state', p_address_pincode='$pincode',
m_address_line1='', m_address_line2='', m_address_city='', m_address_state='',m_address_pincode=''
WHERE email = '$email'";
        }

        $result = mysql_query($update) or die('Query error ' . mysql_error());

        if (mysql_affected_rows()) {
            $flag = 1;
        }
    } //if rows

    else
    {
        if (isset($_POST['mcity']))
        {
            $insert = "INSERT INTO personal_details(applicant_id, email, date_of_birth, gender,
p_address_line1, p_address_line2,p_address_city,p_address_state,p_address_pincode,m_address_line1,m_address_line2,
m_address_city,m_address_state,m_address_pincode)
VALUES ('$appid','$email','$dob','$sex','$aline1','$aline2','$city','$state','$pincode','$maline1','$maline2',
'$mcity','$mstate','$mpincode')" or die(mysql_error());
        }

        else
        {
            $insert = "INSERT INTO personal_details(applicant_id, email, date_of_birth, gender,
p_address_line1, p_address_line2,p_address_city,p_address_state,p_address_pincode,m_address_line1,m_address_line2,
m_address_city,m_address_state,m_address_pincode)
VALUES ('$appid','$email','$dob','$sex','$aline1','$aline2','$city','$state','$pincode','','',
'','','')" or die(mysql_error());
        }

        $result = mysql_query($insert) or die('Query error hi ' . mysql_error());

        if (mysql_affected_rows()) {
            $flag = 1;
        }
    }
}//if isset post[sex]

$select = "SELECT * FROM personal_details where email='$username'";
$result = mysql_query($select) or die('Database error ' . mysql_error());
$row = mysql_fetch_assoc($result);
$sex = $row['gender'];
$dob = $row['date_of_birth'];
$pieces = explode('-', $dob);
if(isset($dob))
{
    $date = $pieces[2];
    $month = $pieces[1];
    $byear = $pieces[0];
}

$aline1 = $row['p_address_line1'];
$aline2 = $row['p_address_line2'];
$city = $row['p_address_city'];
$state = $row['p_address_state'];
$pincode = $row['p_address_pincode'];
$maline1 = $row['m_address_line1'];
$maline2 = $row['m_address_line2'];
$mcity = $row['m_address_city'];
$mstate = $row['m_address_state'];
$mpincode = $row['m_address_pincode'];
?>

<html>
<head>
    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>MSIT-SE Admissions 2016</title>
    <link href="ssn.css" type="text/css" rel=stylesheet>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../SASE%20app/javascripts/jquery.validate.js" type="text/javascript">
    </script>
    <script src="../SASE%20app/javascripts/jquery.validation.functions.js" type="text/javascript">
    </script>
    <script type="text/javascript">

        jQuery(function(){

            jQuery("#aline1").validate({
                expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) && VAL) return true; else return false;",
                message: "Please enter a proper address."
            });
            jQuery("#city").validate({
                expression: "if (isNaN(VAL) && VAL.match(/^[A-z]+$/) && VAL) return true; else return false;",
                message: "Please enter a valid city."
            });
            jQuery("#pincode").validate({
                expression: "if (VAL.match(/^[0-9]{6}$/) && VAL) return true; else return false;",
                message: "Please enter a valid pincode."
            });
        });
    </script>
    <Script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });

        function mailingaddress(_checked)
        {
            document.getElementById('maline1').disabled = _checked ? true : false;
            document.getElementById('maline2').disabled = _checked ? true : false;
            document.getElementById('mcity').disabled = _checked ? true : false;
            document.getElementById('mstate').disabled = _checked ? true : false;
            document.getElementById('mpincode').disabled = _checked ? true : false;
            document.getElementById('maline1').value ='';
            document.getElementById('maline2').value ='';
            document.getElementById('mcity').value ='';
            document.getElementById('mstate').value ='';
            document.getElementById('mpincode').value ='';
        }
    </script>
    <style>
        <!--
        div { font-family: inherit; }
        .lc { clear: left; float: left; width: 348px; }
        -->
    </style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<div align="center">

    <table width="865" border="0" cellpadding="0">
        <tr>
            <td>

                <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table15">
                    <tr>
                        <td width="597" valign="top">
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table16">
                                <tr>
                                    <td height="36">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table17">
                                            <tr>
                                                <td width="30">&nbsp;</td>
                                                <td width="87">
                                                    <a href="index.php">
                                                        <img border="0" src="images/ssn-logo.gif" width="87" height="37" alt="SSN"></a></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18"></td>
                                </tr>
                            </table>
                        </td>
                        <td width="268" valign="top">
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table18">
                                <tr>
                                    <td height="17"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" style="border-collapse: collapse" width="90%" id="table19">
                                            <tr>
                                                <td align="center" width="20">
                                                </td>
                                                <td align="center" width="10">
                                                </td>
                                                <td align="center" width="120">
                                                </td>
                                                <td align="center" width="10">
                                                    <a href="index.php">
                                                        <img border="0" src="images/home-logo.gif" width="11" height="11" alt="Home"></a></td>
                                                <td align="center" width="10">

                                                    <a href="contact.php">

                                                        <img border="0" src="images/contact-us.gif" width="15" height="11" alt="Contact Us"></a></td>
                                                <td align="left" width="10">

                                                    <a href="sitemap.php">
                                                        <img border="0" src="images/sitemap.gif" width="15" height="11" alt="Sitemap"></a></td>
                                                <td align="left" width="10">

                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p align="left">
                                            <img align="left" border="0" src="images/institions-top.gif" width="600" height="40"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td>



                <script type="text/JavaScript" src="js/qm1.js"></script>
                <ul id="qm1" class="qmmc">
                    <li><a class="qmparent" href="#"><img name="meuntop" border="0" src="images/about-ssn.gif" width="87" height="31"></a>
                        <ul>
                            <li><a class="qmparent" href="overview.php">Overview</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>

                            <li><a class="qmparent" href="founder.php">The Founder</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li><a class="qmparent" href="management.php">Management</a></li>
                            <li><a class="qmparent" href="president.php">President</a></li>
                            <li><a class="qmparent" href="faculty.php">Faculty</a></li>
                            <li><a class="qmparent" target="_blank" href="pdf/Brochure.pdf">Brochure</a></li>
                        </ul>
                    </li>
                    <li><a class="qmparent" href="cmu_colb.php"><img name="meuntop1" border="0" src="images/institution.gif" width="65" height="31"></a>

                    </li>
                    <li><a class="qmparent" href="#"><img name="meuntop2" border="0" src="images/programs.gif" width="87" height="31"></a>
                        <ul>

                            <li><a class="qmparent" href="programs.php">MSIT-SE</a></li>

                        </ul>
                    </li>
                    <li><a class="qmparent" href="#"><img name="meuntop3" border="0" src="images/admission.gif" width="94" height="31"></a>
                        <ul>
                            <li><a class="qmparent" href="admissions_2016.php">Admissions 2016</a></li>
                            <li><a class="qmparent" href="msit_admissions.php">MSIT-SE</a></li>
                            <li><a class="qmparent" href="faq_2012.php">FAQ & Help</a></li>

                        </ul>
                    </li>
                    <li><a class="qmparent" href="careers.php"><img name="meuntop4" border="0" src="images/career-ssn.gif" width="119" height="31"></a>
                    </li>

                    <li><a class="qmparent" href="students.php"><img name="meuntop5" border="0" src="images/scholarship.gif" width="90" height="31"></a></li>
                    <li><a class="qmparent" href="photo.php">
                            <img name="meuntop6" border="0" src="images/media.gif" width="120" height="31"></a>
                        <ul>


                        </ul>
                    </li>
                    <li><a class="qmparent" href="services.php"><img name="meuntop7" border="0" src="images/sport.gif" width="95" height="31"></a>


                    </li>
                    <li><a class="qmparent" href="alumni.php" ><img name="meuntop8" border="0" onchange="this.src='images/alumini-on.gif'" src="images/alumini.gif" width="69" height="31"></a>
                </ul>

                <script type="text/javascript">
                    qm_create(1,false,0,500,false,false,false,false);
                </script>
            </td>
        </tr>
        <tr>
            <td height="18"></td>
        </tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table5">
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table14">
                                <tr>
                                    <td colspan="2">
                                        <img border="0" src="images/up-line.gif" width="861" height="1"></td>
                                </tr>
                                <tr>
                                    <td width="860">
                                        <img border="0" src="images/msit.jpg" width="860" height="179"></td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <img border="0" src="images/center-down-line.gif" width="861" height="5"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <P align="right"><span><a class="contentred" href="index.php">
                                                    <span style="text-decoration: none">Home</span></a></span><span class="contentbottom"><b> /
                                                    Admissions</b>&nbsp;&nbsp; </span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>



        <td class="main" colspan="2" valign="top">
            <h2 align="center" class="contentblock">MSIT-SE Application 2016-17</h2>
            <p align="left">Welcome, <b><?php echo $_SESSION["name"].'!'?></b>
            <span style="float:right;"><a href="profile.php">Profile</a> |
            <a href="logout.php">Logout</a></span></p>
            <div class="TabBody">
                <table width="106%">
                    <tr>
                        <td style="font-size:12px">
                            <b>Personal Details</b>
                        </td>
                        <td style="font-size:12px">
                            <a href="education.php">Education Details</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="essays.php">Essays</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="documents.php">Document Uploads</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="validation.php">Application Validation</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="preview.php">Preview</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="payment.php">Submit and Pay</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <br><br><br>
                <?php
                if($flag==1) echo "<h4 align=center style=color:green;> Details saved</h4>";
                ?>
                <form name="personal" action="personal.php" method="post" class="AdvancedForm">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <b>Personal Details:</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                First (Given) Name
                            </td>
                            <td>
                                <?php echo $firstname ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Middle Name
                            </td>
                            <td>
                                <?php echo $middlename ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Last (Family) Name
                            </td>
                            <td>
                                <?php echo $lastname ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sex
                            </td>
                            <td>
                                <?php
                                if($sex == 'm')
                                {
                                    echo "<input type=\"radio\" name=\"sex\" id=\"sex\" value=\"male\" checked=\"checked\" required/> Male
                                    <input type=\"radio\" name=\"sex\" id=\"sex\" value=\"female\"/> Female";
                                }
                                elseif($sex == 'f')
                                {
                                    echo "<input type=\"radio\" name=\"sex\" id=\"sex\" value=\"male\" required/> Male
                                    <input type=\"radio\" name=\"sex\" id=\"sex\" value=\"female\" checked=\"checked\"/> Female";
                                }
                                else
                                {
                                    echo "<input type=\"radio\" name=\"sex\" id=\"sex\" value=\"male\" required/> Male
                                    <input type=\"radio\" name=\"sex\" id=\"sex\" value=\"female\"/> Female";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date of Birth (dd/mm/yyyy)
                            </td>
                            <td>
                                <select name="date">
                                    <?php
                                    echo '<option class="birthday" value="'.$date.'" selected>'.$date.'</option>';
                                    for ($i = 1; $i <= 31; $i++)
                                    {
                                        echo'<option class="birthday" value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select> /
                                <select name="month">
                                    <?php
                                    echo '<option class="birthday" value="'.$month.'" selected>'.$month.'</option>';
                                    for ($i = 1; $i <= 12; $i++)
                                    {
                                        echo'<option class="birthday" value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select> /
                                <select name="byear">
                                    <?php
                                    echo '<option class="birthday" value="'.$byear.'" selected>'.$byear.'</option>';
                                    for ($i = 1985; $i <= 1996; $i++)
                                    {
                                        echo'<option class="birthday" value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <?php echo $username ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone
                            </td>
                            <td>
                                +91 <?php echo $phone ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Permanent Address:</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address Line 1:
                            </td>
                            <td>
                                <input type="text" name="aline1" id="aline1" size="50" value="<?php echo $aline1 ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address Line 2:
                            </td>
                            <td>
                                <input type="text" name="aline2" id="aline2" size="50" value="<?php echo $aline2 ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                City:
                            </td>
                            <td>
                                <input type="text" name="city" id="city" value="<?php echo $city ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                State:
                            </td>
                            <td>
                                <select name="state" required>
                                    <option value="<?php echo $state ?>" selected><?php echo $state ?></option>
                                    <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                    <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                    <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                    <option value='Assam'>Assam</option>
                                    <option value='Bihar'>Bihar</option>
                                    <option value='Chandigarh'>Chandigarh</option>
                                    <option value='Chhattisgarh'>Chhattisgarh</option>
                                    <option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>
                                    <option value='Daman and Diu'>Daman and Diu</option>
                                    <option value='Delhi'>Delhi</option>
                                    <option value='Goa'>Goa</option>
                                    <option value='Gujarat'>Gujarat</option>
                                    <option value='Haryana'>Haryana</option>
                                    <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                    <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                    <option value='Jharkhand'>Jharkhand</option>
                                    <option value='Karnataka'>Karnataka</option>
                                    <option value='Kerala'>Kerala</option>
                                    <option value='Lakshadweep'>Lakshadweep</option>
                                    <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                    <option value='Maharashtra'>Maharashtra</option>
                                    <option value='Manipur'>Manipur</option>
                                    <option value='Meghalaya'>Meghalaya</option>
                                    <option value='Mizoram'>Mizoram</option>
                                    <option value='Nagaland'>Nagaland</option>
                                    <option value='Odisha'>Odisha</option>
                                    <option value='Puducherry'>Puducherry</option>
                                    <option value='Punjab'>Punjab</option>
                                    <option value='Rajasthan'>Rajasthan</option>
                                    <option value='Sikkim'>Sikkim</option>
                                    <option value='Tamil Nadu'>Tamil Nadu</option>
                                    <option value='Telangana'>Telangana</option>
                                    <option value='Tripura'>Tripura</option>
                                    <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                    <option value='Uttarakhand'>Uttarakhand</option>
                                    <option value='West Bengal'>West Bengal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pincode:
                            </td>
                            <td>
                                <input type="text" name="pincode" id="pincode" maxlength="6" value="<?php echo $pincode ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Mailing Address:</b>
                            </td>
                            <td>
                                <input type="checkbox" id="maddress" onchange="mailingaddress(this.checked)"> Check this box if mailing address is same as permanent address
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address Line 1:
                            </td>
                            <td>
                                <input type="text" name="maline1" id="maline1" size="50" value="<?php echo $maline1 ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address Line 2:
                            </td>
                            <td>
                                <input type="text" name="maline2" id="maline2" value="<?php echo $maline2 ?>" size="50">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                City:
                            </td>
                            <td>
                                <input type="text" name="mcity" id="mcity" value="<?php echo $mcity ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                State:
                            </td>
                            <td>
                                <select name="mstate" id="mstate">
                                    <option value="<?php echo $mstate ?>" selected><?php echo $mstate ?></option>
                                    <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                    <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                    <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                    <option value='Assam'>Assam</option>
                                    <option value='Bihar'>Bihar</option>
                                    <option value='Chandigarh'>Chandigarh</option>
                                    <option value='Chhattisgarh'>Chhattisgarh</option>
                                    <option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>
                                    <option value='Daman and Diu'>Daman and Diu</option>
                                    <option value='Delhi'>Delhi</option>
                                    <option value='Goa'>Goa</option>
                                    <option value='Gujarat'>Gujarat</option>
                                    <option value='Haryana'>Haryana</option>
                                    <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                    <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                    <option value='Jharkhand'>Jharkhand</option>
                                    <option value='Karnataka'>Karnataka</option>
                                    <option value='Kerala'>Kerala</option>
                                    <option value='Lakshadweep'>Lakshadweep</option>
                                    <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                    <option value='Maharashtra'>Maharashtra</option>
                                    <option value='Manipur'>Manipur</option>
                                    <option value='Meghalaya'>Meghalaya</option>
                                    <option value='Mizoram'>Mizoram</option>
                                    <option value='Nagaland'>Nagaland</option>
                                    <option value='Odisha'>Odisha</option>
                                    <option value='Puducherry'>Puducherry</option>
                                    <option value='Punjab'>Punjab</option>
                                    <option value='Rajasthan'>Rajasthan</option>
                                    <option value='Sikkim'>Sikkim</option>
                                    <option value='Tamil Nadu'>Tamil Nadu</option>
                                    <option value='Telangana'>Telangana</option>
                                    <option value='Tripura'>Tripura</option>
                                    <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                    <option value='Uttarakhand'>Uttarakhand</option>
                                    <option value='West Bengal'>West Bengal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pincode:
                            </td>
                            <td>
                                <input type="text" name="mpincode" id="mpincode" maxlength="6" value="<?php echo $mpincode ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Save" id="FormSubmit" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>

        <tr>
            <td width="861">
                <br><br><br>
                <table width="865" border="0" cellpadding="0" id="table33">
                    <tr>
                        <td width="861">
                            <img border="0" src="images/bottom-line.gif" width="861" height="6px"></td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table34">
                                <tr>
                                    <td width="13">&nbsp;</td>
                                    <td width="11">
                                        <img border="0" src="images/copyright.gif" width="11" height="10" alt="Copyright"></td>
                                    <td width="3"></td>
                                    <td class="contentbottom">Copyright 2015 SSN School of Advanced Software Engineering. All rights reserved. </td>
                                    <td width="38">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
    _uacct = "UA-3737455-1";
    urchinTracker();
</script>

</body>
<script type="text/javascript">
    qm_create(1,false,0,500,false,false,false,false);
    document.meuntop3.src = "images/admission-on.gif";
</script>
</html>

