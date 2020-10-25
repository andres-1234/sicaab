{!! Form::open(array('url'=>'produccion/ficha_tecnica','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

{{-- Inicio buscar datos --}}
<div class="container-fluid">
    <form class="form-neon" action="">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <select name="tipo" class="custom-select custom-select-sm">
                            <option>Search for by:</option>
                            <option>Product name</option>   
                        </select>
                        <input type="search"  class="form-control mr-sm-2" name="buscarpor" id="buscar" aria-label="Search">
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-center">
                        <button type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp; SEARCH</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Fin buscar datos --}}

{{Form::close()}}