<div class="invoice-items">
    <div class="" style="overflow: hidden; outline: none;" tabindex="0">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" width="1%">
                        No
                    </th>
                    <th class="text-center" width="83%">
                        Description
                    </th>
                    <th class="text-center" width="1%">
                        Qty
                    </th>
                    <th class="text-center" width="5%">
                        Unit Price (RM)
                    </th>
                    <th class="text-center" width="5%">
                        Total Amount (RM)
                    </th>
                    <th class="text-center" width="5%">
                        <span style="white-space: nowrap;">
                        <?php echo $_POST['tax_percentage'] .'% '. $_POST['tax_name']?> 
                        </span>
                        (RM)     


                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total_amount = $total_sst = 0;
                $tax =  $_POST['tax_percentage'];

                    if(isset($_POST['list_product_desc'])) { 
                    foreach($_POST['list_product_desc'] as $idx => $product_desc){
                        $total = $_POST['list_unit_price'][$idx] * $_POST['list_quantity'][$idx];
                        $sst = $total * ($tax/100);
                        $total_amount += $total;
                        $total_sst += $sst;
                ?>
                <tr>
                    <td class="text-center">
                        <span style="font-size: 12px;">
                        <?php echo $idx + 1 ?> .
                        </span>
                    </td>
                    <td>
                        <span style="font-size: 12px;">
                        <?php echo $product_desc ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 10px;">
                        <?php echo $_POST['list_quantity'][$idx] ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 10px;">
                        <?php echo $_POST['list_unit_price'][$idx] ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 10px;">
                        <?php echo $total ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <span style="font-size: 10px;">
                        <?php echo $sst  ?>
                        </span>
                    </td>
                </tr>
            
                <?php }} ?>
                <tr>
                    <td colspan="4" class="text-right">Sub Total (RM):</td>
                    <td class="text-center"><?php echo $total_amount ?></td>
                    <td class="text-center"> <?php echo $total_sst ?></td>
                </tr>
            </tbody>
            <tfoot>
                <?php 
                    $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                ?>
                <tr>
                    <th colspan="2" >
                        <span style="font-size: 10px;">

                        <?php echo 'RINGGIT MALAYSIA: '.strtoupper(convertNumber($total_amount + $total_sst));?> 
                    </th>
                    <th  colspan="2" class="text-right">
                        <span style="font-size: 11px; white-space: nowrap;">
                        Grand Total 
                        </span>
                        <span style="font-size: 11px;">
                        (RM):
                        </span>
                    </th>
                    <th colspan="2" style="white-space: nowrap;" class="text-center">
                        <span style="font-size: 12px;">
                        <?php 
                            $number = number_format((float)$total_amount + $total_sst, 2, '.', '');

                            echo $number;
                        ?>
                        </span>
                    </th>
                </tr>
                <!-- <tr>
                    <th colspan="2" class="text-right">20% VAT:</th>
                    <th class="text-center">$47.40 USD</th>
                </tr>
                <tr>
                    <th colspan="2" class="text-right">Credit:</th>
                    <th class="text-center">$00.00 USD</th>
                </tr>
                <tr>
                    <th colspan="2" class="text-right">Total:</th>
                    <th class="text-center">$284.4.40 USD</th>
                </tr> -->
            </tfoot>
        </table>
    </div>
</div>