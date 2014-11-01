define(function (require) {

    var $                   = require('jquery'),
        _                   = require('underscore'),
        Backbone            = require('backbone'),
        tplDefault          = require('text!tpl/default.htm'),
        tplShell            = require('text!tpl/shell.htm'),
        tplIframe           = require('text!tpl/iframe.htm'),

        template = _.template(tplDefault);

    return Backbone.View.extend({

        render: function () {
            this.$el.html(template());
            this.selectMenuItem('#',true);

            return this;
        },

        shellDisplay: function () {
            template = _.template(tplShell);

            this.render();

            return this;
        },

        selectMenuItem: function (item, par) {
            $('.header a').parent().removeClass('active');
            if (!par){
                $('.header a[href*="' + item + '"]').parent().addClass('active');
            }else{
                $('.header a[href="' + item + '"]').parent().addClass('active');
            }

            return this;
        },

        changeTitles: function (titles) {
            $('h3.text-muted').text(titles.title);
            $('.jumbotron h1').text(titles.jumboTitle);
            // $('.jumbotron p').text(titles.jumboText);
            $('#contenido').html(titles.jumboText);

            return this;
        },

        displayForm: function () {
            $('#contenido').append(tplIframe);
        }

    });

});