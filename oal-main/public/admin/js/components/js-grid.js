(function($) {
    'use strict';

    //JSGrid #1 - Static Data
    $("#js-grid-1").jsGrid({
        height: "500px",
        width: "100%",
        filtering: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the client?",
        controller: db,
        fields: [
            { name: "Name", type: "text", width: 150 },
            { name: "Age", type: "number", width: 50 },
            { name: "Address", type: "text", width: 200 },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
            { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
            { type: "control" }
        ]
    });

    //JSGrid #2 - Validation
    $("#js-grid-2").jsGrid({
        height: "500px",
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the client?",
        controller: db,
        fields: [
            { name: "Name", type: "text", width: 150, validate: "required" },
            { name: "Age", type: "number", width: 50, validate: { validator: "range", param: [18, 80] } },
            { name: "Address", type: "text", width: 200, validate: { validator: "rangeLength", param: [10, 250] } },
            { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name",
                validate: { message: "Country should be specified", validator: function(value) { return value > 0; } } },
            { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
            { type: "control" }
        ]
    });

})(jQuery);