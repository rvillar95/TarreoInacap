function tablaDescuentos() {
    $("#tablas").empty();
    var row = '<div class="ibox "><div class="ibox-title"><div class="ibox-tools"><h2><strong>Registros Descuentos </strong></h2><div class=" table-responsive"><table class="table table-striped table-bordered table-hover dataTables-descuentos"><thead><tr><th>ID</th><th>Descuentos</th><th>Estado</th><th>Editar</th></tr></thead><tbody></tbody></table></div>                                                        </div></div><div class="ibox-content" id="div-tabla"></div>                    </div>                </div>';
    $("#tablas").append(row);
    $('.dataTables-descuentos').DataTable({
        "ajax": {
            url: "getDescuentos",
            type: 'GET'
        },
        "columnDefs": [
            {

                "targets": 3,
                "data": null,
                "defaultContent": '<button type="button" id="btnEditarMembresia" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
            }, {
                className: 'text-center', targets: [0, 1, 2, 3]
            }
        ],
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Lista de Membresías'},
            {extend: 'pdf', title: 'Lista de Membresías'},

            {extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ]

    });
}

function tablaDinero() {
    $("#tablas").empty();
    var row = '<div class="ibox "><div class="ibox-title"><div class="ibox-tools"><h2><strong>Registros de Dinero (Billetes)</strong></h2><div class=" table-responsive"><table class="table table-striped table-bordered table-hover dataTables-dinero"><thead><tr><th>ID</th><th>Nombre</th><th>Valor</th><th>Estado</th><th>Editar</th></tr></thead><tbody></tbody></table></div>                                                        </div></div><div class="ibox-content" id="div-tabla"></div>                    </div>                </div>';
    $("#tablas").append(row);
    $('.dataTables-dinero').DataTable({
        "ajax": {
            url: "getDinero",
            type: 'GET'
        },
        "columnDefs": [
            {
                "targets": 4,
                "data": null,
                "defaultContent": '<button type="button" id="btnEditarMembresia" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
            }, {
                className: 'text-center', targets: [0, 1, 2, 3, 4]
            }
        ],
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Lista de Membresías'},
            {extend: 'pdf', title: 'Lista de Membresías'},

            {extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ]

    });
}



function tablaCategoria() {
    $("#tablas").empty();
    var row = '<div class="ibox "><div class="ibox-title"><div class="ibox-tools"><h2><strong>Registros de Categorias (Productos)</strong></h2><div class=" table-responsive"><table class="table table-striped table-bordered table-hover dataTables-categoria"><thead><tr><th>ID</th><th>Nombre</th><th>Estado</th><th>Editar</th></tr></thead><tbody></tbody></table></div>                                                        </div></div><div class="ibox-content" id="div-tabla"></div>                    </div>                </div>';
    $("#tablas").append(row);
    $('.dataTables-categoria').DataTable({
        "ajax": {
            url: "getCategoria",
            type: 'GET'
        },
        "columnDefs": [
            {
                "targets": 3,
                "data": null,
                "defaultContent": '<button type="button" id="btnEditarMembresia" class="btn btn-info" data-toggle="modal" data-target="#modal-clase"><i class="glyphicon glyphicon-pencil"></i></button>'
            }, {
                className: 'text-center', targets: [0, 1, 2, 3]
            }

        ],
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Lista de Membresías'},
            {extend: 'pdf', title: 'Lista de Membresías'},

            {extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ]

    });
}



