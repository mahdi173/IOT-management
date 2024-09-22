@extends('home')

@section('content')

  <div class="container"> 
    <!-- Display errors -->

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
    
    @include('Modals.addModal')
    <div class="table-responsive"> 
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Etat de marche</th>
            <th scope="col">La valeur mesurée</th>
            <th scope="col">Unité de mesure</th>
            <th scope="col">Nombre de données envoyées</th>
            <th scope="col">Durée de fonctionnement</th>
            <th scope="col">Date d'ajout</th>
            <th scope="col">Date de modification</th>
            <th scope="col">Historique</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($modules as $module)
            <tr>
              <td> {{$module->name}} </td>
              <td> <span id="m_status_{{$module->id}}" class="badge {{ $module->status == 'active' ? 'badge-success' : 'badge-danger' }}">{{ $module->status }}</span> </td>
              <td id="m_value_{{$module->id}}"> {{$module->value}} </td>
              <td> {{$module->measure_unit}} </td>
              <td id="m_number_data_sent_{{$module->id}}"> {{$module->number_data_sent}} </td>
              <td id="m_running_time_{{$module->id}}"> {{$module->running_time}} </td>
              <td> {{$module->created_at->format('d-m-Y')}} </td>
              <td id="m_updated_at_{{$module->id}}"> {{$module->updated_at->format('d-m-Y')}} </td>
              <td>
              
                @include('Modals.modalHistory')

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $modules->links() }}
  </div>

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
      <script>
        toastr.options = {
          "progressBar" : true,
          "closeButton" : true,
        }
        toastr.success("{{Session::get('success')}}", 'Success!', {timeOut: 1200});
      </script>
    @endif
    <script>
      // Updating table every 5 min
      setInterval(function () {
        $.ajax({
          url: '/api/modules',
          type: 'GET',
          success: function (data) {
              data.modules.data.forEach(function (module) {
                // updating data
                date=  new Date(module.updated_at);
                $('#m_updated_at_' + module.id).text(date.toLocaleDateString("fr-FR"));
                $('#m_status_' + module.id).text(module.status);
                $('#m_number_data_sent_' + module.id).text(module.number_data_sent);
                $('#m_running_time_' + module.id).text(module.running_time);
                $('#m_value_' + module.id).text(module.value);

                // Show toastr notification if status changes
                if (module.status === 'failure' || module.status === 'inactive') {
                  $('#m_status_' + module.id).removeClass('badge-sucess');
                  $('#m_status_' + module.id).addClass('badge-danger');

                  toastr.options = {
                    "progressBar" : true,
                    "closeButton" : true,
                  }
                  toastr.error('Module ' + module.name + ' has failed!', 'Error', {timeOut: 12000});
                }else{
                  $('#m_status_' + module.id).removeClass('badge-danger');
                  $('#m_status_' + module.id).addClass('badge-success');
                }
              });
          }
        });
      }, 300000);
    </script>
@stop