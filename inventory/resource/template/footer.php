<?php 
    $document_type = $_POST['document_type'];

    if($document_type == SalesDocument::QUOTATION || ($document_type == SalesDocument::INVOICE && $_POST['check_quatation_no'] == 1)) {
        $sign = true;
    }
    else{
        $sign = false;
    }
    
?>
<div class="row">
    <table class="">
        <tr>
            <td></td>
            <td></td>
            <td class="text-left">
            <?php if($sign) { ?>

            <span style="font-size: 10px;"><b>Company Stamp & Authorized on Behald of</b></span>
            <?php } ?>

            </td>
        </tr>
        <tr>
            <td width="55%">
                Terms and Conditions :
            </td>
            <td></td>

            <td class="text-nowrap text-left">
                <?php if($sign) { ?>
                <span style="font-size: 10px;"><b> Meta Platforms, Inc.</b></span>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td width="55%" rowspan="2">
           <span style="font-size: 10px;">
           <?php echo $_POST['terms_and_condition'] ?> 
           </span> 

            </td>
            <td width="1%"></td>

            <td width="44%"></td>
        </tr>
        <tr>
            <td></td>
            <td class="text-nowrap" style="vertical-align:bottom;" >
                <?php if($sign) { ?>
                <span style="font-size: 12px;border-top-style: solid;">Authorized Signature & Company Stamp</span>
                <?php } ?>
            </td>
            
        </tr>  
        <tr>
            <td colspan="2" class="text-left" ><small><b>Notes: This is a computer generated document and no signature required</b></small></td>
            <td>
                <?php if($sign) { ?>
                <b>Date :</b>
                <?php } ?>

            </td>
        </tr> 
    </table>            
</div>

</div>
        </div>
    </div>
</div>


<script type="text/javascript">

</script>
</body>
</html>