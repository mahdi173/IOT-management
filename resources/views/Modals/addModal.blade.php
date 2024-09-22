<div class="d-flex mb-3">
    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addModule">
      <span> Add Module </span>
    </button>
</div>

<!-- Add module Modal -->
<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="addModuleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModuleLabel">Add Module</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="{{route('modules.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="module_name">Nom</label>
                        <input type="text" class="form-control" id="module_name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="module_number_data_sent">Nombre de données envoyées</label>
                        <input type="number" class="form-control" id="module_number_data_sent" name="number_data_sent" value="0">
                    </div>
                    <div class="form-group">
                        <label for="module_value">La valeur mesurée</label>
                        <input type="number" class="form-control" id="module_value" name="value" value="0">
                    </div>
                    <div class="form-group">
                        <label for="module_measure_unit">Unité de mesure</label>
                        <select id="module_measure_unit" name="measure_unit" class="form-control">
                            <option selected>Km</option>
                            <option>Kg</option>
                            <option>°F</option>
                            <option>°C</option>
                            <option>K</option>
                            <option>A</option>
                            <option>Pa</option>
                            <option>ppl</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Module</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>