<div>
<table id="table_id" class="display" style="width:100%"></table>

<script>
var table;
var departs = @php echo $departs @endphp;
var table_data = [];
$.each(departs, function(index, item){
    var item_data = [];
    $.each(item, function(prop, value){
        item_data.push(value);
    });
    item_data.push(item);
    table_data.push(item_data);
});




Echo.channel('depart')
.listen('DepartCreated', (e) => {
    var new_airport = JSON.parse(e.depart);
    var row_data = [];
    row_data.push(new_airport.id);
    row_data.push(new_airport.horaire);
    row_data.push(new_airport.destination);
    row_data.push(new_airport.vol);
    row_data.push(new_airport.porte);
    row_data.push(new_airport.observation);
    row_data.push(new_airport.created_at);
    row_data.push(new_airport.updated_at);
    row_data.push(new_airport);
    table.row.add( row_data ).draw(false);
}); 


Echo.channel('depart')
.listen('DepartUpdated', (e) => {
    var update_depart = JSON.parse(e.depart);
    var table = $('#table_id').DataTable();
    var row_index = null;
    table.rows( function ( idx, data, node ) {
        if(data[8].id==update_depart.id){
            row_index = idx;
        }
    } );
    if(row_index !== null){
        var row_data = [];
        $.each(update_depart, function(prop, value){
            row_data.push(value);
        });
        row_data.push(update_depart);
        table.row(row_index).data( row_data ).draw(false);
    }
}); 

Echo.channel('depart')
.listen('DepartDeleted', (e) => {
    var deleted_depart = JSON.parse(e.depart);
    var table = $('#table_id').DataTable();
    var row_index = null;
    table.rows( function ( idx, data, node ) {
        if(data[8].id==deleted_depart.id){
            row_index = idx;
        }
    } );
    if(row_index !== null){
        table.row(row_index).remove().draw();
    }
}); 

$(document).ready(function() {
    table = $('#table_id').DataTable({
        //ordering: true,
        paging:         false,
        aria: {
            sortAscending:  ": activate to sort column ascending",
            sortDescending: ": activate to sort column descending"
        },            
        data: table_data,      
        columns: [
            { title: "#" },
            { title: "Horaire" },
            { title: "Destination" },
            { title: "Vol" },
            { title: "Porte" },
            { title: "Observations" },
            { title: "Created_at" },
            { title: "Updated_at" },
            { title: "Action" }
        ],
        columnDefs: [
            {
                targets: '_all',
                class: "dt-center",
            },
            {
                targets: [0,6,7],
                visible: false,
            },                
            {
                targets: [5], 
                searchable: false,
                orderable: false,
                type: "html",
                render: function(data, type, full, meta) {
                    if(data){
                        var badge_color = data=='Retardé' ? 'warning':'danger';
                        return '<span class="badge badge-pill badge-'+badge_color+'">'+data+'</span>';
                    }
                
                    return null;
                },                    
            }, 
            {
                targets: -1,
                searchable: false,
                orderable: false,
                className: "dt-center",
                type: "html",
                render: function(data, type, full, meta) {
                    var edit_url = "{{ route('aeroport.edit', 'depart_id') }}";
                    edit_url = edit_url.replace('depart_id',full[0]);
                    var del_url = "{{ route('aeroport.delete', 'depart_id') }}";
                    del_url = del_url.replace('depart_id',full[0]);

                    var action_data = '<a href="'+edit_url+'" class="btn btn-outline-primary">Modifier</a>';
                    action_data += '<a href="'+del_url+'" class="btn btn-outline-danger"><i class="fa fa-edit"></i> Supprimer</a>';
                    return action_data;
                },                    
            },             
        ],
        order: [],      
    });

});

</script>
</div>
