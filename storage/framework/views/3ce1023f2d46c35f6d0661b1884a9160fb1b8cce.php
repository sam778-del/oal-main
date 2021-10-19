<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	body {
		font-family: 'Poppins';
		font-size: 14px; 
		padding: 0px; 
		margin: 0px;
	}
    @media  print {
      	.new-page {
        page-break-before: always;
      	}
    }
    .new-page {
        page-break-before: always;
    }
    table { 
        font-size: 60%; 
        table-layout: 
        fixed; width: 100%;
        border-collapse: separate; 
        border-spacing: 0px; 
    }
    th, td { 
        border-width: 0px; 
        padding: 0em; 
        position: relative;
        border-radius: 0em; border-style: solid;
        border-color: #BBB;
        font-size: 13px;margin: 0px
    }  
    p{padding: 6px;margin: 0px;}
    h4 {font-size: 16px; font-weight: bold; padding: 0px; margin: 0px;}

	.double {
		background-image: linear-gradient(to bottom, red 33%, transparent 33%, transparent 66%, red 66%, red);
		background-position: 0 1.03em;
		background-repeat: repeat-x;
	  	background-size: 2px 6px;
	}
	.underline {
		border-bottom: 2px solid currentColor;
		display: inline-block;
		line-height: 0.85;
		text-shadow:2px 2px white,2px -2px white,-2px 2px white,-2px -2px white;
	}
	.font-12{
		font-size: 12px
	}
	.font-13{
		font-size: 13px
	}
	.font-14{
		font-size: 14px
	}
	.font-15{
		font-size: 15px
	}
	.font-16{
		font-size: 16px
	}
	.font-18{
		font-size: 18px
	}
	.font-19{
		font-size: 19px
	}
	.font-20{
		font-size: 20px
	}
	.font-21{
		font-size: 21px
	}
	.font-22{
		font-size: 22px
	}
	.f-w-4{
		font-weight: 400;
	}
	.f-w-6{
		font-weight: 600;
	}
	.f-w-7{
		font-weight: 700;
	}
	.f-w-1{
		font-weight: 100;
	}
	.cl-35{
		    width: 35%;
    background: #d8dfde;
	}
	.cl-30{
		   width: 30%;
    background: #d8dfde;
	}
	.cl-40{
		   width: 45%;
    background: #d8dfde;
	}
	.l-s{
		letter-spacing: 1px
	}
	.fo-rm td{
		padding: 17px 40px;
	}
	.fo-rm-index td{
		padding: 7px 30px;
	}
	.fo-rm-index .page-no{
		padding-left: 150px;
	}
	.fo-rm-index{
		padding: 17px 60px;
	}
	.fo-rm-page3 td{
		padding: 10px 25px;
	}
	.number-table td{
		padding: 10px 25px;
	}
	.t-c{
		text-align: center;
	}
	.pos-rel{
	    position:relative;
	}
	.pt-1{
		padding-top: 10px;
	}
	.page2-address{
		padding-top: 10px;
		padding-left: 30px;
	}
	table.bankdetails{ 
        font-size: 14px; 
        width: 100%;
        border-collapse: collapse; 
        padding: 0px;
        border: 1px solid #000;
        border-spacing: 0;
    }
    table.bankdetails tbody tr td { 
        border-width: 1px; 
        border: 1px solid black;
        font-size: 14px;margin: 1px;
        padding-left: 10px;
        padding-top: 1px; 
        border-spacing: 0;
    }
