define(function (require) {

    var $       = require('jquery'),
    Backbone    = require('backbone'),

    Pagina = Backbone.Model.extend({}),

    PaginaCollection = Backbone.Collection.extend({

        model: Pagina,

        url: "http://localhost/map/require3/db/toJSON.php?cmd=paginas"

    });

    return {

        Pagina: Pagina,
        PaginaCollection: PaginaCollection
    
    };

});