<div>

<form wire:submit.prevent="create">


  <div class="form-group">
    <label>Horaire</label>
    <input wire:model="horaire" type="text" class="form-control" placeholder="12:00">
    @error('horaire') <span class="error text-danger my-4">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Destination</label>
    <input wire:model="destination" type="text" class="form-control" placeholder="Paris CDG">
    @error('destination') <span class="error text-danger my-4">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>N° Vol</label>
    <input wire:model="vol" type="text" class="form-control" placeholder="AF 7852">
    @error('vol') <span class="error text-danger my-4">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Porte</label>
    <input wire:model="porte" type="text" class="form-control" placeholder="C2">
    @error('porte') <span class="error text-danger my-4">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Observation</label>
    <textarea wire:model="observation" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <small id="emailHelp" class="form-text text-muted">Indiquer ici les retards, annulation et autres informations particulières concernant le départ.</small>
    @error('observation') <span class="error text-danger my-4">{{ $message }}</span> @enderror
  </div>


  <button type="submit" class="btn btn-primary">Enregistrer</button>
  
</form>

<script>
 
  
$(function(){

    Livewire.on('createDepartSuccessForm', e => {
        toastr.success("Le nouveau départ a bien été enregistré","Félicitation!",{
            "closeButton": true,
            "timeOut": 0,
            "extendedTimeOut": 0
        })
    })

});

</script>
</div>
