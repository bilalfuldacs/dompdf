<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>
@php($count=0)
  <table width="100%">
    <tr>  @if(isset($company))
        <td valign="top"><img style="width:110px;height:150px;" 
         src={{$company->logo }}
       
 alt="" width="150"/></td>
        <td align="right">
               
            <h3> {{$company->id.' '.$company->name}}</h3>
            <pre>
                {{$company->city.' ,'.$company->postal_code}}
    {{$company->email}}
    @endif
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
     
        <td><strong>Employee List</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
    </tr>
    </thead>
    <tbody>
      
 @foreach($user as $use)
     <tr>
 @php($count++)
      <td>{{$use->id}}</td>
      <td>{{$use->name}}</td>
      <td >{{$use->email}}</td>
      <th >{{$use->phone_number}}</th>
      <td>{{$use->address}}</td>
     
    </tr>
@endforeach
   
    </tbody>

    <tfoot>
      
       
        <tr>
            <td colspan="3"></td>
            <td align="right">Total Employee</td>
            <td align="right" class="gray">{{$count}}</td>
        </tr>
    </tfoot>
  </table>
<script type="text/php">
    if (isset($pdf)) {
       
        $text = "page {PAGE_NUM}/{PAGE_COUNT} ";
        $size = 10;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 2;
        $y = $pdf->get_height() - 35;
        $pdf->page_text($x, $y, $text, $font, $size);
    }
</script>
</body>
</html>