window.App = Ember.Application.create({
  LOG_TRANSITIONS: true,
  LOG_TRANSITIONS_INTERNAL: true,
  LOG_BINDINGS: true,
  LOG_ACTIVE_GENERATION: true,
  LOG_VIEW_LOOKUPS: true,
  RAISE_ON_DEPRECATION: true,
  LOG_STACKTRACE_ON_DEPRECATION: true,
  LOG_VERSION: true,
  debugMode: true,
  rootElement: '#app',
  ready: function() {
    return this.set('Router.enableLogging', true);
  }
});

App.ApplicationAdapter = DS.RESTAdapter.extend({
  host: window.location.protocol + '//' + window.location.host
});

App.Store = DS.Store.extend();
