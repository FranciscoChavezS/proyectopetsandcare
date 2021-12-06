@extends('layouts.main', ['activePage' => 'citas', 'titlePage' => 'Carga de Cita'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form method="POST" action="{{ route('citas.store') }}" class="form-horizontal" enctype="multipart/form-data">
        @csrf
          <div class="card ">
                <!--Header-->
                <div class="card-header card-header-primary">
                <h4 class="card-title">Citas</h4>
                <p class="card-category">Resgistra tú cita</p>
                </div>
                <!--Body-->
                <div class="card-body">
                     <div class="row">
                        <label for="nombremas" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombremas" placeholder="Ingrese el nombre de su mascota"
                            autocomplete="off" autofocus>
                            <!--Validaciones-->
                            @if($errors->has('nombremas'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('nombremas') }}</span>
                            @endif
                         </div>
                         </div>
                         <div class="row">
                          <label for="razamas" class="col-sm-2 col-form-label">Raza</label>
                          <div class="col-sm-7">
                           <input type="text" class="form-control" name="razamas" placeholder="Ingrese la raza"
                            autocomplete="off" autofocus>
                            <!--Validaciones-->
                            @if($errors->has('razamas'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('razamas') }}</span>
                            @endif
                           </div>
                         </div>
                     <div class="row">
                       <label for="sexomas" class="col-sm-2 col-form-label">Sexo</label>
                       <div class="col-sm-7">
                         <!--<input type="text" class="form-control" name="price" placeholder="Ingrese el sexo"
                        autocomplete="off" autofocus>-->
                        <select type="text" class="form-control" name="sexomas" placeholder="Ingrese el sexo"
                        autocomplete="off" autofocus>
                                    <option>Macho</option>
                                    <option>Hembra</option>
                                    </select> 
                        <!--Validaciones-->
                        @if($errors->has('sexomas'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('sexomas') }}</span>
                        @endif
                       </div>
                     </div>
                       <div class="row">
                          <label for="telefonomas" class="col-sm-2 col-form-label">Telefono</label>
                          <div class="col-sm-7">
                           <input type="text" class="form-control" name="telefonomas" placeholder="Ingrese algun telefono"
                            autocomplete="off" autofocus>
                            <!--Validaciones-->
                            @if($errors->has('telefonomas'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('telefonomas') }}</span>
                            @endif
                           </div>
                         </div>
                    <div class="row">
                        <label for="caso" class="col-sm-2 col-form-label">Motivo</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="caso" placeholder="Ingrese el motivo de la cita"
                            autocomplete="off" autofocus>
                            <!--Validaciones-->
                            @if($errors->has('caso'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('caso') }}</span>
                            @endif
                        </div>
                     </div>
                     <div class="row">
                        <label for="started_at" class="col-sm-2 col-form-label">Día</label>
                        <div class="col-sm-7">
                        <input type="date" name="started_at" id="started_at" class="form-control">
                        <!--<input type="number" value="{{ isset($product) ? $product->stock : ""}}" step='0.01' id='stock' name="stock" class="form-control" required> -->                  
                        <!--Validaciones-->
                            @if($errors->has('started_at'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('started_at') }}</span>
                            @endif
                        </div>
                     </div>
                       <div class="row">
                          <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                          <div class="col-sm-7">
                           <input type="time" class="form-control" name="hora" target="_blank">
                            <!--Validaciones-->
                            @if($errors->has('hora'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('hora') }}</span>
                            @endif
                           </div>
                         </div>
                    </div>
                </div>
                <!--End body-->

                <!--Footer-->
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <!--End footer-->
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
@endsection