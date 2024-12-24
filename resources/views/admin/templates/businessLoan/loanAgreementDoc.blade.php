<section class="content-header">

<h1>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
                <a target="_blank" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>
</h1>

<ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">FD Account - {{$row->account_no}}</a></li>
    <li class="active">Receipts</li>
</ol>
</section>

<section class="content">
        <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">
                <div class="form-horizontal" id="printDiv">
                    <style>
    body {
        margin: 0;
        padding: 0;
    }

    @page {
        size: auto; /* auto is the initial value */
        margin: 5mm 5mm 5mm 5mm;
    }

    @media print {
        @page {
            size: portrait
        }
    }

    #scissors div {
        position: relative;
        top: 50%;
        border-top: 1px dashed gray;
        margin-top: -3px;
    }

    .reporttable {
        font-family: Calibri;
        border-collapse: collapse;
        font-weight: 400;
        font-size: 11px;
        line-height: 1.42857143;
        color: #333;
        width: 100%;
    }

        .reporttable td, .reporttable th {
            border: 1px solid #ddd;
            padding: 2px;
        }

        .reporttable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
        }

    printDiv table, p {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    table, p {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    printDiv li {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }

    ol li {
        font-family: Calibri;
        font-weight: 400;
        font-size: 12px;
        color: #333;
    }
</style>
                    <style type="text/css">table, p {
                font-family: Calibri;
                font-weight: 400;
                font-size: 16px;
                color: #333;
            }

            li {
                font-family: Calibri;
            }
</style>
<div style="padding-left:20px;padding-right:20px;"><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
&nbsp;
<p style="font-size:26px;font-weight:bold;text-align:center;"><u>LOAN AGREEMENT</u></p>

<p><strong>&nbsp;</strong></p>

<p>This <strong>LOAN AGREEMENT(“Agreement”) </strong>is made at the place and on the date as stated in the schedule 1 hereunder written ( “the Schedule 1”) BETWEEN <strong>   <b> {{@$row->customer->name}}</b></strong> more fully described in the Schedule 1 hereinafter referred to as <strong>“the Borrower” </strong>(which expression shall, unless repugnant to the context or meaning thereof, be deemed to mean and include his / her / its / their respective heirs, administrators, executors, legal representatives of the First part</p>

<h1 style="font-size:18px;font-weight:bold;text-align:center;">And</h1>

<p>The Person mentioned as Guarantor(s) in Schedule 1 (hereinafter referred to as <strong>“Guarantor(s)” </strong>which expression shall unless it be repugnant to the context or meaning thereof, be deemed to mean and include its successors and permitted assigns) of the Second Part, if any;</p>

<h1 style="font-size:18px;font-weight:bold;text-align:center;">And</h1>

<p><b>EAST INDIA MCS LTD</b>, a CO OP Society Company incorporated under the Companies Act 2013 having its Registered office at <b><i> HEAD OFF. SIXMILE GUWAHATI  KAMRUP METRO-781022 Assam</i></b> , and an office at the address mentioned in Schedule 1, hereinafter referred to as the <strong>“Lender”</strong>, which</p>

<p>Expression shall, unless it be repugnant to the subject or context thereof, shall mean and include its successors, transferees and assigns, of the Other Part.</p>

<p>The Borrower, the Guarantor(s) and the Lender shall hereinafter be referred to individually as “<strong>Party</strong>” or collectively as “<strong>Parties</strong>”.</p>

<h3>WHEREAS</h3>

<ol>
    <li>The Lender is engaged in the business of Lending and Accepting Deposits from its Members (A Business of Nidhi Company ) Company in accordance with Nidhi Rules, 2014</li>
    <li>The Borrower is engaged in carrying on bonafide business activities as set out in Schedule</li>
    <li>The Borrower is a individual and also member of the company, competent to execute this Agreement and that there are no suits, actions or proceedings against the Borrower pending before any court of law, which might affect the Borrower in performance of the obligations</li>
</ol>

<h3>NOW, THEREFORE, THE PARTIES HEREBY AGREE AS UNDER:</h3>

<ol>
    <li>The Borrower had approached the Lender for a Loan amount as stated in Schedule 1 (the loan amount hereinafter shall be referred to as ‘the loan’ or “Loan” or “Loan Amount”) on the terms, conditions and the purpose as stated / contained in this Agreement and / or in the Borrower’s application for the loan.</li>
    <li>The Lender hereby grants to the Borrower and the Borrower agrees to avail from the Lender, a financial assistance of a Loan Amount on the terms and conditions contained in this Agreement. The Tenure, interest rate (“Interest”) and the schedule of repayment in respect of the Loan shall be as specified in Schedule 1 as set out herein or as may be amended in accordance with this agreement from time to</li>
    <li>The Borrower has requested the Lender to disburse the Loan in the manner specified in Schedule 4 hereto.</li>
    <li><b>Fees </b> The Borrower agrees to pay to the Lender the fees as set out in Schedule 2. The Borrower hereby authorises the Lender to deduct these amounts together with applicable taxes from the Loan Amount and to pay to the Borrower only the balance amount. The Borrower hereby confirms that irrespective of deduction of such fees, the obligation of the Borrower to repay to the Lender shall be of the entire Loan Amount along with Interest, and other charges together with applicable taxes in terms of this Agreement. The fees paid / deducted by the Lender is to meet the out of pocket expenses and the same is non- refundable/ non-adjustable.</li>
    <li><strong>Repayment</strong>
    <ol type="a">
        <li>In consideration of the Lender extending the “Loan”, the Borrower and the Guarantor shall jointly and severally repay the Loan along with Interest in accordance with the Repayment Schedule set out in <strong>Schedule 1</strong> of this Agreement. The Borrower hereby confirms having perused, understood that the interest is applied on the principal on a daily basis and agreed to the method of computation of EMI and the effective or Annualized rate of interest as stipulated in Schedule 1. The Borrower further agrees to pay the EMI as per schedule hereto and shall also pay overdue interest arising out of the default in repayment of installments, any other charges such as Bank charges, pre-payment charge etc., as per schedule 3 together with Goods and Services tax and all other statutory taxes and levies as be applicable from time to time.</li>
        <li>The Borrower hereby confirms that it has provided to the Lender the details of the bank account of the Borrower where all the receipts / receivables / income of the Borrower is being credited and the Borrower hereby confirms that it shall issue binding irrevocable instructions to the said bank to debit the account periodically with the amounts due to the Lender as set out in this Agreement. Further, the Borrower hereby confirms that it will not divert this income / inflow to any other bank account till such time the dues to the Lender remain under this Agreement.</li>
        <li>The Borrower shall unconditionally and irrevocably authorize the Bank through Standing instructions or Electronic Clearing System (ECS) instructions / ACH to debit the Borrower account towards the dues payable to the Lender. The Borrower further agrees to maintain sufficient balance in the account to enable his / her /its Bankers to facilitate the debit of the account, and remittance of the amount so debited to the credit of the Lender. Alternatively, where the ECS / ACH facility is not available for the Borrower, the Borrower may issue to the Lender post dated cheques (PDC) towards repayment of the installments / dues arising under this Agreement and undertakes that sufficient balance will be made available for honouring the cheques on the due date as and when presented for payment by the Lender on or after the due date.</li>
        <li>The Borrower, subject to the prior permission of the Lender may swap the PDC’s issued or request for other mode of payment towards discharge of the liability and such swap of PDC’s and / or change of mode of Payment to ECS / ACH, if permitted by the Lender shall be subject to payment of Swap charges as specified in schedule 3, hereto. Permitting Swap of other mode of payment is at the sole discretion of the Lender.</li>
    </ol>
    </li>
    <li><strong>Pre- payment</strong>
    <ol type="a">
        <li>The Borrower shall not prepay / foreclose any portion of the outstanding loan amount either in part or full during the Lock-in period (“Lock-in Period”) as set out in Schedule 1 of this</li>
        <li>The Borrower may exercise the option of pre-payment post Lock-in-period, where applicable, subject to the Borrower and the guarantor complying with the following conditions and at the absolute discretion of the Lender. After the expiry of Lock-in Period as provided in Schedule 1 hereunder, the Borrower shall give the Lender a notice of 21 days intimating his desire to pre-pay the loan and the Lender may accept pre-payment together with pre-payment charges / foreclosure charges as specified in Schedule 3, hereto and such charges is payable by the Borrower together with applicable .</li>
        <li>The amount pre paid shall be first used to credit the overdue interest , bank charges, legal expenses if any, Arrears of installments, interest due upto date for the current month, The current month EMI, foreclosure / pre-payment charges and other expenses and taxes due as mentioned in this agreement. If any amount remains after meeting the charges then it shall be adjusted towards the principal amount. If the entire amount due for prepayment is not remitted then the amount so received by the Lender would be treated as an advance payment of future EMI and will be adjusted to EMI month on month, as and when the EMI falls due for payment. The Borrower hereby agrees that the Lender is not obliged to reverse the interest that may accrue on account of advance payment. The amount due under foreclosure should be paid in full by the Borrower to the Lender to qualify the account</li>
        <li>If the loan is being foreclosed by the Borrower by obtaining financial assistance from any other financial institution / Bank / NBFC / Third party, the Borrower shall be charged additional prepayment/foreclosure charges at the rate specified in Schedule 3 herein, which is payable together with applicable Goods and Service Tax (GST) by the Borrower in addition to the applicable foreclosure</li>
        <li>If the Borrower requests for pre-payment during the Lock-in period, then the Lender is at liberty to refuse the pre-payment or in the alternative lay down conditions for acceptance at its discretion which the Borrower is at liberty to accept or otherwise. Notwithstanding anything contained the Borrower shall remit the monthly installments without any default in terms of the Agreement. The Option to accept pre-payment or decline the request for pre-payment during the Lock-in period is at the sole discretion of the</li>
    </ol>
    </li>
    <li><strong>Security</strong>
    <ol type="a">
        <li>In consideration of the Lender granting the Loan and as a security for the same, the Borrower and/or the Guarantor(s) hereby agree(s) to create security (free from any charge) in favour of the Lender over the assets as set out in Schedule 5 herein (hereinafter collectively referred to as the “Security”). The Borrower and / or the Guarantor hereby authorizes the Lender to create charge, if lender agrees to create charge over the said assets in favour of the Lender by registering of charges with various authorities, and the cost incurred by the Lender for creation of such charges shall be borne by the Borrower and shall be paid by the Borrower upfront or at the time of registration of the charge and in the event of not remitting the same, the Lender may debit such amount to the loan account of the Borrower and the Borrower agrees to repay the same together with interest at the rate as specified in the schedule</li>
        <li>The Security provided under this Agreement shall be for repayment of the Loan together with the interest and other obligations herein of the Borrower and Guarantor towards the Lender. At no point of time the Borrower and/or the Guarantor(s) shall be allowed to withdraw any Security or part of it provided hereunder except with the prior written consent of the Lender, which consent may be given at the discretion of the</li>
        <li>If at any point of time, in the view of Lender, the Security provided by the Borrower and/or the Guarantor(s) under this Agreement is not sufficient to cover the entire loan amount, then, the Lender may, require the Borrower and/or the Guarantor(s) to provide such additional security in such manner and form as may be required by the Lender in this regard, and the Borrower and/or the Guarantor(s) hereby agrees to provide the additional security within the time period as stated by the</li>
        <li>The liability of the Borrower and the Guarantor(s) shall be joint and several, notwithstanding that any Security or Securities comprised in any instrument(s) executed or to be executed by the Borrower and/or the Guarantor(s) in favour of the Lender shall, at the time when the proceedings are taken against the Borrower or Guarantor(s) under the guarantee or other security documents be outstanding or unrealized or lost.</li>
        <li>The Borrower and the Guarantor(s) hereby agree that, the Lender shall have right of lien over all the assets of the Borrower and the Guarantor(s) for the Loan availed by the Borrower either under this Agreement or under any other agreement or financial assistance availed by the Borrower from the Lender. The Borrower and Guarantor(s) hereby agree that they shall not in any way, dispose off their assets without the prior written consent of the</li>
    </ol>
    </li>
    <li><strong>Event of Default</strong>
    <p>The happening of the following events shall constitute an event of default (“Event of Default”)</p>

    <ol type="a">
        <li>Any non-compliance by the Borrower and/or the Guarantor(s)of the terms &amp; conditions of this Agreement or any other agreement entered into in respect of this Loan or any other financial assistance availed of by the Borrower from the Lender;</li>
        <li>Any breach of this Agreement by the Borrower and/or the Guarantor;</li>
        <li>Non adherence to the Repayment Schedule;</li>
        <li>Insolvency of the Borrower / the Guarantor(s) and inability of the Borrower to repay their debts;</li>
        <li>Any concealment of any material document or event by the Borrower / Guarantor(s);</li>
        <li>Submission of any forged document by the Borrower / Guarantor(s);</li>
        <li>Any other event which in the sole opinion of the Lender would endanger the repayment of the Loan</li>
    </ol>
    </li>
    <li><strong>Consequences of an Event of Default</strong>
    <ol type="a">
        <li>The entire Loan Amount along with Interest for the entire period shall immediately become due and payable, and the Lender shall have the right to recall the entire loan together with interest for the entire period, the overdue interest arising on account of default, Bank charges and other Charges, as mentioned in Schedule 3 hereunder;&nbsp; All charges are payable by the Borrower together with applicable</li>
        <li>Lender shall be entitled to enforce the Security, if any available;</li>
        <li>Lender shall be entitled to proceed against and take any action against the Borrower and / or the Guarantor(s) in order to realize the Loan Amount along with Interest, Charges and expenses;</li>
        <li>In addition to the rights specified in this Agreement, the Lender shall be entitled to take all or any action with or without intervention of the Courts to recover the monies due and payable by the Borrower and/or the Guarantor(s) under this Agreement.</li>
        <li>Notwithstanding any other rights available to the Lender under this Agreement, the Lender shall be entitled to initiate criminal proceeding or any other appropriate actions against the Borrower and /or the Guarantor(s) if at any time the Lender at its sole discretion has sufficient grounds to believe that the Borrower and /or the Guarantor(s) has / have made any misrepresentations and / or submitted any forged documents or fabricated data to the</li>
        <li>All rights and powers conferred on the Lender under this Agreement shall be in addition and supplemental to any rights the Lender has as a creditor against the Borrower and/or the Guarantor(s) under any law for the time being in force and security documents and shall not be in derogation</li>
    </ol>
    </li>
    <li><strong>Insurance</strong>
    <ol type="a">
        <li>The Lender has indicated to the Borrower / Guarantor about the availability of insurance cover. The Borrower and / or Guarantor may opt for a Life Insurance cover and / or insurance for Fire and / or Burglary and have explicitly indicated the option for insurance cover in the application form. The Borrower / Guarantor hereby acknowledge that the insurance cover is optional and is at the request of the Borrower. It is clearly understood by the Borrower and the Guarantor that the Lender is not liable for admission of any claim by the insurance company and the settlement thereto.</li>
        <li>The Borrower hereby authorizes the Lender to receive any amount that may be paid by the Insurance Company / Government body, as against any insurance policy that may have been taken by the Borrower ( at the option of the Borrower), and appropriate the same to the loan account of the Borrower. In the event the claim amount is not sufficient to cover the liability in the account, the Borrower hereby undertakes to remit the balance due under this Agreement. The discharge given by the Lender to the Insurance Company on behalf of the Borrower is binding on the Borrower and the Borrower / Guarantor(s) shall not dispute the same.</li>
    </ol>
    </li>
    <li><strong>Waiver of certain rights by the Guarantor</strong>
    <p style="font-family:Calibri;font-size:small;  ">The Guarantor(s) hereby agrees to the following:</p>

    <ol type="a">
        <li>The liability of the Guarantor(s) under this Agreement shall in no manner be affected by any variations, acts or forbearance, or by reason of time extended to the Borrower, or of any other forbearance act or omission on the part of the Security or by any other matters or things whatsoever which under the law relating to sureties would but for this provision have the effect of so releasing the Guarantor(s).</li>
        <li>Any variance made without the Guarantor's consent, in the terms of this Agreement, shall not discharge the Guarantor(s) from his / its obligations under this Agreement or as to terms subsequent to such variance.</li>
        <li>The Guarantor(s) shall not be discharged by any contract between the Lender and the Borrower, by which the Borrower is released, or by any act or omission of the Lender, the legal consequence of which is the discharge of the</li>
        <li>Any contract between the Lender and the Borrower, without the consent of the Guarantor(s), by which the Lender make a composition with, or promises to give time, or not to sue the Borrower, shall not discharge the Guarantor(s).</li>
    </ol>
    </li>
    <li><strong>General Terms and Conditions</strong>
    <ol type="a">
        <li>The Borrower and Guarantor(s) are liable to repay the dues as per repayment schedule whether demanded or</li>
        <li>The Borrower shall at all times adhere to the terms and conditions set out in this Agreement and any amendments</li>
        <li>The Lender shall have the right to appropriate the amounts paid by the Borrower in such manner, at the sole discretion of the</li>
        <li>The Borrower / Guarantor shall be liable to pay / bear all taxes including GST that may be applicable from time to</li>
        <li>The Lender shall at any time, at its absolute discretion have the right to combine or consolidate or divide into two or more of any of the accounts of the Borrower accounts with the Lender and/or set-off or transfer or appropriate any sum or sums standing in the credit of any one or more of such accounts in or towards part or full satisfaction of the liabilities of the Borrower on any other account or any</li>
        <li>Without prejudice to any rights of the Lender, the Lender shall have a paramount lien and right of set-off against all monies of the Borrower standing to the credit of the Borrower in any account(s) of the Borrower with the Lender or its group companies / associate concerns and the Borrower authorizes the Lender to debit the account(s) of the Borrower with the Lender and / or request the Group Companies / Associate concerns for payment of the money standing to the credit of the Borrower, to and in favour of the Lender, to apply to any debit balance which the Borrower is liable to repay on any account of the Borrower or as a Guarantor for any other account with the Lender / group companies / associates in (part) satisfaction of any sum, whether for principal or interest or otherwise due and payable by the Borrower to the Lender under this Agreement. The Borrower hereby agrees to pay to the Lender the outstanding amount if any in the loan account even after the credit of the amount from other accounts / the Group Companies /</li>
        <li>Nothing contained herein shall prejudice or adversely affect any general or special lien or right to set-off to which the Lender is or may by law or otherwise be entitled, or any rights or remedies of the Lender including in respect of any present or future security, guarantee, obligations of the</li>
        <li>It is hereby accepted by the Parties that the amounts stated by the Lender as due from the Borrower, shall be final and conclusive proof of the correctness of any sum claimed by the Lender to be due from the Borrower in respect of this Agreement, a statement of account made out from the books of the Lender, without production of any voucher, documents or other papers whether in support thereof or otherwise and the Parties hereby agree that the same shall not be disputed by the Borrower and /or the Guarantor(s).</li>
        <li>The right of the Lender to recover the dues from the Borrower shall be exercised either by the Lender or its authorized representatives and the Borrower hereby agrees to the same.</li>
        <li>The Lender shall be entitled to assign / securitize its receivables from the Borrower and the Borrower and/or the Guarantor(s) hereby consent to the Lender exercising such</li>
        <li>The Borrower shall not give or pay to the Guarantor(s) or any other person who agrees to incur any obligation for the Borrower in favour of the Lender, any monies or other consideration or remuneration, whether by way of commission, brokerage or fee or in any other form whatsoever or howsoever for giving or confirming the personal guarantee or</li>
        <li>The Borrower shall during business hours permit the Lender to inspect the place of business / residence of the Borrower and also agrees to produce any documents / additional documents as may be required by the Lender from time to time. Further, the Borrower and the Guarantor hereby agrees to permit the Lender and its authorized representatives to contact / meet the Borrower / Guarantor at their place of residence for collection of dues under this</li>
        <li>The Borrower agrees to pay all the applicable charges as per schedule together with all taxes as may be applicable from time to</li>
        <li>Without prejudice to any other rights available to the Lender, in the event the Borrower commits a default in the repayment of the Loan, the Lender at its sole discretion shall make an application to the Adjudicating Authority (as defined in the Code) and proceed under the Insolvency and the Bankruptcy Code, 2016 (“Code”) in order to realize the Loan Amount along with</li>
        <li>The Borrower and Guarantor hereby agree that the Borrower may seek any further loan facility from the Lender and any such further loan granted by the Lender to the Borrower shall be repaid by the Borrower / Guarantor on terms that may be communicated by the Lender to the Borrower / Guarantor from time to time. For this purposes, the Parties hereby agree that any confirmation for further loan facility as confirmed and accepted by the Borrower over the phone is binding on the Borrower and that the Borrower / Guarantor agrees to repay such loans granted based on oral confirmation (voice call), together with interest, month on month by way of equated monthly installments as may be communicated by the</li>
    </ol>
    </li>
    <li><strong>Cost and Expenses</strong>
    <ol type="a">
        <li>The Borrower and Guarantor(s) shall bear all costs and other expenses incurred in relation to the completion of this Agreement and in complying with the terms and conditions of this Agreement, including any and all costs incurred in connection with this Agreement.</li>
        <li>The Borrower and Guarantor(s) hereby confirm their liability and shall reimburse / pay any tax that the Lender may have to pay to the Government, in respect of the transactions under this</li>
        <li>The Borrower and the Guarantor(s) hereby authorise the Lender at the cost and risk of the Borrower to engage one or more person(s) / agencies to verify any fact or information furnished by, concerning and pertaining to the Borrower and Guarantor(s) and collect the outstanding amount and / or to enforce any security and may furnish to such person/s such documents, information, facts and figures as it may deem</li>
        <li>Any claim, demands, actions, costs, expenses and liabilities incurred or suffered by the Lender by reason of non-payment or insufficient payment of stamp duty by the Borrower on this Agreement and the documents and any other writings or documents which may be executed by the Borrower pursuant to or in relation to this Agreement, will be to the cost of the</li>
        <li>The Borrower and Guarantor(s)hereby unconditionally and irrevocably agree to pay to the Lender a sum as specified in Schedule 3 towards cancellation of the Agreement, if the loan is not availed / if the request for loan is withdrawn or rejected, on execution of this Agreement. This would be in addition to the cost of stamp duty, registration charges and other expenses that may have been incurred by the Lender on behalf of the Borrower. The said charges shall be paid by the Borrower together with all applicable</li>
        <li>The Borrower hereby undertakes to reimburse / pay charges as per Schedule 3 here below to the Lender for every visit by the representative of the Lender to the premises of the Borrower for collection of the dues outstanding from time to</li>
    </ol>
    </li>
    <li><strong>Representations and Warranties</strong>
    <ol type="a">
        <li>The Borrower represents and warrants that:
        <ol type="i">
            <li>His / its execution, delivery and performance of this Agreement are within his / its powers and have been duly authorized, do not contravene any contract binding on or affecting his / it or any of his / its properties, do not violate any applicable law or regulation;</li>
            <li>this Agreement is valid and binding upon the Borrower;</li>
            <li>there is no pending or threatened action which may materially adversely affect the validity or enforceability of this Agreement;</li>
            <li>all information provided by the Borrower to the Lender under this Agreement is correct and</li>
            <li>The Borrower hereby confirms that the funds will be utilized for the purpose as stated in Schedule 1 and that the Loan will not be utilized for speculative</li>
        </ol>
        </li>
        <li>The Guarantor(s) hereby represent and warrant that:
        <ol type="i">
            <li>The Guarantor(s) are liable to repay the Loan Amount along with Interest in terms of the repayment schedule and the liability of the Guarantor(s) shall be co- terminus with that of the Borrower;</li>
            <li>The Security if any, provided by the Guarantor(s) is free and unencumbered and is owned by the Guarantor(s) and there are no litigations pending in respect of the Security and no amounts are owing to any person in respect of the Security</li>
            <li>The Guarantor(s) represent that any communication with the Borrower and acknowledgement of the same is binding on the Guarantor(s). Similarly, acknowledgement of Liability by the Borrower is binding on the Guarantor(s) till such time the liability is discharged to the satisfaction of the Lender.</li>
        </ol>
        </li>
        <li>The Borrower and/or the Guarantor(s) will not seek to claim or recover from the Lender on any grounds whatsoever and/or in any circumstances whatsoever (whether now or hereafter existing), any purported damages or compensation, direct, indirect or consequential, for any acts or actions whatsoever of the Lender hereunder and/or in respect of the Loan and/or the Security, taken or omitted by the Lender in terms hereof and/or pursuant hereto and/or to protect any of its interests and rights as the lender or a creditor, and the Borrower and/or the Guarantor(s) hereby expressly waives any right to seek or make any such claim or recovery on any grounds</li>
        <li>The Borrower and/or the Guarantor(s) hereby accepts and confirms that it has no objection to the Lender administering the Loan through third Parties. The Borrower and/or the Guarantor(s) confirm that the Lender may, either partly or in full delegate such of those activities to any third party as it may think fit in the circumstances. Such delegation of work, would include the right and authority to collect the outstanding on behalf of the Lender, the dues and unpaid installments and other amount due under the Agreement and to perform and execute all lawful acts, deeds and matters and things connected therewith and incidental thereto including sending notices to the Borrower and/ or the Guarantor(s), receiving cash against issue of the receipt, cheques and drafts. For the purpose aforesaid as for any other purpose at the sole discretion of the Lender, the Lender shall be entitled to disclose to the third party the details of the Borrower and/or the Guarantor(s), the Loan, the outstanding amount and other information for effectively discharging the work assigned to the third Party and the Borrower and the guarantor(s) hereby consents to such disclosure by the</li>
    </ol>
    </li>
    <li><strong>Indemnification</strong>
    <p style="font-family:Calibri;font-size:small;">The Borrower and the Guarantor(s) shall indemnify and hold the Lender and its directors, officers, employees, agents and advisers harmless against losses, claims, liabilities, or damages which are sustained as a result of any acts, errors, or omissions of the Borrower and/or the Guarantor(s), their / its respective employees, agents, or assignees, or for improper performance or non-performance relating to this Agreement or any other document executed thereof in pursuance to this Agreement.</p>
    </li>
    <li><strong>Assignment</strong>
    <ol type="a">
        <li>It is expressly agreed that the Borrower and / or the Guarantor(s) shall not be entitled to assign, either directly or indirectly, the obligations set out</li>
        <li>The Lender shall be entitled to assign its rights and obligations under this Agreement in part or in full to any third</li>
        <li>The Lender shall at any time, without reference to the Borrower or Guarantor(s) be entitled to securitize, sell, assign, discount or transfer all or any of the Lender’s rights and obligations under this Agreement together with the underlying security to any</li>
    </ol>

    <p style="font-family:Calibri;font-size:small;">person(s) of the choice of the Lender, in whole or in part and in such manner as the Lender may decide. Any such sale, assignment or transfer shall bind the Borrower and Guarantor(s), conclusively.</p>
    </li>
    <li><strong>Term and Termination</strong>
    <ol type="a">
        <li>This Agreement shall become effective on</li>
        <li>The Agreement shall stand terminated on the date the Borrower has repaid the Loan Amount in full along with Interest, overdue interest, Bank charges and other charges as mentioned in this Agreement, and fulfilled all other obligations under the Agreement to the satisfaction of the</li>
        <li>The Borrower does not have the right to terminate this Agreement in any situation except with the written consent of the Lender, by repaying the entire amounts due to the Lender under this</li>
    </ol>
    </li>
    <li><strong>Arbitration and Dispute Settlement</strong>
    <ol type="a">
        <li>Without prejudice to the Lender’s right available to it under the SARFAESI Act, 2002, all disputes, differences and/or claims, arising out of this Agreement, whether during its subsistence or thereafter, shall be settled by arbitration in accordance with the provisions of the Arbitration and Conciliation Act, 1996 or any other statutory modification or re-enactment for the time being in force and shall be conducted by a sole arbitrator to be appointed by the Lender. The applicable law shall be Indian laws. In the event of incapacity or resignation or death of the sole arbitrator so appointed, the Lender shall be entitled to appoint another arbitrator in place of the earlier arbitrator, and the proceedings shall continue from the stage at which the predecessor had left.</li>
        <li>The award given by the arbitrator shall be final and binding on the parties to this Agreement. The cost of the Arbitration shall be borne with by the Party/ies, in accordance with the Award passed by the</li>
        <li>The venue of Arbitration shall be as specified in Schedule 1 hereto and the proceedings shall be conducted in English</li>
        <li>The Borrower and Guarantor hereby agree and confirm that the Lender shall be permitted to invoke the provisions of the Securitization and Reconstruction of Financial Assets and Enforcement of Security Interest Act, 2002 and any amendments thereto in order to recover its dues under this Agreement from the Borrower /</li>
    </ol>
    </li>
    <li><strong>Jurisdiction and Governing Law</strong>
    <p style="font-family:Calibri;font-size:small;">Subject to the Arbitration Clause mentioned above, this Agreement shall be governed and construed in accordance with the substantive laws of India and the parties hereto submit to the exclusive jurisdiction of the Courts, situate at the place as specified in schedule 1 hereto.</p>
    </li>
    <li><strong>Waiver</strong>
    <p style="font-family:Calibri;font-size:small;">The Lender’s failure to exercise or delay in exercising any right, power, privilege or remedy under the Agreement will not operate as a waiver or acquiescence, nor will any single or partial exercise of any right, power, privilege or remedy prevent any further or exercise of any other right, power, privilege or remedy.</p>
    </li>
    <li><strong>Severability</strong>
    <p style="font-family:Calibri;font-size:small;">If any provision in this Agreement shall be found or be held to be invalid or unenforceable, then the meaning of said provision shall be construed, to the extent feasible, so as to render the provision enforceable, and, if no feasible interpretation would save such provision, it shall be severed from the remainder of this Agreement and in such an event, the Parties shall use best efforts to negotiate, in good faith, a substitute, valid and enforceable provision or agreement, which most nearly reflects the Parties’ intent in entering into this Agreement.</p>
    </li>
    <li><strong>Disclosure of Information</strong>
    <ol type="a">
        <li>The Borrower and Guarantor(s) accept, confirm and consent for the disclosure and sharing by the Lender of all or any information and data relating to the Borrower, the facilities, any other transactions that the Borrower has with the Lender, the Borrower’s account, and the agreements and documents related to the facilities and transactions, including but not limited to information relating to default, if any, committed by the Borrower, in the discharge of the Borrower’s obligations in relation to the facilities or other transactions, as the Lender may deem appropriate and necessary to disclose and furnish, to the Reserve Bank of India (“RBI”) and/or to the Credit Information Companies and/or to any other agency or body as authorized in this behalf by RBI, to other banks and lenders including assignees and potential assignees, to its professional advisers and consultants and to its service providers instructed by it in relation to the Facilities, and/or as required under law or any applicable regulation, or at the order of a court of law, or at the request or order of any statutory, regulatory or supervisory authority with whom it customarily complies.</li>
        <li>The Borrower undertakes and covenants that it shall provide all information, including information regarding other credit facilities enjoyed by the Borrower, as and when required by the Lender. The Borrower declares that the information furnished to the Lender from time to time is and shall be true and correct.</li>
        <li>The Borrower and/or the Guarantor(s) hereby further agrees that in case the Borrower and/or Guarantor(s) fails to pay the Lender's dues or commits default in the repayment of the loan installment(s) or interest thereon on due date(s), or the account of the Borrower and/or the Guarantor(s) becomes Non-Performing Assets as per the Reserve Bank of India's norms, the Lender will be at liberty to disclose or publish in print and / or electronic media the photograph(s), name(s) and address(es) of the Borrower and/or the Guarantor(s) as willful defaulter along with the details of outstanding dues payable by such Borrower and/or the Guarantor(s), to the Lender.</li>
        <li>The Borrower and/or the Guarantor(s) accepts that the RBI or the Credit Information Companies and or any other agency so authorized, or any statutory, regulatory or supervisory authority or other lenders / potential lenders, may use, process and disseminate the said information and data disclosed by the Lender in such manner as deemed fit by them in any particular circumstances and shall not hold the Lender responsible or liable in this regard.</li>
        <li>The Borrower and/or the Guarantor(s) authorize the Lender to disclose, from time to time any information relating to the Loans to any Parent / subsidiary / affiliates / associate entity of the Lender, and to third parties engaged by the Lender, for the purpose of marketing of services and products and to its investors</li>
    </ol>
    </li>
    <li><strong>Notices</strong>
    <p style="font-family:Calibri;font-size:small;">Every notice, request, demand or other communication under this Agreement shall:</p>

    <ol type="a">
        <li>be in writing, delivered by hand, or by registered post / Speed post, acknowledgement due, or by Courier or any other mode as decided by the Lender ;</li>
        <li>be deemed to have been received by the Borrower and / or Guarantor when delivered by hand, at the time so delivered if during business hours on a business day for the recipient, and if given by registered post acknowledgement due, 72 hours after it has been put into post; and</li>
        <li>be sent to the Borrower to the address mentioned in Schedule 1 hereto and to the Lender at its office address first hereinabove mentioned and to the address mentioned in schedule 1, or to such other address as either party may in writing hereafter notify to the other</li>
        <li>The Lender may (but not obliged to) send short message services (sms) to the Borrower intimating him on the dues payable by him and may call the Borrower and / or the guarantor to pay any dues that is outstanding under the agreement. The Borrower and the Guarantor hereby specifically authorizes the Lender to make such calls or send SMS or emails to their contact details provided to the Lender, and further acknowledges that the same shall not be considered as unsolicited calls/SMS/mails from the Lender.</li>
        <li>The Borrower hereby agrees to pay the postal and other charges as mentioned in Schedule 3 here to for each of the notices being sent to him /</li>
    </ol>

    <p style="font-family:Calibri;font-size:small;">The Borrower and the Guarantor(s) have read the entire Agreement, constituting the above clauses including the Loan details and the terms of repayment, the fees and charges payable as clearly enumerated in the schedule to this Agreement. The Borrower and the Guarantor(s) further confirm that the entire Agreement is filled in their presence and that the contents provided herein is explained in the language understood by the Borrower and the Guarantor(s). The Borrower and the Guarantor(s) further confirm having executed the Agreement, received a copy of the same and agree to remit the dues in terms of the Schedule hereunder.</p>
    </li>
</ol>
&nbsp;

<h2 style="text-align:center;">Schedule I</h2>
&nbsp;

<table border="1" style="width:100%;border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="padding:5px;width:25%;">Loan Agreement No</td>
            <td style="padding:5px;width:25%;font-weight:bold;"></td>
            <td style="padding:5px;width:25%;">Agreement Date</td>
            <td style="padding:5px;width:25%;"></td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Name and Address of the Lender</td>
            <td colspan="2" style="padding:5px;"><b>{{Auth::guard('admin')->user()->name}}</b><br>
            HEAD OFF. SIXMILE GUWAHATI  KAMRUP METRO - 781022, Assam</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Name and Address of the Borrower</td>
            <td colspan="2" style="padding:5px;"><b> {{@$row->customer->name}}</b><br>
            {{@$row->customer->present_address1}},{{@$row->customer->present_address2}},{{@$row->customer->present_area}},{{@$row->customer->present_pin_code}}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Nature of Business</td>
            <td colspan="2" style="padding:5px;">{{$row->nature_of_business}}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Purpose of Loan</td>
            <td colspan="2" style="padding:5px;">{{$row->purpose_of_loan}}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Name and address (es) of the Guarantor(s)</td>
            <td colspan="2" style="padding:5px;">Guarnter1:<br>
            <b>&nbsp; <?= ucfirst(@$row->guaranter_first) ?></b><br>
            <?= ucfirst(@$row->guaranter_second) ?><br>
            <br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Loan Amount</td>
            <td colspan="2" style="padding:5px;">₹ <?= number_format(@$row->loan_amount) ?></td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Annualized / Effective Rate of Interest</td>
            <td colspan="2" style="padding:5px;">{{@$row->annual_interest_rate}} (%)</td>
        </tr>
        <tr>
            <td style="padding:5px;">Tenure</td>
            <td style="padding:5px;">{{@$row->tenure}} <?= ucfirst($row->emi_payout) ?></td>
            <td style="padding:5px;">EMI Frequency&nbsp;</td>
            <td style="padding:5px;"><?= ucfirst($row->emi_payout) ?></td>
        </tr>
    </tbody>
</table>

<h3 style="text-align:center;">Repayment Terms</h3>
&nbsp;

<div>

<table style="width:100%;border-collapse:collapse;" border="1">
    <thead>
        <tr>
        <th style="padding:5px;">Sr No</th>
        <th style="padding:5px;">EMI Date</th>
        <th style="padding:5px;">Due Date</th>
        <th style="padding:5px;">Emi</th>
        <th style="padding:5px;">Principal</th>
        <th style="padding:5px;">Interest</th>
        <th style="padding:5px;">Outstanding</th>
      </tr>
    </thead>
     @foreach($loan_emis as $index=>$row_signle)
         <?php 
             $statusClass = 'danger';
             if($row_signle['status'] == 'paid') { 
                $statusClass = 'success'; 
             } 
         ?>
         <tr role="row" class="<?php if($row_signle['penalty_amount'] != 0){ echo 'text-danger'; } ?>">
            <td style="padding:5px;">{{$index +1}}</td>
            <td style="padding:5px;">{{Helper::getFromDate($row_signle['emi_date'])}}</td>
            <td style="padding:5px;">{{Helper::getFromDate($row_signle['due_date'])}}</td>
            <td style="padding:5px;">{{@$row_signle['emi']}}</td>
            <td style="padding:5px;">{{@$row_signle['principal']}}</td>
            <td style="padding:5px;">{{@$row_signle['interest']}}</td>
            <td style="padding:5px;">{{@$row_signle['outstanding']}}</td>
        </tr>

        @endforeach 
    <tbody>
    </tbody>
</table></div>

<h2 style="text-align:center;">Schedule 2 - Schedule of Fees</h2>
&nbsp;

<table border="1" style="width:100%;border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="padding:5px;width:50%">Processing Charges</td>
            <td style="padding:5px;width:50%">{{$row->processing_fees}}</td>
        </tr>
        <tr>
            <td style="padding:5px;width:50%">Stamp Duty</td>
            <td style="padding:5px;width:50%">{{$row->stamp_duty}}</td>
        </tr>
        <tr>
            <td style="padding:5px;width:50%">Pre Emi Interest <u> </u>% p.a</td>
            <td style="padding:5px;width:50%">0.00</td>
        </tr>
        <tr>
            <td style="padding:5px;width:50%">Insurance premium for First year(optional)</td>
            <td style="padding:5px;width:50%">10.00</td>
        </tr>
        <tr>
            <td style="padding:5px;width:50%">Credit shield (optional) for Rs. <u> </u></td>
            <td style="padding:5px;width:50%">10.00</td>
        </tr>
        <tr>
            <td style="padding:5px;width:50%">Others(please specify)</td>
            <td style="padding:5px;width:50%">10.00</td>
        </tr>
    </tbody>
</table>

<p><strong>All fees shall be paid together with all taxes including Goods and Service Tax (GST) as may be applicable from time to time.</strong></p>
&nbsp;

<h2 style="text-align:center;">Schedule 3 - Schedule of Charges</h2>
&nbsp;

<table border="1" style="width:100%;border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="width:20%;padding:5px;">Cheque bounce charges</td>
            <td style="width:80%;padding:5px;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width:20%;padding:5px;">Swapping Charges</td>
            <td style="width:80%;padding:5px;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;"><strong>Overdue Interest 0.00 % p.a on the unpaid installments/ dues, outstanding from time to time.</strong></td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Pre payment charges 5.00 on the principal outstanding if the loan is pre-closed within one year</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Legal Expenses at Actual or as ordered by the Arbitrator/ Court.</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Incidental Expenses/ Collection Charges Rs.200/- per visit</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Postage expenses for issue of notice Rs.50/- for every notice sent to borrower/ co-borrower.</td>
        </tr>
    </tbody>
</table>
&nbsp;

<h2 style="text-align:center;">Schedule 4 - Schedule of Disbursement</h2>
&nbsp;

<table border="1" style="width:100%;border-collapse:collapse;">
    <tbody>
        <tr>
            <th style="padding:5px;width:10%;">S.No.</th>
            <th style="padding:5px;width:70%;">Particulars</th>
            <th style="padding:5px;width:20%;">Amount (Rs.)</th>
        </tr>
    </tbody>
    <tbody>
        <tr>
            <td style="padding:5px;">1</td>
            <td style="padding:5px;">Processing Charges</td>
            <td style="text-align:right;padding:5px;">0.00</td>
        </tr>
        <tr>
            <td style="padding:5px;">2</td>
            <td style="padding:5px;">Net Release amount</td>
            <td style="text-align:right;padding:5px;">0.00</td>
        </tr>
    </tbody>
</table>
&nbsp;

<p>IN WITNESS WHEREOF, the Parties hereto, acting through their duly authorized representatives, have caused this Agreement to be signed in their respective names as of the date first above written.</p>
&nbsp;

<table style="width:100%;">
    <tbody>
        <tr>
            <td style="padding-top:5px;width:50%;font-style:italic;font-weight:bold;">Witness1</td>
            <td style="padding-top:5px;width:50%;font-style:italic;font-weight:bold;">Witness2</td>
        </tr>
        <tr>
            <td style="padding-top:35px;width:50%;font-size:x-small;">Signature:</td>
            <td style="padding-top:35px;width:50%;font-size:x-small;">Signature:</td>
        </tr>
        <tr>
            <td style="padding-top:5px;width:50%;font-size:x-small;">Name &amp; Address</td>
            <td style="padding-top:5px;width:50%;font-size:x-small;">Name &amp; Address</td>
        </tr>
        <tr>
            <td style="padding-top:5px;width:50%;font-weight:bold;">1</td>
            <td style="padding-top:5px;width:50%;font-weight:bold;">1</td>
        </tr>
        <tr>
            <td style="padding-top:5px;width:50%;font-style:italic;">2</td>
            <td style="padding-top:5px;width:50%;font-style:italic;">1</td>
        </tr>
    </tbody>
</table>

<table style="width:100%;">
    <tbody>
        <tr>
            <td style="padding-top:5px;width:50%;font-style:italic;font-weight:bold;">Applicant</td>
            <td style="padding-top:5px;width:50%;font-style:italic;font-weight:bold;">Co-Applicant</td>
        </tr>
        <tr>
            <td style="padding-top:35px;width:50%;font-size:x-small;">Signature:</td>
            <td style="padding-top:35px;width:50px;font-size:x-small;">Signature:</td>
        </tr>
        <tr>
            <td style="padding-top:5px;width:50%;font-size:x-small;">Name &amp; Address</td>
            <td style="padding-top:5px;width:50%;font-size:x-small;">Name &amp; Address</td>
        </tr>
        <tr>
            <td style="padding-top:5px;width:50%;font-weight:bold;"> VIDHYA TT</td>
            <td style="padding-top:5px;width:50%;font-weight:bold;">323232</td>
        </tr>
        <tr>
            <td style="padding-top:5px;width:50%;font-style:italic;">AT POST BHAMBARI TQ JINTUR DIST PARBHANI  PARBHANI 431509 Maharashtra</td>
            <td style="padding-top:5px;width:50%;font-style:italic;"></td>
        </tr>
    </tbody>
</table>
</div>

                </div>
            </div>
        </div>
    </section>