{!! Form::open(array('url'=>'comercial/clientes','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

{{-- Inicio buscar datos --}}
<div class="container-fluid">
    <form class="form-neon form-inline" action="">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="buscarpor" class="bmd-label-floating">¿What customer are you looking for?</label>
                        <input type="search"  class="form-control mr-sm-2" name="buscarpor" id="buscar" aria-label="Search">
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <button type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp;SEARCH</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Fin buscar datos --}}  
  
{{Form::close()}}