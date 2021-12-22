<div>

<form wire:submit.prevent="delete">

   <p class="text-danger" id="text_confirm_delete">Etes-vous certain de vouloir supprimer le départ ci-dessous ?</p>
   <p id="text_confirm_deleted" style="display:none;" class="text-success animate__animated animate__flipInX">Le départ ci-dessous a bien été modifié</p>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Horaire</th>
        <th scope="col">Destination</th>
        <th scope="col">Vol</th>
        <th scope="col">Porte</th>
        <th scope="col">Observations</th>        
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">{{ $depart->id }}</th>
        <td>{{ $depart->horaire }}</td>
        <td>{{ $depart->destination }}</td>
        <td>{{ $depart->vol }}</td>
        <td>Ma{{ $depart->porte }}rk</td>
        <td>{{ $depart->observation }}</td>      
        </tr>
    </tbody>
    </table>  

  <div class="form-group">
    <input wire:model="depart_id" type="hidden">
    @error('id') <span class="error text-danger my-4">{{ $message }}</span> @enderror
  </div>


  <button type="submit" id="btn_delete" class="btn btn-danger form_buttons">Supprimer</button>
  <a href="{{ route('aeroport.index') }}" class="btn btn-secondary form_buttons">Annuler</a>
</form>

<script>
$(function(){

    Livewire.on('DeleteDepartSuccessForm', e => {
        $('#text_confirm_delete, .form_buttons').hide();
        $('#text_confirm_deleted').show();
    })

});

</script>

</div>
