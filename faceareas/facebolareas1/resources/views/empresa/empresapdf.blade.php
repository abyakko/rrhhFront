$<!doctype html>
<html lang="en">

<head>
  <title>Empresas</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<style>

.content-table {
   border-collapse: collapse;

   margin: 0 auto;
   font-size: 0.9em;
   min-width: 400px;
   border-radius: 5px 5px 0 0;
   overflow: hidden;
   box-shadow: 0 0 20px rgb(0,0,0,0.15);
   margin-left: auto;
  margin-right: auto;

}
.content-table thead th {
    background-color:#009879;
    color: white;
    text-align: left;
    font-weight: bold;

}
.content-table tr,
.content-table td{
padding: 12px 15px;

}
.content-table tbody tr{
    border-bottom: 1px solid #dddddd;
}
.content-table tbody tr:nth-of-type(even){
    background-color: #f3f3f3;
}
.content-table tbody tr:last-of-type{
    border-bottom: 2px solid #009879;
}
.content-table tbody tr.
</style>

</head>
<body>
   
        <h1 class="text-center">REPORTES DE EMPRESAS</h1>
    
        <table class="content-table">
            <thead>
                <th>ID</th>
           
                <th>Nombre</th>
                <th>Propietario</th>
                <th>Celular</th>
             
            
             
            </thead>
            <tbody>
                @foreach ($empresa as $emp)
                <tr>
                    <td>{{ $emp->id }}</td>
                    
                    <td>{{ $emp->nombre }}</td>
                    <td>{{ $emp->propietario }}</td>
                    <td>{{ $emp->celular }}</td>
                  
                   
                </tr>
                @endforeach
    
            </tbody>
       
        </table>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>