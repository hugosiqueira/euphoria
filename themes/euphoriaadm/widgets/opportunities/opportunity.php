<?php $v->layout("_admin"); ?>
<?php $v->start("styles");?>

<form>
    <div class="form-row mb-4">
        <div class="form-group col-md-6">
            <label for="consultant_id">Consultor</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Consultor">
        </div>
        <div class="form-group col-md-6">
            <label for="president_id">Presidente</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Nome do Presidente">
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="form-group col-md-6">
            <label for="inputCity">Celular</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Celular">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">Ano de Formação</label>
            <input type="text" class="form-control" id="inputZip" placeholder="Ano de Formação">
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Semestre</label>
            <select id="inputState" class="form-control">
                <option selected>Escolha</option>
                <option>1º</option>
                <option>2º</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-4">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group mb-4">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row mb-4">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check pl-0">
            <div class="custom-control custom-checkbox checkbox-info">
                <input type="checkbox" class="custom-control-input" id="gridCheck">
                <label class="custom-control-label" for="gridCheck">Check me out</label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Sign in</button>
</form>