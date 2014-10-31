define(function (require) {

    var $           = require('jquery'),
        Backbone    = require('backbone'),
        
        Models      = require('app/models/pagina'),

        ShellView   = require('app/views/shell'),
        PaginaView  = require('app/views/pagina'),

        $body = $('body'),
        shellView = new ShellView({el: $body}).render();

    return Backbone.Router.extend({
        
        initialize: function () {

            var self = this;
            
            this.started = false;

            this.paginas = new Models.PaginaCollection();
            this.paginas.fetch({
            
                success: function (data) {

                    self.init();

                }
            });
        },

        init: function () {
            this.started = true;

            shellView.shellDisplay();

            if(this.viewWaiting){

                this.showView(this.viewWaiting);
            }
        },

        routes: {

            ""          : "home",
            "#"         : "home",
            "colabora"  : "colabora",
            "acerca"    : "acerca",
            "ayuda"     : "ayuda"
        
        },

        showView: function (view) {
            
            if (!this.started){
                
                this.viewWaiting = view;

                return;
            }

            if (this.currentView){
        
              this.currentView.close();
            }
         


            this.currentView = new PaginaView({model: this.paginas.findWhere({identifier: view})});
            this.currentView.render(shellView);
         
            // $body.html(this.currentView.el);
        },

        home: function () {
            shellView.render();
        },

        colabora: function () {
            this.showView('colabora');
        },

        acerca: function () {
            this.showView('acerca');
        },

        ayuda: function () {
            this.showView('ayuda');
        },

    });

});