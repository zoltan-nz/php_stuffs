Ember.TEMPLATES["admin"] = Ember.Handlebars.compile("<h1>Admin</h1>");

Ember.TEMPLATES["application"] = Ember.Handlebars.compile("<div class=\"navbar navbar-inverse\">\n    <div class=\"navbar-header\">\n        <button class=\"navbar-toggle\" data-toggle='collapse' data-target='#menubar' type='button'>\n            <div class=\"icon-bar\"></div>\n            <div class=\"icon-bar\"></div>\n            <div class=\"icon-bar\"></div>\n        </button>\n        <a class=\"navbar-brand\" href=\"#\">Real Estate App</a>\n    </div>\n    <div class=\"collapse navbar-collapse\" id=\"menubar\">\n        <ul class=\"nav navbar-nav\">\n            <li>{{#link-to 'index'}}Home{{/link-to}}</li>\n            <li>{{#link-to 'admin'}}Admin{{/link-to}}</li>\n        </ul>\n    </div>\n\n</div>\n\n\n<div class=\"container\">\n    {{outlet}}\n</div>");

Ember.TEMPLATES["index"] = Ember.Handlebars.compile("<h2>Search</h2>\n{{partial 'index/search_form'}}\n<h2>Results</h2>");

Ember.TEMPLATES["index/_search_form"] = Ember.Handlebars.compile("<form action=\"\">\n    <input type=\"text\"/>\n</form>");