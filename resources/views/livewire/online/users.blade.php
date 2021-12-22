<div>
@if($render)

    <table class="table table-bordered table-striped table-hover table-sm">
        <caption>{{ count($users) }} utilisateurs(s) connecté(s)</caption>
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($users))
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
            </tr>
            @endforeach

        @else 
            <tr>
                <td colspan="2">Aucun utilisateur connecté</td>
            </tr>        
        @endif
        </tbody>
    </table>


@endif    
</div>