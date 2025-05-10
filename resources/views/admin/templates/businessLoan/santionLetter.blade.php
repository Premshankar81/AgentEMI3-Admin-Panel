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
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account - {{$row->account_no}}</a></li>
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
                    <style>
                        table, p {
                            font-family: Calibri;
                            font-weight: 400;
                            font-size: 16px;
                            color: #333;
                        }
                    </style>
<table style="width:100%;font-family: Calibri;border-collapse: collapse;font-size: 16px;color: #333;">
    <tbody>
        <tr>
            <td style="text-align:left;font-size:medium;font-weight:bold;width:60%;">To,<br>
            &nbsp;</td>
            <td style="text-align:right;font-size:medium;font-weight:bold;width:20%;">&nbsp;</td>
            <td style="text-align:left;font-size:medium;font-weight:bold;width:20%;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left;font-size:medium;font-weight:bold;">{{@$row->customer->name}}</td>
        </tr>
       

        <tr>
            <td colspan="3" style="text-align:left;font-size:medium;">{{@$row->customer->present_address1}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left;font-size:medium;">{{@$row->customer->present_address2}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left;font-size:medium;">{{@$row->customer->present_area}}-{{@$row->customer->present_pin_code}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left;font-size:medium;">Phone:{{@$row->customer->mobile}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left;font-size:medium;">Email:{{@$row->customer->email}}</td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>

<p style="text-align:justify;text-align:center;"><strong>Welcome to our family</strong></p>

<p>&nbsp;</p>

<p style="text-align:justify;text-align:center;">Reference: Your Loan Account No: {{$row->account_no}} Dt:{{Helper::getFromDate($row->application_date)}}</p>

<p style="text-align:justify;">Dear Sir/Madam,</p>

<p style="text-align:justify;">We welcome you to <strong>{{Auth::guard('admin')->user()->name}}</strong> and wish to thank you for choosing us as your preferred Financial Institution.</p>

<p style="text-align:justify;">We are pleased to confirmthat your loan amount mentioned in Schedule-I has already been disbursed as per your request. We are delighted to provide solutions for your financial needs and hope to make your experience a memorable one.</p>

<p style="text-align:justify;">For your ready refernce, we enclose the documents pertaining to your loan in the following schedule:</p>

<ul>
    <li>Schedule-I- Your loan details for your future reference.</li>
    <li>Schedule-II- The Repayment schedule of your loan, which will assist you in tracking the EMI due dates and outstanding loan amount</li>
</ul>

<p style="text-align:justify;">For any further assistance, please feel free to contat your Relationship Manage. Alternatively you can also write to us at <strong>info@gsanjyog.net</strong> or visit our website at <strong>grampay.in&nbsp;</strong>Kindly quote your Loan Account Number is any future correspondence with us.</p>

<p style="text-align:justify;">You can also call us at from Monday to Friday between 10AM to 6PM</p>

<p style="text-align:justify;">We look forward for a long and mutually rewarding loan relationship.</p>

<p>&nbsp;</p>

<p style="text-align:justify;"><strong>Warm regards,</strong></p>

<p>&nbsp;</p>

<p><br>
<strong>{{Auth::guard('admin')->user()->name}}</strong></p>

<p>&nbsp;</p>

<p style="page-break-before: always">&nbsp;</p>

<h4 style="text-align:center;"><strong>Schedule-I</strong></h4>

<ol>
    <li>Please note that as per the terms of the loan agreement signed between you and <strong>{{Auth::guard('admin')->user()->name}}</strong>, repayment shall be made through EMIs</li>
    <li>The disbursement details are as follows</li>
</ol>

<table border="1" style="width:100%;border-collapse:collapse;">
    <tbody>
        <tr>
            <td style="padding:5px;width:25%;">Loan Agreement No</td>
            <td style="padding:5px;width:25%;font-weight:bold;">{{$row->account_no}}</td>
            <td style="padding:5px;width:25%;">Agreement Date</td>
            <td style="padding:5px;width:25%;">{{Helper::getFromDate($row->application_date)}}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Name and Address of the Lender</td>
            <td colspan="2" style="padding:5px;"><b>{{Auth::guard('admin')->user()->name}}</b><br>
            HEAD OFF. SIXMILE GUWAHATI  KAMRUP METRO 781022 Assam</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Name and Address of the Borrower</td>
            <td colspan="2" style="padding:5px;"><b>{{@$row->customer->name}}</b><br>
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
            <td colspan="2" style="padding:5px;"><b></b><br>
            <br>
            <b></b><br>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Loan Amount</td>
            <td colspan="2" style="padding:5px;">₹ <?= number_format(@$row->loan_amount) ?></td>
        </tr>
        <tr>
            <td colspan="2" style="padding:5px;">Annualized / Effective Rate of Interest</td>
            <td colspan="2" style="padding:5px;">{{@$row->annual_interest_rate}} %</td>
        </tr>
        <tr>
            <td style="padding:5px;">Tenure</td>
            <td style="padding:5px;">{{@$row->tenure}}</td>
            <td style="padding:5px;">EMI Frequency</td>
            <td style="padding:5px;"><?= ucfirst(@$row->tenure) ?></td>
        </tr>
    </tbody>
</table>

<p><br>
3. As mentioned in the loan agreement, all the repayments of dues (Pre-EMI &amp; EMI) will need to be paid by due date<br>
<strong>Note:</strong></p>

<ul>
    <li>All future communication to you would be sent at the above mentioned address. If any changes of address is received by us in writing with Self attested copy of address proof as per KYC guidelines, further communication will be sent on the changed address.</li>
    <li>You are requested to revert to us within seven days in case of any discrepancy observed in the above mentioned details</li>
    <li>Please note that all the contents of this letter &amp; schedules are subject to the terms &amp; conditions of Loan agreement.</li>
</ul>

<p style="page-break-before: always">&nbsp;</p>

<h4 style="text-align:center;"><strong>Repayment Schedule of Loan Account No: RBL73738879</strong></h4>

<p><br>


</p><table style="width:100%;border-collapse:collapse;" border="1">
    <thead>
        <tr>
            <th style="padding:5px;">
                Sr No
            </th>
            <th style="padding:5px;">
                Date
            </th>
            <th style="padding:5px;">
                Due Date
            </th>
            <th style="padding:5px;">
                EMI
            </th>
            <th style="padding:5px;">
                Principal
            </th>
            <th style="padding:5px;">
                Interest
            </th>
            <th style="padding:5px;">
                Outstanding
            </th>
        </tr>
    </thead>
    <tbody>
            @foreach($loan_rows as $index=>$row)
            <tr>
                <td style="padding:5px;">{{$index+1}}</td>
                <td style="padding:5px;">{{Helper::getFromDate($row['emi_date'])}}</td>
                <td style="padding:5px;">{{Helper::getFromDate($row['due_date'])}}</td>
                <td style="text-align:right;padding:5px;">{{@$row['emi']}}</td>
                <td style="text-align:right;padding:5px;">{{@$row['principal']}}</td>
                <td style="text-align:right;padding:5px;">{{@$row['interest']}}</td>
                <td style="text-align:right;padding:5px;">{{@$row['outstanding']}}</td>
            </tr>
            @endforeach

    </tbody>
</table><p></p>

<h4 style="text-align:center;"><strong>Late payment charges schedule</strong></h4>

<p>
</p><table style="width:100%;border-collapse:collapse;" border="1">
    <thead>
        <tr>
            <th style="padding:5px;">
                Sr No
            </th>
         
            <th style="padding:5px;">
                FromDays
            </th>
            <th style="padding:5px;">
                ToDays
            </th>
            <th style="padding:5px;">
                Calculation Type
            </th>
            <th style="padding:5px;">
                Amount
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table><p></p>

<p><strong>Terms &amp; Conditions</strong></p>

<div style="font-size:smaller;"><p>&nbsp;</p>

<ul>
    <li>उपार्जित ब्याज और अन्य शुल्कों के साथ लोन अधिकतम रूप से उल्लिखित अवधि के भीतर चुकाने योग्य है, यदि उधारकर्ता ब्याज और / या लागत के साथ एक साथ ऋण चुकाने में विफल रहता है, तो कंपनी उक्त अवधि के दौरान आभूषणों को बेचने की हकदार होगी। उधारकर्ता को 15 दिन का नोटिस देकर सार्वजनिक नीलामी और आय को प्रभार / व्यय के लिए विनियोजित किया जाएगा, तब ब्याज और शेष यदि कोई मूलधन है तो नीलामी किसी कंपनी के निदेशक मंडल द्वारा नियुक्त कंपनी के निदेशक मंडल द्वारा नियुक्त नीलामीकर्ता द्वारा की जाएगी नीलामी राशि को समायोजित करने के बाद घाटा, उधारकर्ता व्यक्तिगत रूप से इस तरह के घाटे को कम करने के लिए उत्तरदायी होगा। इसके अलावा इसमें कोई अधिशेष उपलब्ध है, इसे उधारकर्ता को सूचित किया जाएगा और वापस कर दिया जाएगा।</li>
    <li>कंपनी को 10 दिनों के नोटिस जारी करके अपनी शर्तों के दौरान किसी भी समय सभी बकाया राशि के साथ ऋण को वापस लेने का अधिकार है। यों</li>
    <li>बार-बार भुगतान करने के लिए भुगतान करने के लिए। पूरी तरह से अन-सर्विस्ड (पूरी पूरी तरह से ठीक है)।</li>
    <li>🙏 का अधिकार होगा; विवरण घटना में, खंड 2 के परिणाम इस अधिकारिक निगम के अन्य अधिकार के अतिरिक्त समान हैं।</li>
    <li>मूल ऋण के साथ-साथ व्याज उधारकर्ता या उसका अधिकृत प्रतिनिधि केवल सोने के आभूषणों को भुना सकता है, बशर्ते कि ऋण के लिए संपूर्ण बकाया राशि पूरी तरह से साफ हो जाए। α α ड भरा हुआ वाहन के सम्‍बन्‍ध में।</li>
    <li>। सफल होने के बाद, यह सफल रहा।</li>
    <li>कंपनी के पास हस्तांतरण असाइनमेंट बेचने और सभी अधिकारों के शीर्षक और ब्याज को सुरक्षित करने का पूर्ण अधिकार है जो कंपनी को इस ऋण लेनदेन के लिए किसी अन्य व्यक्ति या संस्था को प्राप्त हो सकता है या उस पर चार्ज बनाकर ऋण ले सकता है। यदि आवश्यक हो तो कंपनी को इस ऋण लेनदेन के लिए सुरक्षा के रूप में दिए गए सभी दस्तावेजों के कार्यों या आभूषणों को सुरक्षा के रूप में देने का भी पूर्ण अधिकार होगा, उधारकर्ता के अधिकार के पूर्वाग्रह के बिना ऋण लेने के लिए।</li>
    <li>उधारकर्ता किसी भी अवैध गतिविधि के लिए लिए गए ऋण का उपयोग नहीं करेगा।</li>
    <li>ऋण स्वीकृत करके कंपनी इस बात की पुष्टि या स्वीकार नहीं करती है कि गिरवी रखे गए सोने के आभूषण 22 कैरेट शुद्धता के हैं। कंपनी स्वतंत्र रूप से भरने / काटने सहित किसी भी विधि का उपयोग करके आभूषणों की शुद्धता का स्वतंत्र रूप से मूल्यांकन करने के लिए स्वतंत्र होगी और यदि किसी भी समय कंपनी को पता चलता है कि गिरवी रखे गए सोने के गहने 22 कैरेट से कम शुद्धता या नकली प्रकृति के हैं, तो उधारकर्ता है कंपनी के इस तरह के निष्कर्षों से बाध्य है और ऋण और ब्याज को तुरंत चुकाने और कंपनी को होने वाले नुकसान को पूरा करने के लिए उत्तरदायी है, यदि कोई विफल रहता है तो कंपनी को इस तरह के नुकसान की वसूली के लिए उचित कानूनी कार्यवाही शुरू करने का अधिकार है।</li>
    <li>कंपनी परिसर में चोरी या हेराफेरी की सूचना या किसी प्राकृतिक आपदा जैसे आग, बाढ़ और भूकंप या किसी अन्य कारण से गिरवी रखे गए सोने के आभूषणों के खो जाने की स्थिति में। कंपनी का दायित्व कंपनी के विवेक पर खोई हुई वस्तुओं को समकक्ष शुद्ध वजन और शुद्धता या समकक्ष नकद मूल्य के साथ बदलने तक सीमित है।</li>
    <li>किसी भी घटना में कि एक निश्चित तिथि पर अर्जित ब्याज और शुल्क के साथ ऋण नियामक अनुमेय ऋण से अधिक मूल्य (वर्तमान में आभूषणों के बाजार मूल्य का 75%) से अधिक है या परिवर्तन के कारण गिरवी रखे गए सोने के मूल्य में कोई गिरावट है बाजार मूल्य या किसी अन्य कारण से, ताकि अनुमेय एलटीवी का उल्लंघन किया जा सके, कंपनी के पास यह अधिकार होगा कि वह ऋणी को अतिरिक्त सोना गिरवी रखने के लिए बुलाए, या आवश्यक मूल्य को बरकरार रखने के लिए ऋण की आंशिक राशि के भुगतान की मांग करे। ऋण के साथ संपार्श्विक। उधारकर्ता द्वारा लिखित मांग के 7 दिनों के भीतर उपरोक्त का पालन करने में विफलता की स्थिति में, संपूर्ण ऋण भुगतान के लिए तत्काल ब्याज और शुल्क के साथ देय हो जाएगा, कंपनी के माध्यम से गहने बेचने की हकदार होगी उपरोक्त खंड 2 के अनुसार सार्वजनिक नीलामी।</li>
    <li>उधारकर्ता को पता है कि कंपनी ने ऑन-लेंडिंग के लिए बैंक/वित्तीय संस्थाओं से वित्तीय सहायता प्राप्त की है। जैसा कि कंपनी द्वारा स्पष्ट रूप से अधिकृत किया जा सकता है, उधारकर्ता एतद्द्वारा ऐसे बैंक/वित्तीय संस्थाओं से इस आशय की सूचना प्राप्त होने पर सीधे ऐसे बैंकों/वित्तीय संस्थाओं को देय राशि का भुगतान करने के लिए सहमत होता है और इस तरह के भुगतान को उधारकर्ता के भुगतान दायित्वों का एक उचित निर्वहन माना जाएगा। कंपनी के लिए।</li>
    <li>ब्याज दरों और अन्य शुल्कों सहित नियमों और शर्तों में किसी भी बदलाव की स्थिति में, इस तरह के संशोधन प्रभावित होने से पहले उधारकर्ता को अग्रिम रूप से सूचित किया जाएगा। इसके अलावा, ऋणी किसी भी वैधानिक प्राधिकरण द्वारा लगाए गए किसी भी स्टांप शुल्क, कर और लेवी का भुगतान करने के लिए उत्तरदायी है, जो गिरवी दस्तावेज पर लागू होता है या वर्तमान लेनदेन के कारण होता है।</li>
    <li>ऋणी एतद्द्वारा कंपनी को क्रेडिट इंफॉर्मेशन ब्यूरियर (इंडिया) लिमिटेड और/या रिजर्व बैंक इंडिया या अन्य सांविधिक निकायों द्वारा इस संबंध में अधिकृत किसी अन्य एजेंसी को अपने द्वारा प्रदान की गई ऋण सुविधा से संबंधित किसी भी जानकारी या डेटा का खुलासा करने के लिए सहमति देता है। उधारकर्ता को पता है कि ऐसी एजेंसियां ​​​​ऐसी जानकारी का उपयोग या साझा कर सकती हैं, जैसा कि उनके द्वारा उचित समझा जाए।</li>
    <li>इस ऋण के अलावा उधारकर्ता की सभी मौजूदा और/या भविष्य की देनदारियों के संबंध में गिरवी रखी गई वस्तुओं पर कंपनी का सामान्य ग्रहणाधिकार होगा।</li>
    <li>इस ऋण खाते पर किसी भी प्रेषण को पहले शुल्क/व्यय, फिर ब्याज और शेष राशि, यदि कोई हो, के प्रति समायोजित किया जाएगा।</li>
    <li>ऋण के लिए लागू फेयर प्रैक्टिस कोड शाखा नोटिस बोर्ड और कंपनी की वेबसाइट पर उपलब्ध है।</li>
    <li>। विशेष रूप से सक्षम होने के लिए, प्रबंधक / स्थिति को संशोधित किया गया है।</li>
    <li>इस संबंध में किसी भी प्रकार का परिवर्तन शामिल है।</li>
</ul>

<p style="text-align:center;font-weight:bold;font-size:small;">Demand Promissory Note</p>

<table style="width: 100%;font-size: small;">
    <tbody>
        <tr>
            <td style="width:80%;">I,.......................................................................... on demand, hereby promise to pay <strong>{{Auth::guard('admin')->user()->name}}</strong></td>
            <td rowspan="4" style="width:20%;align-items:center;">
            <div style="margin: 0 auto; width: 75px; height: 75px; border: 1px solid; text-align: center; vertical-align: middle; font-size: xx-small;">Revenue Stamp</div>
            </td>
        </tr>
        <tr>
            <td style="width:80%;">or order, the sum of Rs. <strong>₹ <?= number_format(@$row->loan_amount) ?>&nbsp;</strong>along with interest, for the value received</td>
        </tr>
        <tr>
            <td style="width:80%;">&nbsp;</td>
        </tr>
        <tr>
            <td style="width:80%;text-align:right;">Name and Signature of Borrower</td>
        </tr>
    </tbody>
</table>
</div>

<p>}</p>

                </div>
            </div>
        </div>
    </section>
