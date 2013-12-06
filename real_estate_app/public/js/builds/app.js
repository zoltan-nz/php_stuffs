var App, attr;

App = Ember.Application.create({
  LOG_TRANSITIONS: true
});

App.Store = DS.Store.extend({
  adapter: DS.RESTAdapter.extend({})
});

attr = DS.attr;
;App.Router.map(function() {
  this.route("index", {
    path: "/"
  });
  return this.route('about', {
    path: '/about5'
  });
});
