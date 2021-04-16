<?php
  //  header('Content-Type: application/vnd.msword');
   // header('Content-Disposition: attachment; filename="test.doc"');
    //header('Cache-Control: private, max-age=0, must-revalidate'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	@page {
        size: A4;
		li {
			list-style-type:none !important;
		}
    }

	@media print {
    table.paging thead td, table.paging tfoot td {
        height: .5in;
    }
}
.header {
  margin-bottom:20px;
  overflow :auto;
}

.content {
  width: 100%;
  padding : 10px;
  border-bottom : 1px solid;
  
}

@media print {
  button {
    display :none;
  }

}

table{
	width: 100% !important;
	text-align: left
}

	</style>
</head>
<body>
	<table style = "margin:auto">
	  <thead>
		<tr>
			<th>
			  <div class = "header">
				<img src="{{ asset('header.jpeg') }}" width="100%" height="100px">
			  </div>
			</th>
		  </tr>
		</<thead>
		<tbody>
		  <tr>
			<td>
			 
			  <div class="content">
				<div class="container">
					<div style="margin-top:24px">
			
						<div>
							<p style="text-align: center"><span style="text-decoration: underline;">Kind Attn.</span><span style="color: #e57062;font-size: 23px;text-transform: capitalize;"> {{ $data['contact_person_name'] }}</span></p>
						</div>
						<div style="width: 50%">
							<ul class="personAddress">
								<li style="list-style-type: none;">
									<p style="padding: 3px 0px;margin: 0;font-weight: bold;">{{ $data['name_of_company'] }}</p>
								</li>
								<li style="list-style: none;">
									<p style="padding: 3px 0px;margin: 0;font-weight: bold;">{{ $data['address'] }}</p>
								</li>
								<li style="list-style: none;">
									<p style="padding: 3px 0px;margin: 0;font-weight: bold;">{{ $data['phone'] }}</p>
								</li>
								<li style="list-style: none;">
									<p style="padding: 3px 0px;margin: 0"><span style="font-weight: bold;">E-mail:</span> {{ $data['email'] }}</p>
								</li>
							</ul>
						</div>
						<div style="width: 100%">
							<ul >
								<li style="list-style: none">
									<span style="font-weight: bold;">Date: {{ date('d M, Y') }}</span>
								</li>
								<li style="list-style: none;text-decoration: underline;">
									SUB: Quotation for {{ $data['item_name'] }} {{ $data['item_model'] }}
								</li>
							</ul>
						</div>
						<div >
							<p style="text-align: center">This refers to your inquiryregarding your requirement of {{ $data['item_name'] }}. As desired by you, we are pleased to submit herewith, our best proposal as under:</p>
						</div>
						<div >
							<ul>
								<li style="list-style: none;text-align: center;font-size: 27px;font-weight: bold;">
									{{ $data['item_name'] }}
								</li>
								<li style="list-style: none;text-align: center;font-size: 27px;font-weight: bold;">
									Model: {{ $data['item_model'] }}
								</li>
							</ul>
						</div>
						<div style="text-align: center">
							<div class="row">
								@if($data['attachement1'] != null)
								<div class="col-md-6">						
									<img src="{{ asset('uploads/'.$data['attachement1']) }}"width="30%">
								</div>
								@endif
								@if($data['attachement2'] != null)
								<div class="col-md-6">
									<img src="{{ asset('uploads/'.$data['attachement2']) }}"width="30%">
								</div>
								@endif
			
								@if($data['attachement3'] != null)
								<div class="col-md-6">
									<img src="{{ asset('uploads/'.$data['attachement3']) }}"width="30%">
								</div>
								@endif
			
								@if($data['attachement4'] != null)
								<div class="col-md-6">
									<img src="{{ asset('uploads/'.$data['attachement4']) }}"width="30%">
								</div>
								@endif
							</div>
						</div>
						<div>
							<h3 style="text-align: center;text-decoration: underline;">MACHINE WITH STANDARD ACCESSORIES</h3>
						</div>
						<div>
							<table style="font-family: Arial, Helvetica, sans-serif;
							border-collapse: collapse;" width="100%">
								<tr>
									<td style="border: 1px solid black;
									padding: 8px;">
										<ul>
											<li style="padding: 2px 0px;list-style: none; font-weight: bold;">
												Model: {{ $data['item_model'] }}
											</li>
											<li style="padding: 2px 0px;list-style: none">
												Model: {{ $data['item_name'] }}
											</li>
											<li style="padding: 2px 0px;list-style: none">
												{{$data['description']}}
											</li>
										</ul>
									</td>
									<td style="border: 1px solid black;
									padding: 8px;">
										<ul>
											<li style="list-style: none">
												<h4 style="margin: 17px;list-style: none;text-align: center;font-size: 26px">Rs {{ $data['price'] }}</h4>
											</li>
											<li style="list-style: none">
												<p style="list-style: none;text-align: center;">
												{{ \App\http\Controllers\Admin\GenerateexcelControler::numberTowords($data['price']) }}
												</p>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
						<div>
							<ul>
								<li style="list-style: none">
									Our proposal consists of the following:
								</li>
								<li style="list-style: none">
									1)Technical Specification sheet
								</li>
								<li style="list-style: none">
									2)Commercial terms and conditions
								</li>
								<li style="list-style: none;margin-left: 30px">
									<p>
										We hope you shall find the proposal and technical specifications therein, well in line with your requirement. If you have any futher query or need any assistance with the proposal, please do not hesitate to call or email us.
									</p>
									<p>
										Thank you one again for consideringEsskay Lathe and Machine Tools for your machine requirement. We assure you of best service and attention at all times.
									</p>
								</li>
							</ul>
						</div>
						<div style="text-align: center">
							<ul>
								<li style="list-style: none">
									<h4 style="text-align: center;text-decoration: underline;font-weight: bold;font-weight: bold;padding-bottom: 0;margin-bottom: 3px;">TECHNICAL SPECIFICATION SHEET</h4>
								</li>
								<li style="list-style: none ;text-align: center;font-weight: bold;">
									{{ $data['item_name'] }}
								</li>
								<li style="list-style: none;font-weight: bold;padding-bottom: 0;margin-bottom: 3px;text-align: center;">
									Model: {{ $data['item_model'] }}
								</li>
							</ul>
			
							<div style="text-align: center">
								{!! $data['technical_spec'] !!}
							</div>
						</div>
						<div style="margin-top:10px !important">
							{!! $data['other_terms'] !!}
						</div>
						<div style="margin-top:10px !important">
							{!! $data['commercial_terms_condition'] !!}
						</div>
						<div>
							<h3 style="text-align: center;text-decoration: underline;">QUOTATION ACCEPTANCE FORM</h3>
							<p>If you wish to accept this quotation, please complete this form in full& send us back along with the Purchase Order.</p>
							<p>BUSINESS NAME:.............................................................................................</p>
							<p>BUSINESS ADDRESS: ..................................................................................................................................................................................................................</p>
							<p>Pin code:..........................</p>
							<p>Tel:................................................... </p>
							<p>Fax:.........................................................</p>
							<P>Contact Name: (in caps)................................................................................</P>
							<P>Email................................................................................</P>
							<P>Date of Quotation................................................................................</P>
							<P>Value................................................................................</P>
							<P>Agreed Supply/Installation Date:................................................................................</P>
						</div>
						<div>
							<p>The customer accepts, by signature given below, <span style="font-weight: bold">ESSKAY LATHE AND MACHINE TOOLS</span>. quotation and the Terms and Conditions(both commercial and General Terms & Conditions), as attached, and authorizes ESSKAY LATHE AND MACHINE TOOLSto carry out the work detailed therein.</p>
							<p>Signature for and on behalf of the customer:</p>
							<p>Name (block caps):..........................................................................................</p>
							<p>Position held: ...................................................................................................</p>
							<p>Signature:........................................................................</p>
							<p>Date:........................</p>
						</div>
						<div>
							<h3>General Terms & Conditions of the Sale</h3>
							<div>
								<h4>1. General</h4>
								<ul>
									<li style="list-style: none">
										(i) The acceptance of this quotation signifies acceptance of the following terms and conditions of sale.
									</li>
									<li style="list-style: none">
										(ii) The terms and conditions herein set forth apply to any order(s) placed with ESSKAY Lathe and Machine Tools(hereinafter called “the Company”) by any other party (hereinafter called “the Customer”) ordering goods (hereinafter called “the Goods”) manufactured or supplied by the Company or any othermanufacturer (hereinafter called “the Supplier”).
									</li>
									<li style="list-style: none">
										(iii) Orders received by the Company in writing, by facsimile or by email are binding on the Customer and incorporate these terms and conditions.
									</li>
									<li style="list-style: none">
										(iv) Written quotations and estimates issued by the Company are valid for a period of 30 days from the date thereof or as otherwise stated. Receipt of the Company’s acceptance form by the Company after the said period of 30 days or as otherwise stated shallhave expired(hereinafter called“the late acceptance”) shall not constitute a valid order unless the Company confirm the late acceptance in writing to the Customer.
									</li>
									<li style="list-style: none">
										(v) Valued Added Tax (or any similar tax levy or impost) is not included in any prices contained but isor will be charged as required by law as an extra over and above the prices charged for the Goods.
									</li>
									<li style="list-style: none">
										(vi) If the Company’s acceptance form shall not be used by the Customer when placing an Order any printed terms and conditions contained in the Customer’s order form shall be deemed not to be included in the acceptance of the quotation and shall not form part of the agreement for the saleor supply of goods or services by the Company and these terms and conditions shall prevail.
									</li>
									<li style="list-style: none">
										(vii) The Company will use its best endeavors to comply with the design and manufacture of the Goods in accordance with the measurements and descriptions contained in the Quotation. The Company reserves the right to alter or vary such design or manufacture or use materials different fromthose stated in the Quotation if the Company shall at its sole discretion deem it necessary to do so.
									</li>
									<li style="list-style: none">
										(viii) As soon as reasonably practicable after the Customer has placed its order with the Company, the Company will place an order for the manufacture ofthe goods and will incur or have committed itself to incur substantial expenditure. If the Customer cancels the order at any time afteracceptance by the Company then the Company shall be entitled to make a reasonable charge for the Goodsand for the services provided by the Company but such a charge shall not be less than 50% of the contract price, being a fair and proper pre-estimate of the Company’s loss as theCustomer hereby acknowledges and confirms.
									</li>
								</ul>
							</div>
			
							<div>
								<h4>2. Delivery</h4>
								<ul>
									<li style="list-style: none">
										(i) The Company will,to the best of itsability,observe the Customer’s instructions concerning dates of delivery of the Goods but any delivery date given is an indication only offered in good faith and the Company does not guarantee this date and shall not beheld responsible for claims fordamages which may arise out of delayed delivery.
									</li>
									<li style="list-style: none">
										(ii) If deliveries by the Company or its servants or agents are delayed due to industrial disputes,fire breakdown of machinery or delivery transport, shortage of machinery or labour or from any other circumstances beyond the Company’s control the Company shall not be held responsible for thedelay arising from any such matters and the term of this Agreement shall be extended until delivery is affected.
									</li>
									<li style="list-style: none">
										(iii) The Customer will be responsible for any damage or loss of materials after the Customer has provided a signed acceptance of Goods received on the Customer’s premises, whether awaiting installation or supply and delivery only by the Company.
									</li>
									<li style="list-style: none">
										(iv) If having agreed a delivery/installation date the Customer postpones the said date (as stated in the Company’s acceptance form unless extended by agreement) the Company is entitled to be paid by the Customer on the agreed delivery and/or installation date for the full price of thecontract. The agreed delivery and/or installation date shall be the invoice date for payment purposes as set out in paragraph 5 below.
									</li>
									<li style="list-style: none">
										(v) If the Customer postpones the agreed delivery and/or installation date (as stated overleaf unless extended by agreement) and the Goods are returned to the Company, the Company reserves the right to make a charge to the Customer for storage at a rate of at least 10% of the contractprice every month or any proportion thereof the Goods are held in storage. In addition the Company reserves the right to charge theCustomer reasonable transportation and handling costs when accepting the return of goods following postponement of the agreed delivery and/or installationdate.
									</li>
								</ul>
							</div>
							<div>
								<h4>3. Dispatch</h4>
								<ul>
									<li style="list-style: none">
										(i) Unless otherwise instructed by the Customer the Company will arrange for the most economical form of transport of the Goods for the Company as if in its absolute discretion shall think fit. If special instructions are given to the Company by the Customer, the Customer will reimburse theCompany with any cost of transport in accordancewith those special instructions: such costs oftransport being paid in advance of dispatch if the Company, in its sole absolute discretion shall so determine.
									</li>
									<li style="list-style: none">
										(ii) The Company reserves the right to charge the Customer transport and handling costs if and when accepting the return of Goods incorrectly ordered.
									</li>
								</ul>
							</div>
							<div>
								<h4>4. Claims</h4>
								<ul>
									<li style="list-style: none">
										(i) Any claims for damage,shortage or finish must be reported immediately in writing but no later than three working days from (and including) the day of delivery and/or installation. No claim from the customer shall be accepted after this period.
									</li>
									<li style="list-style: none">
										(ii) The Company does not accept liability for injuries,expenses,losses or damage caused by incorrect faulty or improper assembly of and/or installation by the Customer. Advice on assembly and installation is available upon request from the Company’s technical division.
									</li>
								</ul>
							</div>
							<div>
								<h4>5. Payment</h4>
								<ul>
									<li style="list-style: none">
										(i) Unless specifically agreed otherwise by the Company in writing,payment must be made, once the customer receives the pro-forma invoice from the Company, before the dispatch of the goods.No alleged set-off or counter claim by the Customer against the Company may be deducted in settlement. In the event that the account having become due,inaccordance with the terms of this clause,is not paid then and in any such event,the Company reserves the right and hereby gives notice to the Customer of such a right to charge interest on all sums due and outstanding at the rate of 18% rate per calendarmonth,on a day to day basis.
									</li>
									<li style="list-style: none">
										(ii) The Company reserves the right torequire the Customer to make one or more interim payments against the value of materials and work executed and such payment must be made by the Customer to the Company within thirty days of its demand failing whichthe Company reserves itsrights to chargeinterest under paragraph 5(i) above.
									</li>
								</ul>
							</div>
							<div>
								<h4>6. Notices</h4>
								<ul>
									<li style="list-style: none">
										(i) Notices to be given by the Company to the Customer hereunder shall be sent to the registered office or the last known address of the customer by first class post, facsimile or email. Notices to be given by the Customer to the Company shall be sent to the Company at MS-2B, G-11, NEW SIYAGANJ , INDORE]. Any notice posted by first class post shall be deemed to have been received 24hours after the time of posting and any notice given in any other manner shall be deemed to have been received at the time when in the ordinary course itmay be expected to havebeen received but any such facsimile or email received after 4.00 p.m. shall be deemed to have been received at any time on the next working day. In proving service of any notice it shall be sufficient to prove that delivery was made or that the envelope containing thenotice was properly posted or that the facsimile or email was properly addressed and sent as the case may be.
									</li>
									<li style="list-style: none">
										(ii) In this paragraph a “working day” shall be any day during Monday to Saturdayexcept any Bank and Public Holiday in India.
									</li>
								</ul>
							</div>
							<div>
								<h4>7. Miscellaneous</h4>
								<ul>
									<li style="list-style: none">
										(i) If the above conditions are not complied with in full,the Company reserves the right to cancel all existing contracts and agreements between the Company and the Customer and upon doing so,all outstanding sums due to the Company from the Customer shall become immediately due andpayable.
									</li>
									<li style="list-style: none">
										(ii) Any variation in the obligations of the Company or the rights of the Customer under these general terms and conditions of sale shall be binding only if it is recorded in a written document signed on behalf of the Company.
									</li>
									<li style="list-style: none">
										(iii) These general terms and conditions of sale in all respects be constructed to operate in conformity with IndianLaw only and all transaction will be subject to IndianLaw and the forum for any dispute shall be the Indore Jurisdiction.
									</li>
								</ul>
							</div>
							<div>
								<p>SIGNATURE OF THE CUSTOMER</p>
							</div>
						</div>
					</div>
				</div>
			  </div>
			 
			  
			  
			</td>
		  </tr>
	   </<tbody> 
		  
	 
	</table>  

</body>
</html>

<script>
	window.print();
document.getElementsByTagName("BODY")[0].onafterprint = function() {
    window.close();     
};
</script>