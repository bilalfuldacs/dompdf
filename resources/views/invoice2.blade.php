!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  

    <title>Invoice..!</title>
</head>

<body>
 @if(isset($company))
      <div class="row">
     
   <div class="col-sm ml-3 pl-4">
<img  style="width:110px;height:150px;"src="{{ asset($company->logo) }}" />
   
</div>
<div class="col-sm-7"></div>
   <div class="col-sm">
    {{$company->id.' '.$company->name}}
   <br>
    {{$company->city.' ,'.$company->postal_code}}
   <br>
    {{$company->email}}
   </div>
  </div>
  @endif


</body>
</html>