'use strict'

module.exports = (grunt) ->
  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')


    project:
      app: 'app'
      assets: '<%= project.app %>/assets'
      src: '<%= project.assets %>/src'
      css: ['<%= project.src %>/scss/style.scss']
      js: ['<%= project.src %>/js/*.js']

    tag:
      banner: '/*!\n' +
      ' * <%= pkg.name %>\n' +
      ' * <%= pkg.title %>\n' +
      ' * <%= pkg.url %>\n' +
      ' * @author <%= pkg.author %>\n' +
      ' * @version <%= pkg.version %>\n' +
      ' * Copyright <%= pkg.copyright %>. <%= pkg.license %> licensed.\n' +
      ' */\n'

    sass:
      dev:
        options:
          style: 'expanded',
          banner: '<%= tag.banner %>',
          compass: true
        files:
          '<%= project.assets %>/css/style.css': '<%= project.css %>'
      dist:
        options:
          style: 'compressed',
          compass: true
        files:
          '<%= project.assets %>/css/style.css': '<%= project.css %>'

    cssmin:
      dev:
        files:
          'public/css/style.min.css': [
            '<%= project.assets %>/bower/normalize-css/normalize.css',
            'public/css/style.css'
            ]
      dist:
        options:
          banner: '<%= tag.banner %>'
        files:
          'public/css/style.min.css': [
            '<%= project.assets %>/bower/normalize-css/normalize.css'
            'public/css/style.css'
            ]

    watch:
      sass:
        files: '<%= project.src %>/scss/{,*/}*.{scss,sass}'
        tasks: ['sass:dev']

  require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks)

  grunt.registerTask('default', [
    'sass:dev'
    'cssmin:dev'
    'watch'
  ])