<?php
session_start();
include('../db_config.php');
require_once('vendor/autoload.php');
define('PDF_FONT', './vendor/tecnickcom/TCPDF/fonts/ttf/THSarabunNew.ttf');
define('PDF_FONTB', './vendor/tecnickcom/TCPDF/fonts/ttf/THSarabunNew_Bold.ttf');
define('PDF_FONTBI', './vendor/tecnickcom/TCPDF/fonts/ttf/THSarabunNew_BoldItalic.ttf');
define('PDF_FONTI', './vendor/tecnickcom/TCPDF/fonts/ttf/THSarabunNew_Italic.ttf');
define('PDF_FONT_TYPE', 'TrueTypeUnicode');
define('PDF_FONT_FLAGS', 32);


$sql = "SELECT a.* , u.* FROM classdata as a left join member as u on u.pk = a.data11 where a.pk = '$_GET[classdata]'";
$query = mysqli_query($con, $sql);
$master = $query->fetch_assoc();
// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf = new TCPDF('P', 'cm', 'A4', true, 'UTF-8', false);

$pdf->setPrintFooter(false);
$pdf->SetMargins(1, 1, 1);

$font = TCPDF_FONTS::addTTFfont(PDF_FONT, PDF_FONT_TYPE, '', PDF_FONT_FLAGS);
$fontb = TCPDF_FONTS::addTTFfont(PDF_FONTB, PDF_FONT_TYPE, '', PDF_FONT_FLAGS);
$fontbi = TCPDF_FONTS::addTTFfont(PDF_FONTBI, PDF_FONT_TYPE, '', PDF_FONT_FLAGS);
$fonti = TCPDF_FONTS::addTTFfont(PDF_FONTI, PDF_FONT_TYPE, '', PDF_FONT_FLAGS);

$pdf->SetTitle('แบบใบเบิกค่าตอบแทนผู้ช่วยสอนและผู้ช่วยปฏิบัติงาน');
$pdf->setPrintHeader(FALSE);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 0);


