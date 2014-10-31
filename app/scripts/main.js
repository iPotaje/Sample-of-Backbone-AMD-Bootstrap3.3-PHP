require.config({
    shim: {
        underscore: {
            exports: '_'
        },
        backbone: {
            deps: [
                'underscore',
                'jquery'
            ],
            exports: 'Backbone'
        },
        bootstrap: {
            deps: ['jquery'],
            exports: 'jquery'
        }
    },
    paths: {
        text: '../bower_components/requirejs-text/text',
        jquery: '../bower_components/jquery/dist/jquery',
        backbone: '../bower_components/backbone/backbone',
        underscore: '../bower_components/underscore/underscore',
        bootstrap: '../bower_components/bootstrap-sass-official/assets/javascripts/bootstrap'
    }
});

require([

    'backbone',
    'app/router'

], function (Backbone, Router) {
    
    // Add close function to view
    Backbone.View.prototype.close = function(){
        this.remove();
        this.unbind();
    }
    
    var router = new Router();
    Backbone.history.start();
});
