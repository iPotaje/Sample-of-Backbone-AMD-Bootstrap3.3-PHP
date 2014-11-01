define(function (require) {

    var $                   = require('jquery'),
        _                   = require('underscore'),
        Backbone            = require('backbone');

    return Backbone.View.extend({

        render: function (shellView) {
            
            if(shellView){

                shellView
                    .selectMenuItem(this.model.get('identifier'))
                
                    .changeTitles({
                
                        title:          this.model.get('name'),
                        jumboTitle:     'Welcome to ' + this.model.get('name'),
                        jumboText:      this.model.get('content')
                
                    });
                if (this.model.get('identifier') === 'colabora'){
                    shellView.displayForm();
                }
            }

            return this;
        }
    });

});