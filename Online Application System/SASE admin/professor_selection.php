<?php
require_once "professor_session.php";
require_once "admin_dbcontroller.php";
$username = $_SESSION["username"];
$evaluator_name = $_SESSION["name"];
$select = "SELECT first_name, last_name, applicant_id FROM sase_student.users";

$result = mysql_query($select) or die('Database error '.mysql_error());
$rows1 = mysql_num_rows($result);

$i = 0;
$status = 0;
$flag = 0;
$appid = array();

while($row = mysql_fetch_assoc($result))
{
    $appid[$i] = $row["applicant_id"];
    $fname[$i] = $row["first_name"];
    $lname[$i] = $row["last_name"];
    $i++;
}

$applicant_id = 0;
$personality = '';
$qualification = '';
$scores = '';
$work = '';
$communication = '';
$confidence= '';
$essays = '';
$achievements = '';
$overall_rating = '';
$strengths = '';
$weakness = '';
$recommendation = '';

if(isset($_POST['personality'])) $personality = $_POST['personality'];
if(isset($_POST['applicant_id'])) $applicant_id = $_POST['applicant_id'];
if(isset($_POST['qualification'])) $qualification = $_POST['qualification'];
if(isset($_POST['scores'])) $scores = $_POST['scores'];
if(isset($_POST['work'])) $work = $_POST['work'];
if(isset($_POST['communication'])) $communication = $_POST['communication'];
if(isset($_POST['confidence'])) $confidence = $_POST['confidence'];
if(isset($_POST['essays'])) $essays = $_POST['essays'];
if(isset($_POST['achievements'])) $achievements = $_POST['achievements'];
if(isset($_POST['overall_rating'])) $overall_rating = $_POST['overall_rating'];
if(isset($_POST['strengths'])) $strengths = $_POST['strengths'];
if(isset($_POST['weakness'])) $weakness = $_POST['weakness'];
if(isset($_POST['recommendation'])) $recommendation = $_POST['recommendation'];

$select = "SELECT status FROM evaluation WHERE applicant_id = '$applicant_id' AND evaluator='$evaluator_name'";
$result = mysql_query($select);
$rows = mysql_num_rows($result);

if(isset($_POST['recommendation']))
{
    if(!$rows)
    {
        $insert = "INSERT INTO evaluation VALUES ( '$applicant_id','$username','$evaluator_name','$personality','$qualification','$scores','$work',
    '$communication','$confidence','$essays','$achievements','$overall_rating','$strengths','$weakness',
    '$recommendation', 1)";

        $result = mysql_query($insert) or die(mysql_error());

        if(mysql_affected_rows())
        {
            $flag = 1;
        }
    }

    else
    {
        $update = "UPDATE evaluation SET evaluator_email = '$username',evaluator = '$evaluator_name',personality='$personality',
    qualification = '$qualification', scores = '$scores',work = '$work',communication = '$communication',confidence = '$confidence',
     essays = '$essays', achievements = '$achievements', overall_rating = '$overall_rating',strengths = '$strengths',
     weakness = '$weakness', recommendation = '$recommendation', status = 1 WHERE applicant_id = '$applicant_id'";

        $result = mysql_query($update) or die(mysql_error());

        if(mysql_affected_rows())
        {
            $flag = 1;
        }
    }
}

?>

<html>
<head>
    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>MSIT-SE Admissions 2016</title>
    <link href="ssn.css" type="text/css" rel=stylesheet>
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
            <h2 align="center" class="contentblock">Evaluation List</h2>
            <p align="left">Welcome, <b><?php echo $_SESSION["name"].'!'?></b>
            <span style="float:right;"><a href="professor_profile.php">Profile</a> |
            <a href="professor_logout.php">Logout</a></span></p>

            <?php
            if($flag==1) echo "<h4 align=center style=color:green;> Details saved!</h4>";
            ?>
            <style>
                #new{
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                th.new2, td.new2 {
                    padding: 5px;
                }

                th {
                    display: table-cell;
                    vertical-align: inherit;
                    font-size: 13px;
                }
            </style>

            <table width="75%" align="center" id="new">
                <tr>
                    <th align="left" id="new" class="new2">Applicant Number</th>
                    <th align="left" id="new" class="new2">Applicant Name</th>
                    <th align="left" id="new" class="new2">Application</th>
                    <th align="left" id="new" class="new2">Evaluation Form</th>
                    <th align="left" id="new" class="new2">Outcome</th>
                </tr>
                <?php
                for($i = 0;$i<$rows1;$i++){
                ?>
                <tr>
                    <td id="new" class="new2"><?php
                        echo $appid[$i];
                        ?>
                    </td>
                    <td id="new" class="new2"><?php
                        echo $fname[$i]." ".$lname[$i];
                        ?>
                    </td>
                    <td id="new" class="new2">
                        <a href=/SASE%20App/uploads/<?php echo $appid[$i]?>.pdf>Download</a>
                    </td>
                    <td id="new" class="new2">
                        <?php

                        echo "<a href=professor_evaluation.php?appid=$appid[$i]>Fill / Edit Evaluation</a>";

                        ?>
                    </td>
                    <td id="new" class="new2">
                        <?php

                        $select = "SELECT recommendation FROM evaluation WHERE evaluator='$evaluator_name' AND applicant_id='$appid[$i]'";
                        $result = mysql_query($select) or die('Database error '.mysql_error());

                        $row = mysql_fetch_assoc($result);
                        $outcome = $row['recommendation'];

                        echo $outcome;
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>

            </table>
            <div class="TabBody"></div>
        </td>



        <tr>
            <td width="861">

                <table width="865" border="0" cellpadding="0" id="table33">
                    <tr>
                        <td width="861">
                            <img border="0" src="images/bottom-line.gif" width="861" height="6px"></td>
                    </tr>
                    <br><br><br>
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

