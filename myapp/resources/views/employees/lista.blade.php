@if (count($empleados) > 0 )
    
   <table id="employees" class="table table-striped"
    style="width:100%">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">LastName</th>
        <th scope="col">FirstName</th>
        <th scope="col">Title</th>
        <th scope="col">Acciones</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)

      <tr>
        <th scope="row">{{$empleado->EmployeeID}}</th>
        <td>{{$empleado->LastName}}</td>
        <td>{{$empleado->FirstName}}</td>
        <td>{{$empleado->Title}}</td>
        <td><button class= "btn btn-warning">
          <a href ="editEmployee/{{$empleado->EmployeeID}}"> Actualizar </a></button>
          <button class= "btn btn-danger">
              <a href ="deleteEmployee/{{$empleado->EmployeeID}}"> Eliminar </a></button>
      </td>
      
      </tr>
      @endforeach
     
    </tbody>
  </table>
    
 

@else
    <h2>No se encontraron empleados.</h2>
@endif

<script>
$(document).ready(function () {
    $('#employees').DataTable();
});
</script>

