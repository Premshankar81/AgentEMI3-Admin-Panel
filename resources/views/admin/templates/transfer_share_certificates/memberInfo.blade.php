<tbody>
 <tr>
   <td class="ft-600">Customer Name</td>
   <td><a target="_blank" href="{{route('admin.customer.edit',array('id' => $rows['customer_id']))}}">{{@$rows['name']}}</a></td>
 </tr>
 <tr>
   <td class="ft-600">Address</td>
   <td>{{@$rows['present_address1']}} <br>
   </td>
 </tr>
 <tr>
   <td class="ft-600">City/State</td>
   <td>{{@$rows['city']['title']}}/{{@$rows['state']['title']}}</td>
 </tr>
 <tr>
   <td class="ft-600">Mobile No</td>
   <td>{{@$rows['mobile']}}</td>
 </tr>
 <tr>
   <td class="ft-600">E-Mail Address</td>
   <td>{{@$rows['email']}}</td>
 </tr>
 <tr>
  <td class="ft-600">No of Share</td>
  <td>{{@$rows['no_of_share']}}</td>
</tr>
<tr>
  <td class="ft-600">Share Value</td>
  <td>10</td>
</tr>
                  
</tbody>