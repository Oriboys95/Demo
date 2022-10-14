@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div id="gridContainer"></div>
            </div>
        </div>
    </div>

    <script>
    $(() => {
    $('#gridContainer').dxDataGrid({
    dataSource: DevExpress.data.AspNet.createStore({
    key: 'id',
    loadUrl: '{{route('post_list') }}',
    insertUrl: '{{route('post_create') }}',
    updateUrl: '{{route('post_edit') }}',
    deleteUrl: '{{route('post_delete') }}',
    }),
    onCellPrepared: function(e) {
    e.cellElement.addClass("text-center");
    },
    keyExpr: 'id',
    showBorders: false,

    filterRow: { visible: true },
    headerFilter: {
    visible: true,
    },
    columnChooser: {
    enabled: true,
    },
    editing: {
    mode: 'popup',
    allowUpdating: true,
    allowAdding: true ,
    allowDeleting:  true ,
    useIcons: true,
    popup: {
    title: 'Post',
    showTitle: true,
    width: 400,
    height: 300,
    },
    form: {
    items: [{
    dataField: 'nome',
    validationRules: [{ type: 'required' }],
    },
    {
    dataField: 'testo',
    },

        {
            dataField: 'user_id',
            validationRules: [{ type: 'required' }],
        },

    ],

    },
    },
    columns: [
    {
    dataField: 'id',
    caption: 'id',
    visible: false
    },
        {
            dataField: 'nome',
            caption: 'Nome',
        },
        {
            dataField: 'testo',
            caption: 'testo',
        },
        {
            dataField: 'username'
        },
    {
    dataField: 'user_id',
    caption: 'user_id',
        visible: false,
    editCellTemplate: function(element, info) {
    console.log(info.value)
    var dati = info.value !== undefined ? info.value : [];
    var tagBox = $('<div>');
        tagBox.dxSelectBox({
            dataSource: DevExpress.data.AspNet.createStore({
                key: "id",
                loadUrl: '{{route('users_list')}}',
            }),
        valueExpr: 'id',
        displayExpr: 'name',
        searchEnabled: true,
        value: dati,
        onValueChanged: function(e) {
        info.setValue(e.value);
        // info.component.repaint();
        }
        });
        element.append(tagBox);
        }

        },

        ],
        // onRowClick: function(e) {
        //     var id = e.key;
        // }
        });
        });

        </script>
@endsection
