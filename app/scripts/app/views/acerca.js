define(function (require) {

    var $                   = require('jquery'),
        _                   = require('underscore'),
        Backbone            = require('backbone');

    return Backbone.View.extend({

        render: function (shellView) {
            if(shellView){

                shellView
                    .selectMenuItem('acerca')
                
                    .changeTitles({
                
                        title: 'Acerca',
                        jumboTitle: 'Acerca',
                        jumboText: 'Esta página es para la página acerca'
                
                    });
            }

            return this;
        }
    });

});