</style>
<body>
	<table width="100%">
        <tr>
            <td rowspan="5" width="20%" align="center"><img src="<?php echo e(asset('logo.png')); ?>" width="140px;" height="95px"></td>
            <td align="center">
            	<?php echo config('settings.company_address'); ?>


            </td>
        </tr>
    </table>
    <hr><hr>
    <br>
	<table  width="100%">
        <tr>
            <td><h4> <?php echo e($subscription->name); ?></h4></td>
        </tr>
        <tr>
            <td><?php echo e($subscription->address_line1); ?></td>
        </tr>
        <tr>
            <td><?php echo e($subscription->address_line2); ?></td>
        </tr>
        <tr>    
            <td><?php echo e($subscription->post_code); ?> <?php echo e($subscription->city); ?>  <?php echo e($subscription['SubscriptionStateAs']['name']); ?> <?php echo e($subscription['SubscriptionCountryAs']['name']); ?>.</td>
        </tr>
	    <tr><td>Date: <?php echo e(date('d/m/yy')); ?></td></tr>
	    <tr><td></td></tr>       
    </table>
    
    <h3>Dear Sir, </h3>
    <h3><u><strong>RE: BANKING DETAILS</strong></u></h3>
	</br>
	<table width="100%" class="bankdetails" cellspacing="0" cellpadding="0">
	    <tr>
			<td><p><strong>Name of Recipient:</strong></p></td>
			<td><p><strong>ZETLAND CONSULTANTS PTE LTD</strong></p></td>
		</tr>
		<tr>
			<td><p>Recipient's Account Number:</p></td>
			<td><p>5760 1730 901</p></td>
		</tr>
		<tr>
			<td><p>Recipient's Contact No:</p></td>
			<td><p>(65) 6557 2071</p></td>
		</tr>
		<tr>
			<td><p>Recipient's Address:</p></td>
			<td><p>137, MARKET STREET, #04-01, GRACE GLOBAL 
			RAFFFLES, SINGAPORE 048943</p></td>
		</tr>
		<tr>
			<td><p>Beneficiary Bank:</p></td>
			<td><p>RHB BANK BERHAD (SINGAPORE)</p></td>
		</tr>
		<tr>
			<td><p>Beneficiary Bank's SWIFT Code:</p></td>
			<td><p>RHBBSGSG</p></td>
		</tr>
		<tr>
			<td><p>Bank Code:</p></td>
			<td><p>7366</p></td>
		</tr>
		<tr>
			<td><p>Beneficiary Bank's Address:</p></td>
			<td><p>JALAN BESAR BRANCH, H01-03, SIM LIM TOWER,    
			SINGAPORE 208787</p></td>
		</tr>

		<tr>
            <?php if($subscription->is_first == 1){ ?>
                <td><p>Initial Investment (USD) : </p></td>
            <?php }else if($subscription->is_first == 0){ ?>
                <td><p>Additional Investment (USD) : </p></td>
            <?php } ?>
            
            <td><p> <?php echo e(money_format(" %i", $subscription->amount)); ?></p></td>
        </tr>
	        <?php
	    		$amount = $subscription->amount;
	    		$subscription_fee =  $subscription->service_charge;
	    		$percent = ($amount * $subscription_fee)/100;
	    		$total = $amount + $percent + 250;
	    	?>
        <tr>
            <td><p><?= $subscription_fee; ?>% Sales Charge (USD) :</p></td>
            <td><p><?php echo e(money_format(" %i", $percent)); ?></p></td>
        </tr>
		<tr>
			<td><p>Escrow Service Fee (USD):</p></td>
			<td><p>250.00</p></td>
		</tr>

        <tr>
            <td><p><strong>Total of Wire Transfer (USD): </strong></p></td>
            <td><p><strong><?php echo e(money_format(" %i", $total)); ?></strong></p></td> 
        </tr>
		<tr>
			<td><p>Charges:</p></td>
			<td><p>All bank charges to be borne by Investors</p></td>
		</tr>

	    
	</table>

	<p>**Kindly email us the wire transfer slip as proof of funding</p>
	<p><strong>Kindly be informed that Zetland Consultants Pte Ltd is the appointed escrow agent</strong></p>
    <br>
    <p>Thank you.</p>
    <p>Olympus Asset Limited</p>
    <p></p>
    <br><br><br>
    <p class="font-12" style="text-align:center;"><b>"This is a computer-generated document. No signature is required"</b></p>

</body>
</html><?php /**PATH /var/www/html/olympus-asset.com/public_html/resources/views/pdf/bankPdf.blade.php ENDPATH**/ ?>