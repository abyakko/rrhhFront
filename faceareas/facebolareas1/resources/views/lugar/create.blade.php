<a class="btn btn-success" data-toggle="modal" data-target="#createModal" href=""><i class="fas fa-plus-square"></i></a>

  <div class="modal fade" id="createModal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">NUEVO LUGAR</h4>    
            </div>
            <div class="modal-body">
                <form action="{{ url('lugars') }}" method="post" entype="multipart/form-data">
                    @csrf
                    @include('lugar.form', ['modo' => 'Guardar'])
                    
                </form>
        </div>

       </div>

    </div>
</div>