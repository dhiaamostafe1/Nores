<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <style>
        * { 
           font-family: DejaVu Sans, sans-serif;
        }
    </style>
    
</head>
<body  style="font-family: sbl, verdana, sans-serif;">
    
    <div class="container mt-5 mb-4">
        <table class="table table-borderless">
            <thead>
             
            </thead>
            <tbody>
              <tr>
       
                
                <td style="width: 30%">
                  <ul class="list-group fs-1">
                    <li class="list-group-item border border-0"></li>
                    <li class="list-group-item border border-0">  Smart System</li>
                    <li class="list-group-item border border-0"></li>
                    <li class="list-group-item border border-0"></li>
                
                  </ul> 
                </td>
              </tr>
            </tbody>
        </table>

    </div>


    <div class="container ">
        <h2 class="text-center"> data {{$name}} </h2>
        <table class="table  border border-dark" style="border:4px black">
          
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
           
              </tr>
            </thead>
            <tbody>

                @foreach ($data as $item)

                 <tr>
                    <th scope="row">{{ $item->id}}</th>
                    <td>{{ $item->AccountName}}</td>
                  </tr>
                    
                @endforeach
             
             
            </tbody>
          </table>
    </div>

</body>
</html>