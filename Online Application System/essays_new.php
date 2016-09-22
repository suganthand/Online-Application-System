<?php
require_once "session.php";
require_once "dbcontroller.php";
$username = $_SESSION["username"];
$select = "SELECT email, applicant_id FROM users WHERE email='$username'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);
$appid = $row['applicant_id'];
$email = $row['email'];

$target_dir = "uploads/";
$essay_file ='';
$essay_DocTooLarge = false;
$essay_ExtnInvalid = false;
$essay_UploadOk = false;
$essay_Uploaded = false;
$essay_flag = false;
$essay_status = 0;


$exp_file ='';
$exp_DocTooLarge = false;
$exp_ExtnInvalid = false;
$exp_UploadOk = false;
$exp_Uploaded = false;
$exp_flag = false;
$exp_status = 0;


$cri_file ='';
$cri_DocTooLarge = false;
$cri_ExtnInvalid = false;
$cri_UploadOk = false;
$cri_Uploaded = false;
$cri_flag = false;
$cri_status = 0;


if(isset($_FILES["essay"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["essay"]["name"]);
    $essay_UploadOk = true;

    $essayFile = $target_dir . $appid . '-essays.doc';
    $essay_file = $appid . '-essays.doc';
    $file_size = $_FILES["essay"]["size"];

    $essay_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($essay_file_size > 500000)
    {
        $essay_DocTooLarge = true;
        $essay_UploadOk = false;
    }

    if ($essay_filetype != "doc")
    {
        $essay_ExtnInvalid = true;
        $essay_UploadOk = false;
    }

    if($essay_UploadOk)
    {
        if (move_uploaded_file($_FILES["essay"]["tmp_name"], $essayFile))
        {
            $essay_Uploaded = true;
            $essay_flag = true;

            $update = "UPDATE essays SET essay_status=TRUE, essay_file='$essay_file', essay_size='$essay_file_size', essay_type='$essay_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $essay_Uploaded = false;

            $update = "UPDATE essays SET essay_status=FALSE, essay_file='', essay_size='', essay_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["exp"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["exp"]["name"]);
    $exp_UploadOk = true;

    $expFile = $target_dir . $appid . '-exp.doc';
    $exp_file = $appid . '-exp.doc';
    $exp_file_size = $_FILES["exp"]["size"];

    $exp_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($exp_file_size > 500000)
    {
        $exp_DocTooLarge = true;
        $exp_ploadOk = false;
    }

    if ($exp_filetype != "doc")
    {
        $exp_ExtnInvalid = true;
        $exp_UploadOk = false;
    }

    if($exp_UploadOk)
    {
        if (move_uploaded_file($_FILES["exp"]["tmp_name"], $expFile))
        {
            $exp_Uploaded = true;
            $exp_flag = true;

            $update = "UPDATE essays SET exp_status=TRUE, file='$exp_file', exp_size='$exp_file_size', exp_type='$exp_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $exp_Uploaded = false;

            $update = "UPDATE essays SET exp_status=FALSE, exp_file='', exp_size='', exp_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["cri"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["cri"]["name"]);
    $cri_UploadOk = true;

    $criFile = $target_dir . $appid . '-SOP.doc';
    $cri_file = $appid . '-SOP.doc';
    $cri_file_size = $_FILES["cri"]["size"];

    $cri_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($cri_file_size > 500000)
    {
        $cri_DocTooLarge = true;
        $cri_UploadOk = false;
    }

    if ($cri_filetype != "doc")
    {
        $cri_ExtnInvalid = true;
        $cri_UploadOk = false;
    }

    if($cri_UploadOk)
    {
        if (move_uploaded_file($_FILES["cri"]["tmp_name"], $criFile))
        {
            $cri_Uploaded = true;
            $cri_flag = true;

            $update = "UPDATE essays SET cri_status=TRUE, cri_file='$cri_file', cri_size='$cri_file_size', cri_type='$cri_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $cri_Uploaded = false;

            $update = "UPDATE essays SET cri_status=FALSE, cri_file='', cri_size='', cri_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}



$select = "SELECT essay_status, essay_file, essay_status, exp_file, cri_status, cri_file
             FROM essays WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
$rows = mysql_num_rows($result);


if($rows)
{
    $row = mysql_fetch_assoc($result);
    $essay_status = $row['essay_status'];
    $essay_file = $row['essay_file'];
    $exp_status = $row['exp_status'];
    $exp_file = $row['exp_file'];
    $cri_status = $row['cri_status'];
    $cri_file = $row['cri_file'];
}
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
    </script>
    <script>
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
                <table width="114%">
                    <tr>
                        <td style="font-size:12px">
                            <a href="personal.php">Personal Details</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="education.php">Education Details</a>
                        </td>
                        <td style="font-size:12px">
                            <b>Essays</b>
                        </td>
                        <td style="font-size:12px">
                            <a href="documents.php">Document Uploads</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="payment.php">Submit and Pay</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br><br>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <form name="essays" action="essays_new.php" method="post" class="AdvancedForm" enctype="multipart/form-data">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Academic Achievements, Extra-curricular Activities and Honours </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Describe your academic profile along with a list of relevant courses you have taken.
                                Provide a list of scholarships, prizes, or honors awarded to you. Also, describe your
                                co-curricular and extra-curricular activities.
                            </td>
                            <td>
                                <a href="documents/acads.doc">Download template</a>
                            </td>

                            <td>
                                <?php
                                if($essay_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['essay']['name'])) {
                                    if ($_FILES['essay']['error'] > 0 && !empty($_FILES["essay"]["name"])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($essay_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($essay_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($essay_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$essay_file\">View uploaded file</a>";
                                }

                                if($essay_Uploaded==false && $essay_status==1)
                                {
                                    echo "<a href=\"uploads/$essay_file\">View uploaded file</a>";
                                }

                                if($essay_Uploaded==false && $essay_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";
                                }
                                ?>
                                <input type='file' name='essay' id='essay_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b> Software Project Experience </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Give the details of your employment experiences (if any), and software engineering
                                project experiences, both academic and industry.
                            </td>
                            <td>
                                <a href="documents/exp.doc">Download template</a>
                            </td>
                            <td>
                                <?php
                                if($exp_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['exp_doc']['name'])) {
                                    if ($_FILES['exp_doc']['error'] > 0 && !empty($_FILES["exp_doc"]["name"])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($exp_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($exp_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($exp_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$exp_file\">View uploaded file</a>";
                                }

                                if($exp_Uploaded==false && $exp_status==1)
                                {
                                    echo "<a href=\"uploads/$exp_file\">View uploaded file</a>";
                                }

                                if($exp_Uploaded==false && $exp_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>"; }
                                ?>
                                <input type='file' name='exp' id='exp_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Critical Essay </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                The essay is an important part of your application packet, and helps the Admissions
                                Committee to better understand your background, your goals, and your suitability as a
                                candidate. Successful essays are those that provide clear descriptions into what you
                                have done, what you are hoping to accomplish as a student of this program, and what
                                is truly unique about you as a candidate. Refer to the template for detailed essay
                                requirements.
                            </td>
                            <td>
                                <a href="documents/SOP.doc">Download template</a>
                            </td>
                            <td>
                                <?php
                                if($cri_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['cri_doc']['name'])) {
                                    if ($_FILES['cri_doc']['error'] > 0 && !empty($_FILES['cri_doc']['name'])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($cri_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($cri_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($cri_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$cri_file\">View uploaded file</a>";
                                }

                                if($cri_Uploaded==false && $cri_status==1)
                                {
                                    echo "<a href=\"uploads/$cri_file\">View uploaded file</a>";
                                }

                                if($cri_Uploaded==false && $cri_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>"; }
                                ?>
                                <input type='file' name='cri' id='cri_doc'>
                            </td>
                        </tr>

                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type='submit' value='Upload/Replace selected files'>";
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

