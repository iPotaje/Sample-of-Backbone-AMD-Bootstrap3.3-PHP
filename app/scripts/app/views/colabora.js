define(function (require) {

    var $                   = require('jquery'),
        _                   = require('underscore'),
        Backbone            = require('backbone');

    return Backbone.View.extend({

        render: function (shellView) {
            if(shellView){

                shellView
                    .selectMenuItem('colabora')
                
                    .changeTitles({
                
                        title: 'Colabora',
                        jumboTitle: 'Colabora',
                        jumboText: 'Esta página es para el colabora'
                
                    });
            }

            return this;
        }
    });

});