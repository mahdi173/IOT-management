<!-- The Modal for the module history -->

<button type="button" class="btn" data-toggle="modal" data-target="#historyModal{{ $module->id }}">
  <i class="fa fa-history"></i> 
</button>
<div class="modal fade" id="historyModal{{ $module->id }}" tabindex="-1" aria-labelledby="historyModalLabel{{ $module->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historyModalLabel{{ $module->id }}">Module History - {{ $module->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
            @if($module->histories->isEmpty())
              <li>No history available for this module.</li>
            @else
              @foreach($module->histories as $history)
                <li>{{ $history->value }} {{ $history->measure_unit }} - <span class="badge {{ $history->status == 'active' ? 'badge-success' : 'badge-danger' }}">{{ $history->status }}</span> - {{ $history->created_at }}</li>
              @endforeach
            @endif
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>