<a class="btn btn-success" data-toggle="modal" data-target="#createModal" href=""><i class="fas fa-plus-square"></i></a>

  <div class="modal fade" id="createModal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">NUEVA SUCURSAL</h4>    
            </div>
            <div class="modal-body">
                <form action="{{ url('sucursals') }}" method="post" entype="multipart/form-data">
                    @csrf
                    @include('sucursal.form', ['modo' => 'Guardar'])
                </form>
        </div>
       </div>
    </div>
</div>