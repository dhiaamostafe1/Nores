<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>


* {
    box-sizing: border-box;
    margin-block-start: 0;
    margin-block-end: 0;
    font-family: 'Nunito Sans', sans-serif;
    color: #727272;
}

table {
    border-collapse: collapse;
}
thead td{
    background: #727272;
}
h3, h4, td  {
    font-weight: normal;
    font-size: 1.5rem;
}
td {
    font-size: 0.8rem;
}

th {
}

@page {
    margin: 20px 50px;
}

.main-page {
    page-break-inside: avoid;
}

.main-page > div {
    padding-left: 0;
    padding-right: 0;
}

.product-name > h3 {
    font-size: 1.75rem;
}

.default-table {
    width: 100%;
    margin-bottom: 1rem;
    border-spacing: 2px;
    color: #212529;
}

.default-table tr {
    border-top: 1px solid rgba(100,100,100, .3);
}

.default-table th, .default-table td {
    padding: .3rem;
}

.codes-table {
    background-color: #f8f9fa;
}

.codes-table th, .codes-table td {
    border: 1px solid rgba(100,100,100, .3);
}
.codes-table th {
    text-align: left;
    border: 1px solid rgba(100,100,100, .3);
   
  
}
.codes-table th:last-child {
    border-bottom-color: inherit;
}
.bottom-logo {
    height: 150px;
}

.align-kids-top > div {
    vertical-align: top;
}




    </style>
</head>
<body>
    



    <h4 class="pt-1">Information</h4>

    <table class="default-table">
        <tbody>
        <tr>
            <td>Company</td>
            
            <td>Oner</td>
        </tr>
        <tr>
            <td>Data</td>
           
            <td>{{ date('Y-m-d') }}</td>
        </tr>
        <tr>
            <td>الفرع</td>
            
            <td>1</td>
        </tr>
        {{-- <tr>
            <td></td>
          
            <td>tq6vTm8QfVEbgamehO</td>
        </tr> --}}
       
      
        </tbody>
    </table>

    <div class="codes">

        <h4>{{$name}}</h4>

        <table class="codes-table default-table">
            <thead>
                <tr>
                    <td>iD</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Number card</td>
                    
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $item)

                 <tr>
                   <td scope="row">{{ $item->id}}</td>
                   <td>{{ $item->Name}}</td>
                   <td>{{ $item->Mobile}}</td>
                   <td>{{ $item->Email}}</td>
                   <td>{{ $item->Max_credit}}</td>
                 </tr>
                   
               @endforeach
           
           
           
            </tbody>
        </table>


    </div>















</body>
</html>