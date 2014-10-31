define(function (require) {

    var $                   = require('jquery'),
        _                   = require('underscore'),
        Backbone            = require('backbone');

    return Backbone.View.extend({

        render: function (shellView) {
            if(shellView){
                
                shellView
                    .selectMenuItem('ayuda')
                    
                    .changeTitles({
                    
                        title: 'Ayuda',
                        jumboTitle: 'Ayuda',
                        jumboText: 'Esta página es para la ayuda'
                    
                    });
            }

            return this;
        }
    });

});