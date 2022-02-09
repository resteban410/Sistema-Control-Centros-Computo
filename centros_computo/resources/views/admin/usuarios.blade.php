@extends('layouts.plantillabase')
@section('contenido')
<br></br>

<!-- Modal Crear nuevo alumno-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="{{route('altaUsu')}}" method="post">
      <div class="modal-body">
                @csrf
            <div class="form-group">
                <label>ID:</label>
                    <input type="text" name="id" class= "form-control" placeholder="Escriba la clave" required="">
                    {!! $errors->first('id', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Nombre:</label>
                    <input type="text" name="name" class= "form-control" placeholder="Escriba el nombre" required="">
                    {!! $errors->first('name', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Apellido:</label>
                    <input type="text" name="last_name" class= "form-control" placeholder="Escriba los apellidos" required="">
                    {!! $errors->first('last_name', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Contraseña:</label>
                    <input type="password"  name="password" class= "form-control" placeholder="Escriba la contraseña" required="">
                    {!! $errors->first('password', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Correo Electronico:</label>
                    <input type="email" name="email" class="form-control" placeholder="Ej.:usuario@servidor.com" required="">
                    {!! $errors->first('email', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Dirección:</label>
                    <input type="text" name="address" class= "form-control" placeholder="Escriba la direccion" required="">
                    {!! $errors->first('address', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Teléfono:</label>
                    <input type="text" name="telephone" class= "form-control" placeholder="Escriba el número de telefono" required="" pattern="[0-9]+" maxlength="10">
                    {!! $errors->first('telephone', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Tipo:</label>
                    <select name="role">
                        <option value="usu">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                    {!! $errors->first('role', '<small>:message</small><br>') !!}
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Termina modal de nuevo alumno -->

<!-- Empieza modal de editar alumno -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar registro</h5>
      </div>
    <form action="{{route('editarUsu')}}" method="post" id="editForm">
      <div class="modal-body">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label>ID:</label>
                    <input type="text" name="id" id="id" class= "form-control" placeholder="Escriba la clave" required="">
                    {!! $errors->first('id', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Nombre:</label>
                    <input type="text" name="name" id="name" class= "form-control" placeholder="Escriba el nombre" required="">
                    {!! $errors->first('name', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Apellido:</label>
                    <input type="text" name="last_name" id="last_name" class= "form-control" placeholder="Escriba los apellidos" required="">
                    {!! $errors->first('last_name', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Correo Electronico:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Ej.:usuario@servidor.com" required="">
                    {!! $errors->first('email', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Dirección:</label>
                    <input type="text" name="address" id="address" class= "form-control" placeholder="Escriba la direccion" required="">
                    {!! $errors->first('address', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Teléfono:</label>
                    <input type="text" name="telephone" id="telephone" class= "form-control" placeholder="Escriba el número de telefono" required="" pattern="[0-9]+" maxlength="10">
                    {!! $errors->first('telephone', '<small>:message</small><br>') !!}
            </div>

            <div class="form-group">
                <label>Tipo:</label>
                    <select name="role" id="role">
                        <option value="usu">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                    {!! $errors->first('role', '<small>:message</small><br>') !!}
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href=""class="btn btn-secondary">Cerrar</a>
      </div>
    </form>
    </div>
  </div>
</div>
<!--Termina modal de editar alumno-->

<!-- Empieza modal de eliminar alumno -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
      </div>
    <form action="{{route('borrarUsu')}}" method="POST" id="deleteForm">
      @csrf
      @method('DELETE')
      <div class="modal-body">
            <input type="hidden" name="_method" value="DELETE">
        <p>¿Estas seguro de borrar este registro? Esta acción no puede revertirse. Para asegurarse, vuelva a escribir el ID del usuario. </p>

            <div class="form-group">
                <label>ID:</label>
                    <input type="text" name="id" id="id" class= "form-control" placeholder="Escriba la clave"  required="">
                    {!! $errors->first('id', '<small>:message</small><br>') !!}
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Borrar</button>
        <a href=""class="btn btn-secondary">Cerrar</a>
      </div>
    </form>
    </div>
  </div>
</div>
<!--Termina modal de eliminar alumno-->


<!-- Empieza modal de eliminar alumno -->
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <form action="{{route('changePass')}}" method="POST" id="changeForm">
      @csrf
      @method('PUT')
      <div class="modal-body">
        <p>Para cambiar la contraseña de un usuario, ingresa su id y su nueva contraseña.</p>

            <div class="form-group">
                <label>ID:</label>
                    <input type="text" name="id" id="id" class= "form-control" placeholder="Escriba la clave"  required="">
                    {!! $errors->first('id', '<small>:message</small><br>') !!}
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                    <input type="password"  name="password" class= "form-control" placeholder="Escriba la contraseña"  required="">
                    {!! $errors->first('password', '<small>:message</small><br>') !!}
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--Termina modal de eliminar alumno-->

<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
    </ul>
    </div>
    @endif

    @if(\Session::has('sucess'))
        <div class="alert alert-success">
            <p>{{\Session::get('sucess')}}</p>
        </div>
    @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar nuevo registro
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeModal">
        Cambiar contraseña
    </button>
</div>

<br></br>
    <div class="card">
        <div class="card-body">
        <h4> Usuarios registrados</h4>
        <table id="usuarios" class="display nowrap" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo Electrónico</th>
               	<th>Dirección</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->last_name}}</td>
                    <td>{{$usuario->email}}</td>
                   	<td>{{$usuario->address}}</td>
                    <td>{{$usuario->telephone}}</td>
                    <td>{{$usuario->role}}</td>
                    <td>
                        <a href="#" class="btn btn-success edit">Editar</a>
                        <a href="#" class="btn btn-danger delete">Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

@section('editarborrar')
<script type="text/javascript">
            $(document).ready(function() {

                var table= $('#usuarios').DataTable({
                    responsive: true,
                    autoWidth: false,
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "Nada encontrado - disculpa",
                        "info": "Mostrando la página _PAGE_ de _PAGES_",
                        "infoEmpty": "Registros no disponibles",
                        "infoFiltered": "(flitrado de _MAX_ registros totales)",
                        "search": "Buscar",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior"
                    }}
                    });
                    //start edit record
                    table.on('click', '.edit', function(){

                        $tr = $(this).closest('tr');
                        if ($($tr).hasClass('child')){
                            $tr =  $tr.prev('.parent');
                        }
                        var data = table.row($tr).data();
                        console.log(data);

                        $('#id').val(data[0]);
                        $('#name').val(data[1]);
                        $('#last_name').val(data[2]);
                        $('#email').val(data[3]);
                        $('#address').val(data[4]);
                        $('#telephone').val(data[5]);
                        $('#role').val(data[6]);

                        $('#editForm').attr('route', 'editarUsu', + data[0]);
                        $('#editModal').modal('show');
                    });

                    //end edit record

                    //star delete record
                    table.on('click', '.delete', function(){

                        $tr = $(this).closest('tr');
                        if ($($tr).hasClass('child')){
                            $tr =  $tr.prev('.parent');
                        }
                        var data = table.row($tr).data();
                        console.log(data);

                        $('#id').val(data[0]);

                        $('#deleteForm').attr('route', 'borrarUsu', + data[0]);
                        $('#deleteModal').modal('show');
                    });
                    //end delete record
                });
        </script>
@endsection
