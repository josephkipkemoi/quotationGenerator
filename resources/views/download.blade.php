<!DOCTYPE html>
<html>
<head>
    <title>PDF DOWNLOAD</title>
</head>
<style>
 table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

caption {
  margin: 8px;
  font-weight: bold;
  font-size: 24px;
  text-decoration: underline;
}
.quotation_header {
  text-align: center;
}
</style>
<body>

<div class="quotation_header">
@foreach($company_name as $companyName)
<h1>{{$companyName}}</h1>
@endforeach

     @foreach($company_details as $company)
         <span>{{$company}}</span><br/>
    @endforeach
</div>

<br/>

<table>
  <tr>
  <th width="155px">.</th>
    <th width="160px">.</th>
    <th width="160px">Date</th>
    <th width="160px" font-size="12px">Invoice Number</th>
  </tr>
</table>

<table>
<th>Company</th>
@foreach($quotation_address as $quotation_addressee)
    <td width="160px">{{$quotation_addressee}}</td>
@endforeach
</table>

<br/>
<table>
  <caption>QUOTATION</caption>
<tr>
        <th>Quantity</th>
        <th>Description</th>
        <th>Unit Price</th>
        <th>Total</th>
</tr>

@foreach($products as $product)
<tr>
     @foreach($product as $prod)
            <td>{{$prod}}</td>
    @endforeach
</tr>
@endforeach
</table>

<br/>

<table>

<tr>
    <th>Sub Total</th>
   <th>VAT 16%</th>
   <th>Total</th>
</tr>
 @foreach($quotation_total as $quoute_amount)
     <td id="amt">{{$quoute_amount}}</td>
 @endforeach
</table>
<br/>
<br/>
<span>NB: All prices are inclusive of VAT</span>

</body>
</html>
