@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="animate__animated animate__flipInX">Exemple Datatable</h1>
            <table id="table_id" class="display" style="width:100%"></table>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
var table;
var table_data = [
    ["12:38", "Londres", "AF5743", "E21", null],
    ["14:30", "Paris", "AB5412", "E12", null],
    ["09:00", "Sidney", "LM4577", "F54", null],
    ["11:37", "Rome", "TWA800", "K12", null],
    ["08:52", "Barcelone", "KLM456", "V54", null],
];

$(document).ready(function(){

    // Emit toastr
    toastr.success("Toastr success message");

    // Init Datatable
    table = $('#table_id').DataTable({
        //ordering: true,
        paging:         false,
        aria: {
            sortAscending:  ": activate to sort column ascending",
            sortDescending: ": activate to sort column descending"
        },            
        data: table_data,      
        columns: [
            { title: "Horaire" },
            { title: "Destination" },
            { title: "Vol" },
            { title: "Porte" },
            { title: "Observations" },
        ],
        columnDefs: [
            {
                targets: '_all',
                class: "dt-center",
            },
            {
                targets: [4], 
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
        ],
        order: [],
        "createdRow": function( row, data, dataIndex ) {
            /*console.log('rowCallback for row ', dataIndex);
            if(dataIndex==2){
                $(row).addClass('animate__animated animate__flipInY animate__slower');
            }    
            */       
        },        
    });

});
</script>

@endsection
