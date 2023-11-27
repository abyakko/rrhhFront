<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del rol</label>
    <input type="text" class="form-control" name="name" value="{{ isset($role->name)? $role->name:old('name') }}" id="name" required>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Estado</th>
            <th>Nombre</th>
        </tr>
    </thead>

    <tbody>
        @foreach($permissions as $id => $permission)
        <tr>
            <td>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$id}}">
                </div>
            </td>
            <td>
                {{$permission}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
