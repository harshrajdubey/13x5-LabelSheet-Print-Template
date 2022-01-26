
<style type="text/css">
body {
    font-family: Arial, Verdana, Helvetica, 'Trebuchet MS';
    background: #fff;
    margin:0mm;
}

.labelStyle {
    width: 38.1mm;
    height: 21.2mm;
    text-align: center;
    border: 0.05mm solid #fff;
    border-radius: 2mm;
    margin-right: 2.5mm;

}
.rowstyle {
    height: 21.2mm;
    text-align: center;
}

.labelStyle2 {
    width: 38.1mm !important;
    height: 21.2mm !important;
    text-align: center;
    margin-right: 2.5mm;

}

.printa4-65 {
    /* width: 210mm; */
    /* height: 297mm; */
    border: 0.05mm solid #000000;

    padding-left: 4.75mm;
    padding-right: 2.25mm;
    padding-top: 10.05mm;
    padding-bottom: 10.05mm;
}
</style>
</head>

<div id="printablearea">
<table class="printa4-65" cellspacing="0" cellpadding="0">
    <tr class="rowstyle" >

    <?php
$count = 0;
for ($i = $_REQUEST['barcode_start']; $i < $_REQUEST['barcode_end'] + 1; $i++) {
    if($count!=0){
        if (($count % 65) == 0) {echo '</tr>
            </table>
            <table class="printa4-65" cellspacing="0" cellpadding="0">
                <tr class="rowstyle">'; } else if (($count % 5) == 0) {echo '</tr><tr class="rowstyle">';}
    }

    ?>
<td class="labelStyle2">
    <div class="labelStyle">
    <br>
                <img src='../images/barcode/<?php echo sprintf("%06d", $i) ?>.jpg' style="width: 90%;" border="0" />
                <div style="font-size: 12pt; text-align:center; color:#000;"><b><?php echo sprintf("%06d", $i) ?></b></div>

                </div>
</td>

<?php $count++; }?>

</table>


</div>
<script src="<?php echo base_url('js/jquery-2.1.4.min.js'); ?>"></script>


<script>
    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
        // location.reload();
    }


                var myTimeout=setTimeout(function() {
                    printContent('printablearea');
                    clearTimeout(myTimeout);
                    // window.location.replace("<?php //echo $_SERVER['HTTP_REFERER']?>");
                    }, 500);

    </script>