$type = ['ปกติ', 'พิเศษ'];
$t1 = 0;
$t2 = 0;
foreach ($type as $t) {
    $default_row_height = 0.6;
    $pdf->AddPage();
    $pdf->SetFont($fontb, '', 16);
    // $pdf->cell(0, $default_row_height, 'แบบใบเบิกค่าตอบแทนผู้ช่วยสอนและผู้ช่วยปฏิบัติงาน', 0, 1, 'C');
    $head = '
<table  >
<thead align="center">
    <tr align="center">
        <td align="center">
        แบบใบเบิกค่าตอบแทนผู้ช่วยสอนและผู้ช่วยปฏิบัติงาน <br>
        วิทยาลัยการคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น  <br>
       ภาคการศึกษา  ' . chkTerm1($master['data8']) . '     ' . chkTerm2($master['data8']) . '    ปีการศึกษา ' . $master['data7'] . ' 
        </td>

    </tr>
<thead>
</table>';
    $pdf->writeHTML($head, true, false, false, false, '');

    $pdf->SetFont($font, '', 14);
    $sqlu = "SELECT * FROM member where pk = $_SESSION[UserID3]";
    $queryu = mysqli_query($con, $sqlu);
    $masteru = $queryu->fetch_assoc();
    $tbl = '<table >
<thead >
    <tr >
        <td width="40%">
        <b>วิชา : </b>' . $master['data1'] . ' ' . $master['data2'] . ' <br>
        <b>อาจารย์ประจำวิชา : </b>' .  $master['name'] . ' <br>
        <b>ชื่อ-สกุล : </b> ' . $masteru['name'] . ' <br>
        </td>

        <td width="30%">
        <br>
        <br>
        <br>
        <b>รหัสประจำตัว : </b>' . $masteru['codestudent'] . ' 
        </td>

        <td width="30%">
        <b>หน่วยกิต : </b>  ' . $master['data6'] . '  <br>
        <b>ระดับ : </b> ' . $masteru['subject'] . ' ภาค' . $t . ' <br>
        </td>
        
    </tr>
<thead>
</table>';


    $tbl .= '
<table border="1" align="center" >
<thead>
    <tr class="text-center">
        <th class="text-center" rowspan="2" width="5%">ลำดับที่</th>
        <th class="text-center" rowspan="2" width="20%">ชื่อ สกุล</th>
        <th class="text-center" rowspan="2" width="5%">ระดับ</th>
        <th class="text-center"  colspan="3" width="30%">ระยะเวลาที่สอน</th>
        <th class="text-center"  colspan="2" width="20%">จำนวนชั่วโมงที่สอน</th>
        <th class="text-center" rowspan="2" width="20%">หมายเหตุ</th>
    </tr>
    <tr>
        <th class="text-center"> ว/ด/ป </th>
        <th class="text-center"> รหัสวิชา </th>
        <th class="text-center"> เวลาสอน </th>
        <th class="text-center"> บรรยาย </th>
        <th class="text-center"> ปฏิบัติการ </th>
    </tr>
</thead>
<tbody>
';
    $sql2 = "SELECT a.*, b.* , m.*  , COUNT(a.pk) as total FROM work_time a 
											left Join classdata b On a.subject = b.pk
											left join member m on m.pk = b.data11
											where a.student_paper != ''
											and a.member = $_SESSION[UserID3]
                                            and b.pk = $_GET[classdata]
                                            and a.savedata4 = '$t'
                                            group by a.savedata1
											order by a.pk asc ";
    $query2 = mysqli_query($con, $sql2);
    // $masterd = $query2->fetch_assoc();
    $index = 1;
    foreach ($query2 as $dx) {
        $tbl .= '
        <tr>
            <td width="5%" class="text-center">' . ($index == 1 ? 1 : '') . '</td>
            <td width="20%" class="text-center">' . ($index == 1 ? $masteru['name'] : '') . ' </td>
            <td width="5%" class="text-center"> ' . ($index == 1 ? $masteru['subject'] : '') . '  </td>
            <td width="10%" class="text-center"> ' . $dx['savedata1'] . ' </td>
            <td width="10%" lass="text-center">' . $master['data1']  . '</td>
            <td width="10%" class="text-center">' . $dx['savedata2'] . '-' .   $dx['savedata3'] . ' </td>
            <td width="10%" class="text-center"> ' . ($dx['type'] == 'Lec' ? $dx['savedata5'] : '') . ' </td>
            <td width="10%" class="text-center">' . ($dx['type'] == 'Lab' ? $dx['savedata6'] : '') . ' </td>
            <td width="20%" class="text-center" align="left"> ' . ($dx['description'] != null ? $dx['description'] : '')  . ' </td>
        </tr>
        ';
        $index++;
        $t1 += (int)$dx['savedata5'];
        $t2 += (int)$dx['savedata6'];
    }


    $tbl .= '
    <tr>
    <td colspan="2" class="text-center" rowspan="2"></td>
    <td colspan="2" class="text-center" rowspan="2">รวมเวลา<br>ที่สอน</td>
    <td colspan="2" align="left" class="text-center"> ปริญญาตรี</td>
     <td width="10%" class="text-center"> ' . ($masteru['subject'] == 'ปริญญาตรี' ? $t1 : '') . ' </td>
     <td width="10%" class="text-center"> ' . ($masteru['subject'] == 'ปริญญาตรี' ? $t2  : '') . ' </td>
     <td></td>
    </tr>
    <tr>
    
    <td colspan="2" align="left" class="text-center"> ปริญญาโท-เอก</td>
    <td width="10%" class="text-center">  ' . ($masteru['subject'] == 'ปริญญาโท-เอก ' ? $t1 : '') . ' </td>
    <td width="10%" class="text-center"> ' . ($masteru['subject'] == 'ปริญญาโท-เอก ' ? $t2  : '') . ' </td>
    </tr>
    </tbody></table>';



    $footer = '

    <table style="margin-top: 25px;">
        <thead align="center"  >
            <tr> 

                <td>จำนวนเงินที่ขอเบิก</td>
            </tr>
        </thead>
        
    </table>

    <table align="center" >  
        <thead>
            <tr> 
                <td width="20%">- ปริญญาตรี (ภาคปกติ)</td>
                <td width="10%">' . ($t == 'ปกติ' ? (int)($t1 + $t2) : '0.0') . ' </td>
                <td width="10%">ชั่วโมง</td>
                <td width="20%">อัตตราชั่วโมงละ</td>
                <td width="10%">40.00</td>
                <td width="10%">บาท</td>
                <td width="10%">เป็นเงิน</td>
                <td width="10%">' . ($t == 'ปกติ' ?  (($t1 + $t2) * 40) : '-') . ' </td>
            </tr>
            <tr> 
                <td width="20%">- ปริญญาตรี (โครงการพิเศษ)</td>
                <td width="10%">' . ($t == 'พิเศษ' ? (int)($t1 + $t2) : '0.0') . '</td>
                <td width="10%">ชั่วโมง</td>
                <td width="20%">อัตตราชั่วโมงละ</td>
                <td width="10%">50.00</td>
                <td width="10%">บาท</td>
                <td width="10%">เป็นเงิน</td>
                <td width="10%">' . ($t == 'พิเศษ' ? (($t1 + $t2) * 50) : '-') . ' </td>
            </tr>
            <tr> 
                <td width="20%">- ปริญญาโท เอก (เหมาจ่าย)</td>
            </tr>

            <tr> 
                <hr>
                <td width="20%">รวมเป็นเงิินทั้งสิ้น ' . ($t == 'ปกติ' ?  (($t1 + $t2) * 40) : (($t1 + $t2) * 50)) . ' บาท </td>
                <hr>
                
            </tr>
            <tr align="left"> 
                <td width="20%"> หมายเหตุ : </td>
                <hr>
                
            </tr>
            <tr align="center" border="1" > 
                <td width="33%" border="1"> ผู้ปฏิบัติงาน </td>
                <td width="33%" border="1"> อาจารย์ผู้สอน </td>
                <td width="34%" border="1"> ผู้รับรอง </td>
            </tr>
            <tr align="center" border="1" > 
                <td width="33%" border="1"> &nbsp;<br>ลงชื่อ.................................................. <br> ( ' . $masteru['name'] . ') <br> วันที .... เดือน ........... พ.ศ...... </td>
                <td width="33%" border="1"> &nbsp;<br>ลงชื่อ.................................................. <br> ( อาจารย์' . $master['name'] . ') <br> วันที .... เดือน ........... พ.ศ...... </td>
                <td width="34%" border="1">&nbsp;<br>ลงชื่อ................................................... <br> (  ...........................................   ) <br> รักษาการแทนตณะบดีฝ่ายวิชาการ <br> วันที .... เดือน ........... พ.ศ...... </td>
            </tr>
            
            
            
        </thead>
        
    </table>
        

    ';
    //! write
    $footerw = <<<EOD
        $tbl
        $footer
    EOD;

    $pdf->writeHTML($footerw, true, false, false, false, '');


    $t1 = 0;
    $t2 = 0;
    $index = 1;
}




// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('ตารางเรียนและตารางปฏิบัติงาน.pdf', 'I');
$pdf->Close();


function chkTerm2($str)
{
    if ($str == 'เทอมปลาย') {
        $res1 = '( / ) เทอมปลาย';
    } else {
        $res1 = '( &nbsp;  ) เทอมปลาย';
    }
    return $res1;
};
function chkTerm1($str)
{
    if ($str == 'เทอมต้น') {
        $res2 = '( / ) เทอมต้น';
    } else {
        $res2 = '( &nbsp;  ) เทอมต้น';
    }
    return $res2;
};